<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService;

use JsonException;
use RuntimeException;
use UniversalPackages\CountryService\DTO\Country;
use UniversalPackages\CountryService\DTO\CountryProvinceResolveResult;
use UniversalPackages\CountryService\DTO\CountryResolveResult;
use UniversalPackages\CountryService\DTO\Province;

/**
 * @phpstan-type CountryCode string
 * @phpstan-type NormalizedCountryName string
 * @phpstan-type CountryByCodeMap array<CountryCode, Country>
 * @phpstan-type CountryCodeByNameMap array<NormalizedCountryName, CountryCode>
 */
final class CountryService
{
    /** @var CountryByCodeMap|null 国家主索引：countryCode => Country */
    private ?array $countriesByCode = null;
    /** @var CountryCodeByNameMap|null 名称索引：normalizedName => countryCode */
    private ?array $countryCodesByNormalizedName = null;

    /**
     * @param SupportedLocale $locale 数据所使用的 locale
     * @param string|null $dataDir 数据目录，默认使用项目内 data 目录
     */
    public function __construct(
        private readonly SupportedLocale $locale = SupportedLocale::EN_US,
        private ?string                  $dataDir = null,
    )
    {
        $this->dataDir ??= __DIR__ . '/../data';
    }

    /**
     * 返回当前 locale 下的全部国家对象。
     *
     * @return Country[]
     */
    public function getCountries(): array
    {
        $this->loadData();
        return array_values($this->countriesByCode);
    }

    /**
     * 加载并缓存国家数据（按国家代码索引）。
     *
     * 首次调用时读取 JSON，后续调用直接复用内存数据。
     * 同时会使名称索引失效，确保派生索引与主数据一致。
     */
    private function loadData(): void
    {
        if ($this->countriesByCode !== null) {
            return;
        }

        $filePath = $this->dataDir . '/' . $this->locale->value . '.json';
        $json = file_get_contents($filePath);
        if ($json === false) {
            throw new RuntimeException("Failed to read data file: {$filePath}");
        }

        try {
            $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new RuntimeException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }

        $countries = $data['data']['countries'] ?? [];
        $this->countriesByCode = [];
        foreach ($countries as $countryData) {
            $country = Country::fromArray(is_array($countryData) ? $countryData : []);
            $this->countriesByCode[strtoupper($country->code)] = $country;
        }
        $this->countryCodesByNormalizedName = null;
    }

    /**
     * 根据国家代码获取省份列表，代码匹配不区分大小写。
     *
     * @param string $countryCode 国家代码（例如 CN）
     * @return Province[]
     */
    public function getProvinces(string $countryCode): array
    {
        $this->loadData();
        $countryCode = strtoupper($countryCode);
        $country = $this->countriesByCode[$countryCode] ?? null;

        return $country !== null ? $country->provinces : [];
    }

    /**
     * 根据国家名精确匹配国家对象（不区分大小写，自动 trim）。
     *
     * @param string $countryName 国家名（例如 China）
     */
    public function getCountryByName(string $countryName): ?Country
    {
        $this->loadData();
        $targetName = $this->normalizeCountryName($countryName);
        if ($targetName === '') {
            return null;
        }

        $this->loadCountryNameIndex();
        $countryCode = $this->countryCodesByNormalizedName[$targetName] ?? null;
        if ($countryCode === null) {
            return null;
        }

        return $this->countriesByCode[$countryCode] ?? null;
    }

    /**
     * 懒加载名称索引：normalizedName => countryCode。
     *
     * 为节省内存，索引仅保存国家代码，再通过主索引回查 Country 对象。
     */
    private function loadCountryNameIndex(): void
    {
        if ($this->countryCodesByNormalizedName !== null) {
            return;
        }

        $this->countryCodesByNormalizedName = [];
        foreach ($this->countriesByCode as $countryCode => $country) {
            $normalizedName = $this->normalizeCountryName($country->name);
            if ($normalizedName === '') {
                continue;
            }
            $this->countryCodesByNormalizedName[$normalizedName] = $countryCode;
        }
    }

    /**
     * 标准化国家名，用于建立和查询名称索引。
     */
    private function normalizeCountryName(string $countryName): string
    {
        return strtolower(trim($countryName));
    }

    /**
     * 解析输入：
     * - 国家代码（如 CN）返回 CountryResolveResult
     * - 国家-省份代码（如 CN-GD / UY-UY-AR）返回 CountryProvinceResolveResult
     *
     * @param string $input 国家代码或国家-省份代码
     * @param bool $fallbackToCountry 当省份不存在时，是否降级返回国家信息（默认 false）
     */
    public function resolve(string $input, bool $fallbackToCountry = false): CountryResolveResult|CountryProvinceResolveResult|null
    {
        $this->loadData();
        $input = trim($input);

        if (str_contains($input, '-')) {
            // 按第一个连字符分割：UY-UY-AR → country=UY, province=UY-AR（支持 ISO 3166-2 省份代码含连字符）
            $parts = explode('-', $input, 2);
            $countryCode = strtoupper(trim($parts[0]));
            $provinceCode = trim($parts[1] ?? '');
            $country = $this->countriesByCode[$countryCode] ?? null;
            if ($country === null) {
                return null;
            }
            foreach ($country->provinces as $province) {
                if (strtoupper($province->code) === strtoupper($provinceCode)) {
                    return new CountryProvinceResolveResult(
                        country: $country->name,
                        countryCode: $country->code,
                        province: $province->name,
                        provinceCode: $province->code,
                    );
                }
            }
            // 省份不存在：根据配置决定是否降级返回国家信息
            if ($fallbackToCountry) {
                return new CountryResolveResult(
                    country: $country->name,
                    countryCode: $country->code,
                    provinces: $country->provinces,
                );
            }
            return null;
        }

        $countryCode = strtoupper($input);
        $country = $this->countriesByCode[$countryCode] ?? null;
        if ($country === null) {
            return null;
        }
        return new CountryResolveResult(
            country: $country->name,
            countryCode: $country->code,
            provinces: $country->provinces,
        );
    }
}

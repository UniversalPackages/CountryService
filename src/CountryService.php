<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService;

use RuntimeException;
use UniversalPackages\CountryService\DTO\Country;
use UniversalPackages\CountryService\DTO\CountryProvinceResolveResult;
use UniversalPackages\CountryService\DTO\CountryResolveResult;
use UniversalPackages\CountryService\DTO\Province;

final class CountryService
{
    /** @var array<string, Country>|null */
    private ?array $countriesByCode = null;

    public function __construct(
        private readonly SupportedLocale $locale = SupportedLocale::EN_US,
        private ?string                  $dataDir = null,
    )
    {
        $this->dataDir ??= __DIR__ . '/../data';
    }

    /**
     * @return Country[]
     */
    public function getCountries(): array
    {
        $this->loadData();
        return array_values($this->countriesByCode);
    }

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

        $data = json_decode($json, true);
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException(
                'Failed to decode JSON: ' . json_last_error_msg()
            );
        }

        $countries = $data['data']['countries'] ?? [];
        $this->countriesByCode = [];
        foreach ($countries as $countryData) {
            $country = Country::fromArray(is_array($countryData) ? $countryData : []);
            $this->countriesByCode[strtoupper($country->code)] = $country;
        }
    }

    /**
     * @return Province[]
     */
    public function getProvinces(string $countryCode): array
    {
        $this->loadData();
        $countryCode = strtoupper($countryCode);
        $country = $this->countriesByCode[$countryCode] ?? null;
        return $country !== null ? $country->provinces : [];
    }

    public function resolve(string $input): CountryResolveResult|CountryProvinceResolveResult|null
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

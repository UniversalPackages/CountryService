<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService\Tests\Unit;

use PHPUnit\Framework\TestCase;
use UniversalPackages\CountryService\CountryService;
use UniversalPackages\CountryService\DTO\CountryProvinceResolveResult;
use UniversalPackages\CountryService\DTO\CountryResolveResult;
use UniversalPackages\CountryService\SupportedLocale;

final class CountryServiceTest extends TestCase
{
    private CountryService $service;

    /** 
     * 验证 getCountries 返回国家列表且包含中国
     * 
     * @return void
     */
    public function testGetCountries(): void
    {
        $countries = $this->service->getCountries();

        $this->assertIsArray($countries);
        $this->assertNotEmpty($countries);

        $cn = null;
        foreach ($countries as $country) {
            if ($country->code === 'CN') {
                $cn = $country;
                break;
            }
        }
        $this->assertNotNull($cn);
        $this->assertSame('China', $cn->name);
    }

    /** 
     * 验证 getProvinces 能获取有效国家的省份，无效国家返回空数组
     * 
     * @return void
     */
    public function testGetProvinces(): void
    {
        $provincesCN = $this->service->getProvinces('CN');
        $this->assertNotEmpty($provincesCN);

        $provincesXX = $this->service->getProvinces('XX');
        $this->assertSame([], $provincesXX);
    }

    /** 
     * 验证 getProvinces 国家代码大小写不敏感
     * 
     * @return void
     */
    public function testGetProvincesCaseInsensitive(): void
    {
        $provincesLower = $this->service->getProvinces('cn');
        $provincesUpper = $this->service->getProvinces('CN');

        $this->assertEquals($provincesLower, $provincesUpper);
    }

    /**
     * 验证 getCountryByName 可按国家名查询并返回对应对象
     *
     * @return void
     */
    public function testGetCountryByName(): void
    {
        $country = $this->service->getCountryByName('China');
        $countryWithSpaces = $this->service->getCountryByName('  china  ');

        $this->assertNotNull($country);
        $this->assertSame('CN', $country->code);
        $this->assertSame('China', $country->name);
        $this->assertNotNull($countryWithSpaces);
        $this->assertSame('CN', $countryWithSpaces->code);
    }

    /**
     * 验证 getCountryByName 查询不存在国家时返回 null
     *
     * @return void
     */
    public function testGetCountryByNameInvalid(): void
    {
        $country = $this->service->getCountryByName('NotARealCountry');
        $this->assertNull($country);
    }

    /** 
     * 验证 resolve 仅国家代码时返回 CountryResolveResult
     * 
     * @return void
     */
    public function testResolveCountryOnly(): void
    {
        $result = $this->service->resolve('CN');

        $this->assertInstanceOf(CountryResolveResult::class, $result);
        $this->assertSame('China', $result->country);
        $this->assertSame('CN', $result->countryCode);
        $this->assertNotEmpty($result->provinces);
    }

    /** 
     * 验证 resolve 国家-省份代码（如 CN-GD）时返回 CountryProvinceResolveResult
     * 
     * @return void
     */
    public function testResolveCountryProvince(): void
    {
        $result = $this->service->resolve('CN-GD');

        $this->assertInstanceOf(CountryProvinceResolveResult::class, $result);
        $this->assertSame('China', $result->country);
        $this->assertSame('CN', $result->countryCode);
        $this->assertSame('Guangdong', $result->province);
        $this->assertSame('GD', $result->provinceCode);
    }

    /** 
     * 验证 resolve 国家-省份代码（如 UY-UY-AR）时，省份代码含连字符的 ISO 3166-2 格式能正确解析
     * 
     * @return void
     */
    public function testResolveCountryProvinceWithHyphenInProvinceCode(): void
    {
        $result = $this->service->resolve('UY-UY-AR');

        $this->assertInstanceOf(CountryProvinceResolveResult::class, $result);
        $this->assertSame('Uruguay', $result->country);
        $this->assertSame('UY', $result->countryCode);
        $this->assertSame('Artigas', $result->province);
        $this->assertSame('UY-AR', $result->provinceCode);
    }

    /** 
     * 验证 resolve 国家-省份代码大小写不敏感
     * 
     * @return void
     */
    public function testResolveCountryProvinceCaseInsensitive(): void
    {
        $resultLower = $this->service->resolve('cn-gd');
        $resultUpper = $this->service->resolve('CN-GD');

        $this->assertInstanceOf(CountryProvinceResolveResult::class, $resultLower);
        $this->assertInstanceOf(CountryProvinceResolveResult::class, $resultUpper);
        $this->assertSame($resultLower->country, $resultUpper->country);
        $this->assertSame($resultLower->province, $resultUpper->province);
        $this->assertSame($resultLower->provinceCode, $resultUpper->provinceCode);
    }

    /** 
     * 验证 resolve 无效国家代码时返回 null
     * 
     * @return void
     */
    public function testResolveInvalidCountry(): void
    {
        $result = $this->service->resolve('XX');
        $this->assertNull($result);
    }

    /** 
     * 验证 resolve 有效国家但无效省份代码时返回 null（默认行为）
     * 
     * @return void
     */
    public function testResolveInvalidProvince(): void
    {
        $result = $this->service->resolve('CN-XX');
        $this->assertNull($result);
    }

    /** 
     * 验证 resolve 有效国家但无效省份代码时，启用 fallbackToCountry 后返回国家信息
     * 
     * @return void
     */
    public function testResolveInvalidProvinceWithFallback(): void
    {
        $result = $this->service->resolve('CN-XX', fallbackToCountry: true);

        $this->assertInstanceOf(CountryResolveResult::class, $result);
        $this->assertSame('China', $result->country);
        $this->assertSame('CN', $result->countryCode);
        $this->assertNotEmpty($result->provinces);
    }

    /** 
     * 验证 resolve 无效格式（如纯文本）时返回 null
     * 
     * @return void
     */
    public function testResolveInvalidProvinceCode(): void
    {
        $result = $this->service->resolve('INVALID');
        $this->assertNull($result);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new CountryService(SupportedLocale::EN_US);
    }
}

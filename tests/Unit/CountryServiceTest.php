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

    public function testGetProvinces(): void
    {
        $provincesCN = $this->service->getProvinces('CN');
        $this->assertNotEmpty($provincesCN);

        $provincesXX = $this->service->getProvinces('XX');
        $this->assertSame([], $provincesXX);
    }

    public function testGetProvincesCaseInsensitive(): void
    {
        $provincesLower = $this->service->getProvinces('cn');
        $provincesUpper = $this->service->getProvinces('CN');

        $this->assertEquals($provincesLower, $provincesUpper);
    }

    public function testResolveCountryOnly(): void
    {
        $result = $this->service->resolve('CN');

        $this->assertInstanceOf(CountryResolveResult::class, $result);
        $this->assertSame('China', $result->country);
        $this->assertSame('CN', $result->countryCode);
        $this->assertNotEmpty($result->provinces);
    }

    public function testResolveCountryProvince(): void
    {
        $result = $this->service->resolve('CN-GD');

        $this->assertInstanceOf(CountryProvinceResolveResult::class, $result);
        $this->assertSame('China', $result->country);
        $this->assertSame('CN', $result->countryCode);
        $this->assertSame('Guangdong', $result->province);
        $this->assertSame('GD', $result->provinceCode);
    }

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

    public function testResolveInvalidCountry(): void
    {
        $result = $this->service->resolve('XX');
        $this->assertNull($result);
    }

    public function testResolveInvalidProvince(): void
    {
        $result = $this->service->resolve('CN-XX');
        $this->assertNull($result);
    }

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

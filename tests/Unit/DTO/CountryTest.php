<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use UniversalPackages\CountryService\DTO\Country;

final class CountryTest extends TestCase
{
    public function testFromArray(): void
    {
        $country = Country::fromArray([
            'code' => 'CN',
            'name' => 'China',
            'continent' => 'Asia',
            'tags' => [],
            'labels' => [],
            'provinces' => [
                ['name' => 'Guangdong', 'code' => 'GD'],
                ['name' => 'Beijing', 'code' => 'BJ'],
            ],
        ]);

        $this->assertSame('CN', $country->code);
        $this->assertSame('China', $country->name);
        $this->assertSame('Asia', $country->continent);
        $this->assertCount(2, $country->provinces);
        $this->assertSame('Guangdong', $country->provinces[0]->name);
        $this->assertSame('GD', $country->provinces[0]->code);
        $this->assertSame('Beijing', $country->provinces[1]->name);
        $this->assertSame('BJ', $country->provinces[1]->code);
    }

    public function testFromArrayWithEmptyProvinces(): void
    {
        $country = Country::fromArray([
            'code' => 'XX',
            'name' => 'Test',
            'continent' => 'Europe',
            'tags' => [],
            'labels' => [],
        ]);

        $this->assertSame([], $country->provinces);
    }
}

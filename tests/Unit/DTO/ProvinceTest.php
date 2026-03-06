<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use UniversalPackages\CountryService\DTO\Province;

final class ProvinceTest extends TestCase
{
    public function testFromArray(): void
    {
        $province = Province::fromArray(['name' => 'X', 'code' => 'Y']);

        $this->assertSame('X', $province->name);
        $this->assertSame('Y', $province->code);
    }

    public function testFromArrayWithEmptyData(): void
    {
        $province = Province::fromArray([]);

        $this->assertSame('', $province->name);
        $this->assertSame('', $province->code);
    }
}

<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService\DTO;

final class CountryProvinceResolveResult
{
    public function __construct(
        public string $country,
        public string $countryCode,
        public string $province,
        public string $provinceCode,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            country: $data['country'] ?? '',
            countryCode: $data['countryCode'] ?? '',
            province: $data['province'] ?? '',
            provinceCode: $data['provinceCode'] ?? '',
        );
    }
}

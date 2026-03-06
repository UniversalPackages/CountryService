<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService\DTO;

final class CountryResolveResult
{
    /**
     * @param Province[] $provinces
     */
    public function __construct(
        public string $country,
        public string $countryCode,
        public array  $provinces,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        $provinces = [];
        foreach ($data['provinces'] ?? [] as $provinceData) {
            $provinces[] = Province::fromArray(is_array($provinceData) ? $provinceData : []);
        }

        return new self(
            country: $data['country'] ?? '',
            countryCode: $data['countryCode'] ?? '',
            provinces: $provinces,
        );
    }
}

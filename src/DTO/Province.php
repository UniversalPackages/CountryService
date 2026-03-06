<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService\DTO;

final class Province
{
    public function __construct(
        public string $name,
        public string $code,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            code: $data['code'] ?? '',
        );
    }
}

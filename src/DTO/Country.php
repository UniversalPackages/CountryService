<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService\DTO;

final class Country
{
    /**
     * @param array<string> $tags
     * @param array<string, string> $labels
     * @param Province[] $provinces
     */
    public function __construct(
        public string $code,
        public string $name,
        public string $continent,
        public array  $tags,
        public array  $labels,
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
            code: $data['code'] ?? '',
            name: $data['name'] ?? '',
            continent: $data['continent'] ?? '',
            tags: $data['tags'] ?? [],
            labels: $data['labels'] ?? [],
            provinces: $provinces,
        );
    }
}

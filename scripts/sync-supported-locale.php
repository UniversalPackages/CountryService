#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Sync SupportedLocale enum from Country Service GraphQL schema.
 *
 * Fetches introspection from https://country-service.shopifycloud.com/graphql.json
 * and generates src/SupportedLocale.php.
 */

const GRAPHQL_URL = 'https://country-service.shopifycloud.com/graphql.json';
const INTROSPECTION_QUERY = '{"query":"query { __type(name: \"SupportedLocale\") { name kind enumValues { name description isDeprecated deprecationReason } } }","variables":{}}';

function fetchSupportedLocaleSchema(): array
{
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => [
                'Content-Type: application/json',
                'Accept: application/json',
            ],
            'content' => INTROSPECTION_QUERY,
        ],
    ]);

    $response = @file_get_contents(GRAPHQL_URL, false, $context);
    if ($response === false) {
        fwrite(STDERR, "Error: Failed to fetch GraphQL schema from " . GRAPHQL_URL . "\n");
        exit(1);
    }

    $data = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        fwrite(STDERR, "Error: Invalid JSON response\n");
        exit(1);
    }

    if (isset($data['errors'])) {
        fwrite(STDERR, "Error: GraphQL errors: " . json_encode($data['errors'], JSON_UNESCAPED_UNICODE) . "\n");
        exit(1);
    }

    $type = $data['data']['__type'] ?? null;
    if ($type === null || ($type['kind'] ?? '') !== 'ENUM') {
        fwrite(STDERR, "Error: SupportedLocale type not found or not an enum\n");
        exit(1);
    }

    $enumValues = $type['enumValues'] ?? [];
    if (empty($enumValues)) {
        fwrite(STDERR, "Error: No enum values found for SupportedLocale\n");
        exit(1);
    }

    return $enumValues;
}

function generateEnumPhp(array $enumValues): string
{
    $lines = [
        '<?php',
        '',
        'declare(strict_types=1);',
        '',
        'namespace UniversalPackages\\CountryService;',
        '',
        '/**',
        ' * Supported locale enum, synced from Country Service GraphQL schema.',
        ' */',
        'enum SupportedLocale: string',
        '{',
    ];

    foreach ($enumValues as $value) {
        $name = $value['name'];
        $description = $value['description'] ?? $name;
        $isDeprecated = $value['isDeprecated'] ?? false;
        $deprecationReason = $value['deprecationReason'] ?? null;

        $docblock = ['/**'];
        $docblock[] = ' * ' . str_replace(["\r\n", "\r", "\n"], ' ', $description);
        if ($isDeprecated) {
            $deprecatedMsg = $deprecationReason ?: 'Deprecated';
            $docblock[] = ' * @deprecated ' . $deprecatedMsg;
        }
        $docblock[] = ' */';

        $lines[] = '    ' . implode("\n    ", $docblock);
        $lines[] = "    case {$name} = '{$name}';";
        $lines[] = '';
    }

    // Remove trailing empty line before closing brace
    array_pop($lines);
    $lines[] = '}';

    return implode("\n", $lines);
}

function parseArgs(array $argv): array
{
    $output = 'src/SupportedLocale.php';
    for ($i = 1; $i < count($argv); $i++) {
        if ($argv[$i] === '--output' && isset($argv[$i + 1])) {
            $output = $argv[$i + 1];
            $i++;
        }
    }
    return ['output' => $output];
}

// Main
$args = parseArgs($argv);
$outputPath = $args['output'];

$enumValues = fetchSupportedLocaleSchema();
$php = generateEnumPhp($enumValues);

$dir = dirname($outputPath);
if ($dir !== '' && !is_dir($dir)) {
    mkdir($dir, 0755, true);
}

if (file_put_contents($outputPath, $php) === false) {
    fwrite(STDERR, "Error: Failed to write to {$outputPath}\n");
    exit(1);
}

echo "Generated {$outputPath} with " . count($enumValues) . " enum values.\n";

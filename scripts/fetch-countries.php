#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Fetch countries and time zones from Country Service GraphQL API.
 *
 * POSTs to https://country-service.shopifycloud.com/graphql.json
 * and saves the result to {output-dir}/{locale}.json.
 */

const GRAPHQL_URL = 'https://country-service.shopifycloud.com/graphql.json';

const GRAPHQL_QUERY = <<<'GQL'
query queryData($locale: SupportedLocale!) {
  countries(locale: $locale) {
    code
    name
    continent
    tags
    labels {
      zone
    }
    provinces {
      name
      code
    }
  }
  timeZones(locale: $locale) {
    description
    olsonName
  }
}
GQL;

function fetchCountries(string $locale): array
{
    $payload = json_encode([
        'query' => GRAPHQL_QUERY,
        'variables' => ['locale' => $locale],
    ]);

    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => [
                'Content-Type: application/json',
                'Accept: application/json',
            ],
            'content' => $payload,
        ],
    ]);

    $response = @file_get_contents(GRAPHQL_URL, false, $context);
    if ($response === false) {
        fwrite(STDERR, "Error: Failed to fetch from " . GRAPHQL_URL . "\n");
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

    return $data;
}

function parseArgs(array $argv): array
{
    $locale = 'EN_US';
    $outputDir = 'data/';
    $hasLocaleBeenSet = false;

    for ($i = 1, $iMax = count($argv); $i < $iMax; $i++) {
        if ($argv[$i] === '--locale' && isset($argv[$i + 1])) {
            $locale = $argv[$i + 1];
            $hasLocaleBeenSet = true;
            $i++;
        } elseif (str_starts_with($argv[$i], '--locale=')) {
            $locale = substr($argv[$i], strlen('--locale='));
            $hasLocaleBeenSet = true;
        } elseif ($argv[$i] === '--output-dir' && isset($argv[$i + 1])) {
            $outputDir = rtrim($argv[$i + 1], '/') . '/';
            $i++;
        } elseif (str_starts_with($argv[$i], '--output-dir=')) {
            $outputDir = rtrim(substr($argv[$i], strlen('--output-dir=')), '/') . '/';
        } elseif (!str_starts_with($argv[$i], '--') && !$hasLocaleBeenSet) {
            // Allow positional locale, e.g. `composer fetch-countries ZH_CN`.
            $locale = $argv[$i];
            $hasLocaleBeenSet = true;
        }
    }

    return ['locale' => $locale, 'outputDir' => $outputDir];
}

// Main
$args = parseArgs($argv);
$locale = $args['locale'];
$outputDir = $args['outputDir'];

if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}

$data = fetchCountries($locale);

if (!isset($data['data']['countries'])) {
    fwrite(STDERR, "Error: data.countries does not exist in response\n");
    exit(1);
}

$outputPath = $outputDir . $locale . '.json';
$json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

if (file_put_contents($outputPath, $json) === false) {
    fwrite(STDERR, "Error: Failed to write to {$outputPath}\n");
    exit(1);
}

$countriesCount = count($data['data']['countries']);
$timeZonesCount = count($data['data']['timeZones'] ?? []);
echo "Generated {$outputPath}: {$countriesCount} countries, {$timeZonesCount} time zones.\n";

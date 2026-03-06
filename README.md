# Country Service

PHP 8.1+ 国家/省份查询库，数据源自 [Shopify Country Service](https://country-service.shopifycloud.com)。

## 安装

```bash
composer require universal-packages/country-service
```

## 用法

```php
use UniversalPackages\CountryService\CountryService;
use UniversalPackages\CountryService\SupportedLocale;

$service = new CountryService(SupportedLocale::EN_US);

// 国家列表
$countries = $service->getCountries();

// 某国省份
$provinces = $service->getProvinces('CN');

// 解析：国家代码 → 国家名 + 省份列表
$result = $service->resolve('CN');  // China, 31 provinces

// 解析：国家-省份代码 → 国家名 + 省份名
$result = $service->resolve('CN-GD');  // China / Guangdong (GD)
```

## 命令

| 命令 | 说明 |
|------|------|
| `composer sync-locale` | 从 GraphQL schema 同步 SupportedLocale 枚举 |
| `composer fetch-countries` | 拉取国家/省份数据 |
| `composer test` | 运行测试 |

## 数据更新

GitHub Actions 每周一自动执行 `sync-locale` 和 `fetch-countries`，并提交变更。

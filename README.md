# Country Service

PHP 8.1+ 国家/省份查询库，数据源自 [Shopify Country Service](https://country-service.shopifycloud.com)。

## 安装

通过 [Packagist](https://packagist.org/packages/universal-packages/country-service) 安装：

```bash
composer require universal-packages/country-service
```

## 用法

```php
use UniversalPackages\CountryService\CountryService;
use UniversalPackages\CountryService\DataLocale;

$service = new CountryService(DataLocale::EN_US);

// 国家列表
$countries = $service->getCountries();

// 某国省份
$provinces = $service->getProvinces('CN');

// 按国家名查询（大小写不敏感，自动 trim）
$country = $service->getCountryByName('China');      // Country(code: CN, name: China, ...)
$country = $service->getCountryByName('  china  ');  // 同样可命中
$country = $service->getCountryByName('NoCountry');  // null

// 解析：国家代码 → 国家名 + 省份列表
$result = $service->resolve('CN');  // China, 31 provinces

// 解析：国家-省份代码 → 国家名 + 省份名
$result = $service->resolve('CN-GD');  // China / Guangdong (GD)

// 省份不存在时的降级处理
$result = $service->resolve('CN-XX');                            // null（默认行为）
$result = $service->resolve('CN-XX', allowInvalidProvince: true); // CountryProvinceResolveResult(country: China, countryCode: CN, province: XX, provinceCode: XX)
```

## API 概览

| 方法                                                                                                | 说明                                                                                       |
|---------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------|
| `getCountries(): Country[]`                                                                       | 返回当前 locale 的全部国家                                                                        |
| `getProvinces(string $countryCode): Province[]`                                                   | 根据国家代码获取省份（大小写不敏感）                                                                       |
| `getCountryByName(string $countryName): ?Country`                                                 | 根据国家名精确匹配国家对象（大小写不敏感，自动 trim）                                                            |
| `resolve(string $input, bool $allowInvalidProvince = false): CountryResolveResult\|CountryProvinceResolveResult\|null` | 解析国家代码或国家-省份代码（支持 `UY-UY-AR` 这类省份代码含连字符）。`allowInvalidProvince` 为 true 时，省份不存在会返回 `CountryProvinceResolveResult`（省份字段使用原始输入） |

## 性能说明

- 国家主数据按国家代码建立内存索引（`countryCode => Country`）。
- 国家名查询使用惰性名称索引（`normalizedName => countryCode`），首次调用时构建。
- 名称索引仅保存国家代码，查询时回查主索引，在保持查询速度的同时节省内存占用。

## 命令

| 命令                         | 说明                                     |
|----------------------------|----------------------------------------|
| `composer fetch-countries` | 拉取国家/省份数据                              |
| `composer test`            | 运行测试                                   |

## 数据更新

GitHub Actions 每周一自动执行 `fetch-countries`，并提交变更。

## 许可证

[MIT License](LICENSE)

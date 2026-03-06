# Country Service - AI 交接文档

供 Cursor、Claude Code 等 AI 助手快速理解项目并正确修改代码。

## 项目概述

PHP 8.1+ 国家/省份查询库，数据来自 Shopify Country Service GraphQL API。支持按国家代码、国家-省份代码解析，返回国家名、省份名及简码。

## 目录结构

```
├── data/              # 按 locale 存储的 JSON 数据（EN_US.json 等）
├── scripts/           # CLI 脚本
│   ├── sync-supported-locale.php   # 从 GraphQL schema 同步 SupportedLocale 枚举
│   └── fetch-countries.php         # 拉取国家/省份数据
├── src/
│   ├── CountryService.php          # 主服务类
│   ├── SupportedLocale.php         # 枚举（自动生成，勿手改）
│   └── DTO/
│       ├── Country.php
│       ├── Province.php
│       ├── CountryResolveResult.php      # resolve('CN') 返回值
│       └── CountryProvinceResolveResult.php  # resolve('CN-GD') 返回值
├── tests/Unit/
└── .github/workflows/update-country-data.yml  # 每周同步数据
```

## 核心逻辑

- **CountryService**：构造函数接收 `SupportedLocale` 和可选 `dataDir`，数据文件路径为 `{dataDir}/{locale->value}.json`
- **resolve()**：输入不含 `-` 按国家代码；含 `-` 按 `CountryCode-ProvinceCode` 解析（如 `CN-GD`）
- **大小写**：国家/省份代码统一 `strtoupper` 匹配
- **SupportedLocale**：由 `sync-supported-locale.php` 从 GraphQL introspection 生成，修改需改脚本后重新执行

## 修改指南

| 场景 | 操作 |
|------|------|
| 新增 API 字段 | 改 `scripts/fetch-countries.php` 的 GraphQL query，对应 DTO 的 `fromArray` |
| 新增 locale | 执行 `composer fetch-countries -- --locale=ZH_CN`，数据会写入 `data/ZH_CN.json` |
| 修改 resolve 行为 | 改 `src/CountryService.php` 的 `resolve()` |
| 修改 DTO 结构 | 改 `src/DTO/*.php`，同步更新 `CountryService` 和测试 |

## 命令

```bash
composer sync-locale    # 同步 SupportedLocale.php
composer fetch-countries # 拉取 data/EN_US.json
composer test           # 运行 PHPUnit
```

## 约定

- PHP 8.1+，`declare(strict_types=1)`
- 命名空间：`UniversalPackages\CountryService`，DTO 在 `...\DTO`
- 测试：`tests/Unit/` 与 `src/` 结构对应
- 勿直接编辑 `src/SupportedLocale.php`，通过脚本重新生成

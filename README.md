# hasOne 一对一

[![GitHub Tests Action Status](https://github.com/curder/larave-relationships-demo/actions/workflows/run-test.yml/badge.svg?branch=has-one)](https://github.com/curder/larave-relationships-demo/actions?query=run-test%3Ahas-one)
[![GitHub Code Style Action Status](https://github.com/curder/larave-relationships-demo/actions/workflows/php-cs-fixer.yml/badge.svg?branch=has-one)](https://github.com/curder/larave-relationships-demo/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Ahas-one)

## 安装

```bash
composer install -vvv # 安装 PHP 依赖

cp .env.example .env # 创建环境变量
php artisan key:generate # 生成APP对应的key

touch database/database.sqlite # 创建 sqlite 数据库文件
```

## 数据填充

```bash
php artisan migrate:refresh --seeder=UserAccountSeeder
```

## 测试

```php
./vendor/bin/phpunit
```

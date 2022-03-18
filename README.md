# hasOne 一对一

[![GitHub Tests Action Status](https://github.com/curder/laravel-relationships-demo/actions/workflows/run-test.yml/badge.svg?branch=has-one)](https://github.com/curder/laravel-relationships-demo/actions/workflows/run-test.yml?query=branch%3Ahas-one)
[![PHPStan](https://github.com/curder/laravel-relationships-demo/actions/workflows/phpstan.yml/badge.svg?branch=has-one)](https://github.com/curder/laravel-relationships-demo/actions/workflows/phpstan.yml?query=branch%3Ahas-one)
[![GitHub Code Style Action Status](https://github.com/curder/laravel-relationships-demo/actions/workflows/php-cs-fixer.yml/badge.svg?branch=has-one)](https://github.com/curder/laravel-relationships-demo/actions/workflows/php-cs-fixer.yml?query=branch%3Ahas-one)

## 下载

```bash
git clone -b has-one git@github.com:curder/laravel-relationships-demo.git

cd laravel-relationships-demo
```


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

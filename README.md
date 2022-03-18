# hasOneThrough 远层一对一 

[![Test Laravel Github action](https://github.com/curder/laravel-relationships-demo/actions/workflows/run-test.yml/badge.svg?branch=has-one-through)](https://github.com/curder/laravel-relationships-demo/actions/workflows/run-test.yml?query=branch%3Ahas-one-through)
[![PHPStan](https://github.com/curder/laravel-relationships-demo/actions/workflows/phpstan.yml/badge.svg?branch=has-one-through)](https://github.com/curder/laravel-relationships-demo/actions/workflows/phpstan.yml?query=branch%3Ahas-one-through)
[![Check & fix styling](https://github.com/curder/laravel-relationships-demo/actions/workflows/php-cs-fixer.yml/badge.svg?branch=has-one-through)](https://github.com/curder/laravel-relationships-demo/actions/workflows/php-cs-fixer.yml?query=branch%3Ahas-one-through)

## 下载

```bash
git clone -b has-one-through git@github.com:curder/laravel-relationships-demo.git

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
php artisan migrate:refresh --seeder=OwnerSeeder
```

## 测试

```bash
./vendor/bin/phpunit
```

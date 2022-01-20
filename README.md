# hasMany 一对多

[![GitHub Tests Action Status](https://github.com/curder/larave-relationships-demo/actions/workflows/run-test.yml/badge.svg)](https://github.com/curder/larave-relationships-demo/actions?query=run-test%3Ahas-many)
[![GitHub Code Style Action Status](https://github.com/curder/larave-relationships-demo/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/curder/larave-relationships-demo/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Ahas-many)

## 安装

```bash
composer install -vvv # 安装 PHP 依赖

cp .env.example .env # 创建环境变量
php artisan key:generate # 生成APP对应的key

touch database/database.sqlite # 创建 sqlite 数据库文件
```

## 数据填充

```bash
php artisan migrate:refresh --seeder=PostSeeder
```

## 测试
```bash
./vendor/bin/phpunit
```

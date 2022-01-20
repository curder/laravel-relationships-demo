# hasMany 一对多

## 安装

```php
composer install -vvv # 安装 PHP 依赖

cp .env.example .env # 创建环境变量
php artisan key:generate # 生成APP对应的key

touch database/database.sqlite # 创建 sqlite 数据库文件
```

## 数据填充

```php
php artisan migrate:refresh --seeder=PostSeeder
```

## 测试
```php
./vendor/bin/phpunit
```

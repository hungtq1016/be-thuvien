<p align="center">
<a href="https://itc.edu.vn/" target="_blank">
<img src="https://itc.edu.vn/Data/Sites/1/media/img/logo.png" width="400" alt="ITC Logo"></a></p>

# Cách Cài Đặt

Sau khi có link github này bạn vui lòng cài đặt sau các bước sau.

## Yêu cầu cơ bản:
- Laravel 9.x.
- PHP > 8.
- MySQL 

## Sau khi clone về

```sh
cd be-thuvien
code .
```

Điều này là bắt buộc để chạy được laravel

## Cài đặt các composer đi theo

```sh
composer install
```

Điều này là bắt buộc để chạy được laravel

## Tạo file .env để cài đặt môi trường

```sh
cp .env.example .env
```
Chỉnh sửa DB_USERNAME để phù với với DB của bạn

## Tạo key riêng cho laravel

```sh
php artisan key:generate
```

## Option 1: Cài đặt bằng Faker có sẵn

```sh
php artisan migrate
```
```sh
php artisan db:seed
```
## Option 2: Tải sql có sẵn 

```sh
http://tranhung.info
```

## Khởi chạy

```sh
php atisan serve
```


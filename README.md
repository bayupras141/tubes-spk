<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requirement
1. PHP 8.0+
2. Composer v2.2+
3. MySQL 5.7+

## Langkah langkah instalasi
1. Clone repository ini
2. Jalankan perintah `composer install`
3. Copy file `.env.example` menjadi `.env`
4. Jalankan perintah `php artisan key:generate`

## Konfigurasi database
1. Buat database baru
2. Isi konfigurasi database pada file `.env`
3. Jalankan perintah `php artisan migrate`
4. Jalankan perintah `php artisan db:seed`

## Menjalankan aplikasi
1. Jalankan perintah `php artisan serve`
2. Buka browser dan akses `http://localhost:8000`


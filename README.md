# Simple-Blog

Simple-Blog là ứng dụng blog được xây dựng bằng Laravel, tập trung vào hai nhóm chức năng chính:
- Khu vực public để đọc danh sách bài viết và chi tiết bài viết.
- Khu vực admin (yêu cầu đăng nhập) để quản lý bài viết, danh mục, thẻ.

## Project Overview

Project cung cấp nền tảng blog cơ bản với authentication theo Laravel Breeze, giao diện Blade, và quản trị nội dung theo mô hình CRUD.

Hiện tại hệ thống sử dụng:
- Quan hệ `Post -> Category` (many-to-one)
- Quan hệ `Post <-> Tag` (many-to-many)
- `User` là tác giả bài viết trong admin

## Features

- Public pages: trang chủ, danh sách bài viết, chi tiết bài viết, trang giới thiệu.
- Admin dashboard: quản lý bài viết (`posts`), danh mục (`categories`), thẻ (`tags`).
- Upload ảnh bài viết vào `storage/app/public/posts`.
- Phân trang bài viết ở cả public và admin.

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade, Vite, Tailwind CSS, Alpine.js
- **Database:** MySQL (theo `.env.example`)
- **Queue/Cache/Session:** database driver

## Requirements

- PHP `^8.2`
- Composer
- Node.js + npm (để build assets với Vite)
- MySQL/MariaDB
- Web server (Apache/Nginx) hoặc dùng `php artisan serve` cho môi trường local

> Ghi chú: Dự án đang cấu hình mặc định DB theo MySQL (`DB_CONNECTION=mysql`).

## Installation

```bash
git clone <your-repository-url>
cd Simple-Blog
composer install
npm install
cp .env.example .env
php artisan key:generate
```

### Thiết lập database

1. Tạo database, ví dụ: `simple_blog`.
2. Cập nhật thông tin DB trong `.env`.
3. Chạy migration:

```bash
php artisan migrate
```

### Liên kết storage cho ảnh

```bash
php artisan storage:link
```

## Run Project / Development

### Chạy đồng thời server + queue + vite (khuyên dùng)

```bash
composer run dev
```

## Environment Configuration (`.env`)

Các biến quan trọng:

```env
APP_NAME=Laravel
APP_ENV=local
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simple_blog
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local
```


## Folder Structure

```text
Simple-Blog/
├── app/
│   ├── Http/Controllers/        # Controllers public, auth, admin
│   ├── Http/Requests/           # Form request validation
│   ├── Models/                  # User, Post, Category, Tag
│   └── View/Components/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   ├── web.php
│   ├── auth.php
│   └── console.php
├── storage/
├── tests/
├── composer.json
└── package.json
```

## API Documentation

Hiện tại project **chưa khai báo `routes/api.php`** và không cung cấp REST API JSON riêng.
Các endpoint hiện có là web routes (HTML):

### Public routes

- `GET /` - Trang chủ
- `GET /post` - Danh sách bài viết
- `GET /post/{id}` - Chi tiết bài viết
- `GET /about` - Trang giới thiệu

### Auth routes (Laravel Breeze)

- `GET|POST /register`
- `GET|POST /login`
- `POST /logout`
- `GET|POST /forgot-password`
- `GET /reset-password/{token}`
- `POST /reset-password`
- `GET /verify-email`
- `GET /verify-email/{id}/{hash}`
- `POST /email/verification-notification`
- `GET|POST /confirm-password`
- `PUT /password`

### Profile routes (auth)

- `GET /profile`
- `PATCH /profile`
- `DELETE /profile`

### Admin routes (auth + prefix `admin`)

- `GET /admin` - Dashboard
- Resource `admin/posts`
- Resource `admin/categories`
- Resource `admin/tags`

Laravel resource routes tương ứng các action:
- `index`, `create`, `store`, `edit`, `update`, `destroy`  
(`show` hiện có route sinh ra nhưng controller chưa triển khai nội dung)

## Database

### Migrations chính

- `users`
- `password_reset_tokens`
- `sessions`
- `cache`, `cache_locks`
- `jobs`, `job_batches`, `failed_jobs`
- `categories`
- `tags`
- `posts`
- `post_tag` (pivot table)

### Quan hệ dữ liệu

- `posts.category_id -> categories.id` (cascade on delete)
- `posts.user_id -> users.id` (cascade on delete)
- `post_tag.post_id -> posts.id` (cascade on delete)
- `post_tag.tag_id -> tags.id` (cascade on delete)

### Seeders

`DatabaseSeeder` hiện đang thực hiện:
- Tạo 1 user mặc định (email `pmhieudev1309@gmail.com`, password `password`)
- Gọi các seeder:
  - `UserSeeder` (20 users)
  - `CategorySeeder` (50 categories)
  - `TagSeeder` (20 tags)
  - `PostSeeder` (200 posts)
  - `PostTagSeeder` (gắn ngẫu nhiên 1-3 tags cho mỗi post)

Chạy seed:

```bash
php artisan db:seed
```

## Test Accounts / Sample Data

Tài khoản mặc định từ `DatabaseSeeder`:

- Email: `pmhieudev1309@gmail.com`
- Password: `password`


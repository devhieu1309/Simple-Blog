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
- Authentication: đăng ký, đăng nhập, quên mật khẩu, reset mật khẩu, xác minh email.
- Profile management: cập nhật thông tin cá nhân, đổi mật khẩu, xóa tài khoản.
- Admin dashboard: quản lý bài viết (`posts`), danh mục (`categories`), thẻ (`tags`).
- Upload ảnh bài viết vào `storage/app/public/posts`.
- Phân trang bài viết ở cả public và admin.

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade, Vite, Tailwind CSS, Alpine.js
- **Database:** MySQL (theo `.env.example`)
- **Queue/Cache/Session:** database driver
- **Testing:** Pest + PHPUnit ecosystem (thông qua `php artisan test`)

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

### Cách 1: Chạy đồng thời server + queue + vite (khuyên dùng)

```bash
composer run dev
```

### Cách 2: Chạy thủ công từng tiến trình

```bash
php artisan serve
php artisan queue:listen --tries=1
npm run dev
```

Ứng dụng local mặc định: `http://127.0.0.1:8000` (hoặc URL do Artisan trả về).

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

Khuyến nghị production:
- `APP_ENV=production`
- `APP_DEBUG=false`
- Cấu hình `APP_URL` đúng domain
- Cấu hình mail/queue/cache theo hạ tầng thực tế

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

`DatabaseSeeder` hiện đang gọi:
- tạo 1 user mặc định
- `CategorySeeder` (50 categories)
- `TagSeeder` (20 tags)

`PostSeeder` và `PostTagSeeder` có sẵn nhưng **chưa được gọi** trong `DatabaseSeeder`.

Chạy seed:

```bash
php artisan db:seed
```

Nếu muốn có dữ liệu bài viết mẫu, cần bổ sung gọi thêm seeder hoặc chạy riêng:

```bash
php artisan db:seed --class=PostSeeder
php artisan db:seed --class=PostTagSeeder
```

## Build & Deploy

### Build assets

```bash
npm run build
```

### Tối ưu cho production (Laravel)

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Triển khai production

Thông tin hạ tầng deploy cụ thể (server type, CI/CD pipeline, process manager, queue worker supervisor, Docker) **chưa có trong repository**, cần bổ sung thêm để hoàn thiện tài liệu deploy chính thức.

## Test Accounts / Sample Data

Tài khoản mặc định từ `DatabaseSeeder`:

- Email: `pmhieudev1309@gmail.com`
- Password: `password`

> Lưu ý bảo mật: chỉ dùng cho local/dev; cần thay đổi hoặc loại bỏ ở môi trường thật.

## Scripts trong `package.json`

- `npm run dev`: chạy Vite dev server
- `npm run build`: build assets production

## Scripts trong `composer.json`

- `composer run setup`: cài nhanh toàn bộ dependency + tạo `.env` + migrate + build assets
- `composer run dev`: chạy đồng thời app server, queue listener, vite
- `composer run test`: clear config và chạy test suite

## Notes

- File `README.md` trước đó có conflict marker từ Git merge, đã được thay bằng bản tài liệu hoàn chỉnh.
- Ứng dụng phụ thuộc queue database (`QUEUE_CONNECTION=database`), cần queue worker khi chạy các tác vụ nền.
- Tính năng upload ảnh yêu cầu chạy `php artisan storage:link`.
- Một số chi tiết triển khai production chưa có trong repo (CI/CD, Docker, web server config), nên phần deploy cần cập nhật thêm khi chốt môi trường vận hành.

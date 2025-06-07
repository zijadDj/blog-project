# Laravel Blog Platform

A simple blog platform built with Laravel, supporting user authentication, profile management, blog post creation, and admin user management.

# Installation

## 1. Clone the Repository
 
```bash
git clone https://github.com/zijadDj/blog-project.git
cd blog-project
```

## 2.Install PHP Dependencies
```bash
composer install
```

## 3.Copy .env File & Generate App Key

```bash
cp .env.example .env
php artisan key:generate
```

## 4.Configure Database in .env
```bash
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 5. Run Migrations
```bash
php artisan migrate
```

## 6.Seed the Database
```bash
php artisan db:seed
```

## 7. Create Storage Link
```bash
php artisan storage:link
```

## 8. Run development server
```bash
php artisan serve
```



# Laravel CRUD Application

This is a simple CRUD (Create, Read) application built using Laravel and Vue.js.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Installation

```bash
# Clone the repository
git clone https://github.com/ajay-stha/client-management.git

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Configure environment variables
cp .env.example .env
php artisan key:generate

# Run migrations and seeders
php artisan migrate --seed

# Start the development server
php artisan serve

# Start the npm server
npm run dev
```

## Dependency
This application uses Laravel Breeze as it is a minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation. 

Laravel Breeze offers several options for your view layer, including Blade templates, or Vue and React with Inertia. Feel free to learn more about [Laravel Breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze).
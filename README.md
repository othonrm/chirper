# Chirper

Chirper is a small Laravel app for posting short messages ("chirps").  
It includes a public feed and basic auth so logged-in users can create, edit, and delete their own chirps.

Check it out live at [https://chirper-main-1woi6z.laravel.cloud/](https://chirper-main-1woi6z.laravel.cloud/).

## Tech Stack

- [Laravel 12 (PHP 8.2+)](https://laravel.com)
- [Blade templates + Vite](https://laravel.com/docs/12.x/blade)
- [Tailwind CSS](https://tailwindcss.com/)
- SQLite database (default)

## Setup

1. Install backend dependencies:

```bash
composer install
```

2. Install frontend dependencies:

```bash
pnpm install
```

3. Create the environment file:

```bash
cp .env.example .env
```

4. Generate app key:

```bash
php artisan key:generate
```

5. Make sure SQLite is configured in `.env`:

```env
DB_CONNECTION=sqlite
```

6. Create the SQLite file (if it does not exist yet):

```bash
touch database/database.sqlite
```

7. Run initial migrations:

```bash
php artisan migrate
```

## Running The App

For local development with hot reload (Laravel server + Vite):

```bash
composer run dev
```

For no hot reload (build assets once, then serve):

```bash
pnpm run build
php artisan serve
```

## Useful Commands

```bash
php artisan db:seed --class=ChirpSeeder
```

Use this for seeding the database with some sample chirps for testing.

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


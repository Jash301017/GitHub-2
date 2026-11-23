# Star Media Group — Article Portal

A Laravel 13 article portal built for the PHP practical assessment. It uses SQLite, Eloquent relationships, factories/seeders, a JSON API, Blade, Bootstrap 5 and a title search.

## Requirements
- PHP 8.5+
- Composer 2.x
- Git
- PHP extensions required by Laravel, including PDO SQLite and SQLite3

## Local setup
1. Clone this repository:
   `git clone https://github.com/Jash301017/GitHub-2.git`
2. Enter the project and install dependencies:
   `cd GitHub-2 && composer install`
3. Create your environment file:
   `cp .env.example .env`
4. Generate the application key:
   `php artisan key:generate`
5. Create the SQLite database file:
   - macOS/Linux: `touch database/database.sqlite`
   - Windows PowerShell: `New-Item database/database.sqlite -ItemType File`
6. Run migrations and seed sample data:
   `php artisan migrate --seed`
7. Start the application:
   `php artisan serve`
8. Open http://127.0.0.1:8000

## Useful commands
- `php artisan test` — run automated tests
- `php artisan migrate:fresh --seed` — rebuild and seed the local database
- `php artisan route:list` — inspect registered routes

## Features
- Article list with category and publication date
- Case-insensitive title search (client-side, no page reload)
- Article detail page
- JSON endpoint at `GET /api/articles` with eager-loaded category data
- Article detail JSON endpoint at `GET /api/articles/{article}`
- Five categories and twenty seeded articles
- SQLite as the sole database connection

## Git workflow
The commit history is organized by setup, data layer, API, UI and documentation so the development steps are easy to review.

## Notes
This repository contains the application source and Laravel project configuration. Run the setup steps above on a machine with the required PHP and Composer versions before evaluating it. Do not commit `vendor/`, `node_modules/`, local environment secrets or the local SQLite database.

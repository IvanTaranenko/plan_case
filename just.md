

## Requirements
- PHP >= 8.1
- Composer
- Node.js and NPM

## Installation

```bash
git clone <repo>
cd sample-app
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed --class=PlanSeeder
php artisan db:seed --class=UserSeeder
npm install
npm run dev
php artisan serve

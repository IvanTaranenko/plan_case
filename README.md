# Plan Case

## Инструкция по запуску проекта

### Шаг 1. Клонирование репозитория


git clone https://github.com/IvanTaranenko/plan_case.git

cd plan_case
### Шаг 2. Установка зависимостей
Проект использует Composer и npm/yarn.

Установить PHP зависимости:

composer install
Установить JS зависимости:

npm install

### Шаг 3. Создание файла окружения
Скопируй файл .env.example в .env:

cp .env.example .env

### Шаг 4. Настройка файла .env
Отредактируй .env, указав параметры подключения к базе данных.

Пример для базы данных:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=plan_case
DB_USERNAME=root
DB_PASSWORD=secret

### Шаг 5. Генерация ключа приложения

php artisan key:generate

### Шаг 6. Запуск миграций и сидеров

php artisan migrate --seed

### Шаг 7. Компиляция ассетов

npm run dev

### Шаг 8. Запуск локального сервера

php artisan serve


http://localhost:8000

### Админ 
логин : superadmin@superadmin.com
пароль : superadminsuperadmin

### Юзер
логин : user@user.com
пароль : useruser


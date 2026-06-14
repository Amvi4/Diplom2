#!/bin/bash
set -e

cd /var/www/html

# Ждем PostgreSQL
echo "Waiting for PostgreSQL..."
until php artisan migrate:status >/dev/null 2>&1
do
  echo "Waiting for PostgreSQL..."
  sleep 5
done

php artisan migrate --force

# Очищаем и кешируем конфиг (теперь переменные окружения ДОСТУПНЫ!)
php artisan config:clear
php artisan config:cache

# Миграции
php artisan migrate --force

# Запуск
php artisan serve --host=0.0.0.0 --port=10000
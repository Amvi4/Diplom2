#!/bin/bash
set -e

cd /var/www/html

# Ждем PostgreSQL

php artisan migrate --force --no-interaction

# Очищаем и кешируем конфиг (теперь переменные окружения ДОСТУПНЫ!)
php artisan config:clear
# php artisan config:cache

# Миграции

# Запуск
php artisan serve --host=0.0.0.0 --port=10000
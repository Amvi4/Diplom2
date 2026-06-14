#!/bin/bash
set -e  # Останавливает скрипт при любой ошибке

# Ждем, пока база данных будет готова принять соединения
echo "Waiting for database to be ready..."
sleep 5

# Запускаем миграции. Флаг --force нужен для production окружения.
echo "Running migrations..."
php artisan migrate --force

# Запускаем само приложение
echo "Starting application..."
php artisan serve --host=0.0.0.0 --port=10000
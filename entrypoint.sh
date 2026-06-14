#!/bin/bash
set -e

echo "Current directory: $(pwd)"
echo "Listing files in current directory:"
ls -la

# ПЕРЕХОДИМ В РАБОЧУЮ ПАПКУ ПРОЕКТА
cd /var/www/html || exit 1

echo "Now in directory: $(pwd)"
echo "Checking for artisan file:"
ls -la artisan

# Ждем, пока база данных будет готова принять соединения
echo "Waiting for database to be ready..."
sleep 5

# Запускаем миграции
echo "Running migrations..."
php artisan migrate --force

# Запускаем само приложение
echo "Starting application..."
php artisan serve --host=0.0.0.0 --port=10000
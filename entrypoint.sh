#!/bin/bash
set -e

cd /var/www/html

echo "Waiting for database..."
sleep 5

echo "Running migrations..."
php artisan migrate --force

echo "Starting application on 0.0.0.0:${PORT:-10000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
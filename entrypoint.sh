#!/bin/bash
set -e

cd /var/www/html

echo "Waiting for database..."
sleep 5

echo "Running migrations..."
php artisan migrate --force

echo "Starting application..."
php artisan serve --host=0.0.0.0 --port=10000
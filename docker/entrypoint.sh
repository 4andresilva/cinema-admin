#!/bin/sh
set -e

echo "Running database migrations..."
php artisan migrate --force || true

echo "Caching Laravel config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting PHP-FPM..."
exec php-fpm

echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000

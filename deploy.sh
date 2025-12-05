#!/usr/bin/env bash
set -e

echo "=============================="
echo "   RUNNING LARAVEL MIGRATIONS "
echo "=============================="

# pastikan berada di folder project
cd /app

# install composer dependencies jika belum ada vendor
if [ ! -d "vendor" ]; then
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

php artisan migrate --force

echo "=============================="
echo "     MIGRATIONS DONE "
echo "=============================="

# start server
php -S 0.0.0.0:8000 -t public

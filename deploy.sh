#!/bin/bash

echo "=============================="
echo "        RAILWAY DEPLOY        "
echo "=============================="

composer install --no-dev --optimize-autoloader

echo "🔑 Generating key (safe)..."
php artisan key:generate --force

echo "🔗 Creating storage symlink..."
php artisan storage:link || true

echo "🧩 Running migrations..."
php artisan migrate --force

echo "=============================="
echo "        DEPLOY FINISHED       "
echo "=============================="

php artisan serve --host=0.0.0.0 --port=8000

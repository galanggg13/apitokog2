#!/usr/bin/env bash
set -e

echo "===================================="
echo " RUNNING LARAVEL MIGRATIONS "
echo "===================================="

php artisan migrate --force

echo "===================================="
echo " MIGRATIONS DONE "
echo "===================================="

php -S 0.0.0.0:8000 -t public

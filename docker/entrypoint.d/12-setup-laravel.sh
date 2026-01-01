#!/usr/bin/env bash
set -e

echo "Starting 12-setup-laravel.sh"

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[0;33m'

if cp .env.prod .env; then
    echo $GREEN ".env created from .env.prod successfully"
else
    echo $RED "Failed to create .env from .env.prod"
    exit 1
fi

php artisan optimize:clear
php artisan filament:optimize-clear
php artisan optimize
php artisan filament:optimize
php artisan storage:link

echo $YELLOW "Waiting for Pgsql to be ready at pgsql:5432..."
while ! nc -z "pgsql" "5432"; do
  sleep 1
done
echo $GREEN "Pgsql is ready!"

php artisan migrate --force

echo $GREEN "12-setup-laravel.sh executed successfully."

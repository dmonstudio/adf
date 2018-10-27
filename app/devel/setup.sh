#!/bin/sh

set -e

if [ ! -f .env ]; then
    echo "Generating env file"
    cp .env.example .env
    php artisan key:generate
fi

echo "Refreshing composer autoload"
composer dumpautoload

echo "Ensuring file permissions"
chown -R www-data:www-data storage/logs
chown -R www-data:www-data storage/views

mkdir -p public/media
chown -R www-data:www-data public/media

php artisan migrate --seed

exec "$@"

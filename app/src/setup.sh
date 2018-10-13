#!/bin/sh

if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
fi

chown -R www-data:www-data storage/logs
chown -R www-data:www-data storage/views

exec "$@"

#!/bin/sh

docker-compose up -d

docker-compose exec app mkdir -p /app/public/media
docker-compose exec app chown -R www-data:www-data /app/public/media

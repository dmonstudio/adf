#!/bin/sh

docker-compose up -d app
echo "Server started at http://localhost:3000"

docker-compose exec app sh

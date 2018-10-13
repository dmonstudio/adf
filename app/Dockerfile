FROM node:alpine AS static

WORKDIR /build

RUN mkdir /build/public

COPY src/resources /build/resources
COPY src/artisan /build/
COPY src/package.json /build/
COPY src/webpack.mix.js /build/

RUN npm i
RUN npm run prod

FROM sudomabider/php7-nginx

RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql

COPY nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=static /build/public/ /app/public/
COPY --chown=www-data:www-data src /app

RUN composer install --no-dev -o
RUN cp .env.prod .env

FROM sudomabider/php7-nginx

RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql

COPY setup.sh /setup.sh

ENTRYPOINT [ "/setup.sh" ]

CMD [ "supervisord", "--configuration", "/etc/supervisord.conf" ]

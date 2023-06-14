FROM php:8.2-fpm

ARG APP_ENV="development"

# Install OS Packages
RUN apt-get update -y && \
    apt-get install -y --no-install-recommends \
    # Webserver
    nginx \
    # zip
    zip unzip \
    # git
    git

COPY rootfs/ /

COPY --chown=www-data . .

RUN chmod -R 777 \
    bootstrap/cache \
    storage/logs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN if [ "$APP_ENV" = "development" ]; then \
    composer install --quiet; \
else \
    composer install --no-dev --quiet; \
fi

RUN mkdir -p /run/php && \
    chown -R www-data:www-data /run && \
    touch /run/php/php8.2-fpm.sock && \
    chmod 777 -R /run/php/php8.2-fpm.sock

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

RUN usermod -a -G root www-data

VOLUME ["/run"]
VOLUME ["/usr/src/app"]

WORKDIR /usr/src/app

EXPOSE 80

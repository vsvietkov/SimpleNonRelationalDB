FROM php:8.0-cli

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get install -y autoconf pkg-config libssl-dev && \
    pecl install mongodb && docker-php-ext-enable mongodb

ARG XDEBUG_INSTALL=0

RUN if [[ $XDEBUG_INSTALL -gt 0 ]] ; then \
        apk add --no-cache $PHPIZE_DEPS \
        && pecl install xdebug-3.0.1 \
        && docker-php-ext-enable xdebug \
        && echo "xdebug.mode=debug,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
        && export XDEBUG_SESSION=PHPSTORM \
    ;fi

WORKDIR /app

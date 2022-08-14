FROM php:8.0-cli

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get install -y autoconf pkg-config libssl-dev && \
    pecl install mongodb && docker-php-ext-enable mongodb

WORKDIR /app

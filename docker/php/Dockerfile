FROM php:8.2-cli

RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get install -y zip unzip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

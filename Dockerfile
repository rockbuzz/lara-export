FROM php:7.4-fpm-alpine

RUN apk add --no-cache $PHPIZE_DEPS bash

RUN pecl install pcov && docker-php-ext-enable pcov

RUN set -e; \
         apk add --no-cache \
                coreutils \
                freetype-dev \
                libjpeg-turbo-dev \
                libjpeg-turbo \
                libpng-dev \
                libzip-dev \
                jpeg-dev \
                zlib-dev \
&& docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

ENTRYPOINT ["php-fpm"]
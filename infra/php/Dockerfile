FROM php:8.1-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

# Viteのサーバーにローカルからアクセスするために開ける
EXPOSE 5173

# Composer install
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# install Node.js
COPY --from=node:18.14.2 /usr/local/bin /usr/local/bin
COPY --from=node:18.14.2 /usr/local/lib /usr/local/lib

RUN apt-get update && \
  apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev libpng-dev libjpeg62-turbo-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-configure gd --with-jpeg && \
  docker-php-ext-install intl pdo_mysql zip bcmath -j$(nproc) gd

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /data

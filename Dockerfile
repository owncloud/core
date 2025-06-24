FROM php:7.4-apache

RUN apt-get update \
 && apt-get upgrade -y --no-install-recommends \
 && rm -rf /var/lib/apt/lists/*

RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      git unzip zip curl build-essential mariadb-client \
      libpng-dev libjpeg-dev libfreetype6-dev \
      libzip-dev libxml2-dev libicu-dev \
 && docker-php-ext-install gd mysqli pdo_mysql intl zip xml exif \
 && a2enmod rewrite headers env dir mime \
 && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
 && apt-get update \
 && apt-get install -y --no-install-recommends nodejs \
 && npm install -g yarn \
 && rm -rf /var/lib/apt/lists/*

ENV SERVER_NAME=localhost
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_IGNORE_PLATFORM_REQS=1

WORKDIR /var/www/html

RUN git config --global --add safe.directory /var/www/html

COPY . .

RUN make install-composer-release-deps install-nodejs-deps

RUN printf "ServerName ${SERVER_NAME}\n" > /etc/apache2/conf-available/servername.conf && a2enconf servername

RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
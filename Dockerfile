FROM php:8.4-apache

# Install dependencies & Node.js (Node 18)
RUN apt-get update \
    && apt-get install -y \
    openssl locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev zip unzip libpq-dev wget \
    apt-transport-https lsb-release ca-certificates curl
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    && mv composer.phar /usr/local/bin/composer

# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony*/bin/symfony /usr/local/bin

# Install PHP extensions
RUN docker-php-ext-configure intl \
    && docker-php-ext-install \
        pdo pdo_mysql pdo_pgsql opcache intl zip calendar dom mbstring gd xsl

RUN apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg

RUN git config --global --add safe.directory /var/www/html

RUN a2enmod rewrite ssl

COPY apache/default.conf /etc/apache2/sites-available/000-default.conf
COPY apache/ssl /etc/apache2/ssl
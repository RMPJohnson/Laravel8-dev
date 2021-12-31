# Installing PHP 8 with apache2
FROM php:8.0-apache
# Working directory /var/www/html
WORKDIR /var/www/html
# System Installation
RUN apt-get update && apt-get install -y curl \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  zip \
  unzip \
  node.js \
  npm \
  libpng-dev \
  zlib1g-dev \
  libxml2-dev \
  libzip-dev \
  libonig-dev \
  && docker-php-ext-configure gd \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install pdo_mysql \
  && docker-php-ext-install mysqli \
  && docker-php-ext-install zip \
  && docker-php-source delete \
# Create virtual host
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# change permission and add mode rewrite.
RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite
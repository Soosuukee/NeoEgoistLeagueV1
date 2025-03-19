# PHP 8.3 with Apache
FROM php:8.3-apache

# Install required dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev unzip git curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy your application files to the Apache container
COPY src/public /var/www/html
COPY src/app /var/www/app
COPY ./src/uploads /var/www/html/uploads

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Verify Composer installation
RUN composer --version

# Expose the port for Apache (80 by default)
EXPOSE 80

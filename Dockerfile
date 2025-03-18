# Utilisation de l'image PHP Apache Buster
FROM php:8.4-apache-buster

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli

# Copier le code source
COPY src/public /var/www/html
COPY src/app /var/www/html/app

# Activer mod_rewrite
RUN a2enmod rewrite

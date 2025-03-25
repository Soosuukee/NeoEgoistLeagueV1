FROM php:8.2-cli

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définition du répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers sources dans le conteneur
COPY src/ .

# Installer les dépendances
RUN composer install --no-dev --prefer-dist

CMD ["php", "-S", "0.0.0.0:8000"]

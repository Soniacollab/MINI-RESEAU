FROM php:8.3-fpm

# Installer les extensions PHP nécessaires pour Symfony
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libonig-dev libzip-dev zip curl \
    && docker-php-ext-install intl pdo_mysql mbstring zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Image de base : PHP FPM
FROM php:8.3-fpm

# -----------------------
# Installer dépendances système et extensions PHP nécessaires à Symfony
# -----------------------
RUN apt-get clean && rm -rf /var/lib/apt/lists/* \
    && apt-get update --allow-releaseinfo-change -y \
    && apt-get install -y --no-install-recommends \
        git unzip libicu-dev libonig-dev libzip-dev zip curl default-mysql-client \
    && docker-php-ext-install intl pdo_mysql mbstring zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer (depuis l'image officielle composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

## Copier un script qui attend que la BDD soit prête, puis lance php-fpm
#COPY wait-for-db.sh /usr/local/bin/wait-for-db.sh
#RUN chmod +x /usr/local/bin/wait-for-db.sh

# Définir le répertoire de travail
WORKDIR /var/www/html

# Utiliser le script d'attente comme entrypoint : il attend la BDD, puis exécute php-fpm
CMD ["php-fpm"]

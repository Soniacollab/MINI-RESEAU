# Image de base : PHP FPM
FROM php:8.3-fpm

# Définir le fuseau horaire
ENV TZ=Europe/Paris

# Installation des dépendances + configuration du fuseau horaire
RUN apt-get update --allow-releaseinfo-change -y \
    && apt-get install -y --no-install-recommends \
        git unzip libicu-dev libonig-dev libzip-dev zip curl default-mysql-client tzdata \
    && ln -fs /usr/share/zoneinfo/$TZ /etc/localtime \
    && dpkg-reconfigure -f noninteractive tzdata \
    && docker-php-ext-install intl pdo_mysql mbstring zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && echo "date.timezone=$TZ" > /usr/local/etc/php/conf.d/timezone.ini

# Installer Composer (depuis l'image officielle composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# Définir le répertoire de travail
WORKDIR /var/www/html

# Utiliser le script d'attente comme entrypoint : il attend la BDD, puis exécute php-fpm
CMD ["php-fpm"]

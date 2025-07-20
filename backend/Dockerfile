FROM php:8.2-cli

WORKDIR /var/www/html

# System-Abhängigkeiten installieren
RUN apt-get update && apt-get install -y \
    unzip zip curl git libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# PHP-Extensions installieren
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer installieren
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Quellcode kopieren
COPY . .

# Composer-Abhängigkeiten installieren
RUN composer install

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
 && docker-php-ext-install \
    pdo_pgsql \
    pgsql \
    mbstring \
    bcmath \
    exif \
    pcntl \
    gd \
    zip \
 && a2enmod rewrite headers

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install \
    --no-dev \
    --optimize-autoloader

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
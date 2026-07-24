FROM php:8.3-apache

# Install system dependencies plus PostgreSQL support
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        libpq-dev \
        unzip \
        git \
        curl \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy Composer files first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-progress --prefer-dist --optimize-autoloader --no-scripts

# Copy the rest of the app
COPY . .

# Install app dependencies and set writable permissions
RUN composer dump-autoload --optimize \
    && chmod -R 775 storage bootstrap/cache \
    && chmod -R 775 public \
    && rm -rf node_modules vendor

# Apache config for Laravel public directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
    && sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]

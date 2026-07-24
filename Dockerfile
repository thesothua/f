FROM php:8.3-apache

# Install system dependencies and PostgreSQL support
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

# Explicitly disable mpm_event and mpm_worker, and enable mpm_prefork to prevent "More than one MPM loaded" error
RUN a2dismod mpm_event mpm_worker || true \
 && a2enmod mpm_prefork

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project files
COPY . .

# Install dependencies (production-only)
RUN composer install \
    --no-dev \
    --optimize-autoloader

# Set Apache Document Root to Laravel public/
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

# Give write permissions to storage/cache and make entrypoint executable
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod +x docker-entrypoint.sh

EXPOSE 80

CMD ["./docker-entrypoint.sh"]

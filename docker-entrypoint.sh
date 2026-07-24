#!/bin/sh
set -e

# If $PORT is defined (injected by Railway), update Apache to listen on that port
if [ -n "$PORT" ]; then
    echo "Updating Apache configurations to listen on port $PORT..."
    sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf
    sed -i "s/<VirtualHost \*:80>/<VirtualHost *:$PORT>/g" /etc/apache2/sites-available/*.conf
fi

# Run caching optimizations for production
echo "Running Laravel optimizations..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "Starting Apache server..."
exec apache2-foreground

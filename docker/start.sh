#!/bin/sh
set -e

# Railway injects PORT at runtime; default to 8080 if not set (local testing)
PORT="${PORT:-8080}"

# Inject the port into the nginx config
sed -i "s/PORT_PLACEHOLDER/${PORT}/" /etc/nginx/sites-available/default

# Cache Laravel config/routes/views for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
php artisan migrate --force

# Start php-fpm in the background
php-fpm -D

# Start nginx in the foreground (keeps container alive)
nginx -g "daemon off;"

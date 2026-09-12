#!/bin/sh
set -e

# Railway injects PORT at runtime; default to 8080 if not set (local testing)
PORT="${PORT:-8080}"

# Inject the port into the nginx config
sed -i "s/PORT_PLACEHOLDER/${PORT}/" /etc/nginx/sites-available/default

# Sanity check: print the actual listen line so it's visible in logs
echo "Nginx will listen on:"
grep "listen" /etc/nginx/sites-available/default

# Run database migrations FIRST: something in your app queries the DB on
# boot (the 'units' table in your earlier error), so the schema must exist
# before package:discover or config:cache run
php artisan migrate --force

# Discover packages now that real env vars (DB connection etc.) exist
# (this was skipped at build time via --no-scripts)
php artisan package:discover --ansi

# Cache Laravel config/routes/views for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start php-fpm in the background
php-fpm -D

# Validate nginx config before starting — fails loudly instead of silently
nginx -t

# Start nginx in the foreground (keeps container alive)
nginx -g "daemon off;"

FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libcurl4-openssl-dev zip unzip nginx \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd curl fileinfo

# Send nginx logs to stdout/stderr so they show up in Railway's log viewer
# (apt's nginx package writes to files by default, unlike the official nginx image)
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application code
COPY . .

# Install PHP dependencies (skip scripts: package:discover needs a real DB
# connection/env, which only exists at runtime, not build time)
RUN composer install --optimize-autoloader --no-dev --no-interaction --no-scripts

# Copy nginx config
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Copy startup script
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 8080

CMD ["/usr/local/bin/start.sh"]

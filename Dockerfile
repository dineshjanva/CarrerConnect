# PHP with Apache
FROM php:8.2-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Install required extensions
RUN apt-get update && apt-get install -y \
    git unzip zip libpng-dev libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli zip gd

# Copy project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Install composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose apache port
EXPOSE 80

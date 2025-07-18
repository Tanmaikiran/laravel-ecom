# Use official PHP base image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy all Laravel files
COPY . .

# ✅ Manually create a .env file to bypass copy issue
RUN echo "APP_NAME=Laravel\nAPP_ENV=local\nAPP_KEY=\nAPP_DEBUG=true\nAPP_URL=http://localhost" > .env

# Install Laravel dependencies
RUN composer install

# Generate Laravel application key
RUN php artisan key:generate

# Expose port for Laravel
EXPOSE 80

# Run Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

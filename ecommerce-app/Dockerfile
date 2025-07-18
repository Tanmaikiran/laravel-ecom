# Use official PHP base image
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files (including .env.example)
COPY . .

# 👇 Prepare .env BEFORE key:generate
RUN cp .env.example .env

# Install PHP dependencies
RUN composer install

# Generate Laravel app key
RUN php artisan key:generate

# Expose Laravel port
EXPOSE 80

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

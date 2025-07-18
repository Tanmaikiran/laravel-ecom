# Use the official PHP image
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application source code
COPY . .

# 👇 Fix: Ensure .env is created before key generation
RUN cp .env.example .env

# Install PHP dependencies
RUN composer install

# Generate Laravel app key
RUN php artisan key:generate

# Expose port 80
EXPOSE 80

# Start Laravel development server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

# Use the official PHP image with required extensions
FROM php:8.2-fpm

# Install system dependencies
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

# Copy application files
COPY . .

# Copy .env.example to .env, install dependencies, and generate app key
RUN cp .env.example .env && \
    composer install && \
    php artisan key:generate

# Expose port 80
EXPOSE 80

# Run Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

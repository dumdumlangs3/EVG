# Start with the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql mbstring zip exif pcntl bcmath

# Install Composer (PHP package manager)
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy all project files to the container
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set Apache DocumentRoot to the public directory
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 (default for Apache)
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]

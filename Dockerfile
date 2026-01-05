FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip soap

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# set the document root to public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set working directory
WORKDIR /var/www/html

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Copy composer.lock and composer.json
COPY composer.json composer.lock ./

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install project dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Copy package files and install npm dependencies
COPY package.json package-lock.json ./
RUN npm install

# Copy application files
COPY . .

# Build assets
RUN npm run build


# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache to listen on the PORT environment variable (Cloud Run requirement)
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Optimization commands should be run at runtime or carefully managed
# RUN php artisan config:cache
# RUN php artisan route:cache
# RUN php artisan view:cache


# Expose port (documented, primarily for local testing, Cloud Run ignores EXPOSE)
EXPOSE 8080

# Command to run Apache
CMD ["apache2-foreground"]

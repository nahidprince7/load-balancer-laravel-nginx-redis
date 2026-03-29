FROM php:8.3-fpm-alpine

# Install system dependencies + Node.js/NPM
RUN apk add --no-cache nginx wget libpng-dev libzip-dev zip unzip nodejs npm

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql gd zip

# Install & Enable Redis for shared sessions
RUN apk add --no-cache pcre-dev $PHPIZE_DEPS \
    && pecl install redis \
    && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Nginx node config
COPY ./php/vhost.conf /etc/nginx/http.d/default.conf

WORKDIR /var/www/html

# Start PHP-FPM and Nginx
CMD php-fpm -D && nginx -g 'daemon off;'

# syntax=docker/dockerfile:1

FROM composer:2.7 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist

FROM node:18 AS node_modules

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

FROM php:8.2-fpm

WORKDIR /var/www

# Cài các extension cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài Composer
COPY --from=vendor /usr/bin/composer /usr/bin/composer

# Copy source code
COPY . .

# Copy vendor và node_modules
COPY --from=vendor /app/vendor /var/www/vendor
COPY --from=node_modules /app/node_modules /var/www/node_modules

# Build frontend
RUN npm run build

# Tạo key ứng dụng nếu chưa có
RUN php artisan key:generate --force || true

# Phân quyền
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
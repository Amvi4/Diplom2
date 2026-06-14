FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpng-dev libonig-dev libxml2-dev libzip-dev libpq-dev \
    nodejs npm \
    && docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-dev \
    --no-scripts

COPY . .

RUN npm install && npm run build

RUN php artisan package:discover || true
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan storage:link || true
RUN php artisan migrate --force

RUN chmod -R 775 storage bootstrap/cache
RUN psql --version || true
RUN php -i | grep -i "PostgreSQL" || true

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
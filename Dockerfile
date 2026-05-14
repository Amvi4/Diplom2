FROM php:8.2-fpm

# -----------------------------
# System dependencies
# -----------------------------
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    nodejs \
    npm \
    && docker-php-ext-install \
        pdo_pgsql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# -----------------------------
# Composer
# -----------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# Fix Composer env
ENV COMPOSER_HOME=/tmp
ENV COMPOSER_MEMORY_LIMIT=-1

ENV PATH="/usr/bin:${PATH}"

WORKDIR /var/www/html

# -----------------------------
# Install PHP dependencies
# -----------------------------
COPY composer.json composer.lock ./

RUN composer install \
    --no-interaction \
    --prefer-dist \
    --no-dev \
    --optimize-autoloader \
    --no-progress \
    --no-scripts

# -----------------------------
# Copy project files
# -----------------------------
COPY . .

# -----------------------------
# Frontend build
# -----------------------------
RUN npm install && npm run build

# -----------------------------
# Permissions
# -----------------------------
RUN chmod -R 775 storage bootstrap/cache

# -----------------------------
# Port (Render will override anyway)
# -----------------------------
EXPOSE 10000

# -----------------------------
# Start Laravel
# -----------------------------
CMD php artisan serve --host=0.0.0.0 --port=10000
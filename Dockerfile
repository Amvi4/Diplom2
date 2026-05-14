# Используем официальный образ с PHP-FPM в качестве основы
FROM php:8.2-fpm

# Устанавливаем системные зависимости, Node.js и zip (Node нужен для сборки фронта)
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем Composer глобально (менеджер зависимостей PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию внутри контейнера
WORKDIR /var/www/html

# Копируем файлы composer перед установкой зависимостей (это оптимизирует пересборку образа)
COPY composer.json composer.lock ./

# Устанавливаем PHP-зависимости
RUN composer install --no-interaction --no-scripts --no-autoloader --prefer-dist

# Копируем остальной код приложения в контейнер
COPY . .

# Генерируем автозагрузчик Composer
RUN composer dump-autoload --optimize

# Собираем фронтенд-активы (Vue + Vite)
RUN npm install && npm run build

# Устанавливаем правильные права на папки storage и bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache
# Stage 1 - Build Frontend (Vite)
FROM node:18 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2 - Backend (Laravel + PHP + Composer)
FROM php:8.3-fpm AS backend

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    zip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip intl

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copiar os arquivos da aplicação
COPY . .

# Copiar build do frontend
COPY --from=frontend /app/public/build ./public/build

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader

# Otimizar Laravel
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Configurar entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["entrypoint.sh"]

EXPOSE 8000
CMD ["php-fpm"]

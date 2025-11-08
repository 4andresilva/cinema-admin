# Stage 1 - Build Frontend (Vite)
FROM node:18 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Argumentos padrão
ARG user=andre
ARG uid=1000

# Stage 2 - Backend (Laravel + PHP + Composer)
FROM php:8.3-cli AS backend

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

# Criar usuário
RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
    mkdir -p /home/$user/.composer && chown -R $user:$user /home/$user
    
WORKDIR /var/www

# Copiar código e build
COPY . .
COPY --from=frontend /app/public/build ./public/build

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Limpar e otimizar caches
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Rodar migrations e servir aplicação
EXPOSE 10000
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000

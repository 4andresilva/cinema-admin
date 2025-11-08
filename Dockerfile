FROM php:8.3-fpm

# Argumentos padrão
ARG user=andre
ARG uid=1000

# Dependências do sistema
RUN apt-get update && apt-get install -y \
    git curl nodejs npm \
    libpng-dev libonig-dev libxml2-dev libzip-dev libpq-dev libicu-dev \
    zip unzip \
    && rm -rf /var/lib/apt/lists/*

# Extensões PHP
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd intl zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário
RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
    mkdir -p /home/$user/.composer && chown -R $user:$user /home/$user

# Diretório de trabalho
WORKDIR /var/www

# Copiar aplicação existente
COPY . .

# Instalar dependências (sem sobrescrever nada existente)
RUN composer install --no-dev --optimize-autoloader && \
    npm install && npm run build && \
    php artisan config:cache && php artisan route:cache

# Permissões corretas
RUN chown -R www-data:www-data storage bootstrap/cache

CMD php artisan migrate --force

# Porta de exposição
EXPOSE 8000

# Comando padrão (sem nginx, ideal pra testar)
CMD php artisan serve --host=0.0.0.0 --port=8000

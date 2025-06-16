FROM php:8.3-fpm

# Instalar extensiones y dependencias del sistema
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    pkg-config

# Instalar mongodb versión 1.21.1 (la compatible con tu composer.lock)
RUN pecl uninstall mongodb || true && \
    pecl install mongodb-1.21.1 && \
    docker-php-ext-enable mongodb

# Instalar extensiones PHP
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    mbstring \
    exif \
    pcntl \
    gd \
    intl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Crear carpeta de la app
WORKDIR /var/www

# Copiar el contenido de la app Laravel
COPY . .

# Instalar dependencias PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Dar permisos al directorio de almacenamiento
RUN chmod -R 755 storage bootstrap/cache

# Exponer el puerto
EXPOSE 8000

# Iniciar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

FROM php:8.1-fpm-alpine

# Dependencias del sistema
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    icu-dev \
    oniguruma-dev \
    libzip-dev 

# Extensiones PHP necesarias
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    intl \
    zip \
    opcache


# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Usuario no root (seguridad)
RUN addgroup -g 1000 app || true \
  && adduser -G app -g app -s /bin/sh -D app || true
USER app

WORKDIR /var/www/html
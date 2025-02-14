FROM php:8.3-fpm-alpine3.21

# Instala pacotes necessários
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    git \
    unzip \
    bash \
    shadow \
    postgresql-dev \
    libpq \
    tzdata

# Instala extensões PHP para Laravel, PostgreSQL e Redis
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Instala o Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o fuso horário
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Configura o diretório de trabalho
WORKDIR /var/www/html
COPY . .

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expõe a porta do PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]

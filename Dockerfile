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
    tzdata \
    autoconf \
    g++ \
    make \
    libtool \
    openssl-dev

# Instala extensões PHP para Laravel, PostgreSQL e Redis
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Instalar a extensão MongoDB via PECL
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Define o fuso horário
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Cria novo grupo e adiciona novo usuario
RUN addgroup -g 1000 laravel && adduser -D -u 1000 -G laravel laravel

USER laravel

# Instala o Composer globalmente
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# Configura o diretório de trabalho
WORKDIR /var/www/html
COPY . .

# Expõe a porta do PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]

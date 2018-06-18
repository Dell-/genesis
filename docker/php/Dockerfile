FROM php:7.1-apache

#Tools
RUN apt-get update && apt-get install -y \
    libtool \
    automake \
    unzip \
    vim \
    apt-utils \
    git \
    curl \
    g++ \
    wget

#Develop
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libicu-dev \
    libpq-dev \
    libmemcached-dev \
    libmcrypt-dev \
    libfreetype6 \
    libjpeg62-turbo \
    libjpeg62-turbo-dev \
    libsqlite3-dev \
    libjpeg-dev \
    libmcrypt4 \
    libpng++-dev \
    libgd-dev \
    libgmp-dev \
    libcurl4-openssl-dev \
    libxslt-dev

RUN docker-php-ext-install \
    zip \
    xsl \
    soap \
    simplexml \
    pgsql \
    pdo \
    pdo_sqlite \
    pdo_pgsql \
    pdo_mysql \
    pcntl \
    opcache \
    mysqli \
    mbstring \
    json \
    intl \
    gmp \
    gd \
    curl \
    ctype \
    bcmath \
    calendar

#For GD ext
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
        && docker-php-ext-install -j$(nproc) gd

RUN a2enmod rewrite

#PECL
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN curl -L https://getcomposer.org/download/1.5.2/composer.phar -o /usr/local/bin/composer \
    && chmod a+rx /usr/local/bin/composer

RUN composer global require "fxp/composer-asset-plugin:1.3.1"

ENTRYPOINT ["/entrypoint.sh"]

CMD ["apache2-foreground"]

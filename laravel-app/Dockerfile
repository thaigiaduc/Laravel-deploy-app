FROM php:8.2-fpm
 
WORKDIR /var/www/html
 
COPY . .

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmemcached-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    librdkafka-dev \
    libpq-dev \
    openssh-server \
    zip \
    unzip \
    supervisor \
    sqlite3  \
    nano \
    cron

#install redis
RUN pecl install redis \
    && docker-php-ext-enable redis

# install mysql
RUN docker-php-ext-install pdo pdo_mysql

RUN ln -sf /dev/stdout /var/log/php-fpm.log && ln -sf /dev/stderr /var/log/php-fpm.log

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# ADD ./php.ini $PHP_INI_DIR/conf.d/
ADD ./supervisor/supervisord.conf /etc/supervisor/supervisord.conf

USER root:www-data

EXPOSE 9000

ENTRYPOINT ["sh", "entry.sh"]
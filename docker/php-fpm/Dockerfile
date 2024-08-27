FROM php:8.3-fpm

WORKDIR /app/sarah-api
 
# Additional tools
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
    curl \
    openssl \
    vim

# Common php-ext and requirements
RUN apt-get install -y --no-install-recommends libzip-dev libpq-dev libz-dev zip unzip \
 && docker-php-ext-install pcntl \
 && docker-php-ext-install session \
 && docker-php-ext-install phar \
 && docker-php-ext-install iconv \
 && docker-php-ext-install pdo

#####################################
# COMPRESSION
#####################################
ARG INSTALL_COMPRESSION=false
RUN if [ ${INSTALL_COMPRESSION} = true ]; then \
    apt-get install -y --no-install-recommends libbz2-dev zlib1g-dev \
 && docker-php-ext-install zip \
    bz2 \
;fi

#####################################
# BCMATH
#####################################
ARG INSTALL_BCMATH=false
RUN if [ ${INSTALL_BCMATH} = true ]; then \
    docker-php-ext-install bcmath \
;fi

#####################################
# PDO_PGSQL
#####################################
ARG PHP_FPM_INSTALL_PDO_PGSQL=false
RUN if [ ${PHP_FPM_INSTALL_PDO_PGSQL} = true ]; then \
    docker-php-ext-install pdo_pgsql \
;fi

#####################################
# Opcache
#####################################
ARG INSTALL_OPCACHE=false
RUN if [ ${INSTALL_OPCACHE} = true ]; then \
    docker-php-ext-install opcache \
;fi
# Copy opcache configration
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini

#####################################
# XDEBUG
#####################################
ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    pecl install xdebug \
    docker-php-ext-enable xdebug \
;fi
# Copy xdebug configration
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

#####################################
# COMPOSER
#####################################
ARG INSTALL_COMPOSER=false
RUN if [ ${INSTALL_COMPOSER} = true ]; then \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
;fi

# Clear package lists
RUN rm -rf /var/lib/apt/lists/*

# Permissions
RUN chown -R root:www-data /app
RUN chmod u+rwx,g+rx,o+rx /app
RUN find /var/www/html -type d -exec chmod u+rwx,g+rx,o+rx {} +
RUN find /var/www/html -type f -exec chmod u+rw,g+rw,o+r {} +

CMD ["php-fpm"]

EXPOSE 9000
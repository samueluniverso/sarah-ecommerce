FROM php:8.3-fpm
 
# Additional tools
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
    curl \
    openssl \
    vim

# Common php-ext and requirements
RUN apt-get install -y --no-install-recommends libpq-dev libz-dev \
 && docker-php-ext-install pcntl \
 && docker-php-ext-install session \
 && docker-php-ext-install phar \
 && docker-php-ext-install iconv \
 && docker-php-ext-install pdo

#####################################
# Opcache:
#####################################

ARG INSTALL_OPCACHE=false
RUN if [ ${INSTALL_OPCACHE} = true ]; then \
    docker-php-ext-install opcache \
;fi
# Copy opcache configration
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini

#####################################
# xdebug:
#####################################

ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    # Install the xdebug
    pecl install xdebug \
    docker-php-ext-enable xdebug \
;fi
# Copy opcache configration
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini


# Clear package lists
RUN rm -rf /var/lib/apt/lists/*

# Permissions
RUN mkdir /app
RUN chown -R root:www-data /app
RUN chmod u+rwx,g+rx,o+rx /app
RUN find /var/www/html -type d -exec chmod u+rwx,g+rx,o+rx {} +
RUN find /var/www/html -type f -exec chmod u+rw,g+rw,o+r {} +

CMD ["php-fpm"]

EXPOSE 9000
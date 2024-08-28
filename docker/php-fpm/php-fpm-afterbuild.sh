#!/bin/bash

chown -R www-data:www-data /app
chmod 777 -R /app/sarah-api

cd /app/sarah-api

composer install

/usr/local/sbin/php-fpm -F -R

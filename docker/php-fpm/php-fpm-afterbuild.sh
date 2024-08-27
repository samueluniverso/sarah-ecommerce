#!/bin/bash

cd /app/sarah-api

composer install

/usr/local/sbin/php-fpm -F -R

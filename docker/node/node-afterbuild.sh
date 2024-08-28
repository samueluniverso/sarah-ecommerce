#!/bin/bash

chown -R www-data:www-data /app
chmod 777 -R /app/sarah-app

cd /app/sarah-app

npm install
npm run build
npm run dev

# Sarah-Ecommerce

Guia rápido de como configurar o projeto Sarah-Ecommerce passo-a-passo.

# Overview

## Docker

    docker compose build 	# compilar
    docker compose up | watch	# subir
	docker compose stop	# parar
	docker compose down 	# excluir

#### Containers:
	**nginx:** page-server
	**php-fpm:** backend
	**node:** frontend
	**postgres:** database
	
## Laravel 11
  O volume do projeto Laravel fica na pasta **./backend**

## SvelteKit v2
  O volume do projeto SvelteKit ficam na pasta **./frontend**
O SvelteKit está instalado no container **node**, escutando na porta **3001:3000**

## Nginx 1.26.2
**Nginx** é o servidor de páginas, e está escutando na porta **8083:8080**
Ele dependo do **PHP-FPM** para processar os arquivos **.php**

## PHP-FPM 8.3
Ele está configurado para escutar apenas a porta interna **9000**, processando scripts PHP para o Nginx

## Postgres 16.4
Banco de dados da aplicação
Por padrão os dados do Postgres estão no diretório **./docker/var/data**

# Setup
Instruções de como fazer o *boostraping* da aplicação

## Laravel
	cd ./backend
    composer create-project laravel/laravel sarah-api
    cp .env.example .env
	# edit '.env'
		DB_CONNECTION=pgsql
		DB_HOST=postgres
		DB_PORT=5432
		DB_DATABASE=sarah-db
		DB_USERNAME=admin
		DB_PASSWORD=admin

#### KEY
	php artisan key:generate

#### API
	php artisan install:api

#### Migrate
	php artisan migrate:fresh

#### Seed
	php artisan migrate:fresh --seed

## SvelteKit

    cd ./frontend
    npm create svelte@latest sarah-app
    cd sarah-app
	# edit 'package.json'
		@sveltejs/adapter-auto
		# change to
		@sveltejs/adapter-node
	# edit 'svelte.config.js'
		import adapter from '@sveltejs/adapter-auto';
		# change to
		import adapter from '@sveltejs/adapter-node';
	npm install
	npm run build
	# run prod
	node build
 	# run dev
  	npm run dev

## Postgres
Para acessar banco na máquina local
	**Base:** sarah-db
	**Usuário:** admin
	**Senha:** admin
	**Porta:** 5003
	
    psql -U admin -h localhost -d sarah-db -p 5003

# TODO

## 1. Requisites

- Docker (the one and only)

## 2. Installation

- cp .env.example .env
- docker-compose build
- docker-compose up -d
- docker-compose exec php-fpm bash
  - composer install
  - php artisan key:generate
  - touch database/database.sqlite
  - php artisan migrate


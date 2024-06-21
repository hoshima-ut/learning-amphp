# syntax=docker/dockerfile:1

FROM php:8.3.8-alpine

WORKDIR /app

# composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer
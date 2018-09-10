FROM php:7.1.21-fpm-alpine3.8

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql

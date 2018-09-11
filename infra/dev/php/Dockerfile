FROM php:7.2.9-fpm-alpine3.8

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql

ADD php-fpm.conf /usr/local/etc/php-fpm.d/www.conf

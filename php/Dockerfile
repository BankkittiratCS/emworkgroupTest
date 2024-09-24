FROM php:8.0-apache
RUN docker-php-ext-install pdo pdo_mysql
COPY php.ini /usr/local/etc/php/php.ini

RUN mkdir /var/www/html/uploads
RUN chown -R www-data:www-data /var/www/html/uploads

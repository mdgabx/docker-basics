FROM php:8.1-fpm

RUN docker-php-ext-install pdo pdo_mysql

COPY crontab /etc/crontabs/root
RUN mkdir /var/log/crontab

CMD ["crond", "-f"]
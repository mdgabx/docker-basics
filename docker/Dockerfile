FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
	git \
	curl \
	zip \
	vim \
	unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install pdo mysql
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www
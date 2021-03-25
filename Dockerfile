FROM php:5.6-apache

RUN apt-get update
RUN apt-get install -y git zip

RUN apt-get install -y libpng-dev libjpeg-dev
RUN apt-get install -y mysql-client
RUN docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
  && docker-php-ext-install gd

RUN docker-php-ext-install mbstring
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install opcache

RUN apt-get install -y libssl-dev openssl
# RUN docker-php-ext-install phar

RUN apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN a2enmod rewrite
RUN a2enmod headers
RUN apache2ctl -k graceful
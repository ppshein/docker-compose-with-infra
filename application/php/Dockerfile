FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y autoconf pkg-config libssl-dev
RUN pecl install mongodb \
  && docker-php-ext-enable mongodb

RUN echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini

# Install Xdebug
RUN yes | pecl install xdebug \
  && echo "zend_extension=$(find $(php-config --extension-dir) -name xdebug.so)" \
  > /usr/local/etc/php/conf.d/xdebug.ini
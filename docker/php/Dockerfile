FROM php:7.3-fpm

RUN apt-get update \
  && apt-get install -y libzip-dev mariadb-client \
  gcc \
  make \
  libpng-dev \
  libmcrypt-dev \
  libjpeg-dev \
  libfreetype6-dev \
  && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install zip pdo_mysql

# nodejs install
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

#Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www

# 数分固まる場合あり
# RUN composer global require "consolidation/cgr"
RUN composer global require "laravel/installer"
RUN PATH="$(composer config -g home)/vendor/bin:$PATH"
# RUN cgr --stability RC "phpunit/phpunit:*"
# RUN cgr --stability RC "spatie/phpunit-watcher"
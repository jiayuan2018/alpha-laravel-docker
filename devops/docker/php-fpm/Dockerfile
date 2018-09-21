FROM php:7.2-fpm

COPY ./sources.list /etc/apt/sources.list



# Extensions: ctype, dom, fileinfo, ftp, hash, iconv, json, pdo, pdo_sqlite, session,
# tokenizer, simplexml, xml, xmlreader, xmlwriter and phar are bundled and compiled into
# PHP by default. If missing, install them directly by `docker-php-ext-install extension_name`


# Notice:
# 1. Mcrypt was DEPRECATED in PHP 7.1.0, and REMOVED in PHP 7.2.0.
# 2. opcache requires PHP version >= 7.0.0.
# 3. soap requires libxml2-dev.
# 4. xml, xmlrpc, wddx require libxml2-dev and libxslt-dev.
# 5. Line `&& :\` is just for better reading and do nothing.
RUN apt-get update  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && :\
    && apt-get install -y libicu-dev \
    && docker-php-ext-install intl \
    && :\
    && apt-get install -y libxml2-dev \
    && apt-get install -y libxslt-dev \
    && docker-php-ext-install soap \
    && docker-php-ext-install xsl \
    && docker-php-ext-install xmlrpc \
    && docker-php-ext-install wddx \
    && :\
    && apt-get install -y libbz2-dev \
    && docker-php-ext-install bz2 \
    && :\
    && docker-php-ext-install zip \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install exif \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install calendar \
    && docker-php-ext-install sockets \
    && docker-php-ext-install gettext \
    && docker-php-ext-install shmop \
    && docker-php-ext-install sysvmsg \
    && docker-php-ext-install sysvsem \
    && docker-php-ext-install sysvshm \
    && docker-php-ext-install opcache \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN php -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /bin/composer \
    && composer config -g repo.packagist composer https://packagist.phpcomposer.com


# Install Xdebug extension from source
COPY ./xdebug-2.6.0.tgz /tmp/xdebug.tgz
RUN mkdir -p /tmp/xdebug \
    && tar -xf /tmp/xdebug.tgz -C /tmp/xdebug --strip-components=1 \
    && rm /tmp/xdebug.tgz \
    && docker-php-ext-configure /tmp/xdebug --enable-xdebug \
    && docker-php-ext-install /tmp/xdebug \
    && rm -r /tmp/xdebug

# Install Memcache and redis extension from pecl
# RUN pecl install memcached-2.2.0 && pecl install redis-2.2.7

# Install Redis extension from source
COPY ./redis-4.1.0.tgz /tmp/redis.tgz
RUN ls /tmp
RUN mkdir -p /tmp/redis \
    && tar -xf /tmp/redis.tgz -C /tmp/redis --strip-components=1 \
    && rm /tmp/redis.tgz \
    && docker-php-ext-configure /tmp/redis --enable-redis \
    && docker-php-ext-install /tmp/redis \
    && rm -r /tmp/redis

# Install PHPUnit
RUN curl -L https://phar.phpunit.de/phpunit-5.7.phar >> /tmp/phpunit.phar && mv /tmp/phpunit.phar /usr/local/bin/phpunit && chmod a+x /usr/local/bin/phpunit



# Install Memcache
COPY ./pecl-memcache-php7.tgz /tmp/pecl-memcache-php7.tgz
RUN ls /tmp
RUN mkdir -p /tmp/pecl-memcache-php7 \
    && tar -xf /tmp/pecl-memcache-php7.tgz -C /tmp/pecl-memcache-php7 --strip-components=1 \
    && rm /tmp/pecl-memcache-php7.tgz \
    && cd /tmp/pecl-memcache-php7 \
    && /usr/local/bin/phpize \
    && ./configure --with-php-config=/usr/local/bin/php-config \
    && make \
    && make install \
    && echo "extension=memcache.so" > /usr/local/etc/php/conf.d/docker-php-ext-memcache.ini \
    && rm -rf /tmp/pecl-memcache-php7


# Install Memcached
COPY ./php7-memcached.tgz /tmp/php7-memcached.tgz
RUN ls /tmp
RUN apt-get update && apt-get install -y \
            libmemcached11 \
            libmemcachedutil2 \
            libmemcached-dev \
            libz-dev \
    && mkdir -p /tmp/php7-memcached \
    && tar -xf /tmp/php7-memcached.tgz -C /tmp/php7-memcached --strip-components=1 \
    && rm /tmp/php7-memcached.tgz \
    && cd /tmp/php7-memcached \
    && /usr/local/bin/phpize \
    && ./configure --with-php-config=/usr/local/bin/php-config \
    && make \
    && make install \
    && echo "extension=memcached.so" > /usr/local/etc/php/conf.d/docker-php-ext-memcached.ini \
    && rm -rf /tmp/php7-memcached



COPY run.sh /usr/local/bin/run.sh
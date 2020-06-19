FROM php:5.6-apache

# PHPのmodule郡
RUN apt-get update \
    && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    openssl libssl-dev \
    libxml2-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt pdo_mysql mbstring xml tokenizer zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# apacheのrewriteを有効化
RUN cd /etc/apache2/mods-enabled \
    && ln -s ../mods-available/rewrite.load

# 汎用的なもの
RUN apt-get install -y vim \
    git

#phalcon ver2
WORKDIR /home/
RUN git clone git://github.com/phalcon/cphalcon.git -b phalcon-v2.0.13
WORKDIR ./cphalcon/build
RUN ./install

#php.iniに設定追加
RUN touch /usr/local/etc/php/conf.d/phalcon.ini
RUN echo 'extension=phalcon.so' > /usr/local/etc/php/conf.d/phalcon.ini
RUN service apache2 restart

#phalconDevtools ver2
WORKDIR /home/
RUN git clone https://github.com/phalcon/phalcon-devtools.git -b 2.0.x
RUN ln -s /home/phalcon-devtools/phalcon.php /usr/bin/phalcon
RUN chmod ugo+x /usr/bin/phalcon

WORKDIR /var/www/html
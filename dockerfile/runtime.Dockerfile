FROM php:8.0.3-fpm


# 安装php模块，8.0.3 已内置了如下：
# Core
# ctype
# curl
# date
# dom
# fileinfo
# filter
# ftp
# hash
# iconv
# json
# libxml
# mbstring
# mysqlnd
# openssl
# pcre
# PDO
# pdo_sqlite
# Phar
# posix
# readline
# Reflection
# session
# SimpleXML
# sodium
# SPL
# sqlite3
# standard
# tokenizer
# xml
# xmlreader
# xmlwriter
# zlib

# 自定义类库示例 （composer 包安装依赖 git）
RUN apt-get update && \
    apt-get install -y git zlib1g-dev libpng-dev libicu-dev

RUN docker-php-ext-install \
    gd \
    intl


# configure intl
RUN docker-php-ext-configure intl



# 安装 composer 
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer 




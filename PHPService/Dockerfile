FROM php:8.2.0-apache

RUN apt-get update && apt-get -y upgrade

# Install dependencies
RUN apt-get install -y libcurl4-openssl-dev
RUN docker-php-ext-configure curl --with-curl
RUN apt-get install -y zip
RUN apt-get install -y unzip
RUN apt-get install -y git
RUN apt-get install -y curl
RUN apt-get install -y libpng-dev
RUN apt-get install -y libonig-dev
RUN apt-get install -y libxml2-dev
RUN apt-get install -y xz-utils
RUN apt-get install -y libzip-dev
RUN apt-get install -y zip
RUN apt-get install -y nano
# RUN apt-get install -y net-tool
RUN apt-get install -y ghostscript

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install exif
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip
RUN docker-php-ext-install curl
# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN yes | pecl install xdebug && docker-php-ext-enable xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN echo "upload_max_filesize = 20M" >> /usr/local/etc/php/conf.d/upload.ini \
    && echo "post_max_size = 20M" >> /usr/local/etc/php/conf.d/upload.ini

# Install Python and pip
RUN apt-get update && apt-get install -y python3 python3-pip
# Set the working directory
# WORKDIR /app
# COPY requirements.txt /app
# RUN pip install --upgrade pip && pip install --no-cache-dir -r requirements.txt
RUN pip3 install debugpy
RUN pip3 install PyMuPDF
RUN pip3 install pypdf2
RUN pip3 install reportlab
RUN pip3 install pillow

# Copy the current directory contents into the container at /app
# ADD . /app
FROM ubuntu:14.04

ENV LANG C.UTF-8
ENV TERM xterm

RUN apt-get update
RUN apt-get install -y software-properties-common git openssh-client curl sudo vim editorconfig
RUN add-apt-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y php5.6
RUN apt-get install -y apache2 libapache2-mod-php5.6
RUN apt-get install -y php5.6-gd php5.6-json php5.6-mysql php5.6-curl
RUN apt-get install -y php5.6-intl php5.6-mcrypt php5.6-imagick
RUN apt-get install -y php5.6-memcached memcached redis-server
RUN apt-get install -y php5.6-dom php5.6-zip php5.6-simplexml php5.6-mbstring php5.6-xml php5.6-xmlreader php5.6-xmlwriter 
RUN apt-get install -y php5.6-sqlite

COPY owncloud.conf /etc/apache2/sites-enabled/owncloud.conf

RUN a2enmod rewrite headers env dir mime setenvif 

RUN service apache2 start
RUN service redis-server start

RUN mkdir -p /var/www/owncloud/data/
RUN touch /var/www/owncloud/data/owncloud.log
RUN chown -R www-data:www-data /var/www/owncloud/data/

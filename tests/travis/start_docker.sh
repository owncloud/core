#!/usr/bin/env bash

docker pull owncloudci/php:7.1
docker run --rm \
    -v ${TRAVIS_BUILD_DIR}:/var/www/owncloud \
    -e APACHE_WEBROOT=/var/www/owncloud \
    -p ${SRV_HOST_PORT}:80 \
    -d \
    owncloudci/php:7.1 \
    bash -c "chown -R www-data. /var/www/owncloud && /usr/local/bin/apachectl -e debug -D "FOREGROUND"

docker run --rm \
    -v ${TRAVIS_BUILD_DIR}:/var/www/owncloud \
    -e APACHE_WEBROOT=/var/www/owncloud \
    -p ${REMOTE_FED_SRV_HOST_PORT}:80 \
    -d \
    owncloudci/php:7.1 \
    bash -c "chown -R www-data. /var/www/owncloud && /usr/local/bin/apachectl -e debug -D "FOREGROUND"
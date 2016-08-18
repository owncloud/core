all: install-composer-deps

composer.phar:
	cd build && curl -sS https://getcomposer.org/installer | php

install-composer-deps: build/composer.phar
	php build/composer.phar install

update-composer: build/composer.phar
	rm -f composer.lock
	php build/composer.phar install --prefer-dist

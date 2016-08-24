NODE_PREFIX=build
NPM=npm
KARMA="$(NODE_PREFIX)/node_modules/karma/bin/karma"

all: install-composer-deps

composer.phar:
	cd build && curl -sS https://getcomposer.org/installer | php

install-composer-deps: composer.phar
	php build/composer.phar install

update-composer: composer.phar
	rm -f composer.lock
	php build/composer.phar install --prefer-dist

nodejs-deps:
	$(NPM) install --link --prefix $(NODE_PREFIX)

test-php:
	./autotest.sh sqlite

test-js: nodejs-deps
	NODE_PATH='$(NODE_PREFIX)/node_modules' $(KARMA) start tests/karma.config.js --single-run

test: test-js test-php

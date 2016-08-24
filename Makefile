NODE_PREFIX=build
NPM=npm
KARMA="$(NODE_PREFIX)/node_modules/karma/bin/karma"
BOWER="$(NODE_PREFIX)/node_modules/bower/bin/bower"
COMPOSER="php build/composer.phar"

all: install-composer-deps install-nodejs-deps install-js-deps
clean: clean-composer-deps clean-nodejs-deps clean-js-deps

composer.phar:
	test -x build/composer.phar || cd build && curl -sS https://getcomposer.org/installer | php

install-composer-deps: composer.phar
	$(COMPOSER) install

update-composer: composer.phar
	rm -f composer.lock
	$(COMPOSER) install --prefer-dist

clean-composer-deps:
	rm build/composer.phar
	rm -Rf lib/composer

install-nodejs-deps:
	$(NPM) install --link --prefix $(NODE_PREFIX)

clean-nodejs-deps:
	rm -Rf $(NODE_PREFIX)/node_modules/

install-js-deps: install-nodejs-deps
	$(BOWER) install

update-js-deps: install-nodejs-deps
	$(BOWER) update

clean-js-deps:
	rm -Rf core/vendor/

test-php:
	./autotest.sh sqlite

test-js: nodejs-deps
	NODE_PATH='$(NODE_PREFIX)/node_modules' $(KARMA) start tests/karma.config.js --single-run

test: test-js test-php

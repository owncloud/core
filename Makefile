NODE_PREFIX=build
NPM=npm
KARMA="$(NODE_PREFIX)/node_modules/karma/bin/karma"
BOWER="$(NODE_PREFIX)/node_modules/bower/bin/bower"
JSDOC="$(NODE_PREFIX)/node_modules/jsdoc/jsdoc.js"
COMPOSER=php build/composer.phar

TEST_DATABASE=sqlite
TEST_EXTERNAL_ENV=smb-silvershell

all: install-composer-deps install-nodejs-deps install-js-deps
clean: clean-composer-deps clean-nodejs-deps clean-js-deps clean-test-results

build/composer.phar:
	cd build && curl -sS https://getcomposer.org/installer | php

install-composer-deps: build/composer.phar
	$(COMPOSER) install

update-composer: build/composer.phar
	rm -f composer.lock
	$(COMPOSER) install --prefer-dist

clean-composer-deps:
	rm -f build/composer.phar
	rm -Rf lib/composer

install-nodejs-deps:
	$(NPM) install --prefix $(NODE_PREFIX)

clean-nodejs-deps:
	rm -Rf $(NODE_PREFIX)/node_modules/

install-js-deps: install-nodejs-deps
	$(BOWER) install

update-js-deps: install-nodejs-deps
	$(BOWER) update

clean-js-deps:
	rm -Rf core/vendor/*

test-php: install-composer-deps
	build/autotest.sh $(TEST_DATABASE)

test-external:
	build/autotest-external.sh $(TEST_DATABASE) $(TEST_EXTERNAL_ENV)

test-js: install-nodejs-deps install-js-deps
	NODE_PATH='$(NODE_PREFIX)/node_modules' $(KARMA) start tests/karma.config.js --single-run

test-integration:
	$(MAKE) -C build/integration

test: test-js test-php test-integration

clean-test-integration:
	$(MAKE) -C build/integration clean

clean-test-results:
	rm -Rf tests/autotest-*results*.xml
	$(MAKE) -C build/integration clean-test-results

docs-js: install-nodejs-deps
	$(JSDOC) -d build/jsdocs core/js/*.js core/js/**/*.js apps/*/js/*.js

docs: docs-js

php-lint: install-composer-deps
	lib/composer/bin/parallel-lint --exclude lib/composer --exclude build .


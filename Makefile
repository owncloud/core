NODE_PREFIX=build
NPM=npm
KARMA="$(NODE_PREFIX)/node_modules/karma/bin/karma"
BOWER="$(NODE_PREFIX)/node_modules/bower/bin/bower"
JSDOC="$(NODE_PREFIX)/node_modules/jsdoc/jsdoc.js"
PHPUNIT="$(PWD)/lib/composer/phpunit/phpunit/phpunit"
COMPOSER=php build/composer.phar

TEST_DATABASE=sqlite
TEST_EXTERNAL_ENV=smb-silvershell

all: install-composer-deps install-nodejs-deps install-js-deps
clean: clean-composer-deps clean-nodejs-deps clean-js-deps clean-test-results

#
# Basic required tools
#
build/composer.phar:
	cd build && curl -sS https://getcomposer.org/installer | php

#
# ownCloud core PHP dependencies
#
install-composer-deps: build/composer.phar
	$(COMPOSER) install

update-composer: build/composer.phar
	rm -f composer.lock
	$(COMPOSER) install --prefer-dist

clean-composer-deps:
	rm -f build/composer.phar
	rm -Rf lib/composer

#
# Node JS dependencies for tools
#
install-nodejs-deps:
	$(NPM) install --prefix $(NODE_PREFIX)

clean-nodejs-deps:
	rm -Rf $(NODE_PREFIX)/node_modules/

#
# ownCloud core JS dependencies
#
install-js-deps: install-nodejs-deps
	$(BOWER) install

update-js-deps: install-nodejs-deps
	$(BOWER) update

clean-js-deps:
	rm -Rf core/vendor/*

#
# Tests
#
test-php: install-composer-deps
	PHPUNIT=$(PHPUNIT) build/autotest.sh $(TEST_DATABASE)

test-external:
	PHPUNIT=$(PHPUNIT) build/autotest-external.sh $(TEST_DATABASE) $(TEST_EXTERNAL_ENV)

test-js: install-nodejs-deps install-js-deps
	NODE_PATH='$(NODE_PREFIX)/node_modules' $(KARMA) start tests/karma.config.js --single-run

test-integration:
	$(MAKE) -C build/integration

test-php-lint: install-composer-deps
	lib/composer/bin/parallel-lint --exclude lib/composer --exclude build .

test: test-php-lint test-php test-js test-integration

clean-test-integration:
	$(MAKE) -C build/integration clean

clean-test-results:
	rm -Rf tests/autotest-*results*.xml
	$(MAKE) -C build/integration clean-test-results

#
# Documentation
#
docs-js: install-nodejs-deps
	$(JSDOC) -d build/jsdocs core/js/*.js core/js/**/*.js apps/*/js/*.js

docs: docs-js

#
# Miscellaneous tools
#
update-php-license-header:
	php build/license.php



NODE_PREFIX=build
NPM=npm
KARMA="$(NODE_PREFIX)/node_modules/.bin/karma"
BOWER="$(NODE_PREFIX)/node_modules/.bin/bower"
JSDOC="$(NODE_PREFIX)/node_modules/.bin/jsdoc"
PHPUNIT="$(PWD)/lib/composer/phpunit/phpunit/phpunit"
COMPOSER_BIN=build/composer.phar

TEST_DATABASE=sqlite
TEST_EXTERNAL_ENV=smb-silvershell

# internal aliases
composer_deps=lib/composer
composer_dev_deps=lib/composer/phpunit
nodejs_deps=build/node_modules
core_vendor=core/vendor

#
# Catch-all rules
#
.PHONY: all
all: $(composer_deps) $(core_vendor)

.PHONY: clean
clean: clean-composer-deps clean-nodejs-deps clean-js-deps clean-test-results

#
# Basic required tools
#
$(COMPOSER_BIN):
	cd build && curl -sS https://getcomposer.org/installer | php

#
# ownCloud core PHP dependencies
#
$(composer_deps): $(COMPOSER_BIN)
	php $(COMPOSER_BIN) install --no-dev

$(composer_dev_deps): $(COMPOSER_BIN)
	php $(COMPOSER_BIN) install --dev

.PHONY: install-composer-release-deps
install-composer-release-deps: $(composer_deps)

.PHONY: install-composer-dev-deps
install-composer-dev-deps: $(composer_dev_deps)

.PHONY: install-composer-deps
install-composer-deps: install-composer-dev-deps

.PHONY: update-composer
update-composer: $(COMPOSER_BIN)
	rm -f composer.lock
	php $(COMPOSER_BIN) install --prefer-dist

.PHONY: clean-composer-deps
clean-composer-deps:
	rm -f $(COMPOSER_BIN)
	rm -Rf lib/composer

#
# Node JS dependencies for tools
#
$(nodejs_deps):
	$(NPM) install --prefix $(NODE_PREFIX)

.PHONY: install-nodejs-deps
install-nodejs-deps: $(nodejs_deps)

.PHONY: clean-nodejs-deps
clean-nodejs-deps:
	rm -Rf $(nodejs_deps)

#
# ownCloud core JS dependencies
$(core_vendor): $(nodejs_deps)
	$(BOWER) install

.PHONY: install-js-deps
install-js-deps: $(nodejs_deps)

.PHONY: update-js-deps
update-js-deps: $(nodejs_deps)
	$(BOWER) update

.PHONY: clean-js-deps
clean-js-deps:
	rm -Rf $(core_vendor)

#
# Tests
#
.PHONY: test-php
test-php: $(composer_deps)
	PHPUNIT=$(PHPUNIT) build/autotest.sh $(TEST_DATABASE)

.PHONY: test-external
test-external: $(composer_deps)
	PHPUNIT=$(PHPUNIT) build/autotest-external.sh $(TEST_DATABASE) $(TEST_EXTERNAL_ENV)

.PHONY: test-js
test-js: $(nodejs_deps) $(js_deps) $(core_vendor)
	NODE_PATH='$(NODE_PREFIX)/node_modules' $(KARMA) start tests/karma.config.js --single-run

.PHONY: test-integration
test-integration: $(composer_deps)
	$(MAKE) -C build/integration

.PHONY: test-php-lint
test-php-lint: $(composer_deps)
	$(composer_deps)/bin/parallel-lint --exclude lib/composer --exclude build .

.PHONY: test
test: test-php-lint test-php test-js test-integration

.PHONY: clean-test-integration
clean-test-integration:
	$(MAKE) -C build/integration clean

.PHONY: clean-test-results
clean-test-results:
	rm -Rf tests/autotest-*results*.xml
	$(MAKE) -C build/integration clean-test-results

#
# Documentation
#
.PHONY: docs-js
docs-js: $(nodejs_deps)
	$(JSDOC) -d build/jsdocs core/js/*.js core/js/**/*.js apps/*/js/*.js

.PHONY: docs
docs: docs-js

.PHONY: clean-docs
clean-docs:
	rm -Rf build/jsdocs

#
# Miscellaneous tools
#
.PHONY: update-php-license-header
update-php-license-header:
	php build/license.php


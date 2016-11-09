# Main Makefile for ownCloud development
#
# Requirements to run make here:
#    - node
#    - npm
#
# Both can be installed following e.g. the Debian/Ubuntu instructions at
# https://nodejs.org/en/download/package-manager/
#
#  curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash -
#  sudo apt-get install -y nodejs build-essential
#  
# (installation from distro packages is not recommended, often old versions)
#
#
# Usage:
#
#   make
#      - prepare everything
#   make clean
#      - clean up
#   make test-php
#   make test-js
#      - testing targets

# Detailed documentation in https://github.com/owncloud/documentation:
#      - https://doc.owncloud.org/server/9.2/developer_manual/general/devenv.html#check-out-the-code
#      - https://doc.owncloud.org/server/9.2/developer_manual/core/unit-testing.html#running-unit-tests-for-the-owncloud-core-project
#

NODE_PREFIX=build

#
# Define NPM and check if it is available on the system.
#
NPM := $(shell command -v npm 2> /dev/null)
ifndef NPM
    $(error npm is not available on your system, please install npm)
endif

KARMA=$(NODE_PREFIX)/node_modules/.bin/karma
BOWER=$(NODE_PREFIX)/node_modules/bower/bin/bower
JSDOC=$(NODE_PREFIX)/node_modules/.bin/jsdoc
PHPUNIT="$(shell pwd)/lib/composer/phpunit/phpunit/phpunit"
COMPOSER_BIN=build/composer.phar

TEST_DATABASE=sqlite
TEST_EXTERNAL_ENV=smb-silvershell
TEST_PHP_SUITE=

RELEASE_CHANNEL=git

# internal aliases
composer_deps=lib/composer
composer_dev_deps=lib/composer/phpunit
nodejs_deps=build/node_modules
core_vendor=core/vendor

core_doc_files=AUTHORS COPYING README.md
core_src_files=$(wildcard *.php) index.html db_structure.xml .htaccess .user.ini
core_src_dirs=apps core l10n lib occ ocs ocs-provider resources settings themes
core_all_src=$(core_src_files) $(core_src_dirs) $(core_doc_files)
dist_dir=build/dist

#
# Catch-all rules
#
.PHONY: all
all: $(composer_dev_deps) $(core_vendor) $(nodejs_deps)

.PHONY: clean
clean: clean-composer-deps clean-nodejs-deps clean-js-deps clean-test-results clean-dist

#
# Basic required tools
#
$(COMPOSER_BIN):
	cd build && ./getcomposer.sh

#
# ownCloud core PHP dependencies
#
$(composer_deps): $(COMPOSER_BIN) composer.json composer.lock
	php $(COMPOSER_BIN) install --no-dev

$(composer_dev_deps): $(COMPOSER_BIN) composer.json composer.lock
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
$(nodejs_deps): build/package.json
	$(NPM) install --prefix $(NODE_PREFIX)
	touch $(nodejs_deps)

.PHONY: install-nodejs-deps
install-nodejs-deps: $(nodejs_deps)

.PHONY: clean-nodejs-deps
clean-nodejs-deps:
	rm -Rf $(nodejs_deps)

#
# ownCloud core JS dependencies
$(core_vendor): $(nodejs_deps) bower.json
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
test-php: $(composer_dev_deps)
	PHPUNIT=$(PHPUNIT) build/autotest.sh $(TEST_DATABASE) $(TEST_PHP_SUITE)

.PHONY: test-external
test-external: $(composer_dev_deps)
	PHPUNIT=$(PHPUNIT) build/autotest-external.sh $(TEST_DATABASE) $(TEST_EXTERNAL_ENV) $(TEST_PHP_SUITE)

.PHONY: test-js
test-js: $(nodejs_deps) $(js_deps) $(core_vendor)
	NODE_PATH='$(NODE_PREFIX)/node_modules' $(KARMA) start tests/karma.config.js --single-run

.PHONY: test-integration
test-integration: $(composer_dev_deps)
	$(MAKE) -C build/integration OC_TEST_ALT_HOME=$(OC_TEST_ALT_HOME) OC_TEST_ENCRYPTION_ENABLED=$(OC_TEST_ENCRYPTION_ENABLED)

.PHONY: test-php-lint
test-php-lint: $(composer_dev_deps)
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
# Build distribution

$(dist_dir)/owncloud: $(composer_deps) $(core_vendor) $(core_all_src)
	rm -Rf $$@; mkdir -p $@/config
	cp -R $(core_all_src) $@
	cp -R config/config.sample.php $@/config
	rm -Rf $(dist_dir)/owncloud/apps/testing
	find $@ -name .gitkeep -delete
	find $@ -name .gitignore -delete
	find $@ -name no-php -delete
	rm -Rf $@/core/js/tests
	rm -Rf $@/settings/tests
	rm -Rf $@/core/vendor/*/{.bower.json,bower.json,package.json,testem.json}
	find $@/{core/,l10n/} -iname \*.sh -delete
	find $@/{apps/,lib/composer/,core/vendor/} \( \
		-name bin -o \
		-name test -o \
		-name tests -o \
		-name examples -o \
		-name demo -o \
		-name demos -o \
		-name doc -o \
		-name travis -o \
		-iname \*.sh \
		\) -print | xargs rm -Rf
	find $@/{apps/,lib/composer/} -iname \*.exe -delete
	# Set build
	$(eval _BUILD="$(shell date -u --iso-8601=seconds) $(shell git rev-parse HEAD)")
	# Replace channel in version.php
	sed -i \
		-e 's/$$OC_Channel.*$$/$$OC_Channel = '"'"$(RELEASE_CHANNEL)"'"';/g' \
		-e 's/$$OC_Build.*$$/$$OC_Build = '"'"$(_BUILD)"'"';/g' \
		$(dist_dir)/owncloud/version.php

$(dist_dir)/owncloud-core.tar.bz2: $(dist_dir)/owncloud
	cd $(dist_dir) && tar cjf owncloud-core.tar.bz2 owncloud --format=gnu

$(dist_dir)/owncloud-core.zip: $(dist_dir)/owncloud
	cd $(dist_dir) && zip -rq9 owncloud-core.zip owncloud

.PHONY: dist
dist: $(dist_dir)/owncloud-core.tar.bz2 $(dist_dir)/owncloud-core.zip

.PHONY: dist-dir
dist-dir: $(dist_dir)/owncloud

.PHONY: clean-dist
clean-dist:
	rm -Rf $(dist_dir)
#
# Miscellaneous tools
#
.PHONY: update-php-license-header
update-php-license-header:
	php build/license.php


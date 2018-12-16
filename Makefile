# Main Makefile for ownCloud development
#
# Requirements to run make here:
#    - node
#    - yarn
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
#      - https://doc.owncloud.org/server/latest/developer_manual/general/devenv.html#check-out-the-code
#      - https://doc.owncloud.org/server/latest/developer_manual/core/unit-testing.html#running-unit-tests-for-the-owncloud-core-project
#

NODE_PREFIX=build
SHELL=/bin/bash

#
# Define YARN and check if it is available on the system.
#
YARN := $(shell command -v yarn 2> /dev/null)
KARMA=$(NODE_PREFIX)/node_modules/.bin/karma
JSDOC=$(NODE_PREFIX)/node_modules/.bin/jsdoc
PHPUNIT="$(shell pwd)/lib/composer/phpunit/phpunit/phpunit"
COMPOSER_BIN=build/composer.phar
PHAN_BIN=build/phan.phar
PHPSTAN_BIN=build/phpstan.phar

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
core_src_files=$(wildcard *.php) index.html db_structure.xml .htaccess .user.ini robots.txt
core_src_dirs=apps core l10n lib occ ocs ocs-provider resources settings
core_test_dirs=tests
core_all_src=$(core_src_files) $(core_src_dirs) $(core_doc_files)
core_config_files=config/config.sample.php config/config.apps.sample.php
dist_dir=build/dist

#
# Catch-all rules
#
.PHONY: all
all: help-hint $(composer_dev_deps) $(nodejs_deps)

.PHONY: clean
clean: clean-composer-deps clean-nodejs-deps clean-test clean-dist

.PHONY: help-hint
help-hint:
	@echo "Building core"
	@echo
	@echo "Note: You can type 'make help' for more targets"
	@echo

.PHONY: help
help:
	@echo "Please use 'make <target>' where <target> is one of the following:"
	@echo
	@echo -e "Dependencies:\n"
	@echo -e "make clean\t\t\tclean everything"
	@echo -e "make install-composer-deps\tinstall composer dependencies"
	@echo -e "make update-composer\t\tupdate composer.lock"
	@echo -e "make install-nodejs-deps\tinstall Node JS and Javascript dependencies"
	@echo
	@echo -e "Note that running 'make' without arguments already installs all required dependencies"
	@echo
	@echo -e "Testing:\n"
	@echo -e "make test\t\t\trun all tests"
	@echo -e "make test-php\t\t\trun all PHP tests"
	@echo -e "make test-php-style\t\trun PHP code style checks"
	@echo -e "make test-js\t\t\trun Javascript tests"
	@echo -e "make test-js-debug\t\trun Javascript tests in debug mode (continuous)"
	@echo -e "make test-acceptance-api\trun API acceptance tests"
	@echo -e "make test-acceptance-cli\trun CLI acceptance tests"
	@echo -e "make test-acceptance-webui\trun webUI acceptance tests"
	@echo -e "make clean-test\t\t\tclean test results"
	@echo
	@echo It is also possible to run individual PHP test files with the following command:
	@echo -e "make test-php TEST_DATABASE=mysql TEST_PHP_SUITE=path/to/testfile.php"
	@echo
	@echo -e "Tools:\n"
	@echo -e "make test-php-style-fix\t\trun PHP code style checks and fix any issues found"
	@echo -e "make update-php-license-header\tUpdate license headers"


#
# Basic required tools
#
$(COMPOSER_BIN):
	cd build && ./getcomposer.sh

$(PHAN_BIN):
	cd build && curl -s -L https://github.com/phan/phan/releases/download/1.1.8/phan.phar -o phan.phar;

$(PHPSTAN_BIN):
	cd build && curl -s -L https://github.com/phpstan/phpstan/releases/download/0.10.6/phpstan.phar -o phpstan.phar;
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
	@test -x "$(YARN)" || { echo "yarn is not available on your system, please install yarn (npm install -g yarn)" && exit 1; }
	cd $(NODE_PREFIX) && $(YARN) install
	touch $@

# alias for core deps
$(core_vendor): $(nodejs_deps)

.PHONY: install-nodejs-deps
install-nodejs-deps: $(nodejs_deps)

.PHONY: clean-nodejs-deps
clean-nodejs-deps:
	rm -Rf $(core_vendor)
	rm -Rf $(nodejs_deps)

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
test-js: $(nodejs_deps)
	NODE_PATH='$(NODE_PREFIX)/node_modules' $(KARMA) start tests/karma.config.js --single-run

.PHONY: test-js-debug
test-js-debug: $(nodejs_deps)
	NODE_PATH='$(NODE_PREFIX)/node_modules' $(KARMA) start tests/karma.config.js

.PHONY: test-acceptance-api
test-acceptance-api: $(composer_dev_deps)
	./tests/acceptance/run.sh --remote --type api

.PHONY: test-acceptance-cli
test-acceptance-cli: $(composer_dev_deps)
	./tests/acceptance/run.sh --remote --type cli

.PHONY: test-acceptance-webui
test-acceptance-webui: $(composer_dev_deps)
	./tests/acceptance/run.sh --remote --type webUI

.PHONY: test-php-lint
test-php-lint: $(composer_dev_deps)
	$(composer_deps)/bin/parallel-lint --exclude lib/composer --exclude build .

.PHONY: test-php-style
test-php-style: $(composer_dev_deps)
	$(composer_deps)/bin/php-cs-fixer fix -v --diff --diff-format udiff --dry-run --allow-risky yes
	$(composer_deps)/bin/phpcs --runtime-set ignore_warnings_on_exit --standard=phpcs.xml tests/acceptance tests/TestHelpers
	php build/OCPSinceChecker.php

.PHONY: test-php-style-fix
test-php-style-fix: $(composer_dev_deps)
	$(composer_deps)/bin/php-cs-fixer fix -v --diff --diff-format udiff --allow-risky yes

.PHONY: test-php-phan
test-php-phan: $(PHAN_BIN)
	php $(PHAN_BIN) --config-file .phan/config.php --require-config-exists -p

.PHONY: test-php-phpstan
test-php-phpstan: $(PHPSTAN_BIN)
	php $(PHPSTAN_BIN) analyse --memory-limit=2G --configuration=./phpstan.neon --level=0 apps core settings lib/private lib/public ocs ocs-provider

.PHONY: test
test: test-php-lint test-php-style test-php test-js test-acceptance-api test-acceptance-cli test-acceptance-webui

.PHONY: clean-test-acceptance
clean-test-acceptance:
	$(MAKE) -C tests/acceptance clean

.PHONY: clean-test-results
clean-test-results:
	rm -Rf tests/autotest-*results*.xml
	$(MAKE) -C tests/acceptance clean

.PHONY: clean-test
clean-test: clean-test-acceptance clean-test-results

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
#
$(dist_dir)/owncloud: $(composer_deps) $(nodejs_deps) $(core_all_src)
	rm -Rf $@; mkdir -p $@/config
	cp -RL $(core_all_src) $@
	cp -R $(core_config_files) $@/config
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
# Build qa distribution
#
$(dist_dir)/qa/owncloud: $(composer_dev_deps) $(nodejs_deps) $(core_all_src) $(core_test_dirs)
	rm -Rf $@; mkdir -p $@/config
	cp -RL $(core_all_src) $@
	cp -Rf $(core_test_dirs) $@
	cp -R $(core_config_files) $@/config
	rm -Rf $@/lib/composer/bin; cp -R lib/composer/bin $@/lib/composer/bin
	find $@ -name .gitkeep -delete
	find $@ -name .gitignore -delete
	find $@ -name no-php -delete
	rm -Rf $@/core/vendor/*/{.bower.json,bower.json,package.json,testem.json}
	find $@/{core/,l10n/} -iname \*.sh -delete
	find $@/{apps/,lib/composer/,core/vendor/} \( \
		-name test -o \
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
		$(dist_dir)/qa/owncloud/version.php

$(dist_dir)/owncloud-qa-core.tar.bz2: $(dist_dir)/qa/owncloud
	cd $(dist_dir)/qa && tar cjf owncloud-qa-core.tar.bz2 owncloud --format=gnu

.PHONY: dist-qa
dist-qa: $(dist_dir)/owncloud-qa-core.tar.bz2

.PHONY: dist-dir-qa
dist-dir-qa: $(dist_dir)/qa/owncloud

#
# Miscellaneous tools
#
.PHONY: update-php-license-header
update-php-license-header:
	php build/license.php


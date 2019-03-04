##
## Acceptance Tests
##--------------------------------------

RELATIVE_PATH := $(dir $(lastword $(MAKEFILE_LIST)))
include $(RELATIVE_PATH)check-composer.mk

acceptance_test_deps=vendor-bin/behat/vendor

# bin file definitions
BEHAT_BIN=vendor-bin/behat/vendor/bin/behat
PHP_CODESNIFFER=vendor-bin/php_codesniffer/vendor/bin/phpcs

.PHONY: test-acceptance-api
test-acceptance-api: ## Run API acceptance tests
test-acceptance-api: $(acceptance_test_deps)
	BEHAT_BIN=$(BEHAT_BIN) ../../tests/acceptance/run.sh --remote --type api

.PHONY: test-acceptance-cli
test-acceptance-cli: ## Run CLI acceptance tests
test-acceptance-cli: $(acceptance_test_deps)
	BEHAT_BIN=$(BEHAT_BIN) ../../tests/acceptance/run.sh --remote --type cli

.PHONY: test-acceptance-webui
test-acceptance-webui: ## Run webUI acceptance tests
test-acceptance-webui: $(acceptance_test_deps)
	BEHAT_BIN=$(BEHAT_BIN) ../../tests/acceptance/run.sh --remote --type webui

.PHONY: test-acceptance-style
test-acceptance-style: ## Run php_codesniffer and check acceptance test code-style
test-acceptance-style: vendor-bin/php_codesniffer/vendor
	$(PHP_CODESNIFFER) --runtime-set ignore_warnings_on_exit --standard=phpcs.xml tests/acceptance

#
# Dependency management
#--------------------------------------

include $(RELATIVE_PATH)vendor-bin.mk

vendor-bin/behat/vendor: vendor/bamarni/composer-bin-plugin vendor-bin/behat/composer.lock
	composer bin behat install --no-progress

vendor-bin/behat/composer.lock: vendor-bin/behat/composer.json
	@echo behat composer.lock is not up to date.

vendor-bin/php_codesniffer/vendor: vendor/bamarni/composer-bin-plugin vendor-bin/php_codesniffer/composer.lock
	composer bin php_codesniffer install --no-progress

vendor-bin/php_codesniffer/composer.lock: vendor-bin/php_codesniffer/composer.json
	@echo php_codesniffer composer.lock is not up to date.

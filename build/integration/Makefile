COMPOSER=php composer.phar

all: test

composer.phar:
	curl -sS https://getcomposer.org/installer | php

install-composer-deps: composer.phar
	$(COMPOSER) install

update-composer: composer.phar
	rm -f composer.lock
	$(COMPOSER) install --prefer-dist

clean-composer-deps:
	rm -f composer.phar
	rm -Rf vendor/*

clean-test-results:
	rm -rf output

clean: clean-test-results clean-composer-deps

test: install-composer-deps
	OC_TEST_ALT_HOME=$(OC_TEST_ALT_HOME) OC_TEST_ENCRYPTION_ENABLED=$(OC_TEST_ENCRYPTION_ENABLED) ./run.sh


COMPOSER=php composer.phar

all: test

composer.phar:
	curl -sS https://getcomposer.org/installer | php

install-composer-deps: composer.phar
	$(COMPOSER) install

clean-composer-deps:
	rm -f composer.phar
	rm -Rf vendor/*

test: install-composer-deps
	./run.sh


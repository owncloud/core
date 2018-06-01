.PHONY: tests

all: vendor

vendor: composer.json
	composer install

tests: vendor
	vendor/bin/phpunit tests -c tests/phpunit.xml

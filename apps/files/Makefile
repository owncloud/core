CORE_PATH=../..
NODE_PREFIX=$(CORE_PATH)/build
HANDLEBARS="$(NODE_PREFIX)/node_modules/.bin/handlebars"
SRC=*.php ajax appinfo css img js l10n lib templates
TEMPLATE_SRC=$(wildcard js/templates/*.handlebars)

js_namespace=OCA.Files

.PHONY: all
all: build

.PHONY: build
build: $(addsuffix .js, $(TEMPLATE_SRC))

dist: build
	mkdir -p dist/files
	cp -R $(SRC) dist/files
	find dist/files -name *.handlebars -delete
	cd dist && tar cjf files.tar.bz2 files

.PHONY: clean-dist
clean-dist:
	rm -Rf dist

.PHONY: clean
clean: clean-dist
	rm -Rf js/templates/*.handlebars.js

.PHONY: test
test: test-php

.PHONY: test-php
test-php:
	phpunit --bootstrap $(CORE_PATH)/tests/bootstrap.php tests

%.handlebars.js: %.handlebars
	$(HANDLEBARS) -n "$(js_namespace).Templates" $< > $@


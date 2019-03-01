##
## JavaScript Tests
##--------------------------------------

# bin file definitions
NODE_PREFIX=$(shell pwd)
KARMA=$(NODE_PREFIX)/node_modules/.bin/karma

nodejs_deps=node_modules

.PHONY: test-js
test-js: ## Run JS test suites (single run)
test-js: $(KARMA)
	$(KARMA) start tests/js/karma.config.js --single-run

test-js-debug: ## Run JS test suites and watch for changes
test-js-debug: $(KARMA)
	$(KARMA) start tests/js/karma.config.js

$(KARMA): $(nodejs_deps)

#
# Dependency management
#--------------------------------------

$(nodejs_deps): package.json yarn.lock
	yarn install
	touch $@

clean_deps_rules+=clean-js-deps

.PHONY: clean-js-deps
clean-js-deps:
	rm -Rf $(nodejs_deps)

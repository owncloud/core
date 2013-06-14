grunt_bin=$(CURDIR)/node_modules/grunt-cli/bin/grunt

deps:
	npm install --deps

phpunit: deps
	$(grunt_bin) --config $(CURDIR)/Gruntfile.coffee phpunit

phpunitwatch: deps
	$(grunt_bin) --config $(CURDIR)/Gruntfile.coffee phpunitwatch

clean:
	rm -rf $(CURDIR)/node_modules/
	rm -rf $(CURDIR)/test-results.xml

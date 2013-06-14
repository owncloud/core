grunt_bin=$(CURDIR)/node_modules/grunt-cli/bin/grunt

deps:
	npm install --deps

phpunitwatch: deps
	$(grunt_bin) --config $(CURDIR)/Gruntfile.js phpunitwatch

clean:
	rm -rf $(CURDIR)/node_modules/
	rm -rf $(CURDIR)/test-results.xml

# Dependencies for getting the vendor and vendor-bin directory happening

ifndef VENDOR_BIN_HAS_BEEN_INCLUDED
	VENDOR_BIN_HAS_BEEN_INCLUDED=true

composer.lock: composer.json
	@echo composer.lock is not up to date.

vendor: composer.lock
	composer install --no-dev

vendor/bamarni/composer-bin-plugin: composer.lock
	composer install

clean_deps_rules+=clean-vendor clean-vendor-bin

.PHONY: clean-vendor
clean-vendor:
	rm -Rf vendor

.PHONY: clean-vendor-bin
clean-vendor-bin:
	rm -Rf vendor-bin/**/vendor vendor-bin/**/composer.lock

endif

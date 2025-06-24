# Makefile optimizado para producción de ownCloud core

NODE_PREFIX=build
SHELL=/bin/bash
COMPOSER_BIN := $(shell command -v composer 2> /dev/null)
YARN := $(shell command -v yarn 2> /dev/null)

# Paths
composer_release_deps=lib/composer
nodejs_deps=build/node_modules
core_all_src=$(wildcard *.php) core l10n lib occ ocs ocs-provider ocm-provider resources settings
core_config_files=config/config.sample.php config/config.apps.sample.php

dist_dir=build/dist

# Targets
.PHONY: all
all: install-composer-release-deps install-nodejs-deps dist

# Instalación de dependencias PHP (solo producción)
$(composer_release_deps): composer.json composer.lock
	php $(COMPOSER_BIN) install --no-dev --optimize-autoloader

.PHONY: install-composer-release-deps
install-composer-release-deps: $(composer_release_deps)

# Instalación de dependencias JS para assets
$(nodejs_deps): build/package.json
	@test -x "$(YARN)" || { echo "Yarn no está instalado, instalalo globalmente" && exit 1; }
	cd $(NODE_PREFIX) && $(YARN) install --production --frozen-lockfile
	touch $(nodejs_deps)

.PHONY: install-nodejs-deps
install-nodejs-deps: $(nodejs_deps)

# Generación de la distribución optimizada
$(dist_dir)/owncloud: install-composer-release-deps install-nodejs-deps $(core_all_src) $(core_config_files)
	cd $(NODE_PREFIX) && $(YARN) run clean-modules
	mkdir -p $(dist_dir)/owncloud/config
	cp -RL $(core_all_src) $(dist_dir)/owncloud
	cp -R $(core_config_files) $(dist_dir)/owncloud/config
	# Limpieza de archivos innecesarios
	rm -rf $(dist_dir)/owncloud/core/js/tests
	rm -rf $(dist_dir)/owncloud/settings/tests
	# Ajusta canal y build
	@_BUILD="$(shell date -u --iso-8601=seconds) $(shell git rev-parse HEAD)"
	sed -i \
		-e "s/\$$OC_Channel.*\$$/\$$OC_Channel = 'production';/g" \
		-e "s/\$$OC_Build.*\$$/\$$OC_Build = '$${_BUILD}';/g" \
		$(dist_dir)/owncloud/version.php

.PHONY: dist
dist: $(dist_dir)/owncloud

# Limpieza ligera
.PHONY: clean
clean:
	rm -rf lib/composer
	rm -rf build/node_modules
	rm -rf build/dist
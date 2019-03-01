##
## Distribution tarball
##--------------------------------------

# signing
occ=$(CURDIR)/../../occ
private_key=$(HOME)/.owncloud/certificates/$(app_name).key
certificate=$(HOME)/.owncloud/certificates/$(app_name).crt
sign=$(occ) integrity:sign-app --privateKey="$(private_key)" --certificate="$(certificate)"
sign_skip_msg="Skipping signing, either no key and certificate found in $(private_key) and $(certificate) or occ can not be found at $(occ)"
ifneq (,$(wildcard $(private_key)))
ifneq (,$(wildcard $(certificate)))
ifneq (,$(wildcard $(occ)))
	CAN_SIGN=true
endif
endif
endif

# If the app_name has not been specified by the caller,
# then use the name of the directory that the main "make" is being run from.
ifndef app_name
	app_name=$(notdir $(CURDIR))
endif

# If not specified by the caller, then select some common doc files to put in the tarball.
ifndef doc_files
	doc_files=README.md CHANGELOG.md
endif

# If not specified by the caller, then select a "standard" set of dirs to put in the tarball.
ifndef src_dirs
	src_dirs=appinfo css img js l10n lib templates
endif

all_src=$(src_dirs) $(extra_dirs) $(doc_files) $(extra_files)

# Put the tarball and any other artifacts in a build dir by default
ifndef build_dir
	build_dir=$(CURDIR)/build
endif

# Put the tarball in a dist sub-dir of build_dir by default
ifndef dist_dir
	dist_dir=$(build_dir)/dist
endif

#
# dist
#
$(dist_dir)/$(app_name): $(composer_deps) $(bower_deps) $(nodejs_deps)
	rm -Rf $@; mkdir -p $@
	cp -R $(all_src) $@

ifdef CAN_SIGN
	$(sign) --path="$(dist_dir)/$(app_name)"
else
	@echo $(sign_skip_msg)
endif
	tar -czf $(dist_dir)/$(app_name).tar.gz -C $(dist_dir) $(app_name)

.PHONY: dist
dist: ## Make the tarball for release distribution
dist: $(dist_dir)/$(app_name)

clean_dist_rules+=clean-dist
clean_build_rules+=clean-build

.PHONY: clean-dist
clean-dist: ## Clean the dist directory
clean-dist:
	rm -Rf $(dist_dir)

.PHONY: clean-build
clean-build: ## Clean the build directory
clean-build:
	rm -Rf $(build_dir)


##
## Common clean rules
##--------------------------------------

ifndef CLEAN_HAS_BEEN_INCLUDED
	CLEAN_HAS_BEEN_INCLUDED=true

.PHONY: clean-deps
clean-deps: ## Clean all dependencies
clean-deps: $(clean_deps_rules)

.PHONY: clean
clean: ## Clean all dependencies, build and dist
clean: clean-deps $(clean_dist_rules) $(clean_build_rules)

endif

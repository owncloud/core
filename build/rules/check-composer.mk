# Check that composer exists

ifndef COMPOSER_CHECK_HAS_BEEN_DONE
	COMPOSER_CHECK_HAS_BEEN_DONE=true

COMPOSER_BIN := $(shell command -v composer 2> /dev/null)
ifndef COMPOSER_BIN
    $(error composer is not available on your system, please install composer)
endif

endif

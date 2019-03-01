# Check that npm exists

ifndef NPM_CHECK_HAS_BEEN_DONE
	NPM_CHECK_HAS_BEEN_DONE=true

NPM := $(shell command -v npm 2> /dev/null)
ifndef NPM
    $(error npm is not available on your system, please install npm)
endif

endif

# All tests
# A convenience for repos that want to have all common test targets available
RELATIVE_PATH := $(dir $(lastword $(MAKEFILE_LIST)))
include $(RELATIVE_PATH)test-js.mk
include $(RELATIVE_PATH)test-php.mk
include $(RELATIVE_PATH)test-acceptance.mk

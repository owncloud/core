all: test

.PHONY: clean
clean:
	rm -rf output

.PHONY: test
test:
	OC_TEST_ALT_HOME=$(OC_TEST_ALT_HOME) OC_TEST_ENCRYPTION_ENABLED=$(OC_TEST_ENCRYPTION_ENABLED) ./run.sh


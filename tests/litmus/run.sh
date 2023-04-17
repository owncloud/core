#!/usr/bin/env bash
# This script is only used if we expect that a test will fail in a litmus test set.
# It checks the output of the tests and looks for the summary, which should be
# something like:
# <- summary for 'basic': of 16 tests run: 15 passed, 1 failed. 93.8%
# and it looks for the string "1 failed".
# This is a workaround for CI so that we can continue to run the litmus test set
# even though we know that one of the test cases will fail.
# See PR https://github.com/owncloud/core/pull/40662
TEST_LOG_FILE=$(mktemp)

/usr/local/bin/litmus-wrapper | tee ${TEST_LOG_FILE}

RESULT_SUMMARY=`grep 'summary[[:space:]]for' ${TEST_LOG_FILE}`

if [[ ${RESULT_SUMMARY} =~ 1.failed ]]
then
	# There was exactly 1 test that failed. This is what we expect
	# This is what we expect, so exit with code 0 "success"
	echo "Exactly 1 test failed, as expected"
	FINAL_EXIT_STATUS=0
else
	# We did not find the text "1 failed"
	# So maybe more than 1 test failed, or maybe they all passed (unexpectedly)
	# Exit with code 1 to indicate that something is unexpected.
	echo "Exactly 1 test was expected to fail but something different happened"
	echo "Exiting with error status"
	FINAL_EXIT_STATUS=1
fi

exit ${FINAL_EXIT_STATUS}

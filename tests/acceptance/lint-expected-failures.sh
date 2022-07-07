#!/usr/bin/env bash

if [ -n "${EXPECTED_FAILURES_FILE}" ]
then
	if [ -f "${EXPECTED_FAILURES_FILE}" ]
	then
		echo "Checking expected failures in ${EXPECTED_FAILURES_FILE}"
	else
		echo "Expected failures file ${EXPECTED_FAILURES_FILE} not found"
		echo "Check the setting of EXPECTED_FAILURES_FILE environment variable"
		exit 1
	fi
	FINAL_EXIT_STATUS=0
	# If the last line of the expected-failures file ends without a newline character
	# then that line may not get processed by some of the bash code in this script
	# So check that the last character in the file is a newline
	if [ $(tail -c1 "${EXPECTED_FAILURES_FILE}" | wc -l) -eq 0 ]
	then
		echo "Expected failures file ${EXPECTED_FAILURES_FILE} must end with a newline"
		echo "Put a newline at the end of the last line and try again"
		FINAL_EXIT_STATUS=1
	fi
	# Check the expected-failures file to ensure that the lines are self-consistent
	# In most cases the features that are being run are in owncloud/core,
	# so assume that by default.
	FEATURE_FILE_REPO="owncloud/core"
	FEATURE_FILE_PATH="tests/acceptance/features"
	while read INPUT_LINE
		do
			# Ignore comment lines (starting with hash)
			if [[ "${INPUT_LINE}" =~ ^# ]]
			then
				continue
			fi
			# A line of text in the feature file can be used to indicate that the
			# features being run are actually from some other repo. For example:
			# "The expected failures in this file are from features in the owncloud/ocis repo."
			# Write a line near the top of the expected-failures file to "declare" this,
			# overriding the default "owncloud/core"
			FEATURE_FILE_SPEC_LINE_FOUND="false"
			if [[ "${INPUT_LINE}" =~ features[[:blank:]]in[[:blank:]]the[[:blank:]]([a-zA-Z0-9_-]+/[a-zA-Z0-9_-]+)[[:blank:]]repo ]]; then
				FEATURE_FILE_REPO="${BASH_REMATCH[1]}"
				echo "Features are expected to be in the ${FEATURE_FILE_REPO} repo"
  			FEATURE_FILE_SPEC_LINE_FOUND="true"
			fi
			if [[ "${INPUT_LINE}" =~ repo[[:blank:]]in[[:blank:]]the[[:blank:]]([a-zA-Z0-9_-]+/[a-zA-Z0-9_-]+/[a-zA-Z0-9_-]+)[[:blank:]]folder[[:blank:]]tree ]]; then
				FEATURE_FILE_PATH="${BASH_REMATCH[1]}"
				echo "Features are expected to be in the ${FEATURE_FILE_PATH} folder tree"
  			FEATURE_FILE_SPEC_LINE_FOUND="true"
			fi
			if [[ $FEATURE_FILE_SPEC_LINE_FOUND == "true" ]]; then
				continue
			fi
			# Match lines that have [someSuite/someName.feature:n] - the part inside the
			# brackets is the suite, feature and line number of the expected failure.
			# Else ignore the line.
			if [[ "${INPUT_LINE}" =~ \[([a-zA-Z0-9_-]+/[a-zA-Z0-9_-]+\.feature:[0-9]+)] ]]; then
				SUITE_SCENARIO_LINE="${BASH_REMATCH[1]}"
			else
				continue
			fi
			# Find the link in round-brackets that should be after the SUITE_SCENARIO_LINE
			if [[ "${INPUT_LINE}" =~ \(([a-zA-Z0-9:/.#_-]+)\) ]]; then
				ACTUAL_LINK="${BASH_REMATCH[1]}"
			else
				echo "Link not found in ${INPUT_LINE}"
				FINAL_EXIT_STATUS=1
				continue
			fi
			OLD_IFS=${IFS}
			IFS=':'
			read -ra FEATURE_PARTS <<< "${SUITE_SCENARIO_LINE}"
			IFS=${OLD_IFS}
			SUITE_FEATURE="${FEATURE_PARTS[0]}"
			FEATURE_LINE="${FEATURE_PARTS[1]}"
			EXPECTED_LINK="https://github.com/${FEATURE_FILE_REPO}/blob/master/${FEATURE_FILE_PATH}/${SUITE_FEATURE}#L${FEATURE_LINE}"
			if [[ "${ACTUAL_LINK}" != "${EXPECTED_LINK}" ]]; then
				echo "Link is not correct for ${SUITE_SCENARIO_LINE}"
				echo "  Actual link: ${ACTUAL_LINK}"
				echo "Expected link: ${EXPECTED_LINK}"
				FINAL_EXIT_STATUS=1
			fi

		done < ${EXPECTED_FAILURES_FILE}
else
	echo "Environment variable EXPECTED_FAILURES_FILE must be defined to be the file to check"
	exit 1
fi

if [ ${FINAL_EXIT_STATUS} == 1 ]
then
	echo "Errors were found in the expected failures file - see the messages above"
else
	echo "No problems were found in the expected failures file"
fi
exit ${FINAL_EXIT_STATUS}

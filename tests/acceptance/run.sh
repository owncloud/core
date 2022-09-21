#!/usr/bin/env bash
[[ "${DEBUG}" == "true" ]] && set -x

# from http://stackoverflow.com/a/630387
SCRIPT_PATH="`dirname \"$0\"`" # relative
SCRIPT_PATH="`( cd \"${SCRIPT_PATH}\" && pwd )`" # absolutized and normalized

echo 'Script path: '${SCRIPT_PATH}

OC_PATH=${SCRIPT_PATH}/../../
OCC=${OC_PATH}occ

# Allow optionally passing in the path to the behat program.
# This gives flexibility for callers that have installed their own behat
if [ -z "${BEHAT_BIN}" ]
then
	BEHAT=${OC_PATH}vendor-bin/behat/vendor/bin/behat
else
	BEHAT=${BEHAT_BIN}
fi
BEHAT_TAGS_OPTION_FOUND=false

if [ -n "${STEP_THROUGH}" ]
then
	STEP_THROUGH_OPTION="--step-through"
fi

# The following environment variables can be specified:
#
# ACCEPTANCE_TEST_TYPE - see "--type" description
# BEHAT_FEATURE - see "--feature" description
# BEHAT_FILTER_TAGS - see "--tags" description
# BEHAT_SUITE - see "--suite" description
# BEHAT_YML - see "--config" description
# BROWSER - see "--browser" description
# NORERUN - see "--norerun" description
# RERUN_FAILED_WEBUI_SCENARIOS - opposite of NORERUN
# RUN_PART and DIVIDE_INTO_NUM_PARTS - see "--part" description
# SHOW_OC_LOGS - see "--show-oc-logs" description
# TESTING_REMOTE_SYSTEM - see "--remote" description
# EXPECTED_FAILURES_FILE - a file that contains a list of the scenarios that are expected to fail

if [ -n "${EXPECTED_FAILURES_FILE}" ]
then
	# Check the expected-failures file
	${SCRIPT_PATH}/lint-expected-failures.sh
	LINT_STATUS=$?
	if [ ${LINT_STATUS} -ne 0 ]
	then
		echo "Error: expected failures file ${EXPECTED_FAILURES_FILE} is invalid"
		exit ${LINT_STATUS}
	fi
fi

# Default to testing a local system
if [ -z "${TESTING_REMOTE_SYSTEM}" ]
then
	TESTING_REMOTE_SYSTEM=false
fi

# Default to not show ownCloud logs
if [ -z "${SHOW_OC_LOGS}" ]
then
	SHOW_OC_LOGS=false
fi

# Default to re-run failed webUI scenarios
if [ -z "${RERUN_FAILED_WEBUI_SCENARIOS}" ]
then
	RERUN_FAILED_WEBUI_SCENARIOS=true
fi

# Allow callers to specify NORERUN=true as an environment variable
if [ "${NORERUN}" = true ]
then
	RERUN_FAILED_WEBUI_SCENARIOS=false
fi

# Default to API tests
# Note: if a specific feature or suite is also specified, then the acceptance
#       test type is deduced from the suite name, and this environment variable
#       ACCEPTANCE_TEST_TYPE is overridden.
if [ -z "${ACCEPTANCE_TEST_TYPE}" ]
then
	ACCEPTANCE_TEST_TYPE="api"
fi

# Look for command line options for:
# -c or --config - specify a behat.yml to use
# --feature - specify a single feature to run
# --suite - specify a single suite to run
# --type - api, cli or webui - if no individual feature or suite is specified, then
#          specify the type of acceptance tests to run. Default api.
# --tags - specify tags for scenarios to run (or not)
# --browser - for webUI tests, which browser to use. "chrome", "firefox",
#             "internet explorer" and "MicrosoftEdge" are possible.
# --remote - the server under test is remote, so we cannot locally enable the
#            testing app. We have to assume it is already enabled.
# --show-oc-logs - tail the ownCloud log after the test run
# --norerun - do not rerun failed webUI scenarios
# --loop - loop tests for given number of times. Only use it for debugging purposes
# --part - run a subset of scenarios, need two numbers.
#          first number: which part to run
#          second number: in how many parts to divide the set of scenarios
# --step-through - pause after each test step

# Command line options processed here will override environment variables that
# might have been set by the caller, or in the code above.
while [[ $# -gt 0 ]]
do
	key="$1"
	case ${key} in
		-c|--config)
			BEHAT_YML="$2"
			shift
			;;
		--feature)
			BEHAT_FEATURE="$2"
			shift
			;;
		--suite)
			BEHAT_SUITE="$2"
			shift
			;;
		--loop)
			BEHAT_RERUN_TIMES="$2"
			shift
			;;
		--type)
			# Lowercase the parameter value, so the user can provide "API", "CLI", "webUI" etc
			ACCEPTANCE_TEST_TYPE="${2,,}"
			shift
			;;
		--tags)
			BEHAT_FILTER_TAGS="$2"
			BEHAT_TAGS_OPTION_FOUND=true
			shift
			;;
		--browser)
			BROWSER="$2"
			shift
			;;
		--part)
			RUN_PART="$2"
			DIVIDE_INTO_NUM_PARTS="$3"
			if [ ${RUN_PART} -gt ${DIVIDE_INTO_NUM_PARTS} ]
			then
				echo "cannot run part ${RUN_PART} of ${DIVIDE_INTO_NUM_PARTS}"
				exit 1
			fi
			shift 2
			;;
		--remote)
			TESTING_REMOTE_SYSTEM=true
			;;
		--show-oc-logs)
			SHOW_OC_LOGS=true
			;;
		--norerun)
			RERUN_FAILED_WEBUI_SCENARIOS=false
			;;
		--step-through)
			STEP_THROUGH_OPTION="--step-through"
			;;
		*)
			# A "random" parameter is presumed to be a feature file to run.
			# Typically that will be specified at the end, or as the only
			# parameter.
			BEHAT_FEATURE="$1"
			;;
	esac
	shift
done

# Save the current language and set the language to "C"
# We want to have it all in english to be able to parse outputs
OLD_LANG=${LANG}
export LANG=C

# @param $1 admin authentication string username:password
# @param $2 occ url
# @param $3 command
# sets $REMOTE_OCC_STDOUT and $REMOTE_OCC_STDERR from returned xml data
# @return occ return code given in the xml data
function remote_occ() {
	if [ "${TEST_OCIS}" == "true" ] || [ "${TEST_REVA}" == "true" ]
	then
		return 0
	fi
	COMMAND=`echo $3 | xargs`
	CURL_OCC_RESULT=`curl -k -s -u $1 $2 -d "command=${COMMAND}"`
	# xargs is (miss)used to trim the output
	RETURN=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string(ocs/data/code)" - | xargs`
	# We could not find a proper return of the testing app, so something went wrong
	if [ -z "${RETURN}" ]
	then
		RETURN=1
		REMOTE_OCC_STDERR=${CURL_OCC_RESULT}
	else
		REMOTE_OCC_STDOUT=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string(ocs/data/stdOut)" - | xargs`
		REMOTE_OCC_STDERR=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string(ocs/data/stdErr)" - | xargs`
	fi
	return ${RETURN}
}

# @param $1 admin authentication string username:password
# @param $2 occ url (without /bulk appendix)
# @param $3 commands
# exists with 1 and sets $REMOTE_OCC_STDERR if any of the occ commands returned a non-zero code
function remote_bulk_occ() {
	if [ "${TEST_OCIS}" == "true" ] || [ "${TEST_REVA}" == "true" ]
	then
		return 0
	fi
	CURL_OCC_RESULT=`curl -k -s -u $1 $2/bulk -d "${3}"`
	COUNT_RESULTS=`echo ${CURL_OCC_RESULT} | xmllint --xpath "ocs/data/element/code" - | wc -l`

	RETURN=0
	REMOTE_OCC_STDERR=""
	for ((n=1;n<=${COUNT_RESULTS};n++))
	do
		EXIT_CODE=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string((ocs/data/element/code)[${n}])" -`
		if [ ${EXIT_CODE} -ne 0 ]
		then
			REMOTE_OCC_STDERR+=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string((ocs/data/element/stdErr)[${n}])" - | xargs`
			REMOTE_OCC_STDERR+="\n"
			RETURN=1
		fi

	done
	return ${RETURN}
}

# @param $1 admin authentication string username:password
# @param $2 occ url
# @param $3 directory to create, relative to the server's root
# sets $REMOTE_OCC_STDOUT and $REMOTE_OCC_STDERR from returned xml data
# @return return code given in the xml data
function remote_dir() {
	COMMAND=`echo $3 | xargs`
	CURL_OCC_RESULT=`curl -k -s -u $1 $2 -d "dir=${COMMAND}"`
	# xargs is (miss)used to trim the output
	HTTP_STATUS=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string(ocs/meta/statuscode)" - | xargs`
	# We could not find a proper return of the testing app, so something went wrong
	if [ -z "${HTTP_STATUS}" ]
	then
		RETURN=1
		REMOTE_OCC_STDERR=${CURL_OCC_RESULT}
	else
		if [ "${HTTP_STATUS}" = 200 ]
		then
			RETURN=0
		else
			RETURN=1
			REMOTE_OCC_STDERR=${CURL_OCC_RESULT}
		fi
	fi
	return ${RETURN}
}

# $1 admin auth as needed for curl
# $2 full URL of the occ command in the testing app
# $3 system|app
# $4 app-name if app used
# $5 setting name
# $6 type of the variable to set it back correctly (optional)
# adds a new element to the array PREVIOUS_SETTINGS
# PREVIOUS_SETTINGS will be an array of strings containing:
# URL;system|app;app-name;setting-name;value;variable-type
function save_config_setting() {
	remote_occ $1 $2 "--no-warnings config:$3:get $4 $5"
	PREVIOUS_SETTINGS+=("$2;$3;$4;$5;${REMOTE_OCC_STDOUT};$6")
}

declare -a PREVIOUS_SETTINGS

# get the sub path from an URL
# $1 the full URL including the protocol
# echos the path without trailing slash
function get_path_from_url() {
	PROTOCOL="$(echo $1 | grep :// | sed -e's,^\(.*://\).*,\1,g')"
	URL="$(echo ${1/$PROTOCOL/})"
	PATH="$(echo ${URL} | grep / | cut -d/ -f2-)"
	echo ${PATH%/}
}

# check that server is up and working correctly
# $1 the full URL including the protocol
# exits if server is not working correctly (by pinging status.php), otherwise returns
function assert_server_up() {
	curl -k -sSf -L $1/status.php -o /dev/null
	if [[ $? -eq 0 ]]
	then
		return
	else
		echo >&2 "Server on $1 is down or not working correctly."
		exit 98
	fi
}

# check that testing app is installed
# $1 the full URL including the protocol
# if testing app is not installed, this returns 500 status code
# we are not sending request with auth, so if it is installed 401 Not Authorized is returned.
# anyway, if it's not 500, assume testing app is installed and move on.
# Otherwise, print to stderr and exit.
function assert_testing_app_enabled() {
	CURL_RESULT=`curl -s $1/ocs/v2.php/apps/testing/api/v1/app/testing -o /dev/null -w "%{http_code}"`
	if [[ ${CURL_RESULT} -eq 500 ]]
	then
		echo >&2 "Testing app is not enabled on the server on $1."
		echo >&2 "Please install and enable it to run the tests."
		exit 98
	else
		return
	fi
}

# check if certain apache_module is enabled
# $1 admin authentication string username:password
# $2 the full url to the testing app on the server to check
# $3 Module to check for
# $4 text description of the server being checked, e.g. "local", "remote"
# return 0 if given module is enabled, else return with 1
function check_apache_module_enabled() {
	if [ "${TEST_OCIS}" == "true" ] || [ "${TEST_REVA}" == "true" ]
	then
		return 0
	fi
	# test if mod_rewrite is enabled
	CURL_RESULT=`curl -k -s -u $1 $2apache_modules/$3`
	STATUS_CODE=`echo ${CURL_RESULT} | xmllint --xpath "string(ocs/meta/statuscode)" -`
	if [[ ${STATUS_CODE} -ne 200 ]]
	then
		echo -n "Could not reliably determine if '$3' module is enabled on the $4 server, because "
		echo ${CURL_RESULT} | xmllint --xpath "string(ocs/meta/message)" -
		echo ""
		return 1
	fi
	return 0
}

# Provide a default admin username and password.
# But let the caller pass them if they wish
if [ -z "${ADMIN_USERNAME}" ]
then
	ADMIN_USERNAME="admin"
fi

if [ -z "${ADMIN_PASSWORD}" ]
then
	ADMIN_PASSWORD="admin"
fi

ADMIN_AUTH="${ADMIN_USERNAME}:${ADMIN_PASSWORD}"

export ADMIN_USERNAME
export ADMIN_PASSWORD

if [ -z "${BEHAT_RERUN_TIMES}" ]
then
	BEHAT_RERUN_TIMES=1
fi

function env_alt_home_enable {
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:app:set testing enable_alt_user_backend --value yes"
}

function env_alt_home_clear {
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "app:disable testing" || { echo "Unable to disable testing app" >&2; exit 1; }
}

# expected variables
# --------------------
# $SUITE_FEATURE_TEXT - human readable which test to run
# $BEHAT_SUITE_OPTION - suite setting with "--suite" or empty if all suites have to be run
# $BEHAT_FEATURE - feature file, or empty
# $BEHAT_FILTER_TAGS - list of tags
# $BEHAT_TAGS_OPTION_FOUND
# $BROWSER_TEXT
# $BROWSER_VERSION_TEXT
# $PLATFORM_TEXT
# $TEST_LOG_FILE
# $BEHAT - behat executable
# $BEHAT_YML
# $RUNNING_WEBUI_TESTS
# $RERUN_FAILED_WEBUI_SCENARIOS
#
# set arrays
# ---------------
# $UNEXPECTED_FAILED_SCENARIOS array of scenarios that failed unexpectedly
# $UNEXPECTED_PASSED_SCENARIOS array of scenarios that passed unexpectedly (while running with expected-failures.txt)

declare -a UNEXPECTED_FAILED_SCENARIOS
declare -a UNEXPECTED_PASSED_SCENARIOS
declare -a UNEXPECTED_BEHAT_EXIT_STATUSES

function run_behat_tests() {
	echo "Running ${SUITE_FEATURE_TEXT} tests tagged ${BEHAT_FILTER_TAGS} ${BROWSER_TEXT}${BROWSER_VERSION_TEXT}${PLATFORM_TEXT}" | tee ${TEST_LOG_FILE}

	if [ "${REPLACE_USERNAMES}" == "true" ]
	then
		echo "Usernames and attributes in tests are being replaced:"
		cat ${SCRIPT_PATH}/usernames.json
	fi

	${BEHAT} --colors --strict ${STEP_THROUGH_OPTION} -c ${BEHAT_YML} -f pretty ${BEHAT_SUITE_OPTION} --tags ${BEHAT_FILTER_TAGS} ${BEHAT_FEATURE} -v 2>&1 | tee -a ${TEST_LOG_FILE}

	BEHAT_EXIT_STATUS=${PIPESTATUS[0]}

	# remove nullbytes from the test log
	TEMP_CONTENT=$(tr < ${TEST_LOG_FILE} -d '\000')
	OLD_IFS="${IFS}"
	IFS=""
	echo ${TEMP_CONTENT} > ${TEST_LOG_FILE}
	IFS="${OLD_IFS}"

	# Find the count of scenarios that passed
	SCENARIO_RESULTS_COLORED=`grep -Ea '^[0-9]+[[:space:]]scenario(|s)[[:space:]]\(' ${TEST_LOG_FILE}`
	SCENARIO_RESULTS=$(echo "${SCENARIO_RESULTS_COLORED}" | sed "s/\x1b[^m]*m//g")
	if [ ${BEHAT_EXIT_STATUS} -eq 0 ]
	then
		# They (SCENARIO_RESULTS) all passed, so just get the first number.
		# The text looks like "1 scenario (1 passed)" or "123 scenarios (123 passed)"
		[[ ${SCENARIO_RESULTS} =~ ([0-9]+) ]]
		SCENARIOS_THAT_PASSED=$((SCENARIOS_THAT_PASSED + BASH_REMATCH[1]))
	else
		# "Something went wrong" with the Behat run (non-zero exit status).
		# If there were "ordinary" test fails, then we process that later. Maybe they are all "expected failures".
		# But if there were steps in a feature file that are undefined, we want to fail immediately.
		# So exit the tests and do not lint expected failures when undefined steps exist.
		if [[ ${SCENARIO_RESULTS} == *"undefined"* ]]
		then
			echo -e "\033[31m Undefined steps: There were some undefined steps found."
			exit 1
		fi
		# If there were no scenarios in the requested suite or feature that match
		# the requested combination of tags, then Behat exits with an error status
		# and reports "No scenarios" in its output.
		# This can happen, for example, when running core suites from an app and
		# requesting some tag combination that does not happen frequently. Then
		# sometimes there may not be any matching scenarios in one of the suites.
		# In this case, consider the test has passed.
		MATCHING_COUNT=`grep -ca '^No scenarios$' ${TEST_LOG_FILE}`
		if [ ${MATCHING_COUNT} -eq 1 ]
		then
			echo "Information: no matching scenarios were found."
			BEHAT_EXIT_STATUS=0
		else
			# Find the count of scenarios that passed and failed
			SCENARIO_RESULTS_COLORED=`grep -Ea '^[0-9]+[[:space:]]scenario(|s)[[:space:]]\(' ${TEST_LOG_FILE}`
			SCENARIO_RESULTS=$(echo "${SCENARIO_RESULTS_COLORED}" | sed "s/\x1b[^m]*m//g")
			if [[ ${SCENARIO_RESULTS} =~ [0-9]+[^0-9]+([0-9]+)[^0-9]+([0-9]+)[^0-9]+ ]]
			then
				# Some passed and some failed, we got the second and third numbers.
				# The text looked like "15 scenarios (6 passed, 9 failed)"
				SCENARIOS_THAT_PASSED=$((SCENARIOS_THAT_PASSED + BASH_REMATCH[1]))
				SCENARIOS_THAT_FAILED=$((SCENARIOS_THAT_FAILED + BASH_REMATCH[2]))
			elif [[ ${SCENARIO_RESULTS} =~ [0-9]+[^0-9]+([0-9]+)[^0-9]+ ]]
			then
				# All failed, we got the second number.
				# The text looked like "4 scenarios (4 failed)"
				SCENARIOS_THAT_FAILED=$((SCENARIOS_THAT_FAILED + BASH_REMATCH[1]))
			fi
		fi
	fi

	FAILED_SCENARIO_PATHS_COLORED=`awk '/Failed scenarios:/',0 ${TEST_LOG_FILE} | grep -a feature`
	# There will be some ANSI escape codes for color in the FEATURE_COLORED var.
	# Strip them out so we can pass just the ordinary feature details to Behat.
	# Thanks to https://en.wikipedia.org/wiki/Tee_(command) and
	# https://stackoverflow.com/questions/23416278/how-to-strip-ansi-escape-sequences-from-a-variable
	# for ideas.
	FAILED_SCENARIO_PATHS=$(echo "${FAILED_SCENARIO_PATHS_COLORED}" | sed "s/\x1b[^m]*m//g")

	# If something else went wrong, and there were no failed scenarios,
	# then the awk, grep, sed command sequence above ends up with an empty string.
	# Unset FAILED_SCENARIO_PATHS to avoid later code thinking that there might be
	# one failed scenario.
	if [ -z "${FAILED_SCENARIO_PATHS}" ]
	then
		unset FAILED_SCENARIO_PATHS
	fi

	if [ -n "${EXPECTED_FAILURES_FILE}" ]
	then
		if [ -n "${BEHAT_SUITE_TO_RUN}" ]
		then
			echo "Checking expected failures for suite ${BEHAT_SUITE_TO_RUN}"
		else
			echo "Checking expected failures"
		fi

		# Check that every failed scenario is in the list of expected failures
		for FAILED_SCENARIO_PATH in ${FAILED_SCENARIO_PATHS}
			do
				SUITE_PATH=`dirname ${FAILED_SCENARIO_PATH}`
				SUITE=`basename ${SUITE_PATH}`
				SCENARIO=`basename ${FAILED_SCENARIO_PATH}`
				SUITE_SCENARIO="${SUITE}/${SCENARIO}"
				grep "\[${SUITE_SCENARIO}\]" "${EXPECTED_FAILURES_FILE}" > /dev/null
				if [ $? -ne 0 ]
				then
					echo "Error: Scenario ${SUITE_SCENARIO} failed but was not expected to fail."
					UNEXPECTED_FAILED_SCENARIOS+=("${SUITE_SCENARIO}")
				fi
			done

		# Check that every scenario in the list of expected failures did fail
		while read SUITE_SCENARIO
			do
				# Ignore comment lines (starting with hash)
				if [[ "${SUITE_SCENARIO}" =~ ^# ]]
				then
					continue
				fi
				# Match lines that have [someSuite/someName.feature:n] - the part inside the
				# brackets is the suite, feature and line number of the expected failure.
				# Else ignore the line.
				if [[ "${SUITE_SCENARIO}" =~ \[([a-zA-Z0-9-]+/[a-zA-Z0-9-]+\.feature:[0-9]+)] ]]; then
					SUITE_SCENARIO="${BASH_REMATCH[1]}"
				else
					continue
				fi
				if [ -n "${BEHAT_SUITE_TO_RUN}" ]
				then
					# If the expected failure is not in the suite that is currently being run,
					# then do not try and check that it failed.
					REGEX_TO_MATCH="^${BEHAT_SUITE_TO_RUN}/"
					if ! [[ "${SUITE_SCENARIO}" =~ ${REGEX_TO_MATCH} ]]
					then
						continue
					fi
				fi

				# look for the expected suite-scenario at the end of a line in the
				# FAILED_SCENARIO_PATHS - for example looking for apiComments/comments.feature:9
				# we want to match lines like:
				# tests/acceptance/features/apiComments/comments.feature:9
				# but not lines like::
				# tests/acceptance/features/apiComments/comments.feature:902
				echo "${FAILED_SCENARIO_PATHS}" | grep ${SUITE_SCENARIO}$ > /dev/null
				if [ $? -ne 0 ]
				then
					echo "Info: Scenario ${SUITE_SCENARIO} was expected to fail but did not fail."
					UNEXPECTED_PASSED_SCENARIOS+=("${SUITE_SCENARIO}")
				fi
			done < ${EXPECTED_FAILURES_FILE}
	else
		for FAILED_SCENARIO_PATH in ${FAILED_SCENARIO_PATHS}
		do
			SUITE_PATH=$(dirname "${FAILED_SCENARIO_PATH}")
			SUITE=$(basename "${SUITE_PATH}")
			SCENARIO=$(basename "${FAILED_SCENARIO_PATH}")
			SUITE_SCENARIO="${SUITE}/${SCENARIO}"
			UNEXPECTED_FAILED_SCENARIOS+=("${SUITE_SCENARIO}")
		done
	fi

	if [ ${BEHAT_EXIT_STATUS} -ne 0 ] && [ ${#FAILED_SCENARIO_PATHS[@]} -eq 0 ]
	then
		# Behat had some problem and there were no failed scenarios reported
		# So the problem is something else.
		# Possibly there were missing step definitions. Or Behat crashed badly, or...
		UNEXPECTED_BEHAT_EXIT_STATUSES+=("${SUITE_FEATURE_TEXT} had behat exit status ${BEHAT_EXIT_STATUS}")
	fi

	# With webUI tests, we try running failed tests again.
	if [ ${#UNEXPECTED_FAILED_SCENARIOS[@]} -gt 0 ] && [ "${RUNNING_WEBUI_TESTS}" = true ] && [ "${RERUN_FAILED_WEBUI_SCENARIOS}" = true ]
	then
		echo "webUI test run failed with exit status: ${BEHAT_EXIT_STATUS}"
		FAILED_SCENARIO_PATHS_COLORED=`awk '/Failed scenarios:/',0 ${TEST_LOG_FILE} | grep feature`
		# There will be some ANSI escape codes for color in the FEATURE_COLORED var.
		# Strip them out so we can pass just the ordinary feature details to Behat.
		# Thanks to https://en.wikipedia.org/wiki/Tee_(command) and
		# https://stackoverflow.com/questions/23416278/how-to-strip-ansi-escape-sequences-from-a-variable
		# for ideas.
		FAILED_SCENARIO_PATHS=$(echo "${FAILED_SCENARIO_PATHS_COLORED}" | sed "s/\x1b[^m]*m//g")

		# If something else went wrong, and there were no failed scenarios,
		# then the awk, grep, sed command sequence above ends up with an empty string.
		# Unset FAILED_SCENARIO_PATHS to avoid later code thinking that there might be
		# one failed scenario.
		if [ -z "${FAILED_SCENARIO_PATHS}" ]
		then
			unset FAILED_SCENARIO_PATHS
			FAILED_SCENARIO_PATHS=()
		fi

		for FAILED_SCENARIO_PATH in ${FAILED_SCENARIO_PATHS}
			do
				SUITE_PATH=`dirname ${FAILED_SCENARIO_PATH}`
				SUITE=`basename ${SUITE_PATH}`
				SCENARIO=`basename ${FAILED_SCENARIO_PATH}`
				SUITE_SCENARIO="${SUITE}/${SCENARIO}"

				if [ -n "${EXPECTED_FAILURES_FILE}" ]
				then
					grep -x ${SUITE_SCENARIO} ${EXPECTED_FAILURES_FILE} > /dev/null
					if [ $? -eq 0 ]
					then
						echo "Notice: Scenario ${SUITE_SCENARIO} is expected to fail so do not rerun it."
						continue
					fi
				fi

				echo "Rerun failed scenario: ${FAILED_SCENARIO_PATH}"
				${BEHAT} --colors --strict -c ${BEHAT_YML} -f pretty ${BEHAT_SUITE_OPTION} --tags ${BEHAT_FILTER_TAGS} ${FAILED_SCENARIO_PATH} -v 2>&1 | tee -a ${TEST_LOG_FILE}
				BEHAT_EXIT_STATUS=${PIPESTATUS[0]}
				if [ ${BEHAT_EXIT_STATUS} -eq 0 ]
				then
					# The scenario was not expected to fail but had failed and is present in the
					# unexpected_failures list. We've checked the scenario with a re-run and
					# it passed. So remove it from the unexpected_failures list.
					for i in "${!UNEXPECTED_FAILED_SCENARIOS[@]}"
					do
						if [ "${UNEXPECTED_FAILED_SCENARIOS[i]}" == "$SUITE_SCENARIO" ]
						then
							unset "UNEXPECTED_FAILED_SCENARIOS[i]"
						fi
					done
				else
					echo "webUI test rerun failed with exit status: ${BEHAT_EXIT_STATUS}"
					# The scenario is not expected to fail but is failing also after the rerun.
					# Since it is already reported in the unexpected_failures list, there is no
					# need to touch that again. Continue processing the next scenario to rerun.
				fi
			done
	fi

	if [ "${BEHAT_TAGS_OPTION_FOUND}" != true ]
	then
		# The behat run specified to skip scenarios tagged @skip
		# Report them in a dry-run so they can be seen
		# Big red error output is displayed if there are no matching scenarios - send it to null
		DRY_RUN_FILE=$(mktemp)
		SKIP_TAGS="${TEST_TYPE_TAG}&&@skip"
		${BEHAT} --dry-run --colors -c ${BEHAT_YML} -f pretty ${BEHAT_SUITE_OPTION} --tags "${SKIP_TAGS}" ${BEHAT_FEATURE} 1>${DRY_RUN_FILE} 2>/dev/null
		if grep -q -m 1 'No scenarios' "${DRY_RUN_FILE}"
		then
			# If there are no skip scenarios, then no need to report that
			:
		else
			echo ""
			echo "The following tests were skipped because they are tagged @skip:"
			cat "${DRY_RUN_FILE}" | tee -a ${TEST_LOG_FILE}
		fi
		rm -f "${DRY_RUN_FILE}"
	fi
}

function teardown() {
	# Enable any apps that were disabled for the test run
	for i in "${!APPS_TO_REENABLE[@]}"
	do
		read -r -a APP <<< "${APPS_TO_REENABLE[$i]}"
		remote_occ ${ADMIN_AUTH} ${APP[0]} "--no-warnings app:enable ${APP[1]}"
	done

	# Disable any apps that were enabled for the test run
	for i in "${!APPS_TO_REDISABLE[@]}"
	do
		read -r -a APP <<< "${APPS_TO_REDISABLE[$i]}"
		remote_occ ${ADMIN_AUTH} ${APP[0]} "--no-warnings app:disable ${APP[1]}"
	done

	# Put back settings that were set for the test-run
	for i in "${!PREVIOUS_SETTINGS[@]}"
	do
		PREVIOUS_IFS=${IFS}
		IFS=';'
		read -r -a SETTING <<< "${PREVIOUS_SETTINGS[$i]}"
		IFS=${PREVIOUS_IFS}
		if [ -z "${SETTING[4]}" ]
		then
			remote_occ ${ADMIN_AUTH} ${SETTING[0]} "config:${SETTING[1]}:delete ${SETTING[2]} ${SETTING[3]}"
		else
			TYPE_STRING=""
			if [ -n "${SETTING[5]}" ]
			then
				#place the space here not in the command line, so that there is no space if the string is empty
				TYPE_STRING=" --type ${SETTING[5]}"
			fi
			remote_occ ${ADMIN_AUTH} ${SETTING[0]} "config:${SETTING[1]}:set ${SETTING[2]} ${SETTING[3]} --value=${SETTING[4]}${TYPE_STRING}"
		fi
	done

	# Put back state of the testing app
	if [ "${TESTING_ENABLED_BY_SCRIPT}" = true ]
	then
		${OCC} app:disable testing
	fi

	if [ "${OC_TEST_ALT_HOME}" = "1" ]
	then
		env_alt_home_clear
	fi

	if [ "${TEST_WITH_PHPDEVSERVER}" == "true" ]
	then
		kill ${PHPPID}
		kill ${PHPPID_FED}
	fi

	if [ "${SHOW_OC_LOGS}" = true ]
	then
		tail "${OC_PATH}/data/owncloud.log"
	fi

	# Reset the original language
	export LANG=${OLD_LANG}

	rm -f "${TEST_LOG_FILE}"

	echo "runsh: Exit code of main run: ${BEHAT_EXIT_STATUS}"
}

declare -x TEST_SERVER_URL
declare -x TEST_SERVER_FED_URL
declare -x TEST_WITH_PHPDEVSERVER
[[ -z "${TEST_SERVER_URL}" && -z "${TEST_SERVER_FED_URL}" ]] && TEST_WITH_PHPDEVSERVER="true"

if [ -z "${IPV4_URL}" ]
then
	IPV4_URL="${TEST_SERVER_URL}"
fi

if [ -z "${IPV6_URL}" ]
then
	IPV6_URL="${TEST_SERVER_URL}"
fi

if [ "${TEST_WITH_PHPDEVSERVER}" != "true" ]
then
	# The endpoint to use to do occ commands via the testing app
	# set it already here, so it can be used for remote_occ
	# we know the TEST_SERVER_URL already
	TESTING_APP_URL="${TEST_SERVER_URL}/ocs/v2.php/apps/testing/api/v1/"
	OCC_URL="${TESTING_APP_URL}occ"
	# test that server is up and running, and testing app is enabled.
	assert_server_up ${TEST_SERVER_URL}
	if [ "${TEST_OCIS}" != "true" ] && [ "${TEST_REVA}" != "true" ]
	then
		assert_testing_app_enabled ${TEST_SERVER_URL}
	fi

	if [ -n "${TEST_SERVER_FED_URL}" ]
	then
		TESTING_APP_FED_URL="${TEST_SERVER_FED_URL}/ocs/v2.php/apps/testing/api/v1/"
		OCC_FED_URL="${TESTING_APP_FED_URL}occ"
		# test that fed server is up and running, and testing app is enabled.
		assert_server_up ${TEST_SERVER_FED_URL}
		if [ "${TEST_OCIS}" != "true" ] && [ "${TEST_REVA}" != "true" ]
		then
			assert_testing_app_enabled ${TEST_SERVER_URL}
		fi
	fi

	echo "Not using php inbuilt server for running scenario ..."
	echo "Updating .htaccess for proper rewrites"
	#get the sub path of the webserver and set the correct RewriteBase
	WEBSERVER_PATH=$(get_path_from_url ${TEST_SERVER_URL})
	HTACCESS_UPDATE_FAILURE_MSG="Could not update .htaccess in local server. Some tests might fail as a result."
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set htaccess.RewriteBase --value /${WEBSERVER_PATH}/"
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "maintenance:update:htaccess"
	[[ $? -eq 0 ]] || { echo "${HTACCESS_UPDATE_FAILURE_MSG}"; }
	# check if mod_rewrite module is enabled
	check_apache_module_enabled ${ADMIN_AUTH} ${TESTING_APP_URL} "mod_rewrite" "local"

	if [ -n "${TEST_SERVER_FED_URL}" ]
	then
		WEBSERVER_PATH=$(get_path_from_url ${TEST_SERVER_FED_URL})
		remote_occ ${ADMIN_AUTH} ${OCC_FED_URL} "config:system:set htaccess.RewriteBase --value /${WEBSERVER_PATH}/"
		remote_occ ${ADMIN_AUTH} ${OCC_FED_URL} "maintenance:update:htaccess"
		[[ $? -eq 0 ]] || { echo "${HTACCESS_UPDATE_FAILURE_MSG/local/federated}"; }
		# check if mod_rewrite module is enabled
		check_apache_module_enabled ${ADMIN_AUTH} ${TESTING_APP_FED_URL} "mod_rewrite" "remote"
	fi
else
	echo "Using php inbuilt server for running scenario ..."

	# Avoid port collision on jenkins - use $EXECUTOR_NUMBER
	declare -x EXECUTOR_NUMBER
	[[ -z "${EXECUTOR_NUMBER}" ]] && EXECUTOR_NUMBER=0

	PORT=$((8080 + ${EXECUTOR_NUMBER}))
	echo ${PORT}
	php -S localhost:${PORT} -t "${OC_PATH}" &
	PHPPID=$!
	echo ${PHPPID}

	PORT_FED=$((8180 + ${EXECUTOR_NUMBER}))
	echo ${PORT_FED}
	php -S localhost:${PORT_FED} -t ../.. &
	PHPPID_FED=$!
	echo ${PHPPID_FED}

	export TEST_SERVER_URL="http://localhost:${PORT}"
	export TEST_SERVER_FED_URL="http://localhost:${PORT_FED}"

	# The endpoint to use to do occ commands via the testing app
	TESTING_APP_URL="${TEST_SERVER_URL}/ocs/v2.php/apps/testing/api/v1/"
	OCC_URL="${TESTING_APP_URL}occ"

	# Give time for the PHP dev server to become available
	# because we want to use it to get and change settings with the testing app
	sleep 5
fi

# If a feature file has been specified but no suite, then deduce the suite
if [ -n "${BEHAT_FEATURE}" ] && [ -z "${BEHAT_SUITE}" ]
then
	SUITE_PATH=`dirname ${BEHAT_FEATURE}`
	BEHAT_SUITE=`basename ${SUITE_PATH}`
fi

if [ -z "${BEHAT_YML}" ]
then
	# Look for a behat.yml somewhere below the current working directory
	# This saves app acceptance tests being forced to specify BEHAT_YML
	BEHAT_YML="config/behat.yml"
	if [ ! -f "${BEHAT_YML}" ]
	then
		BEHAT_YML="acceptance/config/behat.yml"
	fi
	if [ ! -f "${BEHAT_YML}" ]
	then
		BEHAT_YML="tests/acceptance/config/behat.yml"
	fi
	# If no luck above, then use the core behat.yml that should live below this script
	if [ ! -f "${BEHAT_YML}" ]
	then
		BEHAT_YML="${SCRIPT_PATH}/config/behat.yml"
	fi
fi

BEHAT_CONFIG_DIR=$(dirname "${BEHAT_YML}")
ACCEPTANCE_DIR=$(dirname "${BEHAT_CONFIG_DIR}")
BEHAT_FEATURES_DIR="${ACCEPTANCE_DIR}/features"

declare -a BEHAT_SUITES
if [[ -n "${BEHAT_SUITE}" ]]
then
	BEHAT_SUITES+=(${BEHAT_SUITE})
else
	if [[ -n "${RUN_PART}" ]]
	then
		ALL_SUITES=`find ${BEHAT_FEATURES_DIR}/ -type d -iname ${ACCEPTANCE_TEST_TYPE}* | sort | rev | cut -d"/" -f1 | rev`
		COUNT_ALL_SUITES=`echo "${ALL_SUITES}" | wc -l`
		#divide the suites letting it round down (could be zero)
		MIN_SUITES_PER_RUN=$((${COUNT_ALL_SUITES} / ${DIVIDE_INTO_NUM_PARTS}))
		#some jobs might need an extra suite
		MAX_SUITES_PER_RUN=$((${MIN_SUITES_PER_RUN} + 1))
		# the remaining number of suites that need to be distributed (could be zero)
		REMAINING_SUITES=$((${COUNT_ALL_SUITES} - (${DIVIDE_INTO_NUM_PARTS} * ${MIN_SUITES_PER_RUN})))

		if [[ ${RUN_PART} -le ${REMAINING_SUITES} ]]
		then
			SUITES_THIS_RUN=${MAX_SUITES_PER_RUN}
			SUITES_IN_PREVIOUS_RUNS=$((${MAX_SUITES_PER_RUN} * (${RUN_PART} - 1)))
		else
			SUITES_THIS_RUN=${MIN_SUITES_PER_RUN}
			SUITES_IN_PREVIOUS_RUNS=$((((${MAX_SUITES_PER_RUN} * ${REMAINING_SUITES}) + (${MIN_SUITES_PER_RUN} * (${RUN_PART} - ${REMAINING_SUITES} - 1)))))
		fi

		if [ ${SUITES_THIS_RUN} -eq 0 ]
		then
			echo "there are only ${COUNT_ALL_SUITES} suites, nothing to do in part ${RUN_PART}"
			teardown
			exit 0
		fi

		COUNT_FINISH_AND_TODO_SUITES=$((${SUITES_IN_PREVIOUS_RUNS} + ${SUITES_THIS_RUN}))
		BEHAT_SUITES+=(`echo "${ALL_SUITES}" | head -n ${COUNT_FINISH_AND_TODO_SUITES} | tail -n ${SUITES_THIS_RUN}`)
	fi
fi

# If the suite name begins with "webUI" or the user explicitly specified type "webui"
# then we will setup for webUI testing and run tests tagged as @webUI,
# otherwise it is API tests.
# Currently, running both API and webUI tests in a single run is not supported.
if [[ "${BEHAT_SUITE}" == webUI* ]] || [ "${ACCEPTANCE_TEST_TYPE}" = "webui" ]
then
	TEST_TYPE_TAG="@webUI"
	TEST_TYPE_TEXT="webUI"
	RUNNING_API_TESTS=false
	RUNNING_CLI_TESTS=false
	RUNNING_WEBUI_TESTS=true
elif [[ "${BEHAT_SUITE}" == cli* ]] || [ "${ACCEPTANCE_TEST_TYPE}" = "cli" ]
then
	TEST_TYPE_TAG="@cli"
	TEST_TYPE_TEXT="cli"
	RUNNING_API_TESTS=false
	RUNNING_CLI_TESTS=true
	RUNNING_WEBUI_TESTS=false
else
	TEST_TYPE_TAG="@api"
	TEST_TYPE_TEXT="API"
	RUNNING_API_TESTS=true
	RUNNING_CLI_TESTS=false
	RUNNING_WEBUI_TESTS=false
fi

# Always have one of "@api", "@cli" or "@webUI" filter tags
if [ -z "${BEHAT_FILTER_TAGS}" ]
then
	BEHAT_FILTER_TAGS="${TEST_TYPE_TAG}"
else
	# Be nice to the caller
	# Remove any extra "&&" at the end of their tags list
	BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS%&&}"
	# Remove any extra "&&" at the beginning of their tags list
	BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS#&&}"
	BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS}&&${TEST_TYPE_TAG}"
fi

# MAILHOG_HOST defines where the system-under-test can find the MailHog server
# for sending email.
if [ -z "${MAILHOG_HOST}" ]
then
	MAILHOG_HOST="127.0.0.1"
fi

# LOCAL_MAILHOG_HOST defines where this test script can find the MailHog server
# for sending email. When testing a remote system, the MailHog server somewhere
# "in the middle" might have a different host name from the point of view of
# the test script.
if [ -z "${LOCAL_MAILHOG_HOST}" ]
then
	LOCAL_MAILHOG_HOST="${MAILHOG_HOST}"
fi

if [ -z "${MAILHOG_SMTP_PORT}" ]
then
	MAILHOG_SMTP_PORT="1025"
fi

if [ -z "${SELENIUM_HOST}" ]
then
	SELENIUM_HOST=localhost
fi

if [ -z "${SELENIUM_PORT}" ]
then
	SELENIUM_PORT=4445
fi

if [ -z "${BROWSER}" ]
then
	BROWSER="chrome"
fi

# Check if we can rely on a local ./occ command or if we are testing
# a remote instance (e.g. inside docker).
# If we have a remote instance we cannot enable the testing app and
# we have to hope it is enabled already, by other ways
if [ "${TESTING_REMOTE_SYSTEM}" = false ]
then
	# Enable testing app
	PREVIOUS_TESTING_APP_STATUS=$(${OCC} --no-warnings app:list "^testing$")
	if [[ "${PREVIOUS_TESTING_APP_STATUS}" =~ ^Disabled: ]]
	then
		${OCC} app:enable testing || { echo "Unable to enable testing app" >&2; exit 1; }
		TESTING_ENABLED_BY_SCRIPT=true;
	else
		TESTING_ENABLED_BY_SCRIPT=false;
	fi
else
	TESTING_ENABLED_BY_SCRIPT=false;
fi

# table of settings to be remembered and set
#system|app;app-name;setting-name;value;variable-type
declare -a SETTINGS
SETTINGS+=("system;;mail_domain;foobar.com")
SETTINGS+=("system;;mail_from_address;owncloud")
SETTINGS+=("system;;mail_smtpmode;smtp")
SETTINGS+=("system;;mail_smtphost;${MAILHOG_HOST}")
SETTINGS+=("system;;mail_smtpport;${MAILHOG_SMTP_PORT}")
SETTINGS+=("app;core;backgroundjobs_mode;webcron")
SETTINGS+=("system;;sharing.federation.allowHttpFallback;true;boolean")
SETTINGS+=("system;;grace_period.demo_key.show_popup;false;boolean")
SETTINGS+=("app;core;enable_external_storage;yes")
SETTINGS+=("system;;files_external_allow_create_new_local;true")
SETTINGS+=("system;;skeletondirectory;;")

# Set various settings
for URL in ${OCC_URL} ${OCC_FED_URL}
do
	declare SETTINGS_CMDS='['
	for i in "${!SETTINGS[@]}"
	do
		PREVIOUS_IFS=${IFS}
		IFS=';'
		read -r -a SETTING <<< "${SETTINGS[$i]}"
		IFS=${PREVIOUS_IFS}

		save_config_setting "${ADMIN_AUTH}" "${URL}" "${SETTING[0]}" "${SETTING[1]}" "${SETTING[2]}" "${SETTING[4]}"

		TYPE_STRING=""
		if [ -n "${SETTING[4]}" ]
		then
			#place the space here not in the command line, so that there is no space if the string is empty
			TYPE_STRING=" --type ${SETTING[4]}"
		fi

		SETTINGS_CMDS+="{\"command\": \"config:${SETTING[0]}:set ${SETTING[1]} ${SETTING[2]} --value=${SETTING[3]}${TYPE_STRING}\"},"
	done
	SETTINGS_CMDS=${SETTINGS_CMDS%?} # removes the last comma
	SETTINGS_CMDS+="]"
	remote_bulk_occ ${ADMIN_AUTH} ${URL} "${SETTINGS_CMDS}"
	if [ $? -ne 0 ]
		then
			echo -e "Could not set some settings on ${URL}. Result:\n${REMOTE_OCC_STDERR}"
			teardown
			exit 1
		fi
done

#set the skeleton folder
if [ -n "${SKELETON_DIR}" ]
then
	for URL in ${OCC_URL} ${OCC_FED_URL}
	do
		remote_occ ${ADMIN_AUTH} ${URL} "config:system:set skeletondirectory --value=${SKELETON_DIR}"
	done
fi

#Enable and disable apps as required for default
if [ -z "${APPS_TO_DISABLE}" ]
then
	APPS_TO_DISABLE="firstrunwizard notifications"
fi

if [ -z "${APPS_TO_ENABLE}" ]
then
	APPS_TO_ENABLE=""
fi

declare -a APPS_TO_REENABLE;

for URL in ${OCC_URL} ${OCC_FED_URL}
	do
	for APP_TO_DISABLE in ${APPS_TO_DISABLE}; do
		remote_occ ${ADMIN_AUTH} ${URL} "--no-warnings app:list ^${APP_TO_DISABLE}$"
		PREVIOUS_APP_STATUS=${REMOTE_OCC_STDOUT}
		if [[ "${PREVIOUS_APP_STATUS}" =~ ^Enabled: ]]
		then
			APPS_TO_REENABLE+=("${URL} ${APP_TO_DISABLE}");
			remote_occ ${ADMIN_AUTH} ${URL} "--no-warnings app:disable ${APP_TO_DISABLE}"
		fi
	done
done

declare -a APPS_TO_REDISABLE;

for URL in ${OCC_URL} ${OCC_FED_URL}
	do
	for APP_TO_ENABLE in ${APPS_TO_ENABLE}; do
		remote_occ ${ADMIN_AUTH} ${URL} "--no-warnings app:list ^${APP_TO_ENABLE}$"
		PREVIOUS_APP_STATUS=${REMOTE_OCC_STDOUT}
		if [[ "${PREVIOUS_APP_STATUS}" =~ ^Disabled: ]]
		then
			APPS_TO_REDISABLE+=("${URL} ${APP_TO_ENABLE}");
			remote_occ ${ADMIN_AUTH} ${URL} "--no-warnings app:enable ${APP_TO_ENABLE}"
		fi
	done
done

if [ "${OC_TEST_ALT_HOME}" = "1" ]
then
	env_alt_home_enable
fi

# We need to skip some tests in certain browsers.
if [ "${BROWSER}" == "internet explorer" ] || [ "${BROWSER}" == "MicrosoftEdge" ] || [ "${BROWSER}" == "firefox" ]
then
	BROWSER_IN_CAPITALS=${BROWSER//[[:blank:]]/}
	BROWSER_IN_CAPITALS=${BROWSER_IN_CAPITALS^^}
	BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS}&&~@skipOn${BROWSER_IN_CAPITALS}"
fi

# Skip tests tagged with the current oC version
# One, two or three parts of the version can be used
# e.g.
# @skipOnOcV10.0.4
# @skipOnOcV10.0
# @skipOnOcV10

remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:get version"
OWNCLOUD_VERSION_THREE_DIGIT=`echo ${REMOTE_OCC_STDOUT} | cut -d"." -f1-3`
BEHAT_FILTER_TAGS='~@skipOnOcV'${OWNCLOUD_VERSION_THREE_DIGIT}'&&'${BEHAT_FILTER_TAGS}
OWNCLOUD_VERSION_TWO_DIGIT=`echo ${OWNCLOUD_VERSION_THREE_DIGIT} | cut -d"." -f1-2`
BEHAT_FILTER_TAGS='~@skipOnOcV'${OWNCLOUD_VERSION_TWO_DIGIT}'&&'${BEHAT_FILTER_TAGS}
OWNCLOUD_VERSION_ONE_DIGIT=`echo ${OWNCLOUD_VERSION_TWO_DIGIT} | cut -d"." -f1`
BEHAT_FILTER_TAGS='~@skipOnOcV'${OWNCLOUD_VERSION_ONE_DIGIT}'&&'${BEHAT_FILTER_TAGS}

function version { echo "$@" | awk -F. '{ printf("%d%03d%03d\n", $1,$2,$3); }'; }

# Skip tests for OC versions greater than 10.8.0
if [ $(version $OWNCLOUD_VERSION_THREE_DIGIT) -gt $(version "10.8.0") ]; then
	BEHAT_FILTER_TAGS='~@skipOnAllVersionsGreaterThanOcV10.8.0&&'${BEHAT_FILTER_TAGS}
fi

if [ -n "${TEST_SERVER_FED_URL}" ]
then
	remote_occ ${ADMIN_AUTH} ${OCC_FED_URL} "config:system:get version"
	OWNCLOUD_FED_VERSION=`echo ${REMOTE_OCC_STDOUT} | cut -d"." -f1-3`
	BEHAT_FILTER_TAGS='~@skipOnFedOcV'${OWNCLOUD_FED_VERSION}'&&'${BEHAT_FILTER_TAGS}
	OWNCLOUD_FED_VERSION=`echo ${OWNCLOUD_FED_VERSION} | cut -d"." -f1-2`
	BEHAT_FILTER_TAGS='~@skipOnFedOcV'${OWNCLOUD_FED_VERSION}'&&'${BEHAT_FILTER_TAGS}
	OWNCLOUD_FED_VERSION=`echo ${OWNCLOUD_FED_VERSION} | cut -d"." -f1`
	BEHAT_FILTER_TAGS='~@skipOnFedOcV'${OWNCLOUD_FED_VERSION}'&&'${BEHAT_FILTER_TAGS}
fi

# If we are running remote only tests add another skip '@skipWhenTestingRemoteSystems'
if [ "${TESTING_REMOTE_SYSTEM}" = true ]
then
	BEHAT_FILTER_TAGS='~@skipWhenTestingRemoteSystems&&'${BEHAT_FILTER_TAGS}
fi

if [ "${OC_TEST_ON_OBJECTSTORE}" = "1" ]
then
	BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS}&&~@skip_on_objectstore"
fi

# If the caller did not mention specific tags, skip the skipped tests by default
if [ "${BEHAT_TAGS_OPTION_FOUND}" = false ]
then
	# If the caller has already specified specifically to run "@skip" scenarios
	# then do not append "not @skip"
	if [[ ! ${BEHAT_FILTER_TAGS} =~ "&&@skip&&" ]]
	then
		BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS}&&~@skip"
	fi
fi

if [ -n "${BROWSER_VERSION}" ]
then
	BROWSER_VERSION_EXTRA_CAPABILITIES_STRING='"browserVersion":"'${BROWSER_VERSION}'",'
	BROWSER_VERSION_SELENIUM_STRING='"version": "'${BROWSER_VERSION}'", '
	BROWSER_VERSION_TEXT='('${BROWSER_VERSION}') '
else
	BROWSER_VERSION_EXTRA_CAPABILITIES_STRING=""
	BROWSER_VERSION_SELENIUM_STRING=""
	BROWSER_VERSION_TEXT=""
fi

if [ -n "${PLATFORM}" ]
then
	PLATFORM_SELENIUM_STRING='"platform": "'${PLATFORM}'", '
	PLATFORM_TEXT="on platform '${PLATFORM}' "
else
	PLATFORM_SELENIUM_STRING=""
	PLATFORM_TEXT=""
fi

if [ "${RUNNING_API_TESTS}" = true ]
then
	EXTRA_CAPABILITIES=""
	BROWSER_TEXT=""
elif [ "${RUNNING_CLI_TESTS}" = true ]
then
	EXTRA_CAPABILITIES=""
	BROWSER_TEXT=""
else
	BROWSER_TEXT="on browser '${BROWSER}' "

	# If we are running in some automated CI, use the provided details
	if [ -n "${CI_REPO}" ]
	then
		CAPABILITIES_NAME_TEXT="${CI_REPO} - ${CI_BRANCH}"
	else
		# Otherwise this is a non-CI run, probably a local developer run
		CAPABILITIES_NAME_TEXT="ownCloud non-CI"
	fi

	# If SauceLabs credentials have been passed, then use them
	if [ -n "${SAUCE_USERNAME}" ] && [ -n "${SAUCE_ACCESS_KEY}" ]
	then
		SAUCE_CREDENTIALS="${SAUCE_USERNAME}:${SAUCE_ACCESS_KEY}@"
	else
		SAUCE_CREDENTIALS=""
	fi

	if [ "${BROWSER}" == "firefox" ]
	then
		# Set the screen resolution so that hopefully draggable elements will be visible
		# FF gives problems if the destination element is not visible
		EXTRA_CAPABILITIES='"screenResolution":"1920x1080",'

		# This selenium version works for Firefox after V47
		# We no longer need to support testing of Firefox V47 or earlier
		EXTRA_CAPABILITIES='"seleniumVersion":"3.4.0",'${EXTRA_CAPABILITIES}
	fi

	if [ "${BROWSER}" == "internet explorer" ]
	then
		EXTRA_CAPABILITIES='"iedriverVersion": "3.4.0","requiresWindowFocus":true,"screenResolution":"1920x1080",'
	fi

	EXTRA_CAPABILITIES=${EXTRA_CAPABILITIES}${BROWSER_VERSION_EXTRA_CAPABILITIES_STRING}'"maxDuration":"3600"'
	export BEHAT_PARAMS='{"extensions" : {"Behat\\MinkExtension" : {"browser_name": "'${BROWSER}'", "base_url" : "'${TEST_SERVER_URL}'", "selenium2":{"capabilities": {"marionette":null, "browser": "'${BROWSER}'", '${BROWSER_VERSION_SELENIUM_STRING}${PLATFORM_SELENIUM_STRING}'"name": "'${CAPABILITIES_NAME_TEXT}'", "extra_capabilities": {'${EXTRA_CAPABILITIES}'}}, "wd_host":"http://'${SAUCE_CREDENTIALS}${SELENIUM_HOST}':'${SELENIUM_PORT}'/wd/hub"}}, "SensioLabs\\Behat\\PageObjectExtension" : {}}}'
fi

echo ${EXTRA_CAPABILITIES}
echo ${BEHAT_PARAMS}

export IPV4_URL
export IPV6_URL
export FILES_FOR_UPLOAD="${SCRIPT_PATH}/filesForUpload/"

if [ "${TEST_OCIS}" != "true" ] && [ "${TEST_REVA}" != "true" ]
then
	# We are testing on an ownCloud core server.
	# Tell the tests to wait 1 second between each upload/delete action
	# to avoid problems with actions that depend on timestamps in seconds.
	export UPLOAD_DELETE_WAIT_TIME=1
fi

TEST_LOG_FILE=$(mktemp)
SCENARIOS_THAT_PASSED=0
SCENARIOS_THAT_FAILED=0

if [ ${#BEHAT_SUITES[@]} -eq 0 ] && [ -z "${BEHAT_FEATURE}" ]
then
	SUITE_FEATURE_TEXT="all ${TEST_TYPE_TEXT}"
	run_behat_tests
else
	if [ -n "${BEHAT_SUITE}" ]
	then
		SUITE_FEATURE_TEXT="${BEHAT_SUITE}"
	fi

	if [ -n "${BEHAT_FEATURE}" ]
	then
		# If running a whole feature, it will be something like login.feature
		# If running just a single scenario, it will also have the line number
		# like login.feature:36 - which will be parsed correctly like a "file"
		# by basename.
		BEHAT_FEATURE_FILE=`basename ${BEHAT_FEATURE}`
		SUITE_FEATURE_TEXT="${SUITE_FEATURE_TEXT} ${BEHAT_FEATURE_FILE}"
	fi
fi

for i in "${!BEHAT_SUITES[@]}"
	do
		BEHAT_SUITE_TO_RUN="${BEHAT_SUITES[$i]}"
		BEHAT_SUITE_OPTION="--suite=${BEHAT_SUITE_TO_RUN}"
		SUITE_FEATURE_TEXT="${BEHAT_SUITES[$i]}"
		for rerun_number in $(seq 1 ${BEHAT_RERUN_TIMES})
			do
				if ((${BEHAT_RERUN_TIMES} > 1))
				then
					echo -e "\nTest repeat $rerun_number of ${BEHAT_RERUN_TIMES}"
				fi
				run_behat_tests
			done
done

TOTAL_SCENARIOS=$((SCENARIOS_THAT_PASSED + SCENARIOS_THAT_FAILED))

echo "runsh: Total ${TOTAL_SCENARIOS} scenarios (${SCENARIOS_THAT_PASSED} passed, ${SCENARIOS_THAT_FAILED} failed)"

teardown

# 3 types of things can have gone wrong:
#   - some scenario failed (and it was not expected to fail)
#   - some scenario passed (but it was expected to fail)
#   - Behat exited with non-zero status because of some other error
# If any of these happened then report about it and exit with status 1 (error)

if [ ${#UNEXPECTED_FAILED_SCENARIOS[@]} -gt 0 ]
then
	UNEXPECTED_FAILURE=true
else
	UNEXPECTED_FAILURE=false
fi

if [ ${#UNEXPECTED_PASSED_SCENARIOS[@]} -gt 0 ]
then
	UNEXPECTED_SUCCESS=true
else
	UNEXPECTED_SUCCESS=false
fi

if [ ${#UNEXPECTED_BEHAT_EXIT_STATUSES[@]} -gt 0 ]
then
	UNEXPECTED_BEHAT_EXIT_STATUS=true
else
	UNEXPECTED_BEHAT_EXIT_STATUS=false
fi

# If we got some unexpected success, and we only ran a single feature or scenario
# then the fact that some expected failures did not happen might be because those
# scenarios were never even run.
# Filter the UNEXPECTED_PASSED_SCENARIOS to remove scenarios that were not run.
if [ "${UNEXPECTED_SUCCESS}" = true ]
then
	ACTUAL_UNEXPECTED_PASS=()
	# if running a single feature or a single scenario
	if [[ -n "${BEHAT_FEATURE}" ]]
	then
		for unexpected_passed_value in "${UNEXPECTED_PASSED_SCENARIOS[@]}"
		do
			# check only for the running feature
			if [[ $BEHAT_FEATURE == *":"* ]]
			then
				BEHAT_FEATURE_WITH_LINE_NUM=$BEHAT_FEATURE
			else
				LINE_NUM=$(echo ${unexpected_passed_value} | cut -d":" -f2)
				BEHAT_FEATURE_WITH_LINE_NUM=$BEHAT_FEATURE:$LINE_NUM
			fi
			if [[ $BEHAT_FEATURE_WITH_LINE_NUM == *"${unexpected_passed_value}" ]]
			then
				ACTUAL_UNEXPECTED_PASS+=("${unexpected_passed_value}")
			fi
		done
	else
		ACTUAL_UNEXPECTED_PASS=("${UNEXPECTED_PASSED_SCENARIOS[@]}")
	fi

	if [ ${#ACTUAL_UNEXPECTED_PASS[@]} -eq 0 ]
	then
		UNEXPECTED_SUCCESS=false
	fi
fi

if [ "${UNEXPECTED_FAILURE}" = false ] && [ "${UNEXPECTED_SUCCESS}" = false ] && [ "${UNEXPECTED_BEHAT_EXIT_STATUS}" = false ]
then
	FINAL_EXIT_STATUS=0
else
	FINAL_EXIT_STATUS=1
fi

if [ -n "${EXPECTED_FAILURES_FILE}" ]
then
	echo "runsh: Exit code after checking expected failures: ${FINAL_EXIT_STATUS}"
fi

if [ "${UNEXPECTED_FAILURE}" = true ]
then
	tput setaf 3; echo "runsh: Total unexpected failed scenarios throughout the test run:"
	tput setaf 1; printf "%s\n" "${UNEXPECTED_FAILED_SCENARIOS[@]}"
else
	tput setaf 2; echo "runsh: There were no unexpected failures."
fi

if [ "${UNEXPECTED_SUCCESS}" = true ]
then
	tput setaf 3; echo "runsh: Total unexpected passed scenarios throughout the test run:"
	tput setaf 1; printf "%s\n" "${ACTUAL_UNEXPECTED_PASS[@]}"
else
	tput setaf 2; echo "runsh: There were no unexpected success."
fi

if [ "${UNEXPECTED_BEHAT_EXIT_STATUS}" = true ]
then
	tput setaf 3; echo "runsh: The following Behat test runs exited with non-zero status:"
	tput setaf 1; printf "%s\n" "${UNEXPECTED_BEHAT_EXIT_STATUSES[@]}"
fi

# sync the file-system so all output will be flushed to storage.
# In drone we sometimes see that the last lines of output are missing from the
# drone log.
sync

# If we are running in drone CI, then sleep for a bit to (hopefully) let the
# drone agent send all the output to the drone server.
if [ -n "${CI_REPO}" ]
then
	echo "sleeping for 30 seconds at end of test run"
	sleep 30
fi

exit ${FINAL_EXIT_STATUS}

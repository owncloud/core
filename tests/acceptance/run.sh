#!/usr/bin/env bash

# composer install

# from http://stackoverflow.com/a/630387
SCRIPT_PATH="`dirname \"$0\"`"              # relative
SCRIPT_PATH="`( cd \"${SCRIPT_PATH}\" && pwd )`"  # absolutized and normalized

echo 'Script path: '${SCRIPT_PATH}

OC_PATH=${SCRIPT_PATH}/../../
OCC=${OC_PATH}occ
BEHAT=${OC_PATH}lib/composer/bin/behat

# Look for command line options for:
# -c or --config - specify a behat.yml to use
# --feature - specify a single feature to run
# --suite - specify a single suite to run
# --tags - specify tags for scenarios to run (or not)
# --remote - the server under test is remote, so we cannot locally enable the
#            testing app. We have to assume it is already enabled.
# --show-oc-logs - tail the ownCloud log after the test run
# --norerun - do not rerun failed webUI scenarios
BEHAT_TAGS_OPTION_FOUND=false
REMOTE_ONLY=false
SHOW_OC_LOGS=false
RERUN_FAILED_WEBUI_SCENARIOS=true

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
		--tags)
			BEHAT_FILTER_TAGS="$2"
			BEHAT_TAGS_OPTION_FOUND=true
			shift
			;;
		--browser)
			BROWSER="$2"
			shift
			;;
		--remote)
			REMOTE_ONLY=true
			;;
		--show-oc-logs)
			SHOW_OC_LOGS=true
			;;
		--norerun)
			RERUN_FAILED_WEBUI_SCENARIOS=false
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
remote_occ() {
	CURL_OCC_RESULT=`curl -s -u $1 $2 -d "command=$3"`
	RETURN=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string(ocs/data/code)" - | sed 's/ //g'`
	# We could not find a proper return of the testing app, so something went wrong
	if [ -z "${RETURN}" ]
	then
		RETURN=1
		REMOTE_OCC_STDERR=${CURL_OCC_RESULT}
	else
		REMOTE_OCC_STDOUT=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string(ocs/data/stdOut)" - | sed 's/ //g'`
		REMOTE_OCC_STDERR=`echo ${CURL_OCC_RESULT} | xmllint --xpath "string(ocs/data/stdErr)" - | sed 's/ //g'`
	fi
	return ${RETURN}
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

function env_alt_home_enable {
	${OCC} config:app:set testing enable_alt_user_backend --value yes
}

function env_alt_home_clear {
	${OCC} app:disable testing || { echo "Unable to disable testing app" >&2; exit 1; }
}

function env_encryption_enable {
	${OCC} app:enable encryption
	${OCC} encryption:enable
}

function env_encryption_enable_master_key {
	env_encryption_enable || { echo "Unable to enable masterkey encryption" >&2; exit 1; }
	${OCC} encryption:select-encryption-type masterkey --yes
}

function env_encryption_enable_user_keys {
	env_encryption_enable || { echo "Unable to enable user-keys encryption" >&2; exit 1; }
	${OCC} encryption:select-encryption-type user-keys --yes
}

function env_encryption_disable {
	${OCC} encryption:disable
	${OCC} app:disable encryption
}

function env_encryption_disable_master_key {
	env_encryption_disable || { echo "Unable to disable masterkey encryption" >&2; exit 1; }
	${OCC} config:app:delete encryption useMasterKey
}

function env_encryption_disable_user_keys {
	env_encryption_disable || { echo "Unable to disable user-keys encryption" >&2; exit 1; }
	${OCC} config:app:delete encryption userSpecificKey
}

declare -x TEST_SERVER_URL
declare -x TEST_SERVER_FED_URL
declare -x TEST_WITH_PHPDEVSERVER
[[ -z "${TEST_SERVER_URL}" || -z "${TEST_SERVER_FED_URL}" ]] && TEST_WITH_PHPDEVSERVER="true"

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
    echo "Not using php inbuilt server for running scenario ..."
    echo "Updating .htaccess for proper rewrites"
    ${OCC} config:system:set htaccess.RewriteBase --value /
    ${OCC} maintenance:update:htaccess
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

	# Give time for the PHP dev server to become available
	# because we want to use it to get and change settings with the testing app
	sleep 5
fi

# If a feature file has been specified but no suite, then deduce the suite
if [ -n "${BEHAT_FEATURE}" ] && [ -z "${BEHAT_SUITE}" ]
then
	FEATURE_PATH=`dirname ${BEHAT_FEATURE}`
	BEHAT_SUITE=`basename ${FEATURE_PATH}`
fi

if [ -n "${BEHAT_SUITE}" ]
then
	BEHAT_SUITE_OPTION="--suite=${BEHAT_SUITE}"

	# If the suite name begins with "webUI" then we will setup for webUI testing
	# and run tests tagged as @webUI, otherwise it is just API tests.
	if [[ "${BEHAT_SUITE}" == webUI* ]]
	then
		TEST_TYPE_TAG="@webUI"
		RUNNING_API_TESTS=false
		RUNNING_WEBUI_TESTS=true
	else
		TEST_TYPE_TAG="@api"
		RUNNING_API_TESTS=true
		RUNNING_WEBUI_TESTS=false
	fi
else
	BEHAT_SUITE_OPTION=""
	# We are running "all" suites in a single run.
	# It is not practical/reasonable to do that with the webUI tests.
	# So just run all the API tests.
	TEST_TYPE_TAG="@api"
	RUNNING_API_TESTS=true
	RUNNING_WEBUI_TESTS=false
fi

# Always have one of "@api" or "@webUI" filter tags
if [ -z "${BEHAT_FILTER_TAGS}" ]
then
	BEHAT_FILTER_TAGS="${TEST_TYPE_TAG}"
else
	BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS}&&${TEST_TYPE_TAG}"
fi

if [ -z "${BEHAT_YML}" ]
then
	BEHAT_YML="config/behat.yml"
fi

if [ -z "${MAILHOG_HOST}" ]
then
	MAILHOG_HOST="127.0.0.1"
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
if [ "${REMOTE_ONLY}" = false ]
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

# The endpoint to use to do occ commands via the testing app
OCC_URL="${TEST_SERVER_URL}/ocs/v2.php/apps/testing/api/v1/occ"

# Set SMTP settings
remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings config:system:get mail_domain"
PREVIOUS_MAIL_DOMAIN=${REMOTE_OCC_STDOUT}
remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings config:system:get mail_from_address"
PREVIOUS_MAIL_FROM_ADDRESS=${REMOTE_OCC_STDOUT}
remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings config:system:get mail_smtpmode"
PREVIOUS_MAIL_SMTP_MODE=${REMOTE_OCC_STDOUT}
remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings config:system:get mail_smtphost"
PREVIOUS_MAIL_SMTP_HOST=${REMOTE_OCC_STDOUT}
remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings config:system:get mail_smtpport"
PREVIOUS_MAIL_SMTP_PORT=${REMOTE_OCC_STDOUT}

remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_domain --value=foobar.com"
remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_from_address --value=owncloud"
remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_smtpmode --value=smtp"
remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_smtphost --value=${MAILHOG_HOST}"
remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_smtpport --value=${MAILHOG_SMTP_PORT}"

# Get the current backgroundjobs_mode
remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:app:get core backgroundjobs_mode"
PREVIOUS_BACKGROUNDJOBS_MODE=${REMOTE_OCC_STDOUT}
# Switch to webcron
remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:app:set core backgroundjobs_mode --value webcron"
if [ $? -ne 0 ]
then
	echo "WARNING: Could not set backgroundjobs mode to 'webcron'"
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

APPS_TO_REENABLE="";

for APP_TO_DISABLE in ${APPS_TO_DISABLE}; do
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings app:list ^${APP_TO_DISABLE}$"
	PREVIOUS_APP_STATUS=${REMOTE_OCC_STDOUT}
	if [[ "${PREVIOUS_APP_STATUS}" =~ ^Enabled: ]]
	then
		APPS_TO_REENABLE="${APPS_TO_REENABLE} ${APP_TO_DISABLE}";
		remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings app:disable ${APP_TO_DISABLE}"
	fi
done

APPS_TO_REDISABLE="";

for APP_TO_ENABLE in ${APPS_TO_ENABLE}; do
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings app:list ^${APP_TO_ENABLE}$"
	PREVIOUS_APP_STATUS=${REMOTE_OCC_STDOUT}
	if [[ "${PREVIOUS_APP_STATUS}" =~ ^Disabled: ]]
	then
		APPS_TO_REDISABLE="${APPS_TO_REDISABLE} ${APP_TO_ENABLE}";
		remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings app:enable ${APP_TO_ENABLE}"
	fi
done

# Set up personalized skeleton
remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings config:system:get skeletondirectory"

PREVIOUS_SKELETON_DIR=${REMOTE_OCC_STDOUT}

# $SRC_SKELETON_DIR is the path to the skeleton folder on the machine where the tests are executed
# it is used for file comparisons in various tests
if [ "${RUNNING_API_TESTS}" = true ]
then
	export SRC_SKELETON_DIR="${SCRIPT_PATH}/skeleton"
else
	export SRC_SKELETON_DIR="${SCRIPT_PATH}/webUISkeleton"
fi

# $SKELETON_DIR is the path to the skeleton folder on the machine where oC runs (system under test)
# It is used to give users a defined set of files and folders for the tests
if [ -z "${SKELETON_DIR}" ]
then
	export SKELETON_DIR="${SRC_SKELETON_DIR}"
fi

remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set skeletondirectory --value=${SKELETON_DIR}"

if [ $? -ne 0 ]
then
	echo -e "Could not set skeleton directory. Result:\n'${REMOTE_OCC_STDERR}'"
	exit 1
fi

PREVIOUS_HTTP_FALLBACK_SETTING=$(${OCC} --no-warnings config:system:get sharing.federation.allowHttpFallback)
${OCC} config:system:set sharing.federation.allowHttpFallback --type boolean --value true

# Enable external storage app
${OCC} config:app:set core enable_external_storage --value=yes
${OCC} config:system:set files_external_allow_create_new_local --value=true

# Only make local storage when running API tests.
# The local storage folder cannot be deleted by an ordinary user.
# That makes problems for webUI tests that try to select all files in the top
# folder of a user, and then delete them in a batch.
if [ "${RUNNING_API_TESTS}" = true ]
then
	mkdir -p work/local_storage || { echo "Unable to create work folder" >&2; exit 1; }
	OUTPUT_CREATE_STORAGE=`${OCC} files_external:create local_storage local null::null -c datadir=${SCRIPT_PATH}/work/local_storage`

	ID_STORAGE=`echo ${OUTPUT_CREATE_STORAGE} | awk {'print $5'}`

	${OCC} files_external:option ${ID_STORAGE} enable_sharing true
fi

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
OWNCLOUD_VERSION=`echo ${REMOTE_OCC_STDOUT} | cut -d"." -f1-3`
BEHAT_FILTER_TAGS='~@skipOnOcV'${OWNCLOUD_VERSION}'&&'${BEHAT_FILTER_TAGS}
OWNCLOUD_VERSION=`echo ${OWNCLOUD_VERSION} | cut -d"." -f1-2`
BEHAT_FILTER_TAGS='~@skipOnOcV'${OWNCLOUD_VERSION}'&&'${BEHAT_FILTER_TAGS}
OWNCLOUD_VERSION=`echo ${OWNCLOUD_VERSION} | cut -d"." -f1`
BEHAT_FILTER_TAGS='~@skipOnOcV'${OWNCLOUD_VERSION}'&&'${BEHAT_FILTER_TAGS}

# If we are running remote only tests add another skip '@skipWhenTestingRemoteSystems'
if [ "${REMOTE_ONLY}" = true ]
then
	BEHAT_FILTER_TAGS='~@skipWhenTestingRemoteSystems&&'${BEHAT_FILTER_TAGS}
fi

# Enable encryption if requested
if [ "${OC_TEST_ENCRYPTION_ENABLED}" = "1" ]
then
	env_encryption_enable
	BEHAT_EXTRA_TAGS="~@no_encryption&&~@no_default_encryption"
elif [ "${OC_TEST_ENCRYPTION_MASTER_KEY_ENABLED}" = "1" ]
then
	env_encryption_enable_master_key
	BEHAT_EXTRA_TAGS="~@no_encryption&&~@no_masterkey_encryption"
elif [ "${OC_TEST_ENCRYPTION_USER_KEYS_ENABLED}" = "1" ]
then
	env_encryption_enable_user_keys
	BEHAT_EXTRA_TAGS="~@no_encryption&&~@no_userkeys_encryption"
else
	BEHAT_EXTRA_TAGS="~@masterkey_encryption"
fi

if [ "${OC_TEST_ON_OBJECTSTORE}" = "1" ]
then
   	BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS}&&~@skip_on_objectstore"
fi

BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS}&&${BEHAT_EXTRA_TAGS}"

# If the caller did not mention specific tags, skip the skipped tests by default
if [ "${BEHAT_TAGS_OPTION_FOUND}" = false ]
then
	BEHAT_FILTER_TAGS="${BEHAT_FILTER_TAGS}&&~@skip"
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
else
	BROWSER_TEXT="on browser '${BROWSER}' "

	# If we are running on Travis, use the Travis details as the name
	if [ -n "${TRAVIS_REPO_SLUG}" ]
	then
		CAPABILITIES_NAME_TEXT="${TRAVIS_REPO_SLUG} - ${TRAVIS_JOB_NUMBER}"
	else
		# If we are running in some automated CI, use the provided details
		if [ -n "${CI_REPO}" ]
		then
			CAPABILITIES_NAME_TEXT="${CI_REPO} - ${CI_BRANCH}"
		else
			# Otherwise this is a non-CI run, probably a local developer run
			CAPABILITIES_NAME_TEXT="ownCloud non-CI"
		fi
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

if [ -z "${BEHAT_SUITE}" ] && [ -z "${BEHAT_FEATURE}" ]
then
	SUITE_FEATURE_TEXT="all"
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

TEST_LOG_FILE=$(mktemp)

echo "Running ${SUITE_FEATURE_TEXT} tests tagged ${BEHAT_FILTER_TAGS} ${BROWSER_TEXT}${BROWSER_VERSION_TEXT}${PLATFORM_TEXT}" | tee ${TEST_LOG_FILE}

${BEHAT} --colors --strict -c ${BEHAT_YML} -f junit -f pretty ${BEHAT_SUITE_OPTION} --tags ${BEHAT_FILTER_TAGS} ${BEHAT_FEATURE} -v  2>&1 | tee -a ${TEST_LOG_FILE}

BEHAT_EXIT_STATUS=${PIPESTATUS[0]}

if [ ${BEHAT_EXIT_STATUS} -eq 0 ]
then
	PASSED=true
else
	PASSED=false
fi

# With webUI tests, we try running failed tests again.
if [ "${PASSED}" = false ] && [ "${RUNNING_WEBUI_TESTS}" = true ] && [ "${RERUN_FAILED_WEBUI_SCENARIOS}" = true ]
then
	echo "webUI test run failed with exit status: ${BEHAT_EXIT_STATUS}"
	PASSED=true
	SOME_SCENARIO_RERUN=false
	FAILED_SCENARIOS=`awk '/Failed scenarios:/',0 ${TEST_LOG_FILE} | grep feature`
	for FEATURE_COLORED in ${FAILED_SCENARIOS}
		do
			SOME_SCENARIO_RERUN=true
			# There will be some ANSI escape codes for color in the FEATURE_COLORED var.
			# Strip them out so we can pass just the ordinary feature details to Behat.
			# Thanks to https://en.wikipedia.org/wiki/Tee_(command) and
			# https://stackoverflow.com/questions/23416278/how-to-strip-ansi-escape-sequences-from-a-variable
			# for ideas.
			FEATURE=$(echo "${FEATURE_COLORED}" | sed "s/\x1b[^m]*m//g")
			echo "Rerun failed scenario: ${FEATURE}"
			${BEHAT} --colors --strict -c ${BEHAT_YML} -f junit -f pretty ${BEHAT_SUITE_OPTION} --tags ${BEHAT_FILTER_TAGS} ${FEATURE} -v  2>&1 | tee -a ${TEST_LOG_FILE}
			BEHAT_EXIT_STATUS=${PIPESTATUS[0]}
			if [ ${BEHAT_EXIT_STATUS} -ne 0 ]
			then
				echo "webUI test rerun failed with exit status: ${BEHAT_EXIT_STATUS}"
				PASSED=false
			fi
		done

	if [ "${SOME_SCENARIO_RERUN}" = false ]
	then
		# If the original Behat had a fatal PHP error and exited directly with
		# a "bad" exit code, then it may not have even logged a summary of the
		# failed scenarios. In that case there was an error and no scenarios
		# have been rerun. So PASSED needs to be false.
		PASSED=false
	fi
fi

if [ "${BEHAT_TAGS_OPTION_FOUND}" != true ]
then
	# The behat run specified to skip scenarios tagged @skip
	# Report them in a dry-run so they can be seen
	# Big red error output is displayed if there are no matching scenarios - send it to null
	DRY_RUN_FILE=$(mktemp)
	SKIP_TAGS="${TEST_TYPE_TAG}&&@skip"
	${BEHAT} --dry-run --colors -c ${BEHAT_YML} -f junit -f pretty ${BEHAT_SUITE_OPTION} --tags "${SKIP_TAGS}" ${BEHAT_FEATURE} 1>${DRY_RUN_FILE} 2>/dev/null
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

if [ "${RUNNING_API_TESTS}" = true ]
then
	${OCC} files_external:delete -y ${ID_STORAGE}
fi

# Disable external storage app
${OCC} config:app:set core enable_external_storage --value=no

# Enable any apps that were disabled for the test run
for APP_TO_ENABLE in ${APPS_TO_REENABLE}; do
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings app:enable ${APP_TO_ENABLE}"
done

# Disable any apps that were enabled for the test run
for APP_TO_DISABLE in ${APPS_TO_REDISABLE}; do
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "--no-warnings app:disable ${APP_TO_DISABLE}"
done

# Put back personalized skeleton
if [ "A${PREVIOUS_SKELETON_DIR}" = "A" ]
then
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:delete skeletondirectory"
else
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set skeletondirectory --value=${PREVIOUS_SKELETON_DIR}"
fi

# Put back smtp settings
if [ "A${PREVIOUS_MAIL_DOMAIN}" = "A" ]
then
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:delete mail_domain"
else
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_domain --value=${PREVIOUS_MAIL_DOMAIN}"
fi

if [ "A${PREVIOUS_MAIL_FROM_ADDRESS}" = "A" ]
then
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:delete mail_from_address"
else
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_from_address --value=${PREVIOUS_MAIL_FROM_ADDRESS}"
fi

if [ "A${PREVIOUS_MAIL_SMTP_MODE}" = "A" ]
then
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:delete mail_smtpmode"
else
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_smtpmode --value=${PREVIOUS_MAIL_SMTP_MODE}"
fi

if [ "A${PREVIOUS_MAIL_SMTP_HOST}" = "A" ]
then
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:delete mail_smtphost"
else
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_smtphost --value=${PREVIOUS_MAIL_SMTP_HOST}"
fi

if [ "A${PREVIOUS_MAIL_SMTP_PORT}" = "A" ]
then
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:delete mail_smtpport"
else
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set mail_smtpport --value=${PREVIOUS_MAIL_SMTP_PORT}"
fi

# put back the backgroundjobs_mode
remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:app:set core backgroundjobs_mode --value=${PREVIOUS_BACKGROUNDJOBS_MODE}"

# Put back HTTP fallback setting
if [ "A${PREVIOUS_HTTP_FALLBACK_SETTING}" = "A" ]
then
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:delete sharing.federation.allowHttpFallback"
else
	remote_occ ${ADMIN_AUTH} ${OCC_URL} "config:system:set sharing.federation.allowHttpFallback --type boolean --value=${PREVIOUS_HTTP_FALLBACK_SETTING}"
fi

# Put back state of the testing app
if [ "${TESTING_ENABLED_BY_SCRIPT}" = true ]
then
	${OCC} app:disable testing
fi

# Upload log file for later analysis
if [ "${PASSED}" = false ] && [ ! -z "${REPORTING_WEBDAV_USER}" ] && [ ! -z "${REPORTING_WEBDAV_PWD}" ] && [ ! -z "${REPORTING_WEBDAV_URL}" ]
then
	curl -u ${REPORTING_WEBDAV_USER}:${REPORTING_WEBDAV_PWD} -T ${TEST_LOG_FILE} ${REPORTING_WEBDAV_URL}/"${TRAVIS_JOB_NUMBER}"_`date "+%F_%T"`.log
fi

if [ "${RUNNING_API_TESTS}" = true ]
then
	# Clear storage folder
	rm -Rf work/local_storage/*
fi

if [ "${OC_TEST_ALT_HOME}" = "1" ]
then
	env_alt_home_clear
fi

# Disable encryption if requested
if [ "${OC_TEST_ENCRYPTION_ENABLED}" = "1" ]
then
	env_encryption_disable
fi

if [ "${OC_TEST_ENCRYPTION_MASTER_KEY_ENABLED}" = "1" ]
then
	env_encryption_disable_master_key
fi

if [ "${OC_TEST_ENCRYPTION_USER_KEYS_ENABLED}" = "1" ]
then
	env_encryption_disable_user_keys
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

if [ "${PASSED}" = true ]
then
	exit 0
else
	exit 1
fi

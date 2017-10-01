#!/bin/bash
#
# ownCloud
#
# @author Artur Neumann
# @copyright 2017 Artur Neumann info@individual-it.net
#
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

#save the current language and set the language to "C"
#we want to have it all in english to be able to parse outputs
OLD_LANG=$LANG
export LANG=C

# Look for command line options for:
# -c or --config - specify a behat.yml to use
# --feature - specify a single feature to run
# --suite - specify a single suite to run
# --tags - specify tags for scenarios to run (or not)
BEHAT_TAGS_OPTION_FOUND=false

while [[ $# -gt 1 ]]
do
	key="$1"
	case $key in
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
			BEHAT_TAGS="$2"
			BEHAT_TAGS_OPTION_FOUND=true
			shift
			;;
		*)
			# ignore unknown options
			;;
	esac
	shift
done

# An odd parameter by itself at the end is a feature to run
if [ -n "$1" ]
then
	BEHAT_FEATURE="$1"
fi

if [ -z "$BEHAT_YML" ]
then
	BEHAT_YML="tests/ui/config/behat.yml"
fi

if [ -z "$BEHAT_SUITE" ]
then
	BEHAT_SUITE_OPTION=""
else
	BEHAT_SUITE_OPTION="--suite=$BEHAT_SUITE"
fi

BEHAT_TAG_OPTION="--tags"

if [ "$BROWSER" == "internet explorer" ]
then
	if [ "$BEHAT_TAGS_OPTION_FOUND" = true ]
	then
		if [ -z "$BEHAT_TAGS" ]
		then
			BEHAT_TAGS='~@skipOnIE'
		else
			BEHAT_TAGS="$BEHAT_TAGS&&~@skipOnIE"
		fi
	else
		BEHAT_TAGS='~@skip&&~@skipOnIE'
	fi
else
	if [ "$BEHAT_TAGS_OPTION_FOUND" = true ]
	then
		if [ -z "$BEHAT_TAGS" ]
		then
			BEHAT_TAG_OPTION=""
		fi
	else
		BEHAT_TAGS='~@skip'
	fi
fi

BASE_URL="http://$SRV_HOST_NAME"
REMOTE_FED_BASE_URL=$REMOTE_FED_SRV_HOST_NAME

if [ ! -z "$SRV_HOST_PORT" ] && [ "$SRV_HOST_PORT" != "80" ]
then
	BASE_URL="$BASE_URL:$SRV_HOST_PORT"
fi

if [ ! -z "$REMOTE_FED_SRV_HOST_PORT" ] && [ "$REMOTE_FED_SRV_HOST_PORT" != "80" ]
then
	REMOTE_FED_BASE_URL="$REMOTE_FED_BASE_URL:$REMOTE_FED_SRV_HOST_PORT"
fi

IPV4_URL="$BASE_URL"

if [ ! -z "$IPV4_HOST_NAME" ]
then
	IPV4_URL="http://$IPV4_HOST_NAME"
	if [ ! -z "$SRV_HOST_PORT" ] && [ "$SRV_HOST_PORT" != "80" ]
	then
		IPV4_URL="$IPV4_URL:$SRV_HOST_PORT"
	fi
fi

IPV6_URL="$BASE_URL"

if [ ! -z "$IPV6_HOST_NAME" ]
then
	IPV6_URL="http://$IPV6_HOST_NAME"
	if [ ! -z "$SRV_HOST_PORT" ] && [ "$SRV_HOST_PORT" != "80" ]
	then
		IPV6_URL="$IPV6_URL:$SRV_HOST_PORT"
	fi
fi

if [ -n "$SRV_HOST_URL" ]
then
	BASE_URL="$BASE_URL/$SRV_HOST_URL"
	IPV4_URL="$IPV4_URL/$SRV_HOST_URL"
	IPV6_URL="$IPV6_URL/$SRV_HOST_URL"
fi

if [ -n "$REMOTE_FED_SRV_HOST_URL" ]
then
	REMOTE_FED_BASE_URL="$REMOTE_FED_BASE_URL/$REMOTE_FED_SRV_HOST_URL"
fi

if [ "$BROWSER" == "firefox" ]
then
	#set screen resolution so that hopefully dragable elements will be visible
	#FF gives problems if the destination element is not visible
	EXTRA_CAPABILITIES='"seleniumVersion":"2.53.1","screenResolution":"1920x1080",'
fi


if [ "$BROWSER" == "internet explorer" ]
then
	EXTRA_CAPABILITIES='"iedriverVersion": "3.4.0","requiresWindowFocus":true,"screenResolution":"1920x1080",'
fi

EXTRA_CAPABILITIES=$EXTRA_CAPABILITIES'"maxDuration":"3600"'

#Set up personalized skeleton
OCC=./occ
PREVIOUS_SKELETON_DIR=$($OCC --no-warnings config:system:get skeletondirectory)
$OCC config:system:set skeletondirectory --value="$(pwd)/tests/ui/skeleton" >/dev/null

TEST_LOG_FILE=$(mktemp)

echo "Running tests on '$BROWSER' ($BROWSER_VERSION) on $PLATFORM" | tee $TEST_LOG_FILE
export BEHAT_PARAMS='{"extensions" : {"Behat\\MinkExtension" : {"browser_name": "'$BROWSER'", "base_url" : "'$BASE_URL'", "selenium2":{"capabilities": {"browser": "'$BROWSER'", "version": "'$BROWSER_VERSION'", "platform": "'$PLATFORM'", "name": "'$TRAVIS_REPO_SLUG' - '$TRAVIS_JOB_NUMBER'", "extra_capabilities": {'$EXTRA_CAPABILITIES'}}, "wd_host":"http://'$SAUCE_USERNAME:$SAUCE_ACCESS_KEY'@localhost:4445/wd/hub"}}}}' 
export IPV4_URL
export IPV6_URL
export REMOTE_FED_BASE_URL

lib/composer/bin/behat -c $BEHAT_YML $BEHAT_SUITE_OPTION $BEHAT_TAG_OPTION $BEHAT_TAGS $BEHAT_FEATURE -v  2>&1 | tee -a $TEST_LOG_FILE

if [ ${PIPESTATUS[0]} -eq 0 ]
then
	PASSED=true
else
	PASSED=false
fi

if [ "$BEHAT_TAGS_OPTION_FOUND" != true ]
then
	# The behat run above specified to skip scenarios tagged @skip
	# Report them in a dry-run so they can be seen
	# Big red error output is displayed if there are no matching scenarios - send it to null
	DRY_RUN_FILE=$(mktemp)
	lib/composer/bin/behat --dry-run --colors -c $BEHAT_YML --tags '@skip' $BEHAT_FEATURE 1>$DRY_RUN_FILE 2>/dev/null
	if grep -q -m 1 'No scenarios' "$DRY_RUN_FILE"
	then
		# If there are no skip scenarios, then no need to report that
		:
	else
		echo ""
		echo "The following tests were skipped because they are tagged @skip:"
		cat "$DRY_RUN_FILE" | tee -a $TEST_LOG_FILE
	fi
	rm -f "$DRY_RUN_FILE"
fi

# Put back personalized skeleton
if test "A$PREVIOUS_SKELETON_DIR" = "A"; then
	$OCC config:system:delete skeletondirectory >/dev/null
else
	$OCC config:system:set skeletondirectory --value="$PREVIOUS_SKELETON_DIR" >/dev/null
fi

if [ ! -z "$SAUCE_USERNAME" ] && [ ! -z "$SAUCE_ACCESS_KEY" ] && [ -e /tmp/saucelabs_sessionid ]
then
	SAUCELABS_SESSIONID=`cat /tmp/saucelabs_sessionid`
	curl -X PUT -s -d "{\"passed\": $PASSED}" -u $SAUCE_USERNAME:$SAUCE_ACCESS_KEY https://saucelabs.com/rest/v1/$SAUCE_USERNAME/jobs/$SAUCELABS_SESSIONID 2>&1 | tee -a $TEST_LOG_FILE 

	printf "\n${RED}SAUCELABS RESULTS:${BLUE} https://saucelabs.com/jobs/$SAUCELABS_SESSIONID\n${NC}" | tee -a $TEST_LOG_FILE
fi

#upload log file for later analysis
if [ "$PASSED" = false ] && [ ! -z "$REPORTING_WEBDAV_USER" ] && [ ! -z "$REPORTING_WEBDAV_PWD" ] && [ ! -z "$REPORTING_WEBDAV_URL" ]
then
	curl -u $REPORTING_WEBDAV_USER:$REPORTING_WEBDAV_PWD -T $TEST_LOG_FILE $REPORTING_WEBDAV_URL/"$TRAVIS_JOB_NUMBER"_`date "+%F_%T"`.log
fi

#reset the original language
export LANG=$OLD_LANG

rm -f "$TEST_LOG_FILE"

if [ "$PASSED" = true ]
then
	exit 0
else
	exit 1
fi
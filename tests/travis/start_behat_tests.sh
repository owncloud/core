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

if [ ! -z "$SRV_HOST_PORT" ] && [ "$SRV_HOST_PORT" != "80" ]
then
	BASE_URL="$BASE_URL:$SRV_HOST_PORT"
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

if [ "$BROWSER" == "firefox" ]
then
	EXTRA_CAPABILITIES='"seleniumVersion":"2.53.1",'
fi

EXTRA_CAPABILITIES=$EXTRA_CAPABILITIES'"maxDuration":"3600"'

echo "Running tests on '$BROWSER' ($BROWSER_VERSION) on $PLATFORM"
export BEHAT_PARAMS='{"extensions" : {"Behat\\MinkExtension" : {"browser_name": "'$BROWSER'", "base_url" : "'$BASE_URL'", "selenium2":{"capabilities": {"browser": "'$BROWSER'", "version": "'$BROWSER_VERSION'", "platform": "'$PLATFORM'", "name": "'$TRAVIS_REPO_SLUG' - '$TRAVIS_JOB_NUMBER'", "extra_capabilities": {'$EXTRA_CAPABILITIES'}}, "wd_host":"http://'$SAUCE_USERNAME:$SAUCE_ACCESS_KEY'@localhost:4445/wd/hub"}}}}' 
export IPV4_URL
export IPV6_URL

lib/composer/bin/behat -c $BEHAT_YML $BEHAT_SUITE_OPTION $BEHAT_TAG_OPTION $BEHAT_TAGS $BEHAT_FEATURE -v

if [ $? -eq 0 ]
then
	PASSED=true
else
	PASSED=false
fi

if [ ! -z "$SAUCE_USERNAME" ] && [ ! -z "$SAUCE_ACCESS_KEY" ] && [ -e /tmp/saucelabs_sessionid ]
then
	SAUCELABS_SESSIONID=`cat /tmp/saucelabs_sessionid`
	curl -X PUT -s -d "{\"passed\": $PASSED}" -u $SAUCE_USERNAME:$SAUCE_ACCESS_KEY https://saucelabs.com/rest/v1/$SAUCE_USERNAME/jobs/$SAUCELABS_SESSIONID

	printf "\n${RED}SAUCELABS RESULTS:${BLUE} https://saucelabs.com/jobs/$SAUCELABS_SESSIONID\n${NC}"
fi

if [ "$PASSED" = true ]
then
	exit 0
else
	exit 1
fi
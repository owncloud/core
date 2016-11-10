#!/usr/bin/env bash

composer install

OC_PATH=../../
OCC=${OC_PATH}occ
BEHAT=vendor/bin/behat

SCENARIO_TO_RUN=$1
HIDE_OC_LOGS=$2

function env_alt_home_enable {
	$OCC app:enable testing
	$OCC config:app:set testing enable_alt_user_backend --value yes
}

function env_alt_home_clear {
	$OCC app:disable testing
}

function env_encryption_enable {
	$OCC app:enable encryption
	$OCC encryption:enable
}

function env_encryption_disable {
	$OCC encryption:disable
	$OCC app:disable encryption
}

# avoid port collision on jenkins - use $EXECUTOR_NUMBER
if [ -z "$EXECUTOR_NUMBER" ]; then
    EXECUTOR_NUMBER=0
fi
PORT=$((8080 + $EXECUTOR_NUMBER))
echo $PORT
php -S localhost:$PORT -t ../.. &
PHPPID=$!
echo $PHPPID

PORT_FED=$((8180 + $EXECUTOR_NUMBER))
echo $PORT_FED
php -S localhost:$PORT_FED -t ../.. &
PHPPID_FED=$!
echo $PHPPID_FED

export TEST_SERVER_URL="http://localhost:$PORT/ocs/"
export TEST_SERVER_FED_URL="http://localhost:$PORT_FED/ocs/"

#Enable external storage app
$OCC app:enable files_external

mkdir -p work/local_storage
OUTPUT_CREATE_STORAGE=`$OCC files_external:create local_storage local null::null -c datadir=./build/integration/work/local_storage` 

ID_STORAGE=`echo $OUTPUT_CREATE_STORAGE | awk {'print $5'}`

$OCC files_external:option $ID_STORAGE enable_sharing true

if test "$OC_TEST_ALT_HOME" = "1"; then
	env_alt_home_enable
fi

# Enable encryption if requested
if test "$OC_TEST_ENCRYPTION_ENABLED" = "1"; then
	env_encryption_enable
	BEHAT_FILTER_TAGS="~@no_encryption"
fi

if test "$BEHAT_FILTER_TAGS"; then
	BEHAT_PARAMS='{ 
		"gherkin": {
			"filters": {
				"tags": "'"$BEHAT_FILTER_TAGS"'"
			}
		}
	}'
fi

BEHAT_PARAMS="$BEHAT_PARAMS" $BEHAT --strict -f junit -f pretty $SCENARIO_TO_RUN
RESULT=$?

kill $PHPPID
kill $PHPPID_FED

$OCC files_external:delete -y $ID_STORAGE

#Disable external storage app
$OCC app:disable files_external

if test "$OC_TEST_ALT_HOME" = "1"; then
	env_alt_home_clear
fi

# Disable encryption if requested
if test "$OC_TEST_ENCRYPTION_ENABLED" = "1"; then
	env_encryption_disable
fi

if [ -z $HIDE_OC_LOGS ]; then
	tail "${OC_PATH}/data/owncloud.log"
fi

echo "runsh: Exit code: $RESULT"
exit $RESULT


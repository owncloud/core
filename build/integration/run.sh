#!/usr/bin/env bash

composer install

OC_PATH=../../
OCC=${OC_PATH}occ

SCENARIO_TO_RUN=$1
HIDE_OC_LOGS=$2

function enableMD5HomeStorage {
	$OCC app:enable testing
	OUTPUT_ENABLING_ALT_USER_BACKEND=`$OCC config:app:set testing enable_alt_user_backend --value yes` 
}

function cleanupMD5HomeStorage {
	$OCC app:disable testing
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

if test "$MD5_HOME_STORAGE" = "1"; then
	enableMD5HomeStorage
fi

vendor/bin/behat --strict -f junit -f pretty $SCENARIO_TO_RUN
RESULT=$?

kill $PHPPID
kill $PHPPID_FED

$OCC files_external:delete -y $ID_STORAGE

#Disable external storage app
$OCC app:disable files_external

if test "$MD5_HOME_STORAGE" = "1"; then
	cleanupMD5HomeStorage
fi

if [ -z $HIDE_OC_LOGS ]; then
	tail "${OC_PATH}/data/owncloud.log"
fi

echo "runsh: Exit code: $RESULT"
exit $RESULT


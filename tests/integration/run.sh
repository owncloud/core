#!/usr/bin/env bash

#composer install

# from http://stackoverflow.com/a/630387
SCRIPT_PATH="`dirname \"$0\"`"              # relative
SCRIPT_PATH="`( cd \"$SCRIPT_PATH\" && pwd )`"  # absolutized and normalized

echo 'Script path: '$SCRIPT_PATH

OC_PATH=$SCRIPT_PATH/../../
OCC=${OC_PATH}occ
BEHAT=${OC_PATH}lib/composer/behat/behat/bin/behat

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

function env_encryption_enable_master_key {
	env_encryption_enable
	$OCC encryption:select-encryption-type masterkey --yes
}

function env_encryption_enable_user_keys {
	env_encryption_enable
	$OCC encryption:select-encryption-type user-keys --yes
}

function env_encryption_disable {
	$OCC encryption:disable
	$OCC app:disable encryption
}

function env_encryption_disable_master_key {
	env_encryption_disable
	$OCC config:app:delete encryption useMasterKey
}

function env_encryption_disable_users_key {
	env_encryption_disable
	$OCC config:app:delete encryption userSpecificKey
}

# avoid port collision on jenkins - use $EXECUTOR_NUMBER
if [ -z "$EXECUTOR_NUMBER" ]; then
    EXECUTOR_NUMBER=0
fi
PORT=$((8080 + $EXECUTOR_NUMBER))
echo $PORT
php -S localhost:$PORT -t "$OC_PATH" &
PHPPID=$!
echo $PHPPID

PORT_FED=$((8180 + $EXECUTOR_NUMBER))
echo $PORT_FED
php -S localhost:$PORT_FED -t ../.. &
PHPPID_FED=$!
echo $PHPPID_FED

export TEST_SERVER_URL="http://localhost:$PORT/ocs/"
export TEST_SERVER_FED_URL="http://localhost:$PORT_FED/ocs/"

#Set up personalized skeleton
$OCC config:system:set skeletondirectory --value="$(pwd)/skeleton"

#Enable external storage app
$OCC config:app:set core enable_external_storage --value=yes

mkdir -p work/local_storage || { echo "Unable to create work folder" >&2; exit 1; }
OUTPUT_CREATE_STORAGE=`$OCC files_external:create local_storage local null::null -c datadir=$SCRIPT_PATH/work/local_storage` 

ID_STORAGE=`echo $OUTPUT_CREATE_STORAGE | awk {'print $5'}`

$OCC files_external:option $ID_STORAGE enable_sharing true

if test "$OC_TEST_ALT_HOME" = "1"; then
	env_alt_home_enable
fi

# Enable encryption if requested
if test "$OC_TEST_ENCRYPTION_ENABLED" = "1"; then
	env_encryption_enable
	BEHAT_FILTER_TAGS="~@no_encryption&&~@no_default_encryption"
elif test "$OC_TEST_ENCRYPTION_MASTER_KEY_ENABLED" = "1"; then
	env_encryption_enable_master_key
	BEHAT_FILTER_TAGS="~@no_encryption&&~@no_masterkey_encryption"
elif test "$OC_TEST_ENCRYPTION_USER_KEYS_ENABLED" = "1"; then
	env_encryption_enable_user_keys
	BEHAT_FILTER_TAGS="~@no_encryption&&~@no_userkeys_encryption"
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
$OCC config:app:set core enable_external_storage --value=no

# Clear storage folder
rm -Rf work/local_storage/*

if test "$OC_TEST_ALT_HOME" = "1"; then
	env_alt_home_clear
fi

# Disable encryption if requested
if test "$OC_TEST_ENCRYPTION_ENABLED" = "1"; then
	env_encryption_disable
fi

if test "$OC_TEST_ENCRYPTION_MASTER_KEY_ENABLED" = "1"; then
	env_encryption_disable_master_key
fi

if test "$OC_TEST_ENCRYPTION_USER_KEYS_ENABLED" = "1"; then
	env_encryption_disable_users_key
fi

if [ -z $HIDE_OC_LOGS ]; then
	tail "${OC_PATH}/data/owncloud.log"
fi

echo "runsh: Exit code: $RESULT"
exit $RESULT


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
	$OCC config:app:set testing enable_alt_user_backend --value yes
}

function env_alt_home_clear {
	$OCC app:disable testing || { echo "Unable to disable testing app" >&2; exit 1; }
}

function env_encryption_enable {
	$OCC app:enable encryption
	$OCC encryption:enable
}

function env_encryption_enable_master_key {
	env_encryption_enable || { echo "Unable to enable masterkey encryption" >&2; exit 1; }
	$OCC encryption:select-encryption-type masterkey --yes
}

function env_encryption_enable_user_keys {
	env_encryption_enable || { echo "Unable to enable user-keys encryption" >&2; exit 1; }
	$OCC encryption:select-encryption-type user-keys --yes
}

function env_encryption_disable {
	$OCC encryption:disable
	$OCC app:disable encryption
}

function env_encryption_disable_master_key {
	env_encryption_disable || { echo "Unable to disable masterkey encryption" >&2; exit 1; }
	$OCC config:app:delete encryption useMasterKey
}

function env_encryption_disable_user_keys {
	env_encryption_disable || { echo "Unable to disable user-keys encryption" >&2; exit 1; }
	$OCC config:app:delete encryption userSpecificKey
}

declare -x TEST_SERVER_URL
declare -x TEST_SERVER_FED_URL
declare -x TEST_WITH_PHPDEVSERVER
[[ -z "${TEST_SERVER_URL}" || -z "${TEST_SERVER_FED_URL}" ]] && TEST_WITH_PHPDEVSERVER="true"

if [ "${TEST_WITH_PHPDEVSERVER}" != "true" ]; then
    echo "Not using php inbuilt server for running scenario ..."
    echo "Updating .htaccess for proper rewrites"
    $OCC config:system:set htaccess.RewriteBase --value /
    $OCC maintenance:update:htaccess
else
    echo "Using php inbuilt server for running scenario ..."

    # avoid port collision on jenkins - use $EXECUTOR_NUMBER
    declare -x EXECUTOR_NUMBER
    [[ -z "$EXECUTOR_NUMBER" ]] && EXECUTOR_NUMBER=0

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

    export TEST_SERVER_URL="http://localhost:$PORT"
    export TEST_SERVER_FED_URL="http://localhost:$PORT_FED"
fi

#Set up personalized skeleton
PREVIOUS_SKELETON_DIR=$($OCC --no-warnings config:system:get skeletondirectory)
$OCC config:system:set skeletondirectory --value="$(pwd)/skeleton"

#Enable external storage app
$OCC config:app:set core enable_external_storage --value=yes
$OCC config:system:set files_external_allow_create_new_local --value=true

PREVIOUS_TESTING_APP_STATUS=$($OCC --no-warnings app:list "^testing$")
if [[ "$PREVIOUS_TESTING_APP_STATUS" =~ ^Disabled: ]]
then
	$OCC app:enable testing || { echo "Unable to enable testing app" >&2; exit 1; }
	TESTING_ENABLED_BY_SCRIPT=true;
else
	TESTING_ENABLED_BY_SCRIPT=false;
fi

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
    if [[ $BEHAT_FILTER_TAGS != *@skip* ]]; then
    	BEHAT_FILTER_TAGS="$BEHAT_FILTER_TAGS&&~@skip"
   	fi
else
	BEHAT_FILTER_TAGS="~@skip&&~@masterkey_encryption"
fi

BEHAT_FILTER_TAGS="$BEHAT_FILTER_TAGS&&@api"

if test "$BEHAT_FILTER_TAGS"; then
	BEHAT_PARAMS='{ 
		"gherkin": {
			"filters": {
				"tags": "'"$BEHAT_FILTER_TAGS"'"
			}
		}
	}'
fi

if test "$BEHAT_SUITE"; then
	BEHAT_SUITE_OPTION="--suite=$BEHAT_SUITE"
else
	BEHAT_SUITE_OPTION=""
fi

BEHAT_PARAMS="$BEHAT_PARAMS" $BEHAT --strict -f junit -f pretty $BEHAT_SUITE_OPTION $SCENARIO_TO_RUN
RESULT=$?

if [ "${TEST_WITH_PHPDEVSERVER}" == "true" ]; then
    kill $PHPPID
    kill $PHPPID_FED
fi

$OCC files_external:delete -y $ID_STORAGE

#Disable external storage app
$OCC config:app:set core enable_external_storage --value=no

# Put back state of the testing app
if test "$TESTING_ENABLED_BY_SCRIPT" = true; then
	$OCC app:disable testing
fi

# Put back personalized skeleton
if test "A$PREVIOUS_SKELETON_DIR" = "A"; then
	$OCC config:system:delete skeletondirectory
else
	$OCC config:system:set skeletondirectory --value="$PREVIOUS_SKELETON_DIR"
fi

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
	env_encryption_disable_user_keys
fi

if [ -z $HIDE_OC_LOGS ]; then
	tail "${OC_PATH}/data/owncloud.log"
fi

echo "runsh: Exit code: $RESULT"
exit $RESULT

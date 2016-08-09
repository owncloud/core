#!/usr/bin/env bash

composer install

SCENARIO_TO_RUN=$1
HIDE_OC_LOGS=$2

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

APACHE_USER=`ps -ef | egrep '(httpd|apache2|apache)' | grep -v \`whoami\` | grep -v root | head -n1 | awk '{print $1}'`

OUTPUT_CREATE_STORAGE=`sudo -u $APACHE_USER ../../occ files_external:create local_storage local null::null -c datadir=./build/integration/local_storage` 

ID_STORAGE=`echo $OUTPUT_CREATE_STORAGE | awk {'print $5'}`

sudo -u $APACHE_USER ../../occ files_external:option $ID_STORAGE enable_sharing true

vendor/bin/behat -f junit -f pretty $SCENARIO_TO_RUN
RESULT=$?

kill $PHPPID
kill $PHPPID_FED

sudo -u $APACHE_USER ../../occ files_external:delete -y $ID_STORAGE

if [ -z $HIDE_OC_LOGS ]; then
	tail "../../data/owncloud.log"
fi

exit $RESULT


#!/bin/bash
#
# ownCloud
#
# @author Artur Neumann
# @copyright Copyright (c) 2017 Artur Neumann info@individual-it.net
#

# $1 URL on which server will listen, e.g. http://owncloud:8889
# $2 instance type being started (e.g. primary or IPv4 or IPv6)

# After return, the following global vars are available:
# serverPID PID of the server process created (if any)
# ERROR_STARTING_SERVER set to true if there was an error

function start_php_dev_server {
	HOST_AND_PORT=$(echo $1 | cut -d "/" -f 3)
	php -S $HOST_AND_PORT > /dev/null 2>&1 &
	serverPID=$!
	sleep 1

	ps -p $serverPID  > /dev/null 2>&1

	if [ $? -eq 1 ] ; then
		echo "could not start $2 PHP development webserver on $1"
		ERROR_STARTING_SERVER=true
	else
		echo "started $2 PHP dev. webserver with PID $serverPID on $1"
	fi
}

ENV_PARAM_MISSING=false
ERROR_STARTING_SERVER=false

if [ -z "$TEST_SERVER_URL" ]
then
	echo "environment variable TEST_SERVER_URL is not defined"
	ENV_PARAM_MISSING=true
fi

if [ "$ENV_PARAM_MISSING" = true ]
then
	echo "PHP development webserver not started"
	exit 1
fi

start_php_dev_server $TEST_SERVER_URL primary

if [ ! -z "$TEST_SERVER_FED_URL" ]
then
	start_php_dev_server $TEST_SERVER_FED_URL REMOTE_FEDERATION
fi

if [ "$ERROR_STARTING_SERVER" = true ]
then
	echo -e "\nnetstat output:\n"
	netstat -l -n -p
	exit 1
fi


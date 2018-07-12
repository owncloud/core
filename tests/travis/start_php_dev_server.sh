#!/bin/bash
#
# ownCloud
#
# @author Artur Neumann
# @copyright Copyright (c) 2017 Artur Neumann info@individual-it.net
#

# $1 hostname[:port] on which server will listen
# $2 instance type being started (e.g. primary or IPv4 or IPv6)

# After return, the following global vars are available:
# serverPID PID of the server process created (if any)
# ERROR_STARTING_SERVER set to true if there was an error

function start_php_dev_server {
	php -S $1 &
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

if [ -z "$SRV_HOST_NAME" ]
then
	echo "environment variable SRV_HOST_NAME is not defined"
	ENV_PARAM_MISSING=true
fi

if [ -z "$SRV_HOST_PORT" ]
then
	echo "environment variable SRV_HOST_PORT is not defined"
	ENV_PARAM_MISSING=true
fi

if [ "$ENV_PARAM_MISSING" = true ]
then
	echo "PHP development webserver not started"
	exit 1
fi

start_php_dev_server $SRV_HOST_NAME:$SRV_HOST_PORT primary

if [ ! -z "$REMOTE_FED_SRV_HOST_NAME" ] && [ ! -z "$REMOTE_FED_SRV_HOST_PORT" ]
then
	start_php_dev_server $REMOTE_FED_SRV_HOST_NAME:$REMOTE_FED_SRV_HOST_PORT REMOTE_FEDERATION
fi

if [ ! -z "$IPV4_HOST_NAME" ] && [ "$SRV_HOST_NAME" != "$IPV4_HOST_NAME" ]
then
	start_php_dev_server $IPV4_HOST_NAME:$SRV_HOST_PORT IPv4
fi

if [ ! -z "$IPV6_HOST_NAME" ] && [ "$SRV_HOST_NAME" != "$IPV6_HOST_NAME" ]
then
	start_php_dev_server $IPV6_HOST_NAME:$SRV_HOST_PORT IPv6
fi

if [ "$ERROR_STARTING_SERVER" = true ]
then
	echo -e "\nnetstat output:\n"
	netstat -l -n -p
	exit 1
fi


#!/bin/bash
#
# ownCloud
#
# @author Artur Neumann
# @copyright 2017 Artur Neumann info@individual-it.net
#

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

php -S $SRV_HOST_NAME:$SRV_HOST_PORT > /dev/null 2>&1 &
serverPID=$!
sleep 1

ps -p $serverPID  > /dev/null 2>&1

if [ $? -eq 1 ] ; then
	echo "could not start PHP development webserver"
	ERROR_STARTING_SERVER=true
	# exit 1
else
	echo "started PHP dev. webserver with PID $serverPID"
fi

if [ ! -z "$IPV4_HOST_NAME" ] && [ "$SRV_HOST_NAME" != "$IPV4_HOST_NAME" ]
then
	php -S $IPV4_HOST_NAME:$SRV_HOST_PORT > /dev/null 2>&1 &
	if [ $? -eq 1 ] ; then
		echo "could not start IPV4 PHP development webserver"
		ERROR_STARTING_SERVER=true
	else
		echo "started IPv4 PHP dev. webserver with PID $serverPID"
	fi
fi

if [ ! -z "$IPV6_HOST_NAME" ] && [ "$SRV_HOST_NAME" != "$IPV6_HOST_NAME" ]
then
	php -S $IPV6_HOST_NAME:$SRV_HOST_PORT > /dev/null 2>&1 &
	if [ $? -eq 1 ] ; then
		echo "could not start IPV6 PHP development webserver"
		ERROR_STARTING_SERVER=true
	else
		echo "started IPv6 PHP dev. webserver with PID $serverPID"
	fi
fi

if [ "$ERROR_STARTING_SERVER" = true ]
then
	echo -e "\nnetstat output:\n"
	netstat -l -n -p
	exit 1
fi


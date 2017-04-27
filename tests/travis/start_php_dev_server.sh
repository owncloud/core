#!/bin/bash
#
# ownCloud
#
# @author Artur Neumann
# @copyright 2017 Artur Neumann info@individual-it.net
#

php -S $SRV_HOST_NAME:$SRV_HOST_PORT > /dev/null 2>&1 &
serverPID=$!
sleep 1

ps -p $serverPID  > /dev/null 2>&1

if [ $? -eq 1 ] ; then
	echo "could not start PHP development webserver"
	echo -e "\nnetstat output:\n"
	netstat -l -n -p
	exit 1
else
	echo "started PHP dev. webserver with PID $serverPID"
fi


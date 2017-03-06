#!/bin/bash
#
# ownCloud
#
# @author Artur Neumann
# @copyright 2017 Artur Neumann info@individual-it.net
#

if [ "$SRV_HOST_PORT" == "80" ]
then
	BASE_URL="http://$SRV_HOST_NAME/$SRV_HOST_URL"
else
	BASE_URL="http://$SRV_HOST_NAME:$SRV_HOST_PORT/$SRV_HOST_URL"
fi

export BEHAT_PARAMS='{"extensions" : {"Behat\\MinkExtension" : {"base_url" : "'$BASE_URL'","selenium2":{"wd_host":"http://'$SAUCE_USERNAME:$SAUCE_ACCESS_KEY'@localhost:4445/wd/hub"}}}}'
lib/composer/bin/behat -c tests/ui/config/behat.yml

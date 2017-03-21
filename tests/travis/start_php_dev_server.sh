#!/bin/bash
#
# ownCloud
#
# @author Artur Neumann
# @copyright 2017 Artur Neumann info@individual-it.net
#


set -e

php -S $SRV_HOST_NAME:$SRV_HOST_PORT > /dev/null 2>&1 &

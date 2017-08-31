#!/bin/bash
#
## 
## Usage: setup-environment.sh 
##
## This script will setup an ownCloud development environment on a Debian-Linux
## distribution. 
##
set -euo pipefail
IFS=$'\n\t'
REQUIRED_ARGS=2

if [ "$( whoami )" == 'root' ]
then
  echo 'Do not run this script as root.'
  echo 'Please run it as your webserver user.'
  exit -1
fi;

## ---------------------------------------------------- ##
## Variables
## ---------------------------------------------------- ##

lockfile=.setup-environment.lock

function check_user()
{
  if [ "$( whoami )" == "root" ]; then
    echo 'This script should not be executed as root.'
    echo 'Please run it as your web user'
    exit -1
  fi
}

function check_permissions()
{
  echo 'Checking user, group, and permissions'

  if [ "$directory_owner" != "$www_user" ] && [ -z "$directory_permissions" ]; then
    echo "Unable to write to $owncloud_directory."
    echo "Please ensure that $www_user has read/write access to $owncloud_directory"
    exit -1
  fi

  echo 'User & group permissions pass.'
}

function install_required_packages()
{
  # Ensure that Apt’s cache is up to date
  sudo apt-get -y -q update

  # Auto-install the required dependencies with a minimum of output
  sudo apt-get install -y -q wget make npm nodejs nodejs-legacy unzip git
}

function main()
{

  # Users
  local www_user="$1"

  # Directories
  local owncloud_directory="$2"

  echo "Running script with webserver user: $www_user and directory: $owncloud_directory"
  echo 

  # Directory owners
  directory_owner=$( stat -c "%A %U %G" "$owncloud_directory" )

  # Directory permissions
  directory_permissions=$( stat -c %a "$owncloud_directory" | grep '[67]..' )

  check_user
  check_permissions

  echo 'Preparing ownCloud development environment'

  install_required_packages

  # Install the required third-party packages
  make

  echo 'Finished preparing ownCloud development environment'
}

if ( set -o noclobber; echo "$$" > "$lockfile") 2> /dev/null; 
then
   trap 'rm -f "$lockfile"; exit $?' INT TERM EXIT

   if [ $# -ne $REQUIRED_ARGS ]; then
     echo "Usage: $( basename $0 ) <webserver user> <owncloud install dir>"
     exit $#
   fi

   if [ $( grep -E 'Debian|Ubuntu' /etc/issue ) ]; then 
     main "$1" "$2"
   else
     echo 'Currently, only Debian-based distributions are supported'
     echo 'Others are planned to be supported in the future.'
     exit -1
   fi

   rm -f "$lockfile"
   trap - INT TERM EXIT
else
   echo "Failed to acquire lockfile: $lockfile." 
   echo "Held by $(cat $lockfile)"
fi

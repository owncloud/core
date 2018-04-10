#!/bin/bash

set -e

## 
## This script checks if the required dependency packages have been installed
## If one or more have not been installed, then it installs them.
## It currently only works on Ubuntu 17.10 and has to be run as root.
##
## Author: Matthew Setter <matthew@matthewsetter.com>
##

function check_dependencies()
{
  core_dependencies=(
    apache2 
    libapache2-mod-php7.1 
    mariadb-server 
    openssl 
    php-imagick 
    php-smbclient 
    php-ssh2 
    php7.1-common 
    php7.1-curl 
    php7.1-gd 
    php7.1-imap 
    php7.1-intl 
    php7.1-json 
    php7.1-ldap 
    php7.1-mbstring 
    php7.1-mcrypt 
    php7.1-mysql 
    php7.1-pgsql 
    php7.1-sqlite3 
    php7.1-xml 
    php7.1-zip
  )

  missing_dependencies=()

  # Console colours
  RED='\033[0;31m'      # Red
  GREEN='\032[0;31m'    # Green
  NC='\033[0m'          # No Color

  echo "Checking that the required packages have been installed"

  for package in ${!core_dependencies[@]}
  do
    pkg=${core_dependencies[$package]}
    
    if dpkg -l ${pkg} 2>/dev/null | grep -E -q "^ii"  
    then
      printf " \u2714 ${pkg} is installed\n"
    else
      printf " \u274c ${pkg} is ${RED}not${NC} installed\n"
      missing_dependencies+=(${pkg})
    fi
  done

  if (( ${#missing_dependencies[@]} != 0 ))
  then 
    echo
    echo "Some dependencies are missing. They will now be installed."

    echo 
    echo "Updating APT cache"
    apt-get update --quiet 2>/dev/null

    echo "Installing missing dependencies"
    IFS=$' '
    apt-get install --quiet --assume-yes ${missing_dependencies[*]}
  else 
    echo 
    echo "All dependencies are installed."
    echo "Nothing left to do."
    echo "Exiting."
    exit 0
  fi
}

function check_distribution()
{
  distribution=$( grep -i "version_id" /etc/os-release | awk -F'=' '{print $2}' | tr -d '"')
  if [ $distribution != "17.10" ]
  then 
    echo "This script only supports Ubuntu 17.10"
    echo "Exiting."
    exit -1
  fi 
}

if [ $( whoami ) != "root" ]
then
  echo "This script needs to be run as root."
  echo "Exiting."
  exit 1
else
  check_distribution
  check_dependencies
fi

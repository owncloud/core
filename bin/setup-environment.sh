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

function which_distro()
{
  case "$( grep -Eoi 'Debian|SUSE|Ubuntu' /etc/issue )" in 
    "SUSE") 
      echo "SUSE"
      ;;
    "Ubuntu") 
      echo "Ubuntu"
      ;;
  esac

  redhat_release_file=/etc/redhat-release

  # Need to do a bit more work to detect RedHat-based distributions
  if [ -e "$redhat_release_file" ]; then
    case "$( grep -Eoi 'CentOS' $redhat_release_file )" in 
      "CentOS") 
        echo "CentOS"
        ;;
    esac
  fi
}

function install_required_packages()
{
  case "$( which_distro )" in 
    "SUSE") echo "Installing required packages on SUSE"
      install_required_suse_packages
      ;;
    "Ubuntu"|"Debian") echo "Installing required packages on Ubuntu/Debian"
      install_required_ubuntu_debian_packages
      ;;
    "CentOS") echo "Installing required packages on Centos"
      install_required_centos_packages
      ;;
  esac
}

function install_required_centos_packages()
{
  sudo yum update -q -y
  sudo yum --enablerepo=cr -q -y install wget make nodejs unzip git npm bzip2 file
  
  # Install PhantomJS - see https://www.bonusbits.com/wiki/HowTo:Install_PhantomJS_on_CentOS
  # It's not in the official repos, so needs to be installed independently.
  sudo yum install fontconfig freetype freetype-devel fontconfig-devel libstdc++
  sudo mkdir -p /opt/phantomjs
  wget https://bitbucket.org/ariya/phantomjs/downloads/phantomjs-2.1.1-linux-x86_64.tar.bz2 
  sudo tar -jxvf phantomjs-2.1.1-linux-x86_64.tar.bz2 --strip-components 1 --directory /opt/phantomjs/
  sudo ln -s /opt/phantomjs/bin/phantomjs /usr/bin/phantomjs
}

function install_required_suse_packages()
{
  sudo zypper --quiet --non-interactive install wget make nodejs6 \
    nodejs-common unzip git npm6 phantomjs
}

function install_required_ubuntu_debian_packages()
{
  sudo apt-get -y -q update && \
    apt-get install -y -q wget make npm \
      nodejs nodejs-legacy unzip git
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

   if which_distro; then 
     main "$1" "$2"
   else
     echo 'Currently, only Debian, Ubuntu, SUSE, and CentOS distributions are supported'
     echo 'Others are planned to be supported in the future.'
     exit -1
   fi

   rm -f "$lockfile"
   trap - INT TERM EXIT
else
   echo "Failed to acquire lockfile: $lockfile." 
   echo "Held by $(cat $lockfile)"
fi

#!/bin/bash
#
# ownCloud
#
# @author Thomas Müller
# @author Morris Jobke
# @author Martin Reinhardt
# @copyright 2012, 2013 Thomas Müller thomas.mueller@tmit.eu
# @copyright 2014 Morris Jobke hey@morrisjobke.de
# @copyright 2014 Martin Reinhardt contact@martinreinhardt-online.de
#

BASEDIR=$PWD
DB_TYPE=""
# default values
DB_HOST="localhost"
DB_USER="oc_autotest"
DB_PASS="oc_autotest"
DB_NAME="oc_autotest"
ADMIN_USER="admin"
ADMIN_PASS="admin"

while [[ $# > 1 ]]
do
  key="$1"
  shift
  case $key in
    --help)
      echo "usage $0 -d mysql -h localhost -n oc_testing -u user -p password -a admin_pass $0 --help --oc_version OC50 --rc_version RC07 --db_type mysql --db_name oc_testing --db_user root --db_password password"
      exit 0
      ;;
    -d|--db_type)        
      DB_TYPE="$1"
      shift
      ;;
    -h|--db_host)        
      DB_HOST="$1"
      shift
      ;;
    -n|--db_name)        
      DB_NAME="$1"
      shift
      ;;
    -u|--db_user)        
      DB_USER="$1"
      shift
      ;;
    -p|--db_password)        
      DB_PASS="$1"
      shift
      ;;
    -a|--admin_password)        
      ADMIN_PASS="$1"
      shift
      ;;
    *)
      echo "Unkown option"
      echo "Use --help for usage"
      exit 0
    ;;
  esac
done

# check for database parameter
if [ ${DB_TYPE} ]; then
	DBCONFIGS="sqlite mysql pgsql oracle"
	FOUND=0
	for DBCONFIG in $DBCONFIGS; do
		if [ ${DB_TYPE} = $DBCONFIG ]; then
			FOUND=1
			break
		fi
	done
	if [ $FOUND = 0 ]; then
		echo -e "Unsupported database type \"${DB_TYPE}\"\n" >&2
		exit 2
	fi
else
	echo "Please pass in a database to use as first parameter e.g. -d mysql " >&2
	exit 1
fi

# check if config dir and file is writable
if ! [[ -w config && ( !( -e config/config.php ) || -w config/config.php ) ]]; then
	echo "Please enable write permissions on config and config/config.php" >&2
	exit 1
fi

# use tmpfs for datadir - should speedup unit test execution
if [ -d /dev/shm ]; then
	DATADIR=/dev/shm/data-autotest
else
	DATADIR=$BASEDIR/data-autotest
fi

echo "Setup environment for ${DB_TYPE} testing ..."
# revert changes to tests/data
git checkout tests/data/*

# reset data directory
rm -rf $DATADIR
mkdir $DATADIR

cp tests/preseed-config.php config/config.php

# # # # # #
# SQLite  #
# # # # # #
if [ "${DB_TYPE}" == "sqlite" ] ; then
	cat > ./config/autoconfig.php <<DELIM
<?php
\$AUTOCONFIG = array (
	'installed' => false,
	'dbtype' => 'sqlite',
	'dbtableprefix' => 'oc_',
	'adminlogin' => '${ADMIN_USER}',
	'adminpass' => '${ADMIN_PASS}',
	'directory' => '$DATADIR',
);
DELIM
fi

# # # # #
# MySQL #
# # # # #
if [ "${DB_TYPE}" == "mysql" ] ; then
	cat > ./config/autoconfig.php <<DELIM
<?php
\$AUTOCONFIG = array (
	'installed' => false,
	'dbtype' => 'mysql',
	'dbtableprefix' => 'oc_',
	'adminlogin' => '${ADMIN_USER}',
	'adminpass' => '${ADMIN_PASS}',
	'directory' => '$DATADIR',
	'dbhost' => '${DB_HOST}',
	'dbuser' => '${DB_USER}',
	'dbname' => '${DB_NAME}',
	'dbpass' => '${DB_PASS}',
);
DELIM
fi

# # # # # # # #
# PostgreSQL  #
# # # # # # # #
if [ "${DB_TYPE}" == "pgsql" ] ; then
	cat > ./config/autoconfig.php <<DELIM
<?php
\$AUTOCONFIG = array (
	'installed' => false,
	'dbtype' => 'pgsql',
	'dbtableprefix' => 'oc_',
	'adminlogin' => '${ADMIN_USER}',
	'adminpass' => '${ADMIN_PASS}',
	'directory' => '$DATADIR',
	'dbhost' => '${DB_HOST}',
	'dbuser' => '${DB_USER}',
	'dbname' => '${DB_NAME}',
	'dbpass' => '${DB_PASS}',
);
DELIM

fi

# # # # # #
# Oracle  #
# # # # # #
if [ "${DB_TYPE}" == "oracle" ] ; then
	${DB_NAME}="XE"
	build/prepareTestsOracle.sh ${DB_HOST} ${DB_NAME} ${DB_USER} ${DB_PASS} ${ADMIN_USER} ${ADMIN_PASS} ${DATADIR}
fi

echo "Trigger ownCloud installation"
php -f index.php | grep -i -C9999 error && echo "Error during setup" && exit 101

echo "Enable apps ..."
cd tests
php -f enable_all.php | grep -i -C9999 error && echo "Error during setup" && exit 101
cd $BASEDIR

# show environment
echo "ownCloud configuration:"
cat $BASEDIR/config/config.php

echo "ownCloud data directory:"
ls -ll $DATADIR

echo "owncloud.log:"
cat $DATADIR/owncloud.log

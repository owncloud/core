#!/bin/bash
#
# ownCloud
#
# @author Thomas Müller
# @author Morris Jobke
# @copyright 2012, 2013 Thomas Müller thomas.mueller@tmit.eu
# @copyright 2014 Morris Jobke hey@morrisjobke.de
#

DATABASENAME=oc_autotest
DATABASEUSER=oc_autotest
ADMINLOGIN=admin
BASEDIR=$PWD

DBCONFIGS="sqlite mysql pgsql oracle"

# set oracle home if it is not set
TRAVIS_ORACLE_HOME="/usr/lib/oracle/xe/app/oracle/product/10.2.0/server"
[ -z "$ORACLE_HOME" ] && ORACLE_HOME=$TRAVIS_ORACLE_HOME

if ! [ -w config -a -w config/config.php ]; then
	echo "Please enable write permissions on config and config/config.php" >&2
	exit 1
fi

if [ $1 ]; then
	FOUND=0
	for DBCONFIG in $DBCONFIGS; do
		if [ $1 = $DBCONFIG ]; then
			FOUND=1
			break
		fi
	done
	if [ $FOUND = 0 ]; then
		echo -e "Unknown database config name \"$1\"\n" >&2
		exit 2
	fi
else
	exit 1

fi

# Back up existing (dev) config if one exists
if [ -f config/config.php ]; then
	mv config/config.php config/config-autotest-backup.php
fi

# use tmpfs for datadir - should speedup unit test execution
if [ -d /dev/shm ]; then
  DATADIR=/dev/shm/data-autotest
else
  DATADIR=$BASEDIR/data-autotest
fi

echo "Using database $DATABASENAME"

# create autoconfig for sqlite, mysql and postgresql
cat > ./tests/autoconfig-sqlite.php <<DELIM
<?php
\$AUTOCONFIG = array (
  'installed' => false,
  'dbtype' => 'sqlite',
  'dbtableprefix' => 'oc_',
  'adminlogin' => '$ADMINLOGIN',
  'adminpass' => 'admin',
  'directory' => '$DATADIR',
);
DELIM

cat > ./tests/autoconfig-mysql.php <<DELIM
<?php
\$AUTOCONFIG = array (
  'installed' => false,
  'dbtype' => 'mysql',
  'dbtableprefix' => 'oc_',
  'adminlogin' => '$ADMINLOGIN',
  'adminpass' => 'admin',
  'directory' => '$DATADIR',
  'dbuser' => '$DATABASEUSER',
  'dbname' => '$DATABASENAME',
  'dbhost' => 'localhost',
  'dbpass' => 'owncloud',
);
DELIM

cat > ./tests/autoconfig-pgsql.php <<DELIM
<?php
\$AUTOCONFIG = array (
  'installed' => false,
  'dbtype' => 'pgsql',
  'dbtableprefix' => 'oc_',
  'adminlogin' => '$ADMINLOGIN',
  'adminpass' => 'admin',
  'directory' => '$DATADIR',
  'dbuser' => '$DATABASEUSER',
  'dbname' => '$DATABASENAME',
  'dbhost' => 'localhost',
  'dbpass' => 'owncloud',
);
DELIM

cat > ./tests/autoconfig-oracle.php <<DELIM
<?php
\$AUTOCONFIG = array (
  'installed' => false,
  'dbtype' => 'oci',
  'dbtableprefix' => 'oc_',
  'adminlogin' => '$ADMINLOGIN',
  'adminpass' => 'admin',
  'directory' => '$DATADIR',
  'dbuser' => '$DATABASENAME',
  'dbname' => 'XE',
  'dbhost' => 'localhost',
  'dbpass' => 'owncloud',
);
DELIM

echo "Setup environment for $1 testing ..."
# back to root folder
cd $BASEDIR

# revert changes to tests/data
git checkout tests/data/*

# reset data directory
rm -rf $DATADIR
mkdir $DATADIR

# remove the old config file
#rm -rf config/config.php
cp tests/preseed-config.php config/config.php

# drop database
if [ "$1" == "mysql" ] ; then
	mysql -u $DATABASEUSER -powncloud -e "DROP DATABASE $DATABASENAME"
fi
if [ "$1" == "pgsql" ] ; then
	dropdb -U $DATABASEUSER $DATABASENAME
fi
if [ "$1" == "oracle" ] ; then
    echo "Load Oracle environment variables so that we can run 'sqlplus'."
    . $ORACLE_HOME/bin/oracle_env.sh

	echo "drop the database"
	sqlplus64 -s -l / as sysdba <<EOF
		drop user $DATABASENAME cascade;
EOF

	echo "create the database"
	sqlplus64 -s -l / as sysdba <<EOF
		create user $DATABASENAME identified by owncloud;
		alter user $DATABASENAME default tablespace users
		temporary tablespace temp
		quota unlimited on users;
		grant create session
		, create table
		, create procedure
		, create sequence
		, create trigger
		, create view
		, create synonym
		, alter session
		to $DATABASENAME;
		exit;
EOF
    # there was a maximum cursor limit exceed
    # therefore increase the limit
    sqlplus64 -s -l / as sysdba <<EOF
        ALTER SYSTEM SET open_cursors = 1000 SCOPE=BOTH;
EOF
fi

# copy autoconfig
cp $BASEDIR/tests/autoconfig-$1.php $BASEDIR/config/autoconfig.php

# trigger installation
echo "INDEX"
php -f index.php | grep -i -C9999 error && echo "Error during setup" && exit 101
echo "END INDEX"

#test execution
echo "Clean up directories and enable apps ..."
cd tests
rm -rf coverage-html-$1
mkdir coverage-html-$1
php -f enable_all.php | grep -i -C9999 error && echo "Error during setup" && exit 101

# show environment


echo "owncloud configuration:"
cat $BASEDIR/config/config.php


echo "data directory:"
ls -ll $DATADIR

echo "owncloud.log:"
cat $DATADIR/owncloud.log

cd $BASEDIR

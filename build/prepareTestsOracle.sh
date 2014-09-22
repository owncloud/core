#!/bin/bash
#
# ownCloud - prepareTestOracle.sh
#
# @author Morris Jobke
# @author Martin Reinhardt
# @copyright 2014 Morris Jobke hey@morrisjobke.de
# @copyright 2014 Martin Reinhardt contact@martinreinhardt-online.de
#

DB_HOST=$1
DB_NAME=$2
DB_USER=$3
DB_PASS=$4
ADMIN_USER=$4
ADMIN_PASS=$6
DATADIR=$7

# set oracle home if it is not set
TRAVIS_ORACLE_HOME="/usr/lib/oracle/xe/app/oracle/product/10.2.0/server"
[ -z "$ORACLE_HOME" ] && ORACLE_HOME=$TRAVIS_ORACLE_HOME

echo "Load Oracle environment variables so that we can run 'sqlplus'."
 . $ORACLE_HOME/bin/oracle_env.sh

echo "drop the database"
sqlplus64 -s -l / as sysdba <<EOF
	drop user ${DB_NAME} cascade;
EOF

echo "create the database"
sqlplus64 -s -l / as sysdba <<EOF
	create user ${DB_NAME} identified by owncloud;
	alter user ${DB_NAME} default tablespace users
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
	to ${DB_NAME};
	exit;
EOF

# there was a maximum cursor limit exceed
# therefore increase the limit
sqlplus64 -s -l / as sysdba <<EOF
	ALTER SYSTEM SET open_cursors = 1000 SCOPE=BOTH;
EOF

cat > ./config/autoconfig.php <<DELIM
<?php
\$AUTOCONFIG = array (
  'installed' => false,
  'dbtype' => 'oci',
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


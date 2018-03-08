#!/usr/bin/env bash
set -xeo pipefail

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

declare -x ADMIN_LOGIN
[[ -z "${ADMIN_LOGIN}" ]] && ADMIN_LOGIN="admin"

declare -x ADMIN_PASSWORD
[[ -z "${ADMIN_PASSWORD}" ]] && ADMIN_PASSWORD="admin"

declare -x DATA_DIRECTORY
[[ -z "${DATA_DIRECTORY}" ]] && DATA_DIRECTORY="/drone/src/data"

declare -x DB_TYPE
[[ -z "${DB_TYPE}" ]] && DB_TYPE="sqlite"

declare -x DB_PREFIX
[[ -z "${DB_PREFIX}" ]] && DB_PREFIX="oc_"

declare -x DB_USERNAME
[[ -z "${DB_USERNAME}" ]] && DB_USERNAME="owncloud"

declare -x DB_PASSWORD
[[ -z "${DB_PASSWORD}" ]] && DB_PASSWORD="owncloud"

declare -x DB_NAME
[[ -z "${DB_NAME}" ]] && DB_NAME="owncloud"


# Backup any existing config.php
if [[ -f config/config.php ]]; then
  cp config/config.php config/config.backup.php
fi

# Cleanup data  / config
rm -rf ${DATA_DIRECTORY} config/config.php

echo "waiting for database to be ready"
case "${DB_TYPE}" in
  mariadb)
    wait-for-it mariadb:3306
    DB=mysql
    ;;
  mysql)
    wait-for-it mysql:3306
    DB=mysql
    ;;
  mysqlmb4)
    wait-for-it mysqlmb4:3306
    DB=mysql
    ;;
  postgres)
    wait-for-it postgres:5432
    DB=pgsql
    ;;
  oracle)
    wait-for-it oracle:1521
    DB=oci
    DB_USERNAME=autotest
    DB_NAME='XE'
    ;;
  sqlite)
    DB=sqlite
    ;;
  *)
    echo "Unsupported database type!"
    exit 1
    ;;
esac

install_cmd="maintenance:install -vvv \
      --database=${DB} \
      --database-name=${DB_NAME} \
      --database-table-prefix=${DB_PREFIX} \
      --admin-user=${ADMIN_LOGIN} \
      --admin-pass=${ADMIN_PASSWORD} \
      --data-dir=${DATA_DIRECTORY} "

if [[ "${DB_TYPE}" != "sqlite" ]]; then
  install_cmd+=" --database-host=${DB_TYPE} \
                 --database-user=${DB_USERNAME} \
                 --database-pass=${DB_PASSWORD}"
fi


php occ ${install_cmd}

echo "enabling apps"
php occ app:enable files_sharing
php occ app:enable files_trashbin
php occ app:enable files_versions
php occ app:enable provisioning_api
php occ app:enable federation
php occ app:enable federatedfilesharing

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

PLUGIN_DB_TIMEOUT=45
plugin_wait_for_oracle() {
    local sqlplus=/usr/lib/oracle/12.2/client64/bin/sqlplus
    local result
    local host_name="${DB_TYPE}"
    if ! grep -q ":" <<< "${host_name}"
    then
        host_name="${host_name}:1521"
    fi


    echo "wait-for-oracle: waiting ${PLUGIN_DB_TIMEOUT} seconds for ${host_name}"
    for i in $(seq "${PLUGIN_DB_TIMEOUT}"); do
        # disabled to not abort testing the connection
        set +eo pipefail

        echo "QUIT" | $sqlplus -L "${DB_USERNAME}/${DB_PASSWORD}@${host_name}/${DB_NAME}" | grep "Connected to:" > /dev/null 2>&1
        result=$?

        # reenable pipefail
        set -eo pipefail

        if [ ${result} -eq 0 ] ; then
            echo "wait-for-oracle: ${host_name} available after ${i} seconds"
            break
        fi
        sleep 1
    done
    if [ ! ${result} -eq 0 ] ; then
        echo "wait-for-oracle: timeout - ${host_name} still not available after ${PLUGIN_DB_TIMEOUT} seconds"
        exit 1
    fi

}

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
  mysql8)
    wait-for-it mysql8:3306
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
    plugin_wait_for_oracle
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

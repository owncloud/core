#!/usr/bin/env bash
set -xeo pipefail

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

if [[ -f config/config.php ]]; then
  cp config/config.php config/config.backup.php
fi

rm -rf data config/config.php

if [[ "${DB_TYPE}" == "none" || "${DB_TYPE}" == "sqlite" ]]; then
  ./occ maintenance:install -vvv --database=sqlite --database-name=owncloud --database-table-prefix=oc_ --admin-user=admin --admin-pass=admin --data-dir=$(pwd)/data
else
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
    *)
      echo "Unsupported database type!"
      exit 1
      ;;
  esac

  ./occ maintenance:install -vvv --database=${DB} --database-host=${DB_TYPE} --database-user=owncloud --database-pass=owncloud --database-name=owncloud --database-table-prefix=oc_ --admin-user=admin --admin-pass=admin --data-dir=$(pwd)/data
fi

./occ app:enable files_sharing
./occ app:enable files_trashbin
./occ app:enable files_versions
./occ app:enable provisioning_api
./occ app:enable federation
./occ app:enable federatedfilesharing

if [[ "${DB_TYPE}" == "none" || "${DB_TYPE}" == "sqlite" ]]; then
  GROUP=""
else
  GROUP="--group DB"
fi

exec ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest.xml ${GROUP} --log-junit tests/autotest-results-${DB_TYPE}.xml


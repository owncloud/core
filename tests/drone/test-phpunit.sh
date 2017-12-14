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
  DATABASEUSER=owncloud
  DATABASENAME=owncloud
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
      DATABASEUSER=autotest
      DATABASENAME='XE'
      ;;
    *)
      echo "Unsupported database type!"
      exit 1
      ;;
  esac

  ./occ maintenance:install -vvv --database=${DB} --database-host=${DB_TYPE} --database-user=${DATABASEUSER} --database-pass=owncloud --database-name=${DATABASENAME} --database-table-prefix=oc_ --admin-user=admin --admin-pass=admin --data-dir=$(pwd)/data
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

set_up_external_storage() {
    ./occ app:enable files_external
    case "${FILES_EXTERNAL_TYPE}" in
    webdav)
        wait-for-it owncloud_external:80
        cat > config/config.webdav.php <<DELIM
 <?php
 return array(
     'run'=>true,
     'host'=>'owncloud_external:80/owncloud/remote.php/webdav/',
     'user'=>'admin',
     'password'=>'admin',
     'root'=>'',
     'wait'=> 0
 );
DELIM
        ;;
    *)
        echo "Unsupported files external type!"
        exit 1
        ;;
    esac
}


if [[ ${ENABLE_COVERAGE} == "true" ]]; then
    if [[ -n ${FILES_EXTERNAL_TYPE} ]]; then
        set_up_external_storage
        exec phpdbg -d memory_limit=4096M -rr ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest-external.xml ${GROUP} --coverage-clover tests/autotest-external-clover-${DB_TYPE}.xml
    else
        exec phpdbg -d memory_limit=4096M -rr ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest.xml ${GROUP} --coverage-clover tests/autotest-clover-${DB_TYPE}.xml
    fi
else
    if [[ -n ${FILES_EXTERNAL_TYPE} ]]; then
        set_up_external_storage
        exec ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest-external.xml ${GROUP} --log-junit tests/autotest-external-results-${DB_TYPE}.xml
    else
        exec ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest.xml ${GROUP} --log-junit tests/autotest-results-${DB_TYPE}.xml    
    fi
fi

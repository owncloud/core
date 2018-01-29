#!/usr/bin/env bash
set -exo pipefail

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
    ./occ config:app:set core enable_external_storage --value=yes
    case "${FILES_EXTERNAL_TYPE}" in
    owncloud_webdav)
        wait-for-it owncloud_external:80
        FILES_EXTERNAL_TEST_TO_RUN=WebdavTest.php
        cat > apps/files_external/tests/config.webdav.php <<DELIM
 <?php
 return array(
     'run'=>true,
     'host'=>'owncloud_external:80/remote.php/webdav',
     'user'=>'admin',
     'password'=>'admin',
     'root'=>'',
     'wait'=> 0
 );
DELIM
        ;;
    apache_webdav)
        wait-for-it apache_webdav:80
        FILES_EXTERNAL_TEST_TO_RUN=WebdavTest.php
        mkdir -p /drone/webdav
        chown -R www-data:www-data /drone/webdav
        htpasswd -cb /drone/webdav.password admin admin
        chown www-data:www-data /drone/webdav.password
        chmod 640 /drone/webdav.password
        cat > apps/files_external/tests/config.webdav.php <<DELIM
 <?php
 return array(
     'run'=>true,
     'host'=>'apache_webdav:80/webdav',
     'user'=>'admin',
     'password'=>'admin',
     'root'=>'',
     'wait'=> 0
 );
DELIM
        ;;
    smb_docker)
        wait-for-it smb_docker:445
        FILES_EXTERNAL_TEST_TO_RUN=SmbTest.php
        cat > apps/files_external/tests//config.smb.php <<DELIM
<?php

return array(
    'run'=>true,
    'host'=>'smb_docker',
    'user'=>'test',
    'password'=>'test',
    'root'=>'',
    'share'=>'public',
);

DELIM
        ;;
    smb_windows)
        wait-for-it WIN-9GTFAS08C15:445
        FILES_EXTERNAL_TEST_TO_RUN=SmbTest.php
        cat > apps/files_external/tests//config.smb.php <<DELIM
<?php

return array(
    'run'=>true,
    'host'=>'WIN-9GTFAS08C15',
    'user'=>'smb-test',
    'password'=>'!owncloud123',
    'root'=>'',
    'share'=>'oc-test',
);

DELIM
        ;;

    swift_ceph)
        wait-for-it swift:5034
        FILES_EXTERNAL_TEST_TO_RUN=SwiftTest.php
        cat > apps/files_external/tests//config.swift.php <<DELIM
<?php

return array(
    'run'=>true,
    'url'=>'http://swift:5034/v2.0',
    'user'=>'test',
    'tenant'=>'testtenant',
    'password'=>'testing',
    'service_name'=>'testceph',
    'bucket'=>'swift',
    'region' => 'testregion',
);
DELIM
        ;;

    *)
        echo "Unsupported files external type \"${FILES_EXTERNAL_TYPE}\"!"
        exit 1
        ;;
    esac
}

FILES_EXTERNAL_BACKEND_PATH=apps/files_external/tests/Storage

if [[ "${ENABLE_COVERAGE}" == "true" ]]; then
    if [[ -n "${FILES_EXTERNAL_TYPE}" ]]; then
        set_up_external_storage
        phpdbg -d memory_limit=4096M -rr ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest-external.xml ${GROUP} --coverage-clover tests/autotest-external-clover-${DB_TYPE}.xml
        phpdbg -d memory_limit=4096M -rr ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest-external.xml ${GROUP} --coverage-clover tests/autotest-external-clover-${DB_TYPE}-${FILES_EXTERNAL_TYPE}.xml ${FILES_EXTERNAL_BACKEND_PATH}/${FILES_EXTERNAL_TEST_TO_RUN}
    else
        phpdbg -d memory_limit=4096M -rr ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest.xml ${GROUP} --coverage-clover tests/autotest-clover-${DB_TYPE}.xml
    fi
else
    if [[ -n "${FILES_EXTERNAL_TYPE}" ]]; then
        echo "run files external"
        set_up_external_storage

        ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest-external.xml ${GROUP} --log-junit tests/autotest-external-results-${DB_TYPE}.xml
        ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest-external.xml ${GROUP} --log-junit tests/autotest-external-results-${DB_TYPE}-${FILES_EXTERNAL_TYPE}.xml ${FILES_EXTERNAL_BACKEND_PATH}/${FILES_EXTERNAL_TEST_TO_RUN}
    else
        echo "normal"
        ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest.xml ${GROUP} --log-junit tests/autotest-results-${DB_TYPE}.xml
    fi
fi
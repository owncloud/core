#!/usr/bin/env bash
set -xeo pipefail

# Note this is a fix for issues with php7.2 where having php-memcached present
# leads to encountering segmentation faults
#
# Ref: https://github.com/owncloud-ci/php/issues/33

export ZEND_DONT_UNLOAD_MODULES=1

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

set_up_external_storage() {
    php occ app:enable files_external
    php occ config:app:set core enable_external_storage --value=yes
    case "${FILES_EXTERNAL_TYPE}" in
    webdav)
      wait-for-it -t 600 webdav:80
      cp tests/drone/configs/config.files_external.webdav-apache.php apps/files_external/tests/config.webdav.php
      FILES_EXTERNAL_TEST_TO_RUN=WebdavTest.php
      ;;
    samba)
      wait-for-it -t 600 samba:445
      cp tests/drone/configs/config.files_external.smb-samba.php apps/files_external/tests/config.smb.php
      FILES_EXTERNAL_TEST_TO_RUN=SmbTest.php
      ;;
    windows)
      wait-for-it -t 600 ${SMB_WINDOWS_HOST}:445
      cp tests/drone/configs/config.files_external.smb-windows.php apps/files_external/tests/config.smb.php
      FILES_EXTERNAL_TEST_TO_RUN=SmbTest.php
      ;;
    sftp)
      wait-for-it -t 600 sftp:22
      cp tests/drone/configs/config.files_external.sftp.php apps/files_external/tests/config.sftp.php
      FILES_EXTERNAL_TEST_TO_RUN=SftpTest.php
      ;;
    owncloud)
      wait-for-it -t 800 oc-server:8080
      curl -u admin:admin http://oc-server:8080/ocs/v1.php/cloud/users -d userid="test" -d password="test"
      cp tests/drone/configs/config.files_external.owncloud.php apps/files_external/tests/config.owncloud.php
      FILES_EXTERNAL_TEST_TO_RUN=OwncloudTest.php
      ;;
    *)
      echo "Unsupported files external type!"
      exit 1
      ;;
  esac
  FILES_EXTERNAL_TEST_TO_RUN="../apps/files_external/tests/Storage/${FILES_EXTERNAL_TEST_TO_RUN}"
}

if [[ "${DB_TYPE}" == "sqlite" || -z "${DB_TYPE}" || "${COVERAGE}" == "true" ]]; then
  GROUP=""
else
  GROUP="--group DB"
fi

# show a little debug information
php occ app:list

phpunit_cmd="php ../lib/composer/bin/phpunit"
if [[ "${COVERAGE}" == "true" ]]; then
    phpunit_cmd="phpdbg -d memory_limit=6G -rr ../lib/composer/bin/phpunit"
fi

if [[ -n "${FILES_EXTERNAL_TYPE}" ]]; then
    set_up_external_storage
    cd tests
    $phpunit_cmd --configuration phpunit-autotest-external.xml ${GROUP} --coverage-clover output/coverage/autotest-external-clover-"${DB_TYPE}".xml
    $phpunit_cmd --configuration phpunit-autotest-external.xml ${GROUP} --coverage-clover output/coverage/autotest-external-clover-"${DB_TYPE}"-"${FILES_EXTERNAL_TYPE}".xml "${FILES_EXTERNAL_TEST_TO_RUN}"
elif [[ "${SCALITY}" == "true" ]]; then
    cd tests
    $phpunit_cmd --configuration phpunit-autotest.xml ${GROUP}
else
    cd tests
    $phpunit_cmd --configuration phpunit-autotest.xml ${GROUP} --coverage-clover output/coverage/autotest-clover-"${DB_TYPE}".xml
fi

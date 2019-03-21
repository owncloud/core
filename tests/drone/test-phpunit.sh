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
    webdav_apache)
      wait-for-it -t 120 apache-webdav:80
      cp tests/drone/configs/config.files_external.webdav-apache.php apps/files_external/tests/config.webdav.php
      FILES_EXTERNAL_TEST_TO_RUN=WebdavTest.php
      ;;
    smb_samba)
      wait-for-it -t 120 smb-samba:445
      cp tests/drone/configs/config.files_external.smb-samba.php apps/files_external/tests/config.smb.php
      FILES_EXTERNAL_TEST_TO_RUN=SmbTest.php
      ;;
    smb_windows)
      wait-for-it -t 120 fsweb.test.owncloud.com:445
      cp tests/drone/configs/config.files_external.smb-windows.php apps/files_external/tests/config.smb.php
      FILES_EXTERNAL_TEST_TO_RUN=SmbTest.php
      ;;
    swift)
      wait-for-it -t 120 ceph:5034
      cp tests/drone/configs/config.files_external.swift.php apps/files_external/tests/config.swift.php
      FILES_EXTERNAL_TEST_TO_RUN=SwiftTest.php
      ;;
    *)
      echo "Unsupported files external type!"
      exit 1
      ;;
  esac
  FILES_EXTERNAL_TEST_TO_RUN="apps/files_external/tests/Storage/${FILES_EXTERNAL_TEST_TO_RUN}"
}

if [[ "${DB_TYPE}" == "sqlite" || -z "${DB_TYPE}" || "${COVERAGE}" == "true" ]]; then
  GROUP=""
else
  GROUP="--group DB"
fi

phpunit_cmd="php ./lib/composer/bin/phpunit"
if [[ "${COVERAGE}" == "true" ]]; then
    phpunit_cmd="phpdbg -d memory_limit=4096M -rr ./lib/composer/bin/phpunit"
fi

if [[ -n "${FILES_EXTERNAL_TYPE}" ]]; then
    set_up_external_storage
    $phpunit_cmd --configuration tests/phpunit-autotest-external.xml ${GROUP} --coverage-clover tests/output/coverage/autotest-external-clover-"${DB_TYPE}".xml
    $phpunit_cmd --configuration tests/phpunit-autotest-external.xml ${GROUP} --coverage-clover tests/output/coverage/autotest-external-clover-"${DB_TYPE}"-"${FILES_EXTERNAL_TYPE}".xml "${FILES_EXTERNAL_TEST_TO_RUN}"
else
    $phpunit_cmd --configuration tests/phpunit-autotest.xml ${GROUP} --coverage-clover tests/output/coverage/autotest-clover-"${DB_TYPE}".xml
    PHPUNIT_STATUS=$?
    if [ ${PHPUNIT_STATUS} -eq 0 ]; then
        echo "PHPunit exited with success status 0"
    else
        echo "PHPunit exited with failure status ${PHPUNIT_STATUS}"
    fi
    exit ${PHPUNIT_STATUS}
fi
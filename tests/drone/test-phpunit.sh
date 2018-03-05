#!/usr/bin/env bash
set -xeo pipefail

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

set_up_external_storage() {
    php occ app:enable files_external
    php occ config:app:set core enable_external_storage --value=yes
    case "${FILES_EXTERNAL_TYPE}" in
    webdav_apache)
      wait-for-it -t 120 apache_webdav:80
      cp tests/drone/configs/config.files_external.webdav-apache.php apps/files_external/tests/config.webdav.php
      FILES_EXTERNAL_TEST_TO_RUN=WebdavTest.php
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
fi
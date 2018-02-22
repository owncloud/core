#!/usr/bin/env bash
set -xeo pipefail

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

if [[ -z ${FILES_EXTERNAL_TYPE} ]]; then
  exec phpdbg -d memory_limit=4096M -rr ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest.xml ${GROUP} --coverage-clover tests/autotest-clover-${DB_TYPE}.xml
else
  exec phpdbg -d memory_limit=4096M -rr ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest-external.xml ${GROUP} --coverage-clover tests/autotest-external-clover-${DB_TYPE}.xml
fi

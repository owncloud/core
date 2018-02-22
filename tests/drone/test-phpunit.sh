#!/usr/bin/env bash
set -xeo pipefail

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

if [[ "${DB_TYPE}" == "none" || "${DB_TYPE}" == "sqlite" ]]; then
  GROUP=""
else
  GROUP="--group DB"
fi

exec ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest.xml ${GROUP} --coverage-clover tests/autotest-clover-${DB_TYPE}.xml --coverage-html tests/coverage-html-${DB_TYPE} --log-junit tests/autotest-results-${DB_TYPE}.xml


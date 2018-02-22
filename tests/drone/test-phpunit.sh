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

exec ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest.xml ${GROUP} --log-junit tests/autotest-results-${DB_TYPE}.xml


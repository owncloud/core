#!/usr/bin/env bash
set -xeo pipefail

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

declare -x OC_TEST_ALT_HOME
[[ -z "${OC_TEST_ALT_HOME}" ]] && OC_TEST_ALT_HOME=1

./tests/acceptance/run.sh "$@"

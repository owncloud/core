#!/usr/bin/env bash
set -xeo pipefail

declare -x OC_TEST_ALT_HOME
[[ -z "${OC_TEST_ALT_HOME}" ]] && OC_TEST_ALT_HOME=1

echo "Adjusting file permissions ... "
chown www-data:www-data /drone/src -R

echo "Installing owncloud ... "
su-exec www-data ./occ maintenance:install -vvv --database=sqlite --database-name=owncloud --database-table-prefix=oc_ --admin-user=admin --admin-pass=admin --data-dir=$(pwd)/data

echo "Executing integration test suite ${1}"
pushd tests/integration
    su-exec www-data ./run.sh $1
popd
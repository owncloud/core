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

exec ./lib/composer/bin/phpunit --configuration tests/phpunit-autotest-external.xml ${GROUP} --log-junit tests/autotest-external-results-${DB_TYPE}.xml


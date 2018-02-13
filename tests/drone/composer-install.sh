#!/usr/bin/env bash
set -eo pipefail

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

composer install -n --no-progress
composer install -n --no-progress -d=apps/files_external

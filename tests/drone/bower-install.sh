#!/usr/bin/env bash
set -eo pipefail

if [[ "$(pwd)" == "$(cd "$(dirname "$0")"; pwd -P)" ]]; then
  echo "Can only be executed from project root!"
  exit 1
fi

exec ./build/node_modules/bower/bin/bower install --allow-root

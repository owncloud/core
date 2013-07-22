#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
GLOBALS="$DIR/../lib/OpenCloud/Globals.php"
perl -p -i -e 'if(/RAXSDK_VERSION.*(\d+\.\d+\.)(\d+)/){$y=$2+1;s/(\d+\.\d+\.)(\d+)/$1$y/}' $GLOBALS
git commit -m "Incremented version patch level" $GLOBALS

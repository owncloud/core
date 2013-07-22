#!/bin/bash
# (c)2012 Rackspace Hosting. See COPYING for license.

# This script regenerates the documentation for this library. It should be
# run from the top-level directory. It will first clean out ALL of the files
# in the docs/ directory — this is to prevent old, unused cruft from
# accumulating (for example, if you change the name of a class, the docs for
# the old class name are still there because they've been checked into Git).

# define variables
APIDOCDIR=docs/api
TEMPLATE=old-ocean

# make sure we're in the root directory
if [ ! -d docs ]; then
    echo "No docs/ directory found; run this script from the top directory"
    exit;
fi

# clean out all the old files
find $APIDOCDIR -type f -exec git rm {} \;

# regenerate all the docs!
phpdoc -d lib --extensions="php" -t $APIDOCDIR --template $TEMPLATE

# note that it does NOT check them in, but it adds them
find $APIDOCDIR -type f -exec git add {} \;

#!/bin/bash

COMMIT_RANGE="$1"

REPO=`git remote -v | grep -m 1 "(push)" | sed -e "s/.*github.com[:/]\(.*\)\.git.*/\1/"`
BASE_URL="https://github.com/$REPO/issues/"

if test -z "$1"; then
	echo "This script builds changelog entries based on merge commits within the given range" >&2
	echo "" >&2
	echo "Usage $0 commit_range" >&2
	echo "" >&2
	echo "commit_range is \"commitid1..commitid2\", for example \"v10.0.2..stable20\"" >&2
	exit 1
fi

# get all merge commits within the commit range
git log --merges "$COMMIT_RANGE" --format="format:%s - %b" |
	# only pick the "pull request" ones in case of some bad merges
	grep "pull request" |
	# pick up PR id and subject
	cut -d" " -f4,8- |
	# move the PR id to the end of the row
	sed -e "s&^\(#[0-9]*\) \(.*\)$&- \2 - \1&g" |
	# replace PR id with Github links
	sed -e "s& #\([0-9]*\)$& \[#\1\]\("$BASE_URL"\1\)&g" |
	# remove "[stable10]" or other prefix strings
	sed -e "s&\[stable[0-9]*\] &&gi"



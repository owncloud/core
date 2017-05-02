#!/usr/bin/env bash
SCRIPT=`realpath $0`
SCRIPTPATH=`dirname $SCRIPT`

# Move the endpoint to the serverinfo file
rm "$SCRIPTPATH/../caldavtest/serverinfo.xml"
cp "$SCRIPTPATH/../caldavtest/serverinfo-caldav-old-endpoint.xml" "$SCRIPTPATH/../caldavtest/serverinfo.xml"

# start the server
php -S 127.0.0.1:8889 -t "$SCRIPTPATH/../../../../.." &

sleep 30

# run the tests
cd "$SCRIPTPATH/CalDAVTester"
PYTHONPATH="$SCRIPTPATH/pycalendar/src" python testcaldav.py --print-details-onfail --basedir "$SCRIPTPATH/../caldavtest/" -o cdt.txt \
	"CalDAV/current-user-principal.xml" \
	"CalDAV/sync-report.xml"

RESULT=$?

tail "$SCRIPTPATH/../../../../../data/owncloud.log"

exit $RESULT

Feature: caldav

	@caldav
	Scenario: Accessing a not existing calendar of another user
		Given user "user0" has been created
		When "admin" requests calendar "user0/MyCalendar"
		Then the CalDAV HTTP status code should be "404"
		And the exception is "Sabre\DAV\Exception\NotFound"
		And the error message is "Node with name 'MyCalendar' could not be found"

	@caldav
	Scenario: Accessing a not shared calendar of another user
		Given user "user0" has been created
		And "admin" creates a calendar named "MyCalendar"
		And the CalDAV HTTP status code should be "201"
		When "user0" requests calendar "admin/MyCalendar"
		Then the CalDAV HTTP status code should be "404"
		And the exception is "Sabre\DAV\Exception\NotFound"
		And the error message is "Node with name 'MyCalendar' could not be found"

	@caldav
	Scenario: Accessing a not existing calendar of myself
		Given user "user0" has been created
		When "user0" requests calendar "admin/MyCalendar"
		Then the CalDAV HTTP status code should be "404"
		And the exception is "Sabre\DAV\Exception\NotFound"
		And the error message is "Node with name 'MyCalendar' could not be found"

	@caldav
	Scenario: Creating a new calendar
		When "admin" creates a calendar named "MyCalendar"
		Then the CalDAV HTTP status code should be "201"
		And "admin" requests calendar "admin/MyCalendar"
		Then the CalDAV HTTP status code should be "200"

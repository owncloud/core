Feature: caldav

	@caldav
	Scenario: Accessing a not existing calendar of another user
		Given user "user0" has been created
		When user "admin" requests calendar "user0/MyCalendar" using the API
		Then the CalDAV HTTP status code should be "404"
		And the exception should be "Sabre\DAV\Exception\NotFound"
		And the error message should be "Node with name 'MyCalendar' could not be found"

	@caldav
	Scenario: Accessing a not shared calendar of another user
		Given user "user0" has been created
		And user "admin" has created a calendar named "MyCalendar"
		And the CalDAV HTTP status code should be "201"
		When user "user0" requests calendar "admin/MyCalendar" using the API
		Then the CalDAV HTTP status code should be "404"
		And the exception should be "Sabre\DAV\Exception\NotFound"
		And the error message should be "Node with name 'MyCalendar' could not be found"

	@caldav
	Scenario: Accessing a not existing calendar of myself
		Given user "user0" has been created
		When user "user0" requests calendar "admin/MyCalendar" using the API
		Then the CalDAV HTTP status code should be "404"
		And the exception should be "Sabre\DAV\Exception\NotFound"
		And the error message should be "Node with name 'MyCalendar' could not be found"

	@caldav
	Scenario: Creating a new calendar
		Given user "admin" has created a calendar named "MyCalendar"
		And the CalDAV HTTP status code should be "201"
		When user "admin" requests calendar "admin/MyCalendar" using the API
		Then the CalDAV HTTP status code should be "200"

@api @TestAlsoOnExternalUserBackend
Feature: caldav

  Background:
    Given user "user0" has been created

  @caldav
  Scenario: Accessing a not existing calendar of another user
    When the administrator requests calendar "user0/MyCalendar" using the new WebDAV API
    Then the CalDAV HTTP status code should be "404"
    And the CalDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CalDAV error message should be "Node with name 'MyCalendar' could not be found"

  @caldav
  Scenario: Accessing a not shared calendar of another user
    Given the administrator has successfully created a calendar named "MyCalendar"
    When user "user0" requests calendar "admin/MyCalendar" using the new WebDAV API
    Then the CalDAV HTTP status code should be "404"
    And the CalDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CalDAV error message should be "Node with name 'MyCalendar' could not be found"

  @caldav
  Scenario: Accessing a not existing calendar of myself
    When user "user0" requests calendar "admin/MyCalendar" using the new WebDAV API
    Then the CalDAV HTTP status code should be "404"
    And the CalDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CalDAV error message should be "Node with name 'MyCalendar' could not be found"

  @caldav
  @smokeTest
  Scenario: Creating a new calendar
    Given user "user0" has successfully created a calendar named "MyCalendar"
    When user "user0" requests calendar "user0/MyCalendar" using the new WebDAV API
    Then the CalDAV HTTP status code should be "200"

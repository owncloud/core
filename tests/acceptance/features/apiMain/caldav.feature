@api @TestAlsoOnExternalUserBackend @skipOnOcis
Feature: caldav

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @caldav
  Scenario: Accessing a not existing calendar of another user
    When the administrator requests calendar "%username%/MyCalendar" of user "Alice" using the new WebDAV API
    Then the CalDAV HTTP status code should be "404"
    And the CalDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CalDAV message should be "Node with name 'MyCalendar' could not be found"

  @caldav
  Scenario: Accessing a not shared calendar of another user
    Given the administrator has successfully created a calendar named "MyCalendar"
    When user "Alice" requests calendar "%username%/MyCalendar" of user "admin" using the new WebDAV API
    Then the CalDAV HTTP status code should be "404"
    And the CalDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CalDAV message should be "Node with name 'MyCalendar' could not be found"

  @caldav
  Scenario: Accessing a not existing calendar of myself
    When user "Alice" requests calendar "%username%/MyCalendar" of user "admin" using the new WebDAV API
    Then the CalDAV HTTP status code should be "404"
    And the CalDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CalDAV message should be "Node with name 'MyCalendar' could not be found"

  @caldav
  @smokeTest
  Scenario: Creating a new calendar
    Given user "Alice" has successfully created a calendar named "MyCalendar"
    When user "Alice" requests calendar "%username%/MyCalendar" of user "Alice" using the new WebDAV API
    Then the CalDAV HTTP status code should be "200"

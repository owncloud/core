@cli
Feature: manage calendar
  As an admin
  I want to be able to manage the calendar
  So that I can schedule my events

  @caldav
  Scenario: Create a valid calendar
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator creates a calendar for user "Alice" with name "holiday" using the occ command
    Then the command should have been successful
    And as user "Alice" a new calendar with name "%username%/holiday" should be present in the WebDAV API Response

  @caldav
  Scenario: Create multiple calendars for a user
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator creates a calendar for user "Alice" with name "holiday" using the occ command
    Then the command should have been successful
    And as user "Alice" a new calendar with name "%username%/holiday" should be present in the WebDAV API Response
    When the administrator creates a calendar for user "Alice" with name "work" using the occ command
    Then the command should have been successful
    And as user "Alice" a new calendar with name "%username%/work" should be present in the WebDAV API Response

  @caldav
  Scenario: Create a same name calendar for different users
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    When the administrator creates a calendar for user "Alice" with name "holiday" using the occ command
    Then the command should have been successful
    And as user "Alice" a new calendar with name "%username%/holiday" should be present in the WebDAV API Response
    When the administrator creates a calendar for user "Brian" with name "holiday" using the occ command
    Then the command should have been successful
    And as user "Brian" a new calendar with name "%username%/holiday" should be present in the WebDAV API Response

  @caldav
  Scenario: Try to create a calendar with invalid user
    When the administrator creates a calendar for user "Alice" with name "holiday" using the occ command
    Then the command should have failed with exit code 1
    And the command error output should contain the text "User <Alice> in unknown."

  @caldav
  Scenario: Try to create duplicate calendar for a user
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator creates a calendar for user "Alice" with name "holiday" using the occ command
    Then the command should have been successful
    And as user "Alice" a new calendar with name "%username%/holiday" should be present in the WebDAV API Response
    When the administrator creates a calendar for user "Alice" with name "holiday" using the occ command
    Then the command should have failed with exit code 1
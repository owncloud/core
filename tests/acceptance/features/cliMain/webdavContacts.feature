@cli
Feature: manage contacts
  As an admin
  I want to be able to manage the contacts
  So that I can call my contacts

  @carddav
  Scenario: Create a valid address book
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator creates an address book for user "Alice" with name "myFriends" using the occ command
    Then the command should have been successful
    And as user "Alice" a new address book with name "%username%/myFriends" should be present in the WebDAV API Response

  @carddav
  Scenario: Create multiple address books for a user
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator creates an address book for user "Alice" with name "myFriends" using the occ command
    Then the command should have been successful
    And as user "Alice" a new address book with name "%username%/myFriends" should be present in the WebDAV API Response
    When the administrator creates an address book for user "Alice" with name "myStaffs" using the occ command
    Then the command should have been successful
    And as user "Alice" a new address book with name "%username%/myStaffs" should be present in the WebDAV API Response

  @carddav
  Scenario: Create a same name address book for different users
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    When the administrator creates an address book for user "Alice" with name "myFriends" using the occ command
    Then the command should have been successful
    And as user "Alice" a new address book with name "%username%/myFriends" should be present in the WebDAV API Response
    When the administrator creates an address book for user "Brian" with name "myFriends" using the occ command
    Then the command should have been successful
    And as user "Brian" a new address book with name "%username%/myFriends" should be present in the WebDAV API Response

  @carddav
  Scenario: Try to create an address book with invalid user
    When the administrator creates an address book for user "Alice" with name "myFriends" using the occ command
    Then the command should have failed with exit code 1
    And the command error output should contain the text "User <Alice> in unknown."

  @carddav
  Scenario: Try to create a duplicate address book for a user
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator creates an address book for user "Alice" with name "myFriends" using the occ command
    Then the command should have been successful
    And as user "Alice" a new address book with name "%username%/myFriends" should be present in the WebDAV API Response
    When the administrator creates an address book for user "Alice" with name "myFriends" using the occ command
    Then the command should have failed with exit code 1
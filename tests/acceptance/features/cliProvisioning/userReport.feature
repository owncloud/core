@cli @skipOnLDAP
Feature: get user report
  As an admin
  I want to be able get user report
  So that I can see the total number of users in an ownCloud server

  Scenario: admin gets the user report
    Given these users have been created with default attributes and skeleton files but not initialized:
      | username |
      | user0    |
      | user1    |
    When the administrator retrieves the user report using the occ command
    Then the command should have been successful
    And the total users returned by the command should be 3

  Scenario: admin gets the user report when the user is disabled
    Given these users have been created with default attributes and skeleton files but not initialized:
      | username |
      | user0    |
      | user1    |
    And user "user1" has been disabled
    When the administrator retrieves the user report using the occ command
    Then the command should have been successful
    And the total users returned by the command should be 3

  Scenario: admin gets the user report when a user has been created and deleted
    Given these users have been created with default attributes and skeleton files but not initialized:
      | username |
      | user0    |
      | user1    |
    And user "user1" has been deleted
    When the administrator retrieves the user report using the occ command
    Then the command should have been successful
    And the total users returned by the command should be 2

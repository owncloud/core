@cli @skipOnLDAP
Feature: get user report
  As an admin
  I want to be able get user report
  So that I can see the total number of users in an ownCloud server

  Scenario: admin gets the user report
    Given these users have been created but not initialized:
      | username         |
      | brand-new-user-1 |
      | brand-new-user-2 |
    When the administrator retrieves the user report using the occ command
    Then the command should have been successful
    And the total users returned by the command should be 3

  Scenario: admin gets the user report when the user is disabled
    Given these users have been created but not initialized:
      | username         |
      | brand-new-user-1 |
      | brand-new-user-2 |
    And user "brand-new-user-2" has been disabled
    When the administrator retrieves the user report using the occ command
    Then the command should have been successful
    And the total users returned by the command should be 3

  Scenario: admin gets the user report when the user created and deleted
    Given these users have been created but not initialized:
      | username         |
      | brand-new-user-1 |
      | brand-new-user-2 |
    And user "brand-new-user-2" has been deleted
    When the administrator retrieves the user report using the occ command
    Then the command should have been successful
    And the total users returned by the command should be 2

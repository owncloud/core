@cli @skipOnLDAP
Feature: get user last seen
  As an admin
  I want to be able get user last seen
  So that I can see when the user has last logged in to the owncloud server

  Scenario: admin gets last seen of a user
    Given user "brand-new-user" has been created with default attributes
    When the administrator retrieves the time when user "brand-new-user" was last seen using the occ command
    Then the command should have been successful
    And the command output of user last seen should be recently

  Scenario: admin gets last seen of a user who has not been initialized
    Given these users have been created with default attributes but not initialized:
      | username       |
      | brand-new-user |
    When the administrator retrieves the time when user "brand-new-user" was last seen using the occ command
    Then the command should have been successful
    And the command output of user last seen should be never
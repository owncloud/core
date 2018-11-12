@cli @skipOnLDAP
Feature: get user
  As an admin
  I want to be able to retrieve user information
  So that I can see the information

  Scenario: admin gets an existing user
    Given user "brand-new-user" has been created
    And the administrator has changed the display name of user "brand-new-user" to "Anne Brown"
    When the administrator retrieves the information of user "brand-new-user" in JSON format using the occ command
    Then the command should have been successful
    And the display name returned by the occ command should be "Anne Brown"

  Scenario: admin tries to get a not existing user
    Given user "not-a-user" has been deleted
    When the administrator retrieves the information of user "not-a-user" in JSON format using the occ command
    Then the command should have been successful
    And the occ command JSON output should be empty

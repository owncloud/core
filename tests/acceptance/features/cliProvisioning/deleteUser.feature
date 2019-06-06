@cli @skipOnLDAP
Feature: delete users
  As an admin
  I want to be able to delete users
  So that I can remove users from ownCloud

  Scenario: admin deletes a user
    Given these users have been created with skeleton files:
      | username       |
      | brand-new-user |
    When the administrator deletes user "brand-new-user" using the occ command
    Then the command should have been successful
    And the command output should contain the text "User with uid 'brand-new-user', display name 'brand-new-user', email '' was deleted"
    And user "brand-new-user" should not exist

  Scenario: Delete a user, and specify the user name in different case
    Given these users have been created with skeleton files:
      | username       |
      | brand-new-user |
    When the administrator deletes user "Brand-New-User" using the occ command
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist

  Scenario: admin tries to delete a non-existing user
    Given user "brand-new-user" has been deleted
    When the administrator deletes user "brand-new-user" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text "User with uid 'brand-new-user' does not exist"
    And user "brand-new-user" should not exist
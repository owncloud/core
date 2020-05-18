@cli @skipOnLDAP
Feature: get users
  As an admin
  I want to be able to list the users that exist
  So that I can see who has access to ownCloud

  Scenario: admin gets all users
    Given this user has been created using the occ command:
      | username       | displayname | email                 |
      | brand-new-user | Just A User | justauser@example.com |
    When the administrator retrieves all the users in JSON format using the occ command
    Then the command should have been successful
    And the users returned by the occ command should be
      | uid            | display name |
      | brand-new-user | Just A User  |

  Scenario: admin gets the list of all inactive users
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And the administrator has set the last login date for user "Alice" to "7" days ago
    And the administrator has set the last login date for user "Brian" to "400" days ago
    When the administrator gets the list of all users inactive for the last "2" days using the occ command
    Then the command should have been successful
    And the inactive users returned by the occ command should be
      | uid   | display name | inactive days |
      | Alice | Alice Hansen | 7             |
      | Brian | Brian Murphy | 400           |

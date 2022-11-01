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
      | uid            |
      | brand-new-user |


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


  Scenario Outline: admin gets a short username that has multiple matches of longer usernames
    Given user "brand-new" has been created with default attributes and without skeleton files
    And user "brand-new-user" has been created with default attributes and without skeleton files
    And user "brand-new-test" has been created with default attributes and without skeleton files
    And user "some-other-name" has been created with default attributes and without skeleton files
    And the administrator has changed the display name of user "brand-new" to "Alice Adams"
    And the administrator has changed the display name of user "brand-new-user" to "Brian Brown"
    And the administrator has changed the display name of user "brand-new-test" to "Carol Coffee"
    When the administrator retrieves the information of user "<user-to-list>" in JSON format using the occ command
    Then the command should have been successful
    And the users returned by the occ command should be
      | uid            |
      | brand-new      |
      | brand-new-user |
      | brand-new-test |
    # the users come back in order of the username, not the display name
    And the first display name returned by the occ command should be "Alice Adams"
    And the second display name returned by the occ command should be "Carol Coffee"
    And the third display name returned by the occ command should be "Brian Brown"
    Examples:
      | user-to-list |
      | brand-new    |
      | brand        |
      | b            |
      | new          |

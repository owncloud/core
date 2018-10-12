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
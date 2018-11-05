@cli @skipOnLDAP
Feature: disable user
  As an admin
  I want to be able to disable a user
  So that I can remove access to files and resources for a user, without actually deleting the files and resources

  Scenario: admin disables an user
    Given user "user1" has been created
    When the administrator disables the user "user1" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is disabled'
    And user "user1" should be disabled

  Scenario: Admin can disable another admin user
    Given user "another-admin" has been created
    And user "another-admin" has been added to group "admin"
    When the administrator disables the user "another-admin" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is disabled'
    And user "another-admin" should be disabled

  Scenario: Admin can disable subadmins in the same group
    Given user "subadmin" has been created
    And group "new-group" has been created
    And user "subadmin" has been added to group "new-group"
    And the administrator has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When the administrator disables the user "subadmin" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is disabled'
    And user "subadmin" should be disabled
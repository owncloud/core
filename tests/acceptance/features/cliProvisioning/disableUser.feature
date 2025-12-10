@cli @skipOnLDAP
Feature: disable user
  As an admin
  I want to be able to disable a user
  So that I can remove access to files and resources for a user, without actually deleting the files and resources


  Scenario: admin disables an user
    Given user "Alice" has been created with default attributes and small skeleton files
    When the administrator disables user "Alice" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is disabled'
    And user "Alice" should be disabled


  Scenario: Admin can disable another admin user
    Given user "another-admin" has been created with default attributes and small skeleton files
    And user "another-admin" has been added to group "admin"
    When the administrator disables user "another-admin" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is disabled'
    And user "another-admin" should be disabled


  Scenario: Admin can disable subadmins in the same group
    Given user "subadmin" has been created with default attributes and small skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And the administrator has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When the administrator disables user "subadmin" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is disabled'
    And user "subadmin" should be disabled

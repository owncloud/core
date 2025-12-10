@cli @skipOnLDAP
Feature: enable user
  As an admin
  I want to be able to enable a user
  So that I can give a user access to their files and resources again if they are now authorized for that


  Scenario: admin enables an user
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has been disabled
    When administrator enables user "Alice" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is enabled'
    And user "Alice" should be enabled


  Scenario: admin enables another admin user
    Given user "another-admin" has been created with default attributes and small skeleton files
    And user "another-admin" has been added to group "admin"
    And user "another-admin" has been disabled
    When administrator enables user "another-admin" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is enabled'
    And user "another-admin" should be enabled


  Scenario: admin enables subadmins in the same group
    Given user "subadmin" has been created with default attributes and small skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And the administrator has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And user "subadmin" has been disabled
    When administrator enables user "subadmin" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified user is enabled'
    And user "subadmin" should be enabled

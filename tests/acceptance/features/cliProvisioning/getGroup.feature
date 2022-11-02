@cli
Feature: get group
  As an admin
  I want to be able to get group details
  So that I can know which users are in a group

  @skipOnLDAP
  Scenario: admin gets users in the group
    Given these users have been created with small skeleton files:
      | username       |
      | brand-new-user |
      | 123            |
    And the administrator has changed the display name of user "brand-new-user" to "Anne Brown"
    And group "brand-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    And user "123" has been added to group "brand-new-group"
    When the administrator gets the users in group "brand-new-group" in JSON format using the occ command
    Then the command should have been successful
    And the users returned by the occ command should be
      | uid            |
      | brand-new-user |
      | 123            |


  Scenario: admin gets user in the group who is disabled
    Given user "brand-new-user" has been created with default attributes and small skeleton files
    And the administrator has changed the display name of user "brand-new-user" to "Anne Brown"
    And user "brand-new-user" has been disabled
    And group "brand-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    When the administrator gets the users in group "brand-new-group" in JSON format using the occ command
    Then the command should have been successful
    And the users returned by the occ command should be
      | uid            |
      | brand-new-user |


  Scenario: admin tries to get users in a nonexistent group
    Given group "brand-new-group" has been created
    When the administrator gets the users in group "nonexistentgroup" in JSON format using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group nonexistentgroup does not exist'

  @skipOnLDAP @issue-user_ldap-499
  Scenario Outline: admin tries to get users in a group but using wrong case of the group name
    Given group "<group_id1>" has been created
    When the administrator gets the users in group "<group_id2>" in JSON format using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group <group_id2> does not exist'
    Examples:
      | group_id1            | group_id2            |
      | case-sensitive-group | Case-Sensitive-Group |
      | case-sensitive-group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | case-sensitive-group |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | CASE-SENSITIVE-GROUP | Case-Sensitive-Group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group |

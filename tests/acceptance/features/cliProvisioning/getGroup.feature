@cli @skipOnLDAP
Feature: get group
  As an admin
  I want to be able to get group details
  So that I can know which users are in a group

  Scenario: admin gets users in the group
    Given these users have been created:
      | username       |
      | brand-new-user |
      | 123            |
    And the administrator has changed the display name of user "brand-new-user" to "Anne Brown"
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "123" has been added to group "new-group"
    When the administrator gets the users in group "new-group" in JSON format using the occ command
    Then the command should have been successful
    And the users returned by the occ command should be
      | uid            | display name |
      | brand-new-user | Anne Brown   |
      | 123            | 123          |

  Scenario: admin gets user in the group who is disabled
    Given user "brand-new-user" has been created with default attributes
    And the administrator has changed the display name of user "brand-new-user" to "Anne Brown"
    And user "brand-new-user" has been disabled
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    When the administrator gets the users in group "new-group" in JSON format using the occ command
    Then the command should have been successful
    And the users returned by the occ command should be
      | uid            | display name |
      | brand-new-user | Anne Brown   |

  Scenario: admin tries to get users in a non-existent group
    Given group "new-group" has been created
    When the administrator gets the users in group "not-a-group" in JSON format using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group not-a-group does not exist'

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

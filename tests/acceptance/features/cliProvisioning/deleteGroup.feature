@cli @skipOnLDAP
Feature: delete groups
  As an admin
  I want to be able to delete groups
  So that I can remove unnecessary groups

  Scenario Outline: admin deletes a group
    Given group "<group_id>" has been created
    When the administrator deletes group "<group_id>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified group was deleted'
    And group "<group_id>" should not exist
    Examples:
      | group_id    | comment                     |
      | simplegroup | nothing special here        |
      | España      | special European characters |
      | नेपाली      | Unicode group name          |

  Scenario Outline: group names are case-sensitive, the correct group is deleted
    Given group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    When the administrator deletes group "<group_id1>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The specified group was deleted'
    And group "<group_id1>" should not exist
    But group "<group_id2>" should exist
    And group "<group_id3>" should exist
    Examples:
      | group_id1            | group_id2            | group_id3 |
      | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group |

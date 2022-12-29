@cli @skipOnLDAP
Feature: add group
  As an admin
  I want to be able to add groups
  So that I can more easily manage access to resources by groups rather than individual users


  Scenario Outline: admin creates a group
    When the administrator creates group "<group_id>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Created group "<group_id>"'
    And group "<group_id>" should exist
    Examples:
      | group_id    | comment                               |
      | simplegroup | nothing special here                  |
      | España§àôœ€ | special European and other characters |
      | नेपाली      | Unicode group name                    |


  Scenario Outline: group names are case-sensitive, multiple groups can exist with different upper and lower case names
    When the administrator creates group "<group_id1>" using the occ command
    And the administrator creates group "<group_id2>" using the occ command
    Then the command should have been successful
    And group "<group_id1>" should exist
    And group "<group_id2>" should exist
    But group "<group_id3>" should not exist
    Examples:
      | group_id1            | group_id2            | group_id3            |
      | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group |


  Scenario: admin tries to create a group that already exists
    Given group "brand-new-group" has been created
    When the administrator creates group "brand-new-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'The group "brand-new-group" already exists'


  Scenario: admin tries to create a group that has white space at the end of the name
    When the administrator creates group "white-space-at-end " using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group "white-space-at-end " could not be created'
    And group "white-space-at-end " should not exist
    And group "white-space-at-end" should not exist


  Scenario: admin tries to create a group that has white space at the start of the name
    When the administrator creates group " white-space-at-start" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group " white-space-at-start" could not be created'
    And group " white-space-at-start" should not exist
    And group "white-space-at-start" should not exist


  Scenario: admin tries to create a group that is a single space
    When the administrator creates group " " using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group " " could not be created'
    And group " " should not exist


  Scenario: admin tries to create a group that is the empty string
    When the administrator creates group "" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group "" could not be created'

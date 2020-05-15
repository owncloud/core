@cli @skipOnLDAP
Feature: add users to group
  As a admin
  I want to be able to add users to a group
  So that I can give a user access to the resources of the group

  @smokeTest
  Scenario Outline: adding a user to a group
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "<group_id>" has been created
    When the administrator adds user "brand-new-user" to group "<group_id>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'User "%username%" added to group "<group_id>"' about user "brand-new-user"
    And user "brand-new-user" should belong to group "<group_id>"
    Examples:
      | group_id    | comment                               |
      | simplegroup | nothing special here                  |
      | España§àôœ€ | special European and other characters |
      | नेपाली      | Unicode group name                    |

  Scenario Outline: adding a user to a group using mixes of upper and lower case in user and group names
    Given user "mixed-case-user" has been created with default attributes and skeleton files
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    When the administrator adds user "<user_id>" to group "<group_id1>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'User "%username%" added to group "<group_id1>"' about user "mixed-case-user"
    And user "mixed-case-user" should belong to group "<group_id1>"
    But user "mixed-case-user" should not belong to group "<group_id2>"
    And user "mixed-case-user" should not belong to group "<group_id3>"
    Examples:
      | user_id         | group_id1            | group_id2            | group_id3            |
      | MIXED-CASE-USER | Case-Sensitive-Group | case-sensitive-group | CASE-SENSITIVE-GROUP |
      | Mixed-Case-User | case-sensitive-group | CASE-SENSITIVE-GROUP | Case-Sensitive-Group |
      | mixed-case-user | CASE-SENSITIVE-GROUP | Case-Sensitive-Group | case-sensitive-group |

  Scenario: admin tries to add user to a group which does not exist
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "not-group" has been deleted
    When the administrator adds user "brand-new-user" to group "not-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group "not-group" does not exist'
    And user "brand-new-user" should not belong to group "not-group"

  Scenario: admin tries to add a user which does not exist to a group
    Given user "nonexistentuser" has been deleted
    And group "brand-new-group" has been created
    When the administrator adds user "nonexistentuser" to group "brand-new-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'User "%username%" could not be found - not added to group "new-group"' about user "nonexistentuser"
    And group "brand-new-group" should not contain user "nonexistentuser"

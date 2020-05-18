@cli @skipOnLDAP
Feature: remove a user from a group
  As an admin
  I want to be able to remove a user from a group
  So that I can manage user access to group resources

  Scenario Outline: admin removes a user from a group
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "<group_id>" has been created
    And user "brand-new-user" has been added to group "<group_id>"
    When the administrator removes user "brand-new-user" from group "<group_id>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Member "%username%" removed from group "<group_id>"' about user "brand-new-user"
    And user "brand-new-user" should not belong to group "<group_id>"
    Examples:
      | group_id    | comment                               |
      | simplegroup | nothing special here                  |
      | España§àôœ€ | special European and other characters |
      | नेपाली      | Unicode group name                    |

  Scenario Outline: remove a user from a group using mixes of upper and lower case in user and group names
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    And user "brand-new-user" has been added to group "<group_id1>"
    And user "brand-new-user" has been added to group "<group_id2>"
    And user "brand-new-user" has been added to group "<group_id3>"
    When the administrator removes user "<user_id>" from group "<group_id1>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Member "%username%" removed from group "<group_id1>"' about user "brand-new-user"
    And user "brand-new-user" should not belong to group "<group_id1>"
    But user "brand-new-user" should belong to group "<group_id2>"
    And user "brand-new-user" should belong to group "<group_id3>"
    Examples:
      | user_id        | group_id1            | group_id2            | group_id3            |
      | BRAND-NEW-USER | Case-Sensitive-Group | case-sensitive-group | CASE-SENSITIVE-GROUP |
      | Brand-New-User | case-sensitive-group | CASE-SENSITIVE-GROUP | Case-Sensitive-Group |
      | brand-new-user | CASE-SENSITIVE-GROUP | Case-Sensitive-Group | case-sensitive-group |

  Scenario: admin tries to remove a user from a group which does not exist
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "nonexistentgroup" has been deleted
    When the administrator removes user "brand-new-user" from group "nonexistentgroup" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group "nonexistentgroup" does not exist'

  Scenario: admin tries to remove a user from a group which the user is not a member of
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "brand-new-group" has been created
    When the administrator removes user "brand-new-user" from group "brand-new-group" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Member "%username%" could not be found in group "brand-new-group"' about user "brand-new-user"

  Scenario: admin tries to remove a user who does not exist from an existing group
    Given user "nonexistentuser" has been deleted
    And group "brand-new-group" has been created
    When the administrator removes user "nonexistentuser" from group "brand-new-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Member "%username%" does not exist - not removed from group "brand-new-group"' about user "nonexistentuser"

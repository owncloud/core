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
    And the command output should contain the text 'Member "brand-new-user" removed from group "<group_id>"'
    And user "brand-new-user" should not belong to group "<group_id>"
    Examples:
      | group_id    | comment                     |
      | simplegroup | nothing special here        |
      | España      | special European characters |
      | नेपाली      | Unicode group name          |

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
    And the command output should contain the text 'Member "brand-new-user" removed from group "<group_id1>"'
    And user "brand-new-user" should not belong to group "<group_id1>"
    But user "brand-new-user" should belong to group "<group_id2>"
    And user "brand-new-user" should belong to group "<group_id3>"
    Examples:
      | user_id        | group_id1 | group_id2 | group_id3 |
      | BRAND-NEW-USER | New-Group | new-group | NEW-GROUP |
      | Brand-New-User | new-group | NEW-GROUP | New-Group |
      | brand-new-user | NEW-GROUP | New-Group | new-group |

  Scenario: admin tries to remove a user from a group which does not exist
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "not-group" has been deleted
    When the administrator removes user "brand-new-user" from group "not-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group "not-group" does not exist'

  Scenario: admin tries to remove a user from a group which the user is not a member of
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "new-group" has been created
    When the administrator removes user "brand-new-user" from group "new-group" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Member "brand-new-user" could not be found in group "new-group"'

  Scenario: admin tries to remove a user who does not exist from an existing group
    Given user "not-a-user" has been deleted
    And group "new-group" has been created
    When the administrator removes user "not-a-user" from group "new-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Member "not-a-user" does not exist - not removed from group "new-group"'
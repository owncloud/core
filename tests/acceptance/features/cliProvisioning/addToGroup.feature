@cli @skipOnLDAP
Feature: add users to group
  As a admin
  I want to be able to add users to a group
  So that I can give a user access to the resources of the group

  @smokeTest
  Scenario Outline: adding a user to a group
    Given user "brand-new-user" has been created with default attributes
    And group "<group_id>" has been created
    When the administrator adds user "brand-new-user" to group "<group_id>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'User "brand-new-user" added to group "<group_id>"'
    And user "brand-new-user" should belong to group "<group_id>"
    Examples:
      | group_id    | comment                     |
      | simplegroup | nothing special here        |
      | España      | special European characters |
      | नेपाली      | Unicode group name          |

  Scenario Outline: adding a user to a group using mixes of upper and lower case in user and group names
    Given user "brand-new-user" has been created with default attributes
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    When the administrator adds user "<user_id>" to group "<group_id1>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'User "brand-new-user" added to group "<group_id1>"'
    And user "brand-new-user" should belong to group "<group_id1>"
    But user "brand-new-user" should not belong to group "<group_id2>"
    And user "brand-new-user" should not belong to group "<group_id3>"
    Examples:
      | user_id        | group_id1 | group_id2 | group_id3 |
      | BRAND-NEW-USER | New-Group | new-group | NEW-GROUP |
      | Brand-New-User | new-group | NEW-GROUP | New-Group |
      | brand-new-user | NEW-GROUP | New-Group | new-group |

  Scenario: admin tries to add user to a group which does not exist
    Given user "brand-new-user" has been created with default attributes
    And group "not-group" has been deleted
    When the administrator adds user "brand-new-user" to group "not-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'Group "not-group" does not exist'
    And user "brand-new-user" should not belong to group "not-group"

  Scenario: admin tries to add a user which does not exist to a group
    Given user "not-user" has been deleted
    And group "new-group" has been created
    When the administrator adds user "not-user" to group "new-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'User "not-user" could not be found - not added to group "new-group"'
    And group "new-group" should not contain user "not-user"
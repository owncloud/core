@webUI @insulated @disablePreviews
Feature: Add group
  As an admin
  I would like to add a group
  So that I can share documents with other users

  Background:
    Given the administrator has logged in using the webUI
    And the administrator has browsed to the users page


  Scenario Outline: Add group
    When the administrator adds group <groupname> using the webUI
    Then the group name <groupname> should be listed on the webUI
    And group <groupname> should exist
    Examples:
      | groupname   |
      | "localuser" |


  Scenario Outline: group names are case-sensitive, multiple groups can exist with different upper and lower case names
    When the administrator adds group "<group_id1>" using the webUI
    And the administrator adds group "<group_id2>" using the webUI
    Then the group name "<group_id1>" should be listed on the webUI
    And the group name "<group_id2>" should be listed on the webUI
    But the group name "<group_id3>" should not be listed on the webUI
    And group "<group_id1>" should exist
    And group "<group_id2>" should exist
    And group "<group_id3>" should not exist
    Examples:
      | group_id1            | group_id2            | group_id3            |
      | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group |

  @skipOnLDAP
  Scenario Outline: adding a user to a group using mixes of upper and lower case in group names
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    And the administrator reloads the users page
    When the administrator adds user "Alice" to group "<group_id1>" using the webUI
    And user "Alice" should belong to group "<group_id1>"
    But user "Alice" should not belong to group "<group_id2>"
    And user "Alice" should not belong to group "<group_id3>"
    Examples:
      | group_id1 | group_id2 | group_id3 |
      | Oc-Group  | oc-group  | OC-GROUP  |
      | oc-group  | OC-GROUP  | Oc-Group  |
      | OC-GROUp  | Oc-Group  | oc-group  |


  Scenario Outline: Add groups using emojis in group names
    When the administrator adds group <groupname> using the webUI
    Then the group name <groupname> should be listed on the webUI
    And group <groupname> should exist
    Examples:
      | groupname |
      | "☺"       |
      | "☹"       |
      | "✍"       |
      | "⛷"       |
      | "⛹"       |

  @skipOnLDAP
  Scenario: adding multiple users to a group
    Given these users have been created without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And the administrator has reloaded the users page
    When the administrator adds user "Alice" to group "grp1" using the webUI
    And the administrator adds user "Brian" to group "grp1" using the webUI
    Then the user count of group "grp1" should display 2 users on the webUI
    When the administrator adds user "Carol" to group "grp1" using the webUI
    Then the user count of group "grp1" should display 3 users on the webUI
    When the administrator reloads the users page
    Then the user count of group "grp1" should display 3 users on the webUI

  @skipOnOcV10.10
  Scenario: Cannot add group with white-space in the name
    When the administrator adds group "whitespace " using the webUI
    Then a notification should be displayed on the webUI with the text "Error creating group: Unable to add group."


  Scenario: Add group with the same name as an existing group
    Given group "grp1" has been created
    When the administrator adds group "grp1" using the webUI
    Then a notification should be displayed on the webUI with the text "Error creating group: Group already exists."

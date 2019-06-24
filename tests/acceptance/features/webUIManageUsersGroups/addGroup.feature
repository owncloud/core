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

  Scenario Outline: adding a user to a group using mixes of upper and lower case in group names
    Given user "user0" has been created with default attributes and without skeleton files
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    And the administrator reloads the users page
    When the administrator adds user "user0" to group "<group_id1>" using the webUI
    And user "user0" should belong to group "<group_id1>"
    But user "user0" should not belong to group "<group_id2>"
    And user "user0" should not belong to group "<group_id3>"
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
      | groupname                    |
      | "☺"                          |
      | "☹"                          |
      | "✍"                          |
      | "⛷"                           |
      | "⛹"                           |

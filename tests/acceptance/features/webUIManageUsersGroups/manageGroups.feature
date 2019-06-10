@webUI @insulated @disablePreviews
Feature: manage groups
  As an admin
  I want to manage groups
  So that access to resources can be controlled more effectively

  Background:
    Given the administrator has logged in using the webUI
    And the administrator has browsed to the users page

  @skipOnOcV10.0.3
  Scenario: delete group called "0" and "false"
    Given these groups have been created:
      | groupname      |
      | do-not-delete  |
      | 0              |
      | false          |
      | do-not-delete2 |
    And the administrator has browsed to the users page
    When the administrator deletes these groups and confirms the deletion using the webUI:
      | groupname |
      | 0         |
      | false     |
    Then these groups should be listed on the webUI:
      |groupname     |
      |do-not-delete |
      |do-not-delete2|
    But these groups should not be listed on the webUI:
      |groupname|
      |0        |
      |false    |
    And the administrator reloads the users page
    Then these groups should be listed on the webUI:
      | groupname      |
      | do-not-delete  |
      | do-not-delete2 |
    But these groups should not be listed on the webUI:
      | groupname |
      | 0         |
      | false     |
    And these groups should exist:
      | groupname      |
      | do-not-delete  |
      | do-not-delete2 |
    But these groups should not exist:
      | groupname |
      | 0         |
      | false     |

  @skipOnOcV10.0.3 @skipOnOcV10.0.4 @skipOnOcV10.0.5
  Scenario: delete groups with special characters that appear in URLs
    Given these groups have been created:
      | groupname      |
      | do-not-delete  |
      | a/slash        |
      | per%cent       |
      | hash#char      |
      | q?mark         |
      | do-not-delete2 |
    And the administrator has browsed to the users page
    When the administrator deletes these groups and confirms the deletion using the webUI:
      | groupname |
      | a/slash   |
      | per%cent  |
      | hash#char |
      | q?mark    |
    Then these groups should be listed on the webUI:
      |groupname     |
      |do-not-delete |
      |do-not-delete2|
    But these groups should not be listed on the webUI:
      |groupname     |
      |a/slash       |
      |per%cent      |
      |hash#char     |
      |q?mark        |
    And the administrator reloads the users page
    Then these groups should be listed on the webUI:
      | groupname      |
      | do-not-delete  |
      | do-not-delete2 |
    But these groups should not be listed on the webUI:
      | groupname |
      | a/slash   |
      | per%cent  |
      | hash#char |
      | q?mark    |
    And these groups should exist:
      | groupname      |
      | do-not-delete  |
      | do-not-delete2 |
    But these groups should not exist:
      | groupname |
      | a/slash   |
      | per%cent  |
      | hash#char |
      | q?mark    |

  Scenario: delete groups with problematic names
    Given these groups have been created:
      | groupname      |
      | do-not-delete  |
      | grp1           |
      | space group    |
      | quotes'        |
      | quotes"        |
      | do-not-delete2 |
    And the administrator has browsed to the users page
    When the administrator deletes these groups and confirms the deletion using the webUI:
      | groupname   |
      | grp1        |
      | space group |
      | quotes'     |
      | quotes"     |
    Then these groups should be listed on the webUI:
      |groupname     |
      |do-not-delete |
      |do-not-delete2|
    But these groups should not be listed on the webUI:
      | groupname   |
      | grp1        |
      | space group |
      | quotes'     |
      | quotes"     |
    And the administrator reloads the users page
    Then these groups should be listed on the webUI:
      | groupname      |
      | do-not-delete  |
      | do-not-delete2 |
    But these groups should not be listed on the webUI:
      | groupname   |
      | grp1        |
      | space group |
      | quotes'     |
      | quotes"     |
    And these groups should exist:
      | groupname      |
      | do-not-delete  |
      | do-not-delete2 |
    But these groups should not exist:
      | groupname   |
      | grp1        |
      | space group |
      | quotes'     |
      | quotes"     |

  Scenario: cancel deletion of a group
    Given these groups have been created:
      | groupname      |
      | do-not-delete  |
      | grp1           |
      | space group    |
      | quotes'        |
      | quotes"        |
      | do-not-delete2 |
    And the administrator has browsed to the users page
    When the administrator deletes the group named "space group" using the webUI and cancels the deletion using the webUI
    And the administrator reloads the users page
    Then group "space group" should exist

  Scenario: cancel deletion of groups
    Given these groups have been created:
      | groupname      |
      | do-not-delete  |
      | grp1           |
      | space group    |
      | quotes'        |
      | quotes"        |
      | do-not-delete2 |
      | a\slash        |
    And the administrator has browsed to the users page
    When the administrator deletes these groups and and cancels the deletion using the webUI:
      | groupname   |
      | grp1        |
      | space group |
      | quotes'     |
      | a\slash     |
    And the administrator reloads the users page
    Then these groups should be listed on the webUI:
      | groupname      |
      | do-not-delete  |
      | grp1           |
      | space group    |
      | quotes'        |
      | quotes"        |
      | do-not-delete2 |
      | a\slash        |

  Scenario Outline: group names are case-sensitive, the correct group is deleted
    Given group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    And the administrator has browsed to the users page
    When the administrator deletes the group named "<group_id1>" using the webUI and confirms the deletion using the webUI
    Then group "<group_id1>" should not exist
    But group "<group_id2>" should exist
    And group "<group_id3>" should exist
    Examples:
      | group_id1            | group_id2            | group_id3 |
      | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group |

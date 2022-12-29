@webUI @insulated @disablePreviews @skipOnLDAP
Feature: edit users
  As an admin
  I want to edit users
  So that I can manage users properly

  Background:
    Given user admin has logged in using the webUI


  Scenario: Admin changes the display name of the user
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has browsed to the users page
    When the administrator changes the display name of user "Alice" to "New User" using the webUI
    And the administrator logs out of the webUI
    And user "Alice" logs in using the webUI
    Then "New User" should be shown as the name of the current user on the webUI
    And user "Alice" should exist
    And the user attributes returned by the API should include
      | displayname | New User |

  @skipOnEncryptionType:user-keys
  Scenario: Admin changes the password of the user
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the administrator has browsed to the users page
    When the administrator changes the password of user "Alice" to "new_password" using the webUI
    Then user "Alice" should exist
    And the content of file "randomfile.txt" for user "Alice" using password "new_password" should be "some content"
    But user "Brian" using password "%regular%" should not be able to download file "randomfile.txt"


  Scenario: Admin adds a user to a group
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And the administrator has browsed to the users page
    When the administrator adds user "Alice" to group "grp1" using the webUI
    Then user "Alice" should exist
    And user "Alice" should belong to group "grp1"


  Scenario: Admin adds a user to a group when multiple groups are created
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has browsed to the users page
    When the administrator adds user "Alice" to group "grp2" using the webUI
    Then user "Alice" should exist
    And user "Alice" should belong to group "grp2"
    And user "Alice" should not belong to group "grp1"
    And user "Alice" should not belong to group "grp3"


  Scenario: Admin adds a user to multiple groups
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has browsed to the users page
    When the administrator adds user "Alice" to group "grp2" using the webUI
    And the administrator adds user "Alice" to group "grp3" using the webUI
    Then user "Alice" should exist
    And user "Alice" should belong to group "grp2"
    And user "Alice" should belong to group "grp3"
    And user "Alice" should not belong to group "grp1"


  Scenario: Admin removes a user from a group
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And the administrator has browsed to the users page
    When the administrator removes user "Alice" from group "grp1" using the webUI
    Then user "Alice" should exist
    And user "Alice" should not belong to group "grp1"


  Scenario: Admin removes user from multiple groups
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And user "Alice" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Alice" has been added to group "grp3"
    And the administrator has browsed to the users page
    When the administrator removes user "Alice" from group "grp1" using the webUI
    And the administrator removes user "Alice" from group "grp2" using the webUI
    Then user "Alice" should exist
    And user "Alice" should not belong to group "grp1"
    And user "Alice" should not belong to group "grp2"
    And user "Alice" should belong to group "grp3"


  Scenario: Admin changes the email of the user
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has browsed to the users page
    When the administrator changes the email of user "Alice" to "new_email@oc.com" using the webUI
    Then user "Alice" should exist
    And the email address of user "Alice" should be "new_email@oc.com"


  Scenario Outline: remove a user from a group using mixes of upper and lower case in group names
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    And user "Alice" has been added to group "<group_id1>"
    And user "Alice" has been added to group "<group_id2>"
    And user "Alice" has been added to group "<group_id3>"
    And the administrator has browsed to the users page
    When the administrator removes user "Alice" from group "<group_id1>" using the webUI
    And user "Alice" should not belong to group "<group_id1>"
    But user "Alice" should belong to group "<group_id2>"
    And user "Alice" should belong to group "<group_id3>"
    Examples:
      | group_id1 | group_id2 | group_id3 |
      | New-Group | new-group | NEW-GROUP |
      | new-group | NEW-GROUP | New-Group |
      | NEW-GROUP | New-Group | new-group |


  Scenario: removing multiple users from a group
    Given these users have been created without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And the administrator has browsed to the users page
    When the administrator removes user "Alice" from group "grp1" using the webUI
    And the administrator removes user "Brian" from group "grp1" using the webUI
    Then the user count of group "grp1" should display 1 users on the webUI
    When the administrator removes user "Carol" from group "grp1" using the webUI
    Then the user count of group "grp1" should display 0 users on the webUI
    When the administrator reloads the users page
    Then the user count of group "grp1" should display 0 users on the webUI

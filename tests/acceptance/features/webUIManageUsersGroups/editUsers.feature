@webUI @insulated @disablePreviews
Feature: edit users
  As an admin
  I want to edit users
  So that I can manage users properly

  Background:
    Given user admin has logged in using the webUI

  Scenario: Admin changes the display name of the user
    Given user "user0" has been created with default attributes and skeleton files
    And the administrator has browsed to the users page
    When the administrator changes the display name of user "user0" to "New User" using the webUI
    And the administrator logs out of the webUI
    And user "user0" logs in using the webUI
    Then "New User" should be shown as the name of the current user on the WebUI
    And user "user0" should exist
    And the user attributes returned by the API should include
      | displayname | New User |

  @skipOnEncryptionType:user-keys
  Scenario: Admin changes the password of the user
    Given user "user0" has been created with default attributes and skeleton files
    And the administrator has browsed to the users page
    When the administrator changes the password of user "user0" to "new_password" using the webUI
    Then user "user0" should exist
    And the content of file "textfile0.txt" for user "user0" using password "new_password" should be "ownCloud test text file 0" plus end-of-line
    But user "user1" using password "%regular%" should not be able to download file "textfile0.txt"

  Scenario: Admin adds a user to a group
    Given user "user0" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And the administrator has browsed to the users page
    When the administrator adds user "user0" to group "grp1" using the webUI
    Then user "user0" should exist
    And user "user0" should belong to group "grp1"

  Scenario: Admin adds a user to a group when multiple groups are created
    Given user "user0" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has browsed to the users page
    When the administrator adds user "user0" to group "grp2" using the webUI
    Then user "user0" should exist
    And user "user0" should belong to group "grp2"
    And user "user0" should not belong to group "grp1"
    And user "user0" should not belong to group "grp3"

  Scenario: Admin adds a user to multiple groups
    Given user "user0" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has browsed to the users page
    When the administrator adds user "user0" to group "grp2" using the webUI
    When the administrator adds user "user0" to group "grp3" using the webUI
    Then user "user0" should exist
    And user "user0" should belong to group "grp2"
    And user "user0" should belong to group "grp3"
    And user "user0" should not belong to group "grp1"

  Scenario: Admin removes a user from a group
    Given user "user0" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And user "user0" has been added to group "grp1"
    And the administrator has browsed to the users page
    When the administrator removes user "user0" from group "grp1" using the webUI
    Then user "user0" should exist
    And user "user0" should not belong to group "grp1"

  Scenario: Admin removes user from multiple groups
    Given user "user0" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And user "user0" has been added to group "grp1"
    And user "user0" has been added to group "grp2"
    And user "user0" has been added to group "grp3"
    And the administrator has browsed to the users page
    When the administrator removes user "user0" from group "grp1" using the webUI
    And the administrator removes user "user0" from group "grp2" using the webUI
    Then user "user0" should exist
    And user "user0" should not belong to group "grp1"
    And user "user0" should not belong to group "grp2"
    And user "user0" should belong to group "grp3"

  Scenario: Admin changes the email of the user
    Given user "user0" has been created with default attributes and skeleton files
    And the administrator has browsed to the users page
    When the administrator changes the email of user "user0" to "new_email@oc.com" using the webUI
    Then user "user0" should exist
    And the email address of user "user0" should be "new_email@oc.com"

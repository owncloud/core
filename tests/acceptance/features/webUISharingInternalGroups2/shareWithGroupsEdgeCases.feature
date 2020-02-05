@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal groups
  As a user
  I want to share files and folders with groups
  So that those groups can access the files and folders

  Scenario Outline: sharing  files and folder with an internal problematic group name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | <group>   |
    And user "user1" has been added to group "<group>"
    And user "user2" has been added to group "<group>"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with group "<group>" using the webUI
    And the user shares file "testimage.jpg" with group "<group>" using the webUI
    And the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "<group>" by "User Three" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared with "<group>" by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "<group>" by "User Three" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared with "<group>" by "User Three" on the webUI
    Examples:
      | group     |
      | ?\?@#%@,; |
      | नेपाली    |

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: Share file with a user and a group with same name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | user1     |
    And user "user1" has been added to group "user1"
    And user "user2" has been added to group "user1"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user shares folder "simple-folder" with group "user1" using the webUI
    When the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be marked as shared by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be marked as shared with "user1" by "User Three" on the webUI

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: Share file with a group and a user with same name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | user1     |
    And user "user1" has been added to group "user1"
    And user "user2" has been added to group "user1"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with group "user1" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    When the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be marked as shared by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be marked as shared with "user1" by "User Three" on the webUI

  Scenario: Share file with a user and again with a group with same name but different case
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | User1     |
    And user "user2" has been added to group "User1"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user shares folder "simple-folder" with group "User1" using the webUI
    When the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be marked as shared by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be marked as shared with "User1" by "User Three" on the webUI

  Scenario: Share file with a group and again with a user with same name but different case
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | User1     |
    And user "user2" has been added to group "User1"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with group "User1" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    When the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be marked as shared by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be marked as shared with "User1" by "User Three" on the webUI

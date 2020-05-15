@webUI @insulated @disablePreviews @app-required @notifications-app-required @files_sharing-app-required
Feature: Sharing files and folders with internal groups
  As a user
  I want to share files and folders with groups
  So that those groups can access the files and folders

  Background:
    Given app "notifications" has been enabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "user0" has been added to group "grp1"
    And user "user1" has been added to group "grp1"
    And user "user1" has logged in using the webUI

  Scenario: notifications about new share is displayed
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "user2" has created folder "a-folder"
    And user "user2" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    When user "user2" has shared folder "/a-folder" with group "grp1"
    And user "user2" has shared file "/data.zip" with group "grp1"
    Then the user should see 2 notifications on the webUI with these details
      | title                                 |
      | "User Two" shared "a-folder" with you |
      | "User Two" shared "data.zip" with you |
    When the user re-logs in as "user0" using the webUI
    Then the user should see 2 notifications on the webUI with these details
      | title                                 |
      | "User Two" shared "a-folder" with you |
      | "User Two" shared "data.zip" with you |

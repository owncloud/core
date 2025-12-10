@webUI @insulated @disablePreviews @app-required @notifications-app-required @files_sharing-app-required
Feature: Sharing files and folders with internal groups
  As a user
  I want to share files and folders with groups
  So that those groups can access the files and folders

  Background:
    Given app "notifications" has been enabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has logged in using the webUI


  Scenario: notifications about new share is displayed
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Carol" has created folder "a-folder"
    And user "Carol" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    When user "Carol" has shared folder "/a-folder" with group "grp1"
    And user "Carol" has shared file "/data.zip" with group "grp1"
    Then the user should see 2 notifications on the webUI with these details
      | title                                      | user  |
      | "%displayname%" shared "a-folder" with you | Carol |
      | "%displayname%" shared "data.zip" with you | Carol |
    When the user re-logs in as "Alice" using the webUI
    Then the user should see 2 notifications on the webUI with these details
      | title                                      | user  |
      | "%displayname%" shared "a-folder" with you | Carol |
      | "%displayname%" shared "data.zip" with you | Carol |

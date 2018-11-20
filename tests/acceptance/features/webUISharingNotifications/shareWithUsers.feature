@webUI @insulated @disablePreviews @app-required @notifications-app-required
Feature: Sharing files and folders with internal users
  As a user
  I want to share files and folders with other users
  So that those users can access the files and folders

  Background:
    Given app "notifications" has been enabled
    And these users have been created with default attributes:
      | username |
      | user1    |
      | user2    |
    And user "user2" has logged in using the webUI

  @smokeTest
  Scenario: notifications about new share is displayed when autoacepting is disabled
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "user1" has shared folder "/simple-folder" with user "user2"
    And user "user1" has shared folder "/data.zip" with user "user2"
    Then the user should see 2 notifications on the webUI with these details
      | title                                      |
      | "User One" shared "simple-folder" with you |
      | "User One" shared "data.zip" with you      |

  @smokeTest
  Scenario: Notification is gone after accepting a share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "user1" has shared folder "/simple-folder" with user "user2"
    And user "user1" has shared folder "/simple-empty-folder" with user "user2"
    When the user accepts all shares displayed in the notifications on the webUI
    Then user "user2" should have 0 notifications

  @smokeTest
  Scenario: accept an offered share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "user1" has shared folder "/simple-folder" with user "user2"
    And user "user1" has shared folder "/simple-empty-folder" with user "user2"
    When the user accepts all shares displayed in the notifications on the webUI
    Then folder "simple-folder (2)" should be listed in the files page on the webUI
    And folder "simple-empty-folder (2)" should be listed in the files page on the webUI
    And folder "simple-folder (2)" should be in state "" in the shared-with-you page on the webUI
    And folder "simple-empty-folder (2)" should be in state "" in the shared-with-you page on the webUI

  @smokeTest
  Scenario: reject an offered share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "user1" has shared folder "/simple-folder" with user "user2"
    And user "user1" has shared folder "/simple-empty-folder" with user "user2"
    When the user declines all shares displayed in the notifications on the webUI
    Then folder "simple-folder (2)" should not be listed in the files page on the webUI
    And folder "simple-empty-folder (2)" should not be listed in the files page on the webUI
    And folder "simple-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And folder "simple-empty-folder" should be in state "Declined" in the shared-with-you page on the webUI


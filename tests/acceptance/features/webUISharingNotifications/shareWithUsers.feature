@webUI @insulated @disablePreviews @app-required @notifications-app-required @files_sharing-app-required
Feature: Sharing files and folders with internal users
  As a user
  I want to share files and folders with other users
  So that those users can access the files and folders

  Background:
    Given app "notifications" has been enabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has created folder "a-folder"
    And user "Alice" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    And user "Brian" has logged in using the webUI

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: notifications about new share is displayed when autoacepting is disabled
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Alice" has shared folder "/a-folder" with user "Brian"
    And user "Alice" has shared file "/data.zip" with user "Brian"
    Then the user should see 2 notifications on the webUI with these details
      | title                                      | user  |
      | "%displayname%" shared "a-folder" with you | Alice |
      | "%displayname%" shared "data.zip" with you | Alice |

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: Notification is gone after accepting a share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Alice" has shared folder "/a-folder" with user "Brian"
    And user "Alice" has shared file "/data.zip" with user "Brian"
    When the user accepts all shares displayed in the notifications on the webUI
    Then user "Brian" should have 0 notifications

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: accept an offered share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Alice" has shared folder "/a-folder" with user "Brian"
    And user "Alice" has shared file "/data.zip" with user "Brian"
    When the user accepts all shares displayed in the notifications on the webUI
    Then folder "a-folder" should be listed in the files page on the webUI
    And file "data.zip" should be listed in the files page on the webUI
    And folder "a-folder" should be in state "" in the shared-with-you page on the webUI
    And file "data.zip" should be in state "" in the shared-with-you page on the webUI

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: reject an offered share
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "Alice" has shared folder "/a-folder" with user "Brian"
    And user "Alice" has shared file "/data.zip" with user "Brian"
    When the user declines all shares displayed in the notifications on the webUI
    Then folder "a-folder" should not be listed in the files page on the webUI
    And file "data.zip" should not be listed in the files page on the webUI
    And folder "a-folder" should be in state "Declined" in the shared-with-you page on the webUI
    And file "data.zip" should be in state "Declined" in the shared-with-you page on the webUI


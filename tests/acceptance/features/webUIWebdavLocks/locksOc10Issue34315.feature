@webUI @insulated @disablePreviews
Feature: Locks
  As a user
  I would like to be able to see what lock are on files and folders
  So that I can understand who has which resources locked

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given these users have been created without skeleton files:
      | username       |
      | brand-new-user |
    And user "brand-new-user" has logged in using the webUI

  @skipOnOcV10 @issue-34315
  Scenario: setting a lock shows the current display name of a user in the locking details
    Given these users have been created without skeleton files:
      | username               | displayname   |
      | user-with-display-name | My fancy name |
    And user "user-with-display-name" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    And user "user-with-display-name" has created folder "simple-folder"
    And user "user-with-display-name" has locked folder "simple-folder" setting the following properties
      | lockscope | shared |
    And user "user-with-display-name" has locked file "data.zip" setting the following properties
      | lockscope | exclusive |
    And the administrator has changed the display name of user "user-with-display-name" to "An ordinary name"
    When the user re-logs in with username "user-with-display-name" and password "%regular%" using the webUI
    And folder "simple-folder" should be marked as locked by user "My fancy name" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "My fancy name" in the locks tab of the details panel on the webUI
    #And folder "simple-folder" should be marked as locked by user "An ordinary name" in the locks tab of the details panel on the webUI
    #And file "data.zip" should be marked as locked by user "An ordinary name" in the locks tab of the details panel on the webUI

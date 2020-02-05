@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal users
  As a user
  I want to share files and folders with other users
  So that those users can access the files and folders

  @skipOnOcV10.3
  Scenario: Create share when admin disables delete in share permissions
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission delete for default user and group share using the webUI
    And the user re-logs in as "user2" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "User One"
      | change | yes |
      | create | yes |
      | delete | no  |
      | share  | yes |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    And the option to upload file should be available on the webUI
    When the user shares file "lorem.txt" with user "User Three" using the webUI
    Then as "user3" file "lorem.txt" should exist

  @skipOnOcV10.3
  Scenario: Create share when admin disables change in share permissions
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission change for default user and group share using the webUI
    And the user re-logs in as "user2" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "User One"
      | change | no  |
      | create | yes |
      | delete | yes |
      | share  | yes |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should not be available on the webUI
    And the option to upload file should be available on the webUI
    When the user shares file "lorem.txt" with user "User Three" using the webUI
    Then as "user3" file "lorem.txt" should exist
    And the option to delete file "lorem.txt" should be available on the webUI

  @skipOnOcV10.3
  Scenario: Create share when admin disables create and share in share permissions
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission create for default user and group share using the webUI
    And the administrator disables permission share for default user and group share using the webUI
    And the user re-logs in as "user2" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "User One"
      | change | yes |
      | create | no  |
      | delete | yes |
      | share  | no  |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then it should not be possible to share file "lorem.txt" using the webUI
    And the option to upload file should not be available on the webUI
    And the option to rename file "lorem.txt" should be available on the webUI
    And it should be possible to delete file "lorem.txt" using the webUI

  @skipOnOcV10.3
  Scenario: Create share when admin disables delete in share permissions but then user enables the permission
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission delete for default user and group share using the webUI
    And the user re-logs in as "user2" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    And the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
      | delete | yes |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And the option to upload file should be available on the webUI
    And it should not be possible to share file "lorem.txt" using the webUI
    And the option to delete file "lorem.txt" should be available on the webUI

  @skipOnOcV10.3
  Scenario: Create share when admin disables multiple default share permissions but then user enables a disabled permission
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission delete for default user and group share using the webUI
    And the administrator disables permission share for default user and group share using the webUI
    And the user re-logs in as "user2" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    And the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
      | share | yes |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And the option to upload file should be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    When the user shares file "lorem.txt" with user "User Three" using the webUI
    Then as "user3" file "lorem.txt" should exist

  @mailhog @skipOnOcV10.3
  Scenario: user without email should be able to send notification by email when allow share mail notification has been enabled
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And these users have been created without skeleton files:
      | username | password |
      | user0    | 1234     |
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/simple-folder"
    And user "user0" has logged in using the webUI
    And user "user0" has shared folder "simple-folder" with user "user1"
    And the user has opened the share dialog for folder "simple-folder"
    When the user sends the share notification by email using the webUI
    Then a notification should be displayed on the webUI with the text "Email notification was sent!"
    And the email address "user1@example.org" should have received an email with the body containing
      """
      just letting you know that user0 shared simple-folder with you.
      """

  @skipOnOcV10.3
  Scenario: sharing indicator of items inside a shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user1" has shared folder "simple-folder" with user "user2"
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | simple-empty-folder |
      | lorem.txt           |

  @skipOnOcV10.3
  Scenario: sharing indicator of items inside a shared folder two levels down
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user1" has created folder "/simple-folder/simple-empty-folder/new-folder"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/simple-empty-folder/lorem.txt"
    And user "user1" has shared folder "simple-folder" with user "user2"
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user opens folder "simple-empty-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-folder |
      | lorem.txt  |

  @skipOnOcV10.3
  Scenario: sharing indicator of items inside a re-shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
    And these users have been created without skeleton files:
      | username |
      | user2    |
      | user3    |
    And user "user1" has shared folder "simple-folder" with user "user2"
    And user "user2" has shared folder "simple-folder" with user "user3"
    And user "user2" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | simple-empty-folder |
      | lorem.txt           |

  @skipOnOcV10.3
  Scenario: no sharing indicator of items inside a not shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should not have share indicators on the webUI
      | simple-empty-folder |
      | lorem.txt           |

  @skipOnOcV10.3
  Scenario: sharing details of items inside a shared folder
    Given these users have been created without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user1" has created folder "/simple-folder"
    And user "user1" has created folder "/simple-folder/simple-empty-folder"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "user1" has shared folder "simple-folder" with user "user2"
    And user "user1" has logged in using the webUI
    And the user has opened folder "simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-empty-folder" using the webUI
    Then user "user2" should be listed as share receiver via "simple-folder" on the webUI
    When the user opens the sharing tab from the file action menu of file "lorem.txt" using the webUI
    Then user "user2" should be listed as share receiver via "simple-folder" on the webUI

  @skipOnOcV10.3
  Scenario: sharing details of items inside a re-shared folder
    Given these users have been created without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user1" has created folder "/simple-folder"
    And user "user1" has created folder "/simple-folder/simple-empty-folder"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "user1" has shared folder "simple-folder" with user "user2"
    And user "user2" has shared folder "simple-folder" with user "user3"
    And user "user2" has logged in using the webUI
    And the user has opened folder "simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-empty-folder" using the webUI
    Then user "user3" should be listed as share receiver via "simple-folder" on the webUI
    When the user opens the sharing tab from the file action menu of file "lorem.txt" using the webUI
    Then user "user3" should be listed as share receiver via "simple-folder" on the webUI

  @skipOnOcV10.3
  Scenario: sharing indicator for file uploaded inside a shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user1" has shared folder "/simple-empty-folder" with user "user2"
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-empty-folder" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-lorem.txt |

  @skipOnOcV10.3
  Scenario: sharing indicator for folder created inside a shared folder
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user1" has shared folder "/simple-empty-folder" with user "user2"
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-empty-folder" using the webUI
    And the user creates a folder with the name "sub-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | sub-folder |

  @skipOnOcV10.3
  Scenario: sharing details of items inside a shared folder shared with multiple users
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user1" has created folder "/simple-folder"
    And user "user1" has created folder "/simple-folder/sub-folder"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/sub-folder/lorem.txt"
    And user "user1" has shared folder "simple-folder" with user "user2"
    And user "user1" has shared folder "/simple-folder/sub-folder" with user "user3"
    And user "user1" has logged in using the webUI
    And the user has opened folder "simple-folder/sub-folder" using the webUI
    When the user opens the sharing tab from the file action menu of file "lorem.txt" using the webUI
    Then user "User Two" should be listed as share receiver via "simple-folder" on the webUI
    And user "User Three" should be listed as share receiver via "sub-folder" on the webUI

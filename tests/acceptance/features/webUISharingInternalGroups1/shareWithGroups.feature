@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal groups
  As a user
  I want to share files and folders with groups
  So that those groups can access the files and folders

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has uploaded file with content "some content" to "/lorem.txt"

  @smokeTest @mobileResolutionTest
  Scenario: share a folder with an internal group
    Given user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with group "grp1" using the webUI
    And the user shares file "lorem.txt" with group "grp1" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "grp1" by "Carol" on the webUI
    And file "lorem.txt" should be listed on the webUI
    And file "lorem.txt" should be marked as shared with "grp1" by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "grp1" by "Carol" on the webUI
    And file "lorem.txt" should be listed on the webUI
    And file "lorem.txt" should be marked as shared with "grp1" by "Carol" on the webUI

  @skipOnFIREFOX
  Scenario: share a file with an internal group a member overwrites and unshares the file
    Given user "Carol" has logged in using the webUI
    When the user renames file "lorem.txt" to "new-lorem.txt" using the webUI
    And the user shares file "new-lorem.txt" with group "grp1" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then the content of "new-lorem.txt" should not be the same as the local "new-lorem.txt"
    # overwrite the received shared file
    When the user uploads overwriting file "new-lorem.txt" using the webUI and retries if the file is locked
    Then file "new-lorem.txt" should be listed on the webUI
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
    # unshare the received shared file
    When the user unshares file "new-lorem.txt" using the webUI
    Then file "new-lorem.txt" should not be listed on the webUI
    # check that another group member can still see the file
    When the user re-logs in as "Brian" using the webUI
    Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
    # check that the original file owner can still see the file
    When the user re-logs in as "Carol" using the webUI
    Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"


  Scenario: share a folder with an internal group and a member uploads, overwrites and deletes files
    Given user "Carol" has uploaded file with content "some content" to "/simple-folder/lorem.txt"
    And user "Carol" has uploaded file "filesForUpload/data.zip" to "/simple-folder/data.zip"
    And user "Carol" has logged in using the webUI
    When the user renames folder "simple-folder" to "new-simple-folder" using the webUI
    And the user shares folder "new-simple-folder" with group "grp1" using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "new-simple-folder" using the webUI
    Then the content of "lorem.txt" should not be the same as the local "lorem.txt"
    # overwrite an existing file in the received share
    When the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" should be the same as the local "lorem.txt"
    # upload a new file into the received share
    When the user uploads file "new-lorem.txt" using the webUI
    Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
    # delete a file in the received share
    When the user deletes file "data.zip" using the webUI
    Then file "data.zip" should not be listed on the webUI
    # check that the file actions by the sharee are visible to another group member
    When the user re-logs in as "Brian" using the webUI
    And the user opens folder "new-simple-folder" using the webUI
    Then the content of "lorem.txt" should be the same as the local "lorem.txt"
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
    And file "data.zip" should not be listed on the webUI
    # check that the file actions by the sharee are visible for the share owner
    When the user re-logs in as "Carol" using the webUI
    And the user opens folder "new-simple-folder" using the webUI
    Then the content of "lorem.txt" should be the same as the local "lorem.txt"
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
    And file "data.zip" should not be listed on the webUI

  @smokeTest @mobileResolutionTest
  Scenario: share a folder with an internal group and a member unshares the folder
    Given user "Carol" has uploaded file with content "some content" to "/simple-folder/lorem.txt"
    And user "Carol" has logged in using the webUI
    When the user renames folder "simple-folder" to "new-simple-folder" using the webUI
    And the user shares folder "new-simple-folder" with group "grp1" using the webUI
    # unshare the received shared folder and check it is gone
    And the user re-logs in as "Alice" using the webUI
    And the user unshares folder "new-simple-folder" using the webUI
    Then folder "new-simple-folder" should not be listed on the webUI
    # check that the folder is still visible to another group member
    When the user re-logs in as "Brian" using the webUI
    Then folder "new-simple-folder" should be listed on the webUI
    When the user opens folder "new-simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "new-simple-folder/lorem.txt" for user "Brian" should be "some content"
    # check that the folder is still visible for the share owner
    When the user re-logs in as "Carol" using the webUI
    Then folder "new-simple-folder" should be listed on the webUI
    When the user opens folder "new-simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "new-simple-folder/lorem.txt" for user "Carol" should be "some content"


  Scenario: user tries to share a file in a group which is excluded from receiving share
    Given group "system-group" has been created
    And the administrator has browsed to the admin sharing settings page
    When the administrator excludes group "system-group" from receiving shares using the webUI
    Then user "Carol" should not be able to share file "lorem.txt" with group "system-group" using the sharing API


  Scenario: user tries to share a folder in a group which is excluded from receiving share
    Given group "system-group" has been created
    And the administrator has browsed to the admin sharing settings page
    When the administrator excludes group "system-group" from receiving shares using the webUI
    Then user "Carol" should not be able to share folder "simple-folder" with group "system-group" using the sharing API


  Scenario: autocompletion for a group that is excluded from receiving shares
    Given group "system-group" has been created
    And the administrator has browsed to the admin sharing settings page
    When the administrator excludes group "system-group" from receiving shares using the webUI
    And the user re-logs in as "Carol" using the webUI
    And the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user types "system-group" in the share-with-field
    Then a tooltip with the text "No users or groups found for system-group" should be shown near the share-with-field on the webUI
    And the autocomplete list should not be displayed on the webUI

  @skipOnEncryptionType:user-keys @issue-encryption-126 @email
  Scenario: user should be able to send notification by email when allow share mail notification has been enabled
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And user "Carol" has logged in using the webUI
    And user "Carol" has shared file "lorem.txt" with group "grp1"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email for group "grp1" using the webUI
    Then a notification should be displayed on the webUI with the text "Email notification was sent!"
    And the email address of user "Alice" should have received an email from user "Carol" with the body containing
      """
      just letting you know that %displayname% shared lorem.txt with you.
      """
    And the email address of user "Brian" should have received an email from user "Carol" with the body containing
      """
      just letting you know that %displayname% shared lorem.txt with you.
      """

  @email
  Scenario: user should not be able to send notification by email more than once
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And user "Carol" has logged in using the webUI
    And user "Carol" has shared file "lorem.txt" with group "grp1"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email for group "grp1" using the webUI
    Then the user should not be able to send the share notification by email for group "grp1" using the webUI
    When the user reloads the current page of the webUI
    And the user opens the share dialog for file "lorem.txt"
    Then the user should not be able to send the share notification by email for group "grp1" using the webUI


  Scenario: user should not be able to send notification by email when allow share mail notification has been disabled
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "no"
    And user "Carol" has logged in using the webUI
    And user "Carol" has shared file "lorem.txt" with group "grp1"
    When the user opens the share dialog for file "lorem.txt"
    Then the user should not be able to send the share notification by email for group "grp1" using the webUI

  @email @skipOnLDAP
  Scenario: user should not get an email notification if the user is added to the group after the mail notification was sent
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And user "David" has been created with default attributes and without skeleton files
    And user "Carol" has logged in using the webUI
    And user "Carol" has shared file "lorem.txt" with group "grp1"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email for group "grp1" using the webUI
    Then a notification should be displayed on the webUI with the text "Email notification was sent!"
    When the administrator adds user "David" to group "grp1" using the provisioning API
    Then the email address "david@example.org" should not have received an email

  @skipOnEncryptionType:user-keys @issue-encryption-126 @email
  Scenario: user should get an error message when trying to send notification by email to the group where some user have set up their email and others haven't
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And these users have been created without skeleton files:
      | username           |
      | brand-new-user     |
      | off-brand-new-user |
    And user "brand-new-user" has been added to group "grp1"
    And user "off-brand-new-user" has been added to group "grp1"
    And user "Carol" has logged in using the webUI
    And user "Carol" has shared file "lorem.txt" with group "grp1"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email for group "grp1" using the webUI
    Then dialog should be displayed on the webUI
      | title                       | content                                                                          |
      | Email notification not sent | Couldn't send mail to following recipient(s): brand-new-user, off-brand-new-user |
    And the email address of user "Alice" should have received an email from user "Carol" with the body containing
      """
      just letting you know that %displayname% shared lorem.txt with you.
      """
    And the email address of user "Brian" should have received an email from user "Carol" with the body containing
      """
      just letting you know that %displayname% shared lorem.txt with you.
      """


  Scenario: user added to a group has a share that matches the skeleton of added user
    Given user "Alice" has uploaded file with content "some content" to "lorem.txt"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has shared file "lorem.txt" with group "grp1"
    When user "Carol" logs in using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem (2).txt" should be listed on the webUI
    And file "lorem (2).txt" should be marked as shared with "grp1" by "Alice" on the webUI
    And the content of file "lorem (2).txt" for user "Carol" should be "some content"

  @skipOnLDAP
  Scenario Outline: group names are case-sensitive, sharing with groups with different upper and lower case names
    Given user "some-user" has been created with default attributes and without skeleton files
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    And user "Alice" has been added to group "<group_id1>"
    And user "Brian" has been added to group "<group_id2>"
    And user "Carol" has been added to group "<group_id3>"
    And user "some-user" has created folder "/simple-folder"
    And user "some-user" has logged in using the webUI
    When the user shares folder "simple-folder" with group "<group_id1>" using the webUI
    And the user shares folder "simple-folder" with group "<group_id2>" using the webUI
    And the user shares folder "simple-folder" with group "<group_id3>" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared with "<group_id1>" by "some-user" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "<group_id2>" by "some-user" on the webUI
    When the user re-logs in as "Carol" using the webUI
    Then folder "simple-folder (2)" should be marked as shared with "<group_id3>" by "some-user" on the webUI
    Examples:
      | group_id1            | group_id2            | group_id3            |
      | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group |

  @skipOnLDAP
  Scenario Outline: group names are case-sensitive, sharing with groups in different case group name fail, if they don't exist
    Given group "<group_id1>" has been created
    And user "Brian" has created folder "/simple-folder"
    And user "Brian" has logged in using the webUI
    When the user shares folder "simple-folder" with group "<group_id1>" using the webUI
    And the user has opened the share dialog for folder "simple-folder"
    And the user types "<group_id2>" in the share-with-field
    Then a tooltip with the text "No users or groups found for <group_id2>" should be shown near the share-with-field on the webUI
    When the user types "<group_id3>" in the share-with-field
    Then a tooltip with the text "No users or groups found for <group_id3>" should be shown near the share-with-field on the webUI
    Examples:
      | group_id1            | group_id2            | group_id3            |
      | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group |


  Scenario: sharer should not be able to share a folder to a group which he/she is not member of when share with groups they are member of is enabled
    Given group "grp2" has been created
    And user "Alice" has created folder "/simple-folder"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with groups they are member of using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user opens the share dialog for folder "simple-folder"
    And the user types "grp2" in the share-with-field
    Then a tooltip with the text "No users or groups found for grp2" should be shown near the share-with-field on the webUI


  Scenario: sharer should not be able to share a file to a group which he/she is not member of when share with groups they are member of is enabled
    Given group "grp2" has been created
    And user "Alice" has uploaded file with content "some content" to "lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with groups they are member of using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user opens the share dialog for file "lorem.txt"
    And the user types "grp2" in the share-with-field
    Then a tooltip with the text "No users or groups found for grp2" should be shown near the share-with-field on the webUI


  Scenario: sharer should be able to share a folder to his/her own group when only share with groups they are member of is enabled
    Given user "Alice" has created folder "/simple-folder"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with groups they are member of using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user shares folder "simple-folder" with group "grp1" using the webUI
    Then as "Brian" folder "/simple-folder" should exist


  Scenario: sharer should be able to share a file to his/her own group when only share with groups they are member of is enabled
    Given user "Alice" has uploaded file with content "some content" to "lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with groups they are member of using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user shares file "lorem.txt" with group "grp1" using the webUI
    Then as "Brian" file "/lorem.txt" should exist


  Scenario: share folder with a group when group has matching folder
    Given user "Alice" has created folder "test"
    And user "Carol" has created folder "test"
    And user "Carol" has shared folder "test" with group "grp1"
    When user "Alice" logs in using the webUI
    Then folder "test" should be listed on the webUI
    And folder "test (2)" should be listed on the webUI

  @skipOnLDAP
  Scenario: shares shared to deleted group should not be available
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has shared file "/lorem.txt" with group "grp1"
    And the user re-logs in as "Brian" using the webUI
    Then file "lorem.txt" should be marked as shared with "grp1" by "Alice" on the webUI
    When the administrator deletes group "grp1" using the provisioning API
    And the user reloads the current page of the webUI
    Then file "lorem.txt" should not be listed on the webUI
    When the user browses to the shared-with-you page
    Then file "lorem.txt" should not be listed on the webUI
    And as "Brian" file "/lorem.txt" should not exist
    When the user re-logs in as "Alice" using the webUI
    And the user opens the share dialog for file "lorem.txt"
    Then the group "grp1" should not be in share with group list


  Scenario: sharing indicator of items inside a shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/simple-empty-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has shared folder "simple-folder" with group "grp1"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | simple-empty-folder |
      | lorem.txt           |


  Scenario: sharing indicator of items inside a shared folder two levels down
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/simple-empty-folder/"
    And user "Alice" has created folder "/simple-folder/simple-empty-folder/new-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/simple-empty-folder/lorem.txt"
    And user "Alice" has shared folder "simple-folder" with group "grp1"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user opens folder "simple-empty-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-folder |
      | lorem.txt  |


  Scenario: sharing indicator of items inside a re-shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/simple-empty-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has shared folder "simple-folder" with user "Brian"
    And user "Brian" has shared folder "simple-folder" with group "grp1"
    And user "Brian" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | simple-empty-folder |
      | lorem.txt           |


  Scenario: no sharing indicator of items inside a not shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/simple-sub-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should not have share indicators on the webUI
      | simple-sub-folder |
      | lorem.txt         |


  Scenario: sharing indicator for file uploaded inside a shared folder
    Given user "Carol" has created folder "/simple-empty-folder"
    And user "Carol" has shared folder "/simple-empty-folder" with group "grp1"
    And user "Carol" has logged in using the webUI
    When the user opens folder "simple-empty-folder" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-lorem.txt |


  Scenario: sharing indicator for folder created inside a shared folder
    Given user "Carol" has created folder "/simple-empty-folder"
    And user "Carol" has shared folder "/simple-empty-folder" with group "grp1"
    And user "Carol" has logged in using the webUI
    When the user opens folder "simple-empty-folder" using the webUI
    And the user creates a folder with the name "sub-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | sub-folder |


  Scenario: sharing details of items inside a shared folder shared with user and group
    Given user "Carol" has created folder "/simple-folder/sub-folder"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/sub-folder/lorem.txt"
    And user "Carol" has shared folder "simple-folder" with user "Brian"
    And user "Carol" has shared folder "/simple-folder/sub-folder" with group "grp1"
    And user "Carol" has logged in using the webUI
    When the user opens folder "simple-folder/sub-folder" using the webUI
    And the user opens the sharing tab from the file action menu of file "lorem.txt" using the webUI
    Then user "Brian" should be listed as share receiver via "simple-folder" on the webUI
    And group "grp1" should be listed as share receiver via "sub-folder" on the webUI

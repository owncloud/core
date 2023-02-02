@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: misc scenarios on sharing with internal users

  @skipOnFIREFOX
  Scenario: share a file with another internal user who overwrites and unshares the file
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Brian" has logged in using the webUI
    When the user renames file "lorem.txt" to "new-lorem.txt" using the webUI
    And the user shares file "new-lorem.txt" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then the content of "new-lorem.txt" should not be the same as the local "new-lorem.txt"
		# overwrite the received shared file
    When the user uploads overwriting file "new-lorem.txt" using the webUI and retries if the file is locked
    Then file "new-lorem.txt" should be listed on the webUI
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# unshare the received shared file
    When the user unshares file "new-lorem.txt" using the webUI
    Then file "new-lorem.txt" should not be listed on the webUI
		# check that the original file owner can still see the file
    When the user re-logs in as "Brian" using the webUI
    Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"


  Scenario: share a folder with another internal user who uploads, overwrites and deletes files
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Brian" has uploaded file "filesForUpload/data.zip" to "/simple-folder/data.zip"
    And user "Brian" has logged in using the webUI
    When the user renames folder "simple-folder" to "new-simple-folder" using the webUI
    And the user shares folder "new-simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "new-simple-folder" using the webUI
    Then the content of "lorem.txt" should be the same as the local "lorem.txt"
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
		# check that the file actions by the sharee are visible for the share owner
    When the user re-logs in as "Brian" using the webUI
    And the user opens folder "new-simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" should be the same as the local "lorem.txt"
    And file "new-lorem.txt" should be listed on the webUI
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
    But file "data.zip" should not be listed on the webUI


  Scenario: share a folder with another internal user who unshares the folder
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file with content "some content" to "/simple-folder/lorem.txt"
    And user "Brian" has logged in using the webUI
    When the user renames folder "simple-folder" to "new-simple-folder" using the webUI
    And the user shares folder "new-simple-folder" with user "Alice" using the webUI
		# unshare the received shared folder and check it is gone
    And the user re-logs in as "Alice" using the webUI
    And the user unshares folder "new-simple-folder" using the webUI
    Then folder "new-simple-folder" should not be listed on the webUI
		# check that the folder is still visible for the share owner
    When the user re-logs in as "Brian" using the webUI
    Then folder "new-simple-folder" should be listed on the webUI
    When the user opens folder "new-simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "/new-simple-folder/lorem.txt" for user "Brian" should be "some content"

  @skipOnMICROSOFTEDGE
  Scenario: share a folder with another internal user and prohibit deleting
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Brian" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | delete | no |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  @skipOnFIREFOX
  Scenario: share a folder with other user and then it should be listed on Shared with You for other user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has moved file "lorem.txt" to "ipsum.txt"
    And user "Brian" has moved file "simple-folder" to "new-simple-folder"
    And user "Brian" has shared file "ipsum.txt" with user "Alice"
    And user "Brian" has shared file "new-simple-folder" with user "Alice"
    When user "Alice" logs in using the webUI
    And the user browses to the shared-with-you page
    Then file "ipsum.txt" should be listed on the webUI
    And folder "new-simple-folder" should be listed on the webUI


  Scenario: user tries to share a file from a group which is blacklisted from sharing
    Given group "grp1" has been created
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Carol    |
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/somefile.txt"
    And user "Alice" has been added to group "grp1"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables exclude groups from sharing using the webUI
    And the administrator adds group "grp1" to the exclude group from sharing list using the webUI
    Then user "Alice" should not be able to share file "somefile.txt" with user "Carol" using the sharing API


  Scenario: user tries to share a folder from a group which is blacklisted from sharing
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Carol    |
    And group "grp1" has been created
    And user "Alice" has created folder "new-folder"
    And user "Alice" has been added to group "grp1"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables exclude groups from sharing using the webUI
    And the administrator adds group "grp1" to the exclude group from sharing list using the webUI
    Then user "Alice" should not be able to share folder "new-folder" with user "Carol" using the sharing API


  Scenario: member of a blacklisted from sharing group tries to re-share a file received as a share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Carol    |
      | David    |
    And user "Carol" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Carol" has shared file "/testimage.jpg" with user "Alice"
    And the administrator has enabled exclude groups from sharing
    And the administrator has browsed to the admin sharing settings page
    When the administrator adds group "grp1" to the exclude group from sharing list using the webUI
    Then user "Alice" should not be able to share file "/testimage.jpg" with user "David" using the sharing API


  Scenario: member of a blacklisted from sharing group tries to re-share a folder received as a share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
      | David    |
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Carol" has created folder "/common"
    And user "Carol" has shared folder "/common" with user "Alice"
    And the administrator has enabled exclude groups from sharing
    And the administrator has browsed to the admin sharing settings page
    When the administrator adds group "grp1" to the exclude group from sharing list using the webUI
    Then user "Alice" should not be able to share folder "/common" with user "David" using the sharing API


  Scenario: member of a blacklisted from sharing group tries to re-share a file inside a folder received as a share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
      | David    |
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Carol" has created folder "/common"
    And user "Carol" has uploaded file "filesForUpload/testavatar.jpg" to "/common/testimage.jpg"
    And user "Carol" has shared folder "/common" with user "Alice"
    And the administrator has enabled exclude groups from sharing
    And the administrator has browsed to the admin sharing settings page
    When the administrator adds group "grp1" to the exclude group from sharing list using the webUI
    Then user "Alice" should not be able to share file "/common/testimage.jpg" with user "David" using the sharing API


  Scenario: member of a blacklisted from sharing group tries to re-share a folder inside a folder received as a share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
      | David    |
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Carol" has created folder "/common"
    And user "Carol" has created folder "/common/inside-common"
    And user "Carol" has shared folder "/common" with user "Alice"
    And the administrator has enabled exclude groups from sharing
    And the administrator has browsed to the admin sharing settings page
    When the administrator adds group "grp1" to the exclude group from sharing list using the webUI
    Then user "Alice" should not be able to share folder "/common/inside-common" with user "David" using the sharing API


  Scenario: user tries to share a file from a group which is blacklisted from sharing using webUI from files page
    Given group "grp1" has been created
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    And user "Alice" has been added to group "grp1"
    And the administrator has enabled exclude groups from sharing
    And the administrator has browsed to the admin sharing settings page
    When the administrator adds group "grp1" to the exclude group from sharing list using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user opens the sharing tab from the file action menu of file "testimage.jpg" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    And the share-with field should not be visible in the details panel


  Scenario: user tries to re-share a file from a group which is blacklisted from sharing using webUI from shared with you page
    Given group "grp1" has been created
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    And user "Brian" has shared file "/testimage.jpg" with user "Alice"
    And the administrator has enabled exclude groups from sharing
    And the administrator has browsed to the admin sharing settings page
    When the administrator adds group "grp1" to the exclude group from sharing list using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user browses to the shared-with-you page
    And the user opens the sharing tab from the file action menu of file "testimage.jpg" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    And the share-with field should not be visible in the details panel
    And user "Alice" should not be able to share file "testimage.jpg" with user "Carol" using the sharing API

  @skipOnEncryptionType:user-keys @issue-encryption-126 @email
  Scenario: user should be able to send notification by email when allow share mail notification has been enabled
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email for user "Brian" using the webUI
    Then a notification should be displayed on the webUI with the text "Email notification was sent!"
    And the email address of user "Brian" should have received an email from user "Alice" with the body containing
      """
      just letting you know that %displayname% shared lorem.txt with you.
      """

  @email
  Scenario: user should get and error message when trying to send notification by email to a user who has not setup their email
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And these users have been created without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email for user "Brian" using the webUI
    Then 1 dialog should be displayed on the webUI
      | title                       | content                                                  | user  |
      | Email notification not sent | Couldn't send mail to following recipient(s): %username% | Brian |

  @email
  Scenario: user should not be able to send notification by email more than once
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email for user "Brian" using the webUI
    Then the user should not be able to send the share notification by email for user "Brian" using the webUI
    When the user reloads the current page of the webUI
    And the user opens the share dialog for file "lorem.txt"
    Then the user should not be able to send the share notification by email for user "Brian" using the webUI


  Scenario: user should not be able to send notification by email when allow share mail notification has been disabled
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "no"
    And these users have been created without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    When the user opens the share dialog for file "lorem.txt"
    Then the user should not be able to send the share notification by email for user "Brian" using the webUI

  @email
  Scenario: user without email should be able to send notification by email when allow share mail notification has been enabled
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And these users have been created without skeleton files:
      | username | password |
      | Alice    | 1234     |
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
    And user "Alice" has shared folder "simple-folder" with user "Brian"
    And the user has opened the share dialog for folder "simple-folder"
    When the user sends the share notification by email for user "Brian" using the webUI
    Then a notification should be displayed on the webUI with the text "Email notification was sent!"
    And the email address of user "Brian" should have received an email from user "Alice" with the body containing
      """
      just letting you know that %username% shared simple-folder with you.
      """

  @issue-35787 @skipOnOcV10
  Scenario: share a skeleton file after changing its content to a user before the user has logged in
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has logged in using the webUI
    And user "Brian" has uploaded file with content "edited original content" to "/lorem.txt"
    When the user shares file "lorem.txt" with user "Alice" using the webUI
    Then the content of file "lorem.txt" for user "Brian" should be "edited original content"
    When the user re-logs in as "Alice" using the webUI
    And the content of file "lorem.txt" for user "Alice" should be "edited original content"


  Scenario: share with two users having same display name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And the administrator has changed the display name of user "Alice" to "USER"
    And the administrator has changed the display name of user "Brian" to "USER"
    And parameter "user_additional_info_field" of app "core" has been set to "id"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Brian"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of user "Brian" for "simple-folder" using the webUI to
      | edit   | no |
      | create | no |
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | share  | no |
      | delete | no |
    Then the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 7              |
    And the information for user "Brian" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Brian          |
      | permissions | 17             |

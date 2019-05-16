@webUI @insulated @disablePreviews
Feature: Sharing files and folders with internal groups
  As a user
  I want to share files and folders with groups
  So that those groups can access the files and folders

  Background:
    Given these users have been created with default attributes:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"

  @TestAlsoOnExternalUserBackend
  @smokeTest
  Scenario: share a folder with an internal group
    Given user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with group "grp1" using the webUI
    And the user shares file "testimage.jpg" with group "grp1" using the webUI
    And the user re-logs in as "user1" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI
    And folder "simple-folder (2)" should be marked as shared with "grp1" by "User Three" on the webUI
    And file "testimage (2).jpg" should be listed on the webUI
    And file "testimage (2).jpg" should be marked as shared with "grp1" by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI
    And folder "simple-folder (2)" should be marked as shared with "grp1" by "User Three" on the webUI
    And file "testimage (2).jpg" should be listed on the webUI
    And file "testimage (2).jpg" should be marked as shared with "grp1" by "User Three" on the webUI

  @TestAlsoOnExternalUserBackend @skipOnFIREFOX
  Scenario: share a file with an internal group a member overwrites and unshares the file
    Given user "user3" has logged in using the webUI
    When the user renames file "lorem.txt" to "new-lorem.txt" using the webUI
    And the user shares file "new-lorem.txt" with group "grp1" using the webUI
    And the user re-logs in as "user1" using the webUI
    Then the content of "new-lorem.txt" should not be the same as the local "new-lorem.txt"
		# overwrite the received shared file
    When the user uploads overwriting file "new-lorem.txt" using the webUI and retries if the file is locked
    Then file "new-lorem.txt" should be listed on the webUI
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# unshare the received shared file
    When the user unshares file "new-lorem.txt" using the webUI
    Then file "new-lorem.txt" should not be listed on the webUI
		# check that another group member can still see the file
    When the user re-logs in as "user2" using the webUI
    Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# check that the original file owner can still see the file
    When the user re-logs in as "user3" using the webUI
    Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

  @TestAlsoOnExternalUserBackend
  Scenario: share a folder with an internal group and a member uploads, overwrites and deletes files
    Given user "user3" has logged in using the webUI
    When the user renames folder "simple-folder" to "new-simple-folder" using the webUI
    And the user shares folder "new-simple-folder" with group "grp1" using the webUI
    And the user re-logs in as "user1" using the webUI
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
    When the user re-logs in as "user2" using the webUI
    And the user opens folder "new-simple-folder" using the webUI
    Then the content of "lorem.txt" should be the same as the local "lorem.txt"
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
    And file "data.zip" should not be listed on the webUI
		# check that the file actions by the sharee are visible for the share owner
    When the user re-logs in as "user3" using the webUI
    And the user opens folder "new-simple-folder" using the webUI
    Then the content of "lorem.txt" should be the same as the local "lorem.txt"
    And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
    And file "data.zip" should not be listed on the webUI

  @TestAlsoOnExternalUserBackend
  @smokeTest
  Scenario: share a folder with an internal group and a member unshares the folder
    Given user "user3" has logged in using the webUI
    When the user renames folder "simple-folder" to "new-simple-folder" using the webUI
    And the user shares folder "new-simple-folder" with group "grp1" using the webUI
		# unshare the received shared folder and check it is gone
    When the user re-logs in as "user1" using the webUI
    And the user unshares folder "new-simple-folder" using the webUI
    Then folder "new-simple-folder" should not be listed on the webUI
		# check that the folder is still visible to another group member
    When the user re-logs in as "user2" using the webUI
    Then folder "new-simple-folder" should be listed on the webUI
    When the user opens folder "new-simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"
		# check that the folder is still visible for the share owner
    When the user re-logs in as "user3" using the webUI
    Then folder "new-simple-folder" should be listed on the webUI
    When the user opens folder "new-simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"

  Scenario: user tries to share a file in a group which is excluded from receiving share
    Given group "system-group" has been created
    And the administrator has browsed to the admin sharing settings page
    When the administrator excludes group "system-group" from receiving shares using the webUI
    Then user "user1" should not be able to share file "lorem.txt" with group "system-group" using the sharing API

  Scenario: user tries to share a folder in a group which is excluded from receiving share
    Given group "system-group" has been created
    And the administrator has browsed to the admin sharing settings page
    When the administrator excludes group "system-group" from receiving shares using the webUI
    Then user "user1" should not be able to share folder "simple-folder" with group "system-group" using the sharing API

  Scenario: autocompletion for a group that is excluded from receiving shares
    Given group "system-group" has been created
    And the administrator has browsed to the admin sharing settings page
    When the administrator excludes group "system-group" from receiving shares using the webUI
    And the user re-logs in as "user1" using the webUI
    And the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user types "system-group" in the share-with-field
    Then a tooltip with the text "No users or groups found for system-group" should be shown near the share-with-field on the webUI
    And the autocomplete list should not be displayed on the webUI

  @mailhog
  Scenario: user should be able to send notification by email when allow share mail notification has been enabled
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And user "user3" has logged in using the webUI
    And user "user3" has shared file "lorem.txt" with group "grp1"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email using the webUI
    Then a notification should be displayed on the webUI with the text "Email notification was sent!"
    And the email address "user1@example.org" should have received an email with the body containing
      """
      just letting you know that User Three shared lorem.txt with you.
      """
    And the email address "user2@example.org" should have received an email with the body containing
      """
      just letting you know that User Three shared lorem.txt with you.
      """

  @mailhog
  Scenario: user should not be able to send notification by email more than once
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And user "user3" has logged in using the webUI
    And user "user3" has shared file "lorem.txt" with group "grp1"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email using the webUI
    Then the user should not be able to send the share notification by email using the webUI
    When the user reloads the current page of the webUI
    And the user opens the share dialog for file "lorem.txt"
    Then the user should not be able to send the share notification by email using the webUI

  Scenario: user should not be able to send notification by email when allow share mail notification has been disabled
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "no"
    And user "user3" has logged in using the webUI
    And user "user3" has shared file "lorem.txt" with group "grp1"
    When the user opens the share dialog for file "lorem.txt"
    Then the user should not be able to send the share notification by email using the webUI

  @mailhog
  Scenario: user should not get an email notification if the user is added to the group after the mail notification was sent
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And user "user0" has been created with default attributes
    And user "user3" has logged in using the webUI
    And user "user3" has shared file "lorem.txt" with group "grp1"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email using the webUI
    Then a notification should be displayed on the webUI with the text "Email notification was sent!"
    When the administrator adds user "user0" to group "grp1" using the provisioning API
    Then the email address "user0@example.org" should not have received an email

  @mailhog
  Scenario: user should get an error message when trying to send notification by email to the group where some user have set up their email and others haven't
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    And these users have been created:
      | username           |
      | brand-new-user     |
      | off-brand-new-user |
    And user "brand-new-user" has been added to group "grp1"
    And user "off-brand-new-user" has been added to group "grp1"
    And user "user3" has logged in using the webUI
    And user "user3" has shared file "lorem.txt" with group "grp1"
    And the user has opened the share dialog for file "lorem.txt"
    When the user sends the share notification by email using the webUI
    Then dialog should be displayed on the webUI
      | title                       | content                                                                          |
      | Email notification not sent | Couldn't send mail to following recipient(s): brand-new-user, off-brand-new-user |
    And the email address "user1@example.org" should have received an email with the body containing
      """
      just letting you know that User Three shared lorem.txt with you.
      """
    And the email address "user2@example.org" should have received an email with the body containing
      """
      just letting you know that User Three shared lorem.txt with you.
      """

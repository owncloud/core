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

  @TestAlsoOnExternalUserBackend
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

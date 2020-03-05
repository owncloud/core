@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal users
  As a user
  I want to share files and folders with other users
  So that those users can access the files and folders

  @TestAlsoOnExternalUserBackend
  @smokeTest
  Scenario: share a file & folder with another internal user
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user2" has shared folder "simple-folder" with user "user1"
    And user "user2" has shared file "testimage.jpg" with user "user1"
    When user "user1" logs in using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI
    And folder "simple-folder (2)" should be marked as shared by "User Two" on the webUI
    And file "testimage (2).jpg" should be listed on the webUI
    And file "testimage (2).jpg" should be marked as shared by "User Two" on the webUI
    When the user opens folder "simple-folder (2)" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    But folder "simple-folder (2)" should not be listed on the webUI

  Scenario: share a folder with other user and then it should be listed on Shared with Others page
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user2" has been created with default attributes and skeleton files
    And user "user2" has shared file "lorem.txt" with user "user1"
    And user "user2" has shared file "simple-folder" with user "user1"
    And user "user2" has logged in using the webUI
    When the user browses to the shared-with-others page
    Then file "lorem.txt" should be listed on the webUI
    And folder "simple-folder" should be listed on the webUI

  Scenario: share two file with same name but different paths
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user2" has been created with default attributes and skeleton files
    And user "user2" has shared file "lorem.txt" with user "user1"
    And user "user2" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user shares file "lorem.txt" with user "User One" using the webUI
    And the user browses to the shared-with-others page
    Then file "lorem.txt" with path "" should be listed in the shared with others page on the webUI
    And file "lorem.txt" with path "/simple-folder" should be listed in the shared with others page on the webUI

  Scenario: user shares the file/folder with another internal user and delete the share with user
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user1" has logged in using the webUI
    And user "user1" has shared file "lorem.txt" with user "user2"
    When the user opens the share dialog for file "lorem.txt"
    And the user deletes share with user "User Two" for the current file
    Then the user "User Two" should not be in share with user list
    And file "lorem.txt" should not be listed in shared-with-others page on the webUI
    And as "user2" file "lorem (2).txt" should not exist

  Scenario: user shares a file with another user with uppercase username
    Given user "user1" has been created with default attributes and skeleton files
    And these users have been created without skeleton files:
      | username |
      | SomeUser |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "SomeUser" using the webUI
    And the user re-logs in as "SomeUser" using the webUI
    And the user browses to the shared-with-you page
    Then file "lorem.txt" should be listed on the webUI

  Scenario: multiple users share a file with the same name to a user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user2" has uploaded file with content "user2 file" to "/randomfile.txt"
    And user "user3" has uploaded file with content "user3 file" to "/randomfile.txt"
    And user "user2" has shared file "randomfile.txt" with user "user1"
    And user "user3" has shared file "randomfile.txt" with user "user1"
    When user "user1" logs in using the webUI
    Then file "randomfile.txt" should be listed on the webUI
    And the content of file "randomfile.txt" for user "user1" should be "user2 file"
    And file "randomfile (2).txt" should be listed on the webUI
    And the content of file "randomfile (2).txt" for user "user1" should be "user3 file"

  Scenario: multiple users share a folder with the same name to a user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user2" has created folder "/zzzfolder"
    And user "user3" has created folder "/zzzfolder"
    And user "user2" has shared folder "zzzfolder" with user "user1"
    And user "user3" has shared folder "zzzfolder" with user "user1"
    When user "user1" logs in using the webUI
    Then folder "zzzfolder" should be listed on the webUI
    And folder "zzzfolder" should be marked as shared by "User Two" on the webUI
    And folder "zzzfolder (2)" should be listed on the webUI
    And folder "zzzfolder (2)" should be marked as shared by "User Three" on the webUI

  Scenario Outline:  user names are not case-sensitive, sharing same file to user specifying different upper and lower case names
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | user1          |
      | brand-new-user |
    And user "user1" has created folder "/simple-folder"
    And user "user1" has shared folder "simple-folder" with user "brand-new-user"
    And user "user1" has logged in using the webUI
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "<user_id1>" in the share-with-field
    Then a tooltip with the text "No users or groups found for <user_id1>" should be shown near the share-with-field on the webUI
    When the user types "<user_id2>" in the share-with-field
    Then a tooltip with the text "No users or groups found for <user_id2>" should be shown near the share-with-field on the webUI
    When the user types "<user_id3>" in the share-with-field
    Then a tooltip with the text "No users or groups found for <user_id3>" should be shown near the share-with-field on the webUI
    Examples:
      | user_id1       | user_id2       | user_id3       |
      | Brand-New-User | brand-new-user | BRAND-NEW-USER |
      | brand-new-user | BRAND-NEW-USER | Brand-New-User |
      | BRAND-NEW-USER | Brand-New-User | brand-new-user |

  Scenario: sharer should be able to share a folder to a user when only share with groups they are member of is enabled
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user1" has created folder "/simple-folder"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with groups they are member of using the webUI
    And the user re-logs in as "user1" using the webUI
    And the user shares folder "simple-folder" with user "User Two" using the webUI
    Then as "user2" folder "/simple-folder" should exist

  Scenario: sharer should be able to share a file to a user when only share with groups they are member of is enabled
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user1" has uploaded file with content "some content" to "lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with groups they are member of using the webUI
    And the user re-logs in as "user1" using the webUI
    And the user shares file "lorem.txt" with user "User Two" using the webUI
    Then as "user2" file "/lorem.txt" should exist

  @skipOnOcV10.3
  Scenario: Create share with share permission only
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "user2" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
      | edit | no |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should not be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    And the option to upload file should not be available on the webUI
    # Even though the upload option is not shown in the ui, the file input is still present.
    # So we can attach a file to that input and try to upload.
    When the user uploads file "textfile.txt" using the webUI
    Then as "user1" file "simple-folder/textfile.txt" should not exist
    And file "textfile.txt" should not be listed on the webUI
    When the user shares file "lorem.txt" with user "User Three" using the webUI
    Then as "user3" file "lorem.txt" should exist

  @skipOnOcV10.3
  Scenario: Create share with share and create permission only
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "user2" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
      | change | no |
      | delete | no |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should not be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    When the user uploads file "textfile.txt" using the webUI
    Then as "user1" file "simple-folder/textfile.txt" should exist
    And the content of "textfile.txt" should be the same as the local "textfile.txt"

  @skipOnOcV10.3
  Scenario: Create share with share and change permission only
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "user2" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
      | create | no |
      | delete | no |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    When the user uploads file "textfile.txt" using the webUI
    Then as "user1" file "simple-folder/textfile.txt" should not exist
    And file "textfile.txt" should not be listed on the webUI

  @skipOnOcV10.3
  Scenario: Create share with share and delete permission only
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "user2" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
      | change | no |
      | create | no |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should not be available on the webUI
    And it should be possible to delete file "lorem.txt" using the webUI
    When the user uploads file "textfile.txt" using the webUI
    Then as "user1" file "simple-folder/textfile.txt" should not exist
    And file "textfile.txt" should not be listed on the webUI

  @skipOnOcV10.3
  Scenario: Create share with edit and without share permissions
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user2" has created folder "simple-folder"
    And user "user2" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "user2" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
      | share | no |
    And the user re-logs in as "user1" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And it should not be possible to share file "lorem.txt" using the webUI
    And the option to delete file "lorem.txt" should be available on the webUI
    And the option to upload file should be available on the webUI
    When the user uploads file "textfile.txt" using the webUI
    Then as "user1" file "simple-folder/textfile.txt" should exist
    And file "textfile.txt" should be listed on the webUI
    And the content of "textfile.txt" should be the same as the local "textfile.txt"
    And it should not be possible to share file "textfile.txt" using the webUI

  @skipOnOcV10.3 @skipOnOcV10.4.0
  Scenario: reshare indicators of public links to the original share owner
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has uploaded file with content "uploaded content" to "lorem.txt"
    And user "user0" has shared file "lorem.txt" with user "user1"
    And user "user1" has created a public link share with settings
      | path | /lorem.txt  |
      | name | Public link |
    And user "user0" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    And the user opens the public link share tab
    Then a public link share with name "Public link" should be visible on the webUI

  @skipOnOcV10.3 @skipOnOcV10.4.0
  Scenario: reshare indicators of multiple public links with same name to the original share owner
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has uploaded file with content "uploaded content" to "lorem.txt"
    And user "user0" has shared file "lorem.txt" with user "user1"
    And user "user0" has created a public link share with settings
      | path | /lorem.txt  |
      | name | Public link |
    And user "user1" has created a public link share with settings
      | path | lorem.txt  |
      | name | Public link |
    And user "user0" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    And the user opens the public link share tab
    Then 2 public link shares with name "Public link" should be visible on the webUI

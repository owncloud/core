@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal users
  As a user
  I want to share files and folders with other users
  So that those users can access the files and folders

  @smokeTest @mobileResolutionTest
  Scenario: share a file & folder with another internal user
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Brian" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    And user "Brian" has shared folder "simple-folder" with user "Alice"
    And user "Brian" has shared file "testimage.jpg" with user "Alice"
    When user "Alice" logs in using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared by "Brian" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared by "Brian" on the webUI
    When the user opens folder "simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    But folder "simple-folder" should not be listed on the webUI


  Scenario: share a folder with other user and then it should be listed on Shared with Others page
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has shared file "lorem.txt" with user "Alice"
    And user "Brian" has shared file "simple-folder" with user "Alice"
    And user "Brian" has logged in using the webUI
    When the user browses to the shared-with-others page
    Then file "lorem.txt" should be listed on the webUI
    And folder "simple-folder" should be listed on the webUI


  Scenario: share two file with same name but different paths
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Brian" has shared file "lorem.txt" with user "Alice"
    And user "Brian" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user shares file "lorem.txt" with user "Alice" using the webUI
    And the user browses to the shared-with-others page
    Then file "lorem.txt" with path "" should be listed in the shared with others page on the webUI
    And file "lorem.txt" with path "/simple-folder" should be listed in the shared with others page on the webUI


  Scenario: user shares the file/folder with another internal user and delete the share with user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    When the user opens the share dialog for file "lorem.txt"
    And the user deletes share with user "Brian" for the current file
    Then the user "Brian" should not be in share with user list
    And file "lorem.txt" should not be listed in shared-with-others page on the webUI
    And as "Brian" file "lorem.txt" should not exist


  Scenario Outline: user shares a file with another user with unusual usernames
    Given user "Alice" has been created with default attributes and without skeleton files
    And these users have been created without skeleton files:
      | username   |
      | <username> |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "<username>" using the webUI
    And the user re-logs in as "<username>" using the webUI
    And the user browses to the shared-with-you page
    Then file "lorem.txt" should be listed on the webUI
    Examples:
      | username  |
      | 123456    |
      | -12       |
      | +12       |
      | 1.2       |
      | 1.2E3     |
      | 0x10      |
      | Some-User |


  Scenario: multiple users share a file with the same name to a user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Brian" has uploaded file with content "First data" to "/randomfile.txt"
    And user "Carol" has uploaded file with content "Second data" to "/randomfile.txt"
    And user "Brian" has shared file "randomfile.txt" with user "Alice"
    And user "Carol" has shared file "randomfile.txt" with user "Alice"
    When user "Alice" logs in using the webUI
    Then file "randomfile.txt" should be listed on the webUI
    And the content of file "randomfile.txt" for user "Alice" should be "First data"
    And file "randomfile (2).txt" should be listed on the webUI
    And the content of file "randomfile (2).txt" for user "Alice" should be "Second data"


  Scenario: multiple users share a folder with the same name to a user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Brian" has created folder "/zzzfolder"
    And user "Carol" has created folder "/zzzfolder"
    And user "Brian" has shared folder "zzzfolder" with user "Alice"
    And user "Carol" has shared folder "zzzfolder" with user "Alice"
    When user "Alice" logs in using the webUI
    Then folder "zzzfolder" should be listed on the webUI
    And folder "zzzfolder" should be marked as shared by "Brian" on the webUI
    And folder "zzzfolder (2)" should be listed on the webUI
    And folder "zzzfolder (2)" should be marked as shared by "Carol" on the webUI


  Scenario Outline:  user names are not case-sensitive, sharing same file to user specifying different upper and lower case names
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | Alice          |
      | brand-new-user |
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has shared folder "simple-folder" with user "brand-new-user"
    And user "Alice" has logged in using the webUI
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
      | Alice    |
      | Brian    |
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Alice" has created folder "/simple-folder"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with groups they are member of using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user shares folder "simple-folder" with user "Brian" using the webUI
    Then as "Brian" folder "/simple-folder" should exist


  Scenario: sharer should be able to share a file to a user when only share with groups they are member of is enabled
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Alice" has uploaded file with content "some content" to "lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with groups they are member of using the webUI
    And the user re-logs in as "Alice" using the webUI
    And the user shares file "lorem.txt" with user "Brian" using the webUI
    Then as "Brian" file "/lorem.txt" should exist


  Scenario: Create share with share permission only
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Brian" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | edit | no |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should not be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    And the option to upload file should not be available on the webUI
    # Even though the upload option is not shown in the ui, the file input is still present.
    # So we can attach a file to that input and try to upload.
    When the user uploads file "textfile.txt" using the webUI
    Then as "Alice" file "simple-folder/textfile.txt" should not exist
    And file "textfile.txt" should not be listed on the webUI
    # Go back to the home page so that the "user shares file" step can navigate its own way
    # into simple-folder and will "know where it is"
    When the user browses to the home page
    And the user shares file "simple-folder/lorem.txt" with user "Carol" using the webUI
    Then as "Carol" file "lorem.txt" should exist


  Scenario: Create share with share and create permission only
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Brian" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | change | no |
      | delete | no |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should not be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    When the user uploads file "textfile.txt" using the webUI
    Then as "Alice" file "simple-folder/textfile.txt" should exist
    And the content of "textfile.txt" should be the same as the local "textfile.txt"


  Scenario: Create share with share and change permission only
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Brian" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | create | no |
      | delete | no |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    When the user uploads file "textfile.txt" using the webUI
    Then as "Alice" file "simple-folder/textfile.txt" should not exist
    And file "textfile.txt" should not be listed on the webUI


  Scenario: Create share with share and delete permission only
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Brian" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | change | no |
      | create | no |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should not be available on the webUI
    And it should be possible to delete file "lorem.txt" using the webUI
    When the user uploads file "textfile.txt" using the webUI
    Then as "Alice" file "simple-folder/textfile.txt" should not exist
    And file "textfile.txt" should not be listed on the webUI


  Scenario: Create share with edit and without share permissions
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Brian" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | share | no |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And it should not be possible to share file "lorem.txt" using the webUI
    And the option to delete file "lorem.txt" should be available on the webUI
    And the option to upload file should be available on the webUI
    When the user uploads file "textfile.txt" using the webUI
    Then as "Alice" file "simple-folder/textfile.txt" should exist
    And file "textfile.txt" should be listed on the webUI
    And the content of "textfile.txt" should be the same as the local "textfile.txt"
    And it should not be possible to share file "textfile.txt" using the webUI


  Scenario: reshare indicators of public links to the original share owner
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file with content "uploaded content" to "lorem.txt"
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    And user "Brian" has created a public link share with settings
      | path | /lorem.txt  |
      | name | Public link |
    And user "Alice" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    And the user opens the public link share tab
    Then a public link share with name "Public link" should be visible on the webUI


  Scenario: reshare indicators of multiple public links with same name to the original share owner
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file with content "uploaded content" to "lorem.txt"
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt  |
      | name | Public link |
    And user "Brian" has created a public link share with settings
      | path | lorem.txt   |
      | name | Public link |
    And user "Alice" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    And the user opens the public link share tab
    Then 2 public link shares with name "Public link" should be visible on the webUI


  Scenario Outline: user with unusual username shares a file & folder with another internal user
    Given these users have been created with default attributes and without skeleton files:
      | username   |
      | Alice      |
      | <username> |
    And user "<username>" has created folder "simple-folder"
    And user "<username>" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "<username>" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    And user "<username>" has shared folder "simple-folder" with user "Alice"
    And user "<username>" has shared file "testimage.jpg" with user "Alice"
    When user "Alice" logs in using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared by "<username>" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared by "<username>" on the webUI
    When the user opens folder "simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    But folder "simple-folder" should not be listed on the webUI
    Examples:
      | username |
      | user-1   |
      | null     |
      | nil      |
      | 123      |
      | -123     |
      | 0.0      |


  Scenario: user shares file with multiple users at once
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with users "Brian,Carol" using the webUI
    Then as "Brian" file "lorem.txt" should exist
    And as "Carol" file "lorem.txt" should exist


  Scenario: user shares folder with multiple users at once
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has logged in using the webUI
    When the user shares folder "simple-folder" with users "Brian,Carol" using the webUI
    Then as "Brian" folder "simple-folder" should exist
    And as "Carol" folder "simple-folder" should exist


  Scenario Outline: user shares file with multiple users including non-existing user at once
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with users "<usernames>" using the webUI
    Then a notification should be displayed on the webUI with the text "Could not be shared with the following users: David"
    And as "Brian" file "lorem.txt" should exist
    And as "Carol" file "lorem.txt" should exist
    Examples:
      | usernames         |
      | Brian,Carol,David |
      | Brian,David,Carol |
      | David,Brian,Carol |


  Scenario Outline: user shares folder with multiple users including non-existing user at once
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has logged in using the webUI
    When the user shares folder "simple-folder" with users "<usernames>" using the webUI
    Then a notification should be displayed on the webUI with the text "Could not be shared with the following users: David"
    And as "Brian" folder "simple-folder" should exist
    And as "Carol" folder "simple-folder" should exist
    Examples:
      | usernames         |
      | Brian,Carol,David |
      | Brian,David,Carol |
      | David,Brian,Carol |


  Scenario: user shares file with multiple users having exact same group name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
      | David    |
    And group "Brian,Carol" has been created
    And user "David" has been added to group "Brian,Carol"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with users "Brian,Carol" using the webUI
    Then as "Brian" file "lorem.txt" should exist
    And as "Carol" file "lorem.txt" should exist
    And as "David" file "lorem.txt" should not exist


  Scenario: user shares folder with multiple users having exact same group name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
      | David    |
    And group "Brian,Carol" has been created
    And user "David" has been added to group "Brian,Carol"
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has logged in using the webUI
    When the user shares folder "simple-folder" with users "Brian,Carol" using the webUI
    Then as "Brian" folder "simple-folder" should exist
    And as "Carol" folder "simple-folder" should exist
    And as "David" folder "simple-folder" should not exist

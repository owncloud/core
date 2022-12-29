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
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"


  Scenario Outline: sharing  files and folder with an internal problematic group name
    Given these groups have been created:
      | groupname |
      | <group>   |
    And user "Carol" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    And user "Alice" has been added to group "<group>"
    And user "Brian" has been added to group "<group>"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with group "<group>" using the webUI
    And the user shares file "testimage.jpg" with group "<group>" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "<group>" by "Carol" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared with "<group>" by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "<group>" by "Carol" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared with "<group>" by "Carol" on the webUI
    Examples:
      | group     |
      | ?\?@#%@,; |
      | नेपाली    |


  Scenario: Share file with a user and a group with same name
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Alice" has been added to group "Alice"
    And user "Brian" has been added to group "Alice"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user shares folder "simple-folder" with group "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "Alice" by "Carol" on the webUI


  Scenario: Share file with a group and a user with same name
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Alice" has been added to group "Alice"
    And user "Brian" has been added to group "Alice"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with group "Alice" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "Alice" by "Carol" on the webUI


  Scenario: Share file with a user and again with a group with same name but different case
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user shares folder "simple-folder" with group "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "Alice" by "Carol" on the webUI


  Scenario: Share file with a group and again with a user with same name but different case
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with group "Alice" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "Alice" by "Carol" on the webUI


  Scenario: Share file with a user and a group with same name and change sharing permissions of the group
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with group "Alice"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of group "Alice" for "simple-folder" using the webUI to
      | delete | no |
      | share  | no |
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
      | delete | yes |
      | share  | yes |
    And the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 31             |
    And the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
      | delete | no |
      | share  | no |
    And the information for user "Brian" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 7              |


  Scenario: Share file with a user and a group with same name and change sharing permissions of the user
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with group "Alice"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | delete | no |
      | share  | no |
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
      | delete | no |
      | share  | no |
    And the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 7              |
    And the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
      | delete | yes |
      | share  | yes |
    And the information for user "Brian" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 31             |


  Scenario: Share file with a user and a group with same name and change sharing permissions of both user and group
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with group "Alice"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | edit   | no |
      | create | no |
    And the user sets the sharing permissions of group "Alice" for "simple-folder" using the webUI to
      | delete | no |
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
      | edit   | no |
      | create | no |
    And the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
      | delete | no |
    And the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 17             |
    And the information for user "Brian" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 23             |


  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of the group
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with group "Alice"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of group "Alice" for "simple-folder" using the webUI to
      | share | no |
    And the user changes expiration date for share of group "Alice" to "+230 days" in the share dialog
    Then the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
      | share | no |
    And the expiration date input field should be "+230 days" for the group "Alice" in the share dialog
    And the information for user "Brian" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 15             |
      | expiration  | +230 days      |
    And the expiration date input field should be empty for the user "Alice" in the share dialog
    And the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 31             |
      | expiration  |                |


  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of the user
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with group "Alice"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | share | no |
    And the user changes expiration date for share of user "Alice" to "+5 days" in the share dialog
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
      | share | no |
    And the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 15             |
      | expiration  | +5 days        |
    And the expiration date input field should be "+5 days" for the user "Alice" in the share dialog
    And the expiration date input field should be empty for the group "Alice" in the share dialog
    And the information for user "Brian" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 31             |
      | expiration  |                |


  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of both user and group
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with group "Alice"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | edit   | no |
      | create | no |
    And the user changes expiration date for share of user "Alice" to "+5 days" in the share dialog
    And the user sets the sharing permissions of group "Alice" for "simple-folder" using the webUI to
      | delete | no |
    And the user changes expiration date for share of group "Alice" to "+7 days" in the share dialog
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
      | edit   | no |
      | create | no |
    And the expiration date input field should be "+5 days" for the user "Alice" in the share dialog
    And the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | expiration  | +5 days        |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 17             |
    And the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
      | delete | no |
    And the expiration date input field should be "+7 days" for the group "Alice" in the share dialog
    And the information for user "Brian" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | expiration  | +7 days        |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 23             |


  Scenario: Check share permissions and expiration date of a group and the member of the same group
    Given these groups have been created:
      | groupname |
      | grp1      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with group "grp1"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of group "grp1" for "simple-folder" using the webUI to
      | edit   | no |
      | create | no |
    And the user changes expiration date for share of group "grp1" to "+5 days" in the share dialog
    Then the information for user "Brian" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | grp1           |
      | expiration  | +5 days        |
      | permissions | 17             |
    And the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | expiration  |                |
      | permissions | 31             |


  Scenario: share with multiple groups and change the sharing permissions and expiration date
    Given these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has shared folder "/simple-folder" with group "grp1"
    And user "Carol" has shared folder "/simple-folder" with group "grp2"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of group "grp1" for "simple-folder" using the webUI to
      | edit   | no |
      | create | no |
    And the user changes expiration date for share of group "grp1" to "+5 days" in the share dialog
    And the user sets the sharing permissions of group "grp2" for "simple-folder" using the webUI to
      | share  | no |
      | delete | no |
    And the user changes expiration date for share of group "grp2" to "+7 days" in the share dialog
    Then the information for user "Alice" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | expiration  | +5 days        |
      | uid_owner   | Carol          |
      | share_with  | grp1           |
      | permissions | 17             |
    And the information for user "Brian" about the received share of folder "simple-folder" shared with a group should include
      | share_type  | group          |
      | file_target | /simple-folder |
      | expiration  | +7 days        |
      | uid_owner   | Carol          |
      | share_with  | grp2           |
      | permissions | 7              |


  Scenario: Reshare with group that user is member of should not create mount in the root folder of resharer
    Given these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
    And user "Alice" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has shared folder "/simple-folder" with group "grp1"
    And user "Alice" has logged in using the webUI
    When the user shares folder "simple-folder" with group "grp2" using the webUI
    And the user shares folder "simple-folder/simple-empty-folder" with group "grp2" using the webUI
    Then as "Alice" folder "/simple-folder" should exist
    And user "Alice" should be able to upload file "filesForUpload/textfile.txt" to "simple-folder/textfile.txt"
    And as "Alice" folder "/simple-empty-folder" should not exist
    And user "Alice" should be able to create folder "/simple-empty-folder"


  Scenario: Reshare with group that user is member of should allow for downgrading and upgrading permissions
    Given these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
    And user "Alice" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has shared folder "/simple-folder" with group "grp1"
    And user "Alice" has logged in using the webUI
    When the user shares folder "simple-folder" with group "grp2" using the webUI
    And the user sets the sharing permissions of group "grp2" for "simple-folder" using the webUI to
      | edit   | no |
      | create | no |
    And the user shares folder "simple-folder/simple-empty-folder" with group "grp2" using the webUI
    And the user sets the sharing permissions of group "grp2" for "simple-empty-folder" using the webUI to
      | edit   | no |
      | create | no |
    And the user sets the sharing permissions of group "grp2" for "simple-empty-folder" using the webUI to
      | edit   | yes |
      | create | yes |
    Then user "Alice" should be able to upload file "filesForUpload/textfile.txt" to "simple-folder/textfile.txt"
    And as "Alice" folder "/simple-empty-folder" should not exist
    And as "Brian" folder "/simple-folder" should exist
    And as "Brian" folder "/simple-empty-folder" should exist
    And user "Brian" should not be able to upload file "filesForUpload/textfile.txt" to "simple-folder/textfile.txt"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "simple-empty-folder/textfile.txt"


  Scenario: Reshare mount received from multiple group reshare by different users and different subfolders
    Given these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
    And user "Alice" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp1" with permissions "all"
    And user "Brian" has shared file "/simple-folder/simple-inner-folder" with group "grp2" with permissions "read"
    And user "Alice" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/textfile.txt"
    And user "Alice" has shared file "/simple-folder/simple-inner-folder/textfile.txt" with group "grp3" with permissions "read"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user opens folder "simple-inner-folder" using the webUI
    And the user sets the sharing permissions of group "grp3" for "textfile.txt" using the webUI to
      | edit  | yes |
      | share | yes |
    Then the following permissions are seen for "textfile.txt" in the sharing dialog for group "grp3"
      | edit  | yes |
      | share | yes |


  Scenario: Simple share of a file within nested folders to a group
    Given these groups have been created:
      | groupname |
      | grp1      |
    And user "Alice" has been added to group "grp1"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-1.txt"
    And user "Carol" has logged in using the webUI
    When the user shares file "simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-1.txt" with group "grp1" using the webUI
    Then the following permissions are seen for "textfile-1.txt" in the sharing dialog for group "grp1"
      | edit   | yes |
      | change | yes |
      | share  | yes |
    And the information for user "Alice" about the received share of file "textfile-1.txt" shared with a group should include
      | share_type  | group           |
      | file_target | /textfile-1.txt |
      | uid_owner   | Carol           |
      | share_with  | grp1            |
      | permissions | 19              |


  Scenario: Reshares with groups where the same file ends up in different mountpoints should have correct permissions
    Given these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Alice" has been added to group "grp3"
    And user "Brian" has been added to group "grp3"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared file "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared file "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Alice" has shared file "/simple-folder/simple-inner-folder/simple-inner-inner-folder" with group "grp2" with permissions "read,share,delete"
    And user "Brian" has logged in using the webUI
    When the user shares file "simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt" with group "grp3" using the webUI
    Then the following permissions are seen for "textfile-2.txt" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |
    And the information for user "Alice" about the received share of file "textfile-2.txt" shared with a group should include
      | share_type  | group           |
      | file_target | /textfile-2.txt |
      | uid_owner   | Brian           |
      | share_with  | grp3            |
      | permissions | 19              |


  Scenario: Reshares with groups of subfolder with lower permissions
    Given these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Alice" has been added to group "grp3"
    And user "Brian" has been added to group "grp3"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared file "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared file "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Alice" has logged in using the webUI
    When the user shares folder "simple-folder/simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |
    And the information for user "Brian" about the received share of folder "simple-inner-folder" shared with a group should include
      | share_type  | group                |
      | file_target | /simple-inner-folder |
      | uid_owner   | Alice                |
      | share_with  | grp3                 |
      | permissions | 31                   |


  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions
    Given these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/other-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    # this effectively moves the read-only share of this folder with grp1
    # and so sharing is not allowed for /other-folder/simple-inner-folder
    And the user moves received folder "simple-inner-folder" into folder "other-folder" using the webUI
    And the user opens folder "/other-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # simple-inner-folder is also still shown in simple-folder. In that view, it is just a sub-folder
    # of the share of simple-folder with grp2 with all permissions.
    # So that "view" of simple-inner-folder can be reshared.
    # This is an unusual edge case combination. The test scenario demonstrates the current behavior.
    And the user browses to the home page
    When the user shares folder "simple-folder/simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

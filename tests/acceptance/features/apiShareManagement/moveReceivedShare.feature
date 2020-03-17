@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @skipOnOcis @issue-ocis-reva-14
Feature: sharing

  Background:
    Given using OCS API version "1"
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
      | user2    |

  Scenario: Keep usergroup shares (#22143)
    Given group "grp1" has been created
    # Note: in the user_ldap test environment user1 and user2 are in grp1
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user0" has created folder "/TMP"
    When user "user0" shares folder "TMP" with group "grp1" using the sharing API
    And user "user1" creates folder "/myFOLDER" using the WebDAV API
    And user "user1" moves folder "/TMP" to "/myFOLDER/myTMP" using the WebDAV API
    And the administrator deletes user "user2" using the provisioning API
    Then user "user1" should see the following elements
      | /myFOLDER/myTMP/ |

  Scenario: keep user shared file name same after one of recipient has renamed the file
    Given user "user0" has uploaded file with content "foo" to "/sharefile.txt"
    And user "user0" has shared file "/sharefile.txt" with user "user1"
    And user "user0" has shared file "/sharefile.txt" with user "user2"
    When user "user2" moves file "/sharefile.txt" to "/renamedsharefile.txt" using the WebDAV API
    Then as "user2" file "/renamedsharefile.txt" should exist
    And as "user0" file "/sharefile.txt" should exist
    And as "user1" file "/sharefile.txt" should exist

  Scenario: keep user shared file directory same in respect to respective user if one of the recipient has moved the file
    Given user "user0" has uploaded file with content "foo" to "/sharefile.txt"
    And user "user0" has shared file "/sharefile.txt" with user "user1"
    And user "user0" has shared file "/sharefile.txt" with user "user2"
    And user "user2" has created folder "newfolder"
    When user "user2" moves file "/sharefile.txt" to "/newfolder/sharefile.txt" using the WebDAV API
    Then as "user2" file "/newfolder/sharefile.txt" should exist
    And as "user0" file "/sharefile.txt" should exist
    And as "user1" file "/sharefile.txt" should exist

  Scenario Outline: move folder inside received folder with special characters
    Given group "grp1" has been created
    And user "user2" has been added to group "grp1"
    And user "user0" has created folder "<sharer_folder>"
    And user "user0" has created folder "<group_folder>"
    And user "user1" has created folder "<receiver_folder>"
    And user "user2" has created folder "<receiver_folder>"
    When user "user0" shares folder "<sharer_folder>" with user "user1" using the sharing API
    And user "user1" moves folder "<receiver_folder>" to "<sharer_folder>/<receiver_folder>" using the WebDAV API
    Then as "user0" file "<sharer_folder>/<receiver_folder>" should exist
    And as "user1" file "<sharer_folder>/<receiver_folder>" should exist
    When user "user0" shares folder "<group_folder>" with group "grp1" using the sharing API
    And user "user2" moves folder "<receiver_folder>" to "<group_folder>/<receiver_folder>" using the WebDAV API
    Then as "user0" file "<group_folder>/<receiver_folder>" should exist
    And as "user2" file "<group_folder>/<receiver_folder>" should exist
    Examples:
      | sharer_folder | group_folder    | receiver_folder |
      | ?abc=oc #     | ?abc=oc g%rp#   | # oc?test=oc&a  |
      | @a#8a=b?c=d   | @a#8a=b?c=d grp | ?a#8 a=b?c=d    |

  Scenario: receiver renames a received share with share, read, change permissions
    Given user "user0" has created folder "folderToShare"
    And user "user0" has uploaded file with content "thisIsAFileInsideTheSharedFolder" to "/folderToShare/fileInside"
    And user "user0" has shared folder "folderToShare" with user "user1" with permissions "share,read,change"
    When user "user1" moves folder "folderToShare" to "myFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user1" folder "myFolder" should exist
    But as "user0" folder "myFolder" should not exist
    When user "user1" moves file "/myFolder/fileInside" to "/myFolder/renamedFile" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user1" file "/myFolder/renamedFile" should exist
    And as "user0" file "/folderToShare/renamedFile" should exist
    But as "user0" file "/folderToShare/fileInside" should not exist

  @issue-30325
  Scenario: receiver tries to rename a received share with share, read permissions
    Given user "user0" has created folder "folderToShare"
    And user "user0" has uploaded file with content "thisIsAFileInsideTheSharedFolder" to "/folderToShare/fileInside"
    And user "user0" has shared folder "folderToShare" with user "user1" with permissions "share,read"
    When user "user1" moves folder "folderToShare" to "myFolder" using the WebDAV API
    Then the HTTP status code should be "403"
#    Then the HTTP status code should be "201"
    And as "user1" folder "myFolder" should not exist
#    And as "user1" folder "myFolder" should exist
    But as "user0" folder "myFolder" should not exist
#    When user "user1" moves file "/myFolder/fileInside" to "/myFolder/renamedFile" using the WebDAV API
    When user "user1" moves file "/folderToShare/fileInside" to "/folderToShare/renamedFile" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user1" file "/folderToShare/renamedFile" should not exist
    But as "user1" file "/folderToShare/fileInside" should exist
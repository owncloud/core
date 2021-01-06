@api @files_sharing-app-required @issue-ocis-reva-14 @issue-ocis-reva-243
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And using OCS API version "1"
    And these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |

  Scenario: Keep usergroup shares (#22143)
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "/TMP"
    When user "Alice" shares folder "TMP" with group "grp1" using the sharing API
    And user "Brian" accepts share "/TMP" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/TMP" offered by user "Alice" using the sharing API
    And user "Brian" creates folder "/myFOLDER" using the WebDAV API
    And user "Brian" moves folder "/Shares/TMP" to "/myFOLDER/myTMP" using the WebDAV API
    And the administrator deletes user "Carol" using the provisioning API
    Then user "Brian" should see the following elements
      | /myFOLDER/myTMP/ |

  Scenario: keep user shared file name same after one of recipient has renamed the file
    Given user "Alice" has uploaded file with content "foo" to "/sharefile.txt"
    And user "Alice" has shared file "/sharefile.txt" with user "Brian"
    And user "Alice" has shared file "/sharefile.txt" with user "Carol"
    And user "Brian" accepts share "/sharefile.txt" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/sharefile.txt" offered by user "Alice" using the sharing API
    When user "Carol" moves file "/Shares/sharefile.txt" to "/renamedsharefile.txt" using the WebDAV API
    Then as "Carol" file "/renamedsharefile.txt" should exist
    And as "Alice" file "/sharefile.txt" should exist
    And as "Brian" file "/Shares/sharefile.txt" should exist

  Scenario: keep user shared file directory same in respect to respective user if one of the recipient has moved the file
    Given user "Alice" has uploaded file with content "foo" to "/sharefile.txt"
    And user "Alice" has shared file "/sharefile.txt" with user "Brian"
    And user "Alice" has shared file "/sharefile.txt" with user "Carol"
    And user "Brian" accepts share "/sharefile.txt" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/sharefile.txt" offered by user "Alice" using the sharing API
    And user "Carol" has created folder "newfolder"
    When user "Carol" moves file "/Shares/sharefile.txt" to "/newfolder/sharefile.txt" using the WebDAV API
    Then as "Carol" file "/newfolder/sharefile.txt" should exist
    And as "Alice" file "/sharefile.txt" should exist
    And as "Brian" file "/Shares/sharefile.txt" should exist

  Scenario Outline: move folder inside received folder with special characters
    Given group "grp1" has been created
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "<sharer_folder>"
    And user "Alice" has created folder "<group_folder>"
    And user "Brian" has created folder "<receiver_folder>"
    And user "Carol" has created folder "<receiver_folder>"
    And user "Alice" has shared folder "<sharer_folder>" with user "Brian"
    And user "Brian" has accepted share "/<sharer_folder>" offered by user "Alice"
    When user "Brian" moves folder "<receiver_folder>" to "/Shares/<sharer_folder>/<receiver_folder>" using the WebDAV API
    Then as "Alice" folder "<sharer_folder>/<receiver_folder>" should exist
    And as "Brian" folder "/Shares/<sharer_folder>/<receiver_folder>" should exist
    When user "Alice" shares folder "<group_folder>" with group "grp1" using the sharing API
    And user "Carol" accepts share "/<group_folder>" offered by user "Alice" using the sharing API
    And user "Carol" moves folder "/<receiver_folder>" to "/Shares/<group_folder>/<receiver_folder>" using the WebDAV API
    Then as "Alice" folder "<group_folder>/<receiver_folder>" should exist
    And as "Carol" folder "/Shares/<group_folder>/<receiver_folder>" should exist
    Examples:
      | sharer_folder | group_folder    | receiver_folder |
      | ?abc=oc #     | ?abc=oc g%rp#   | # oc?test=oc&a  |
      | @a#8a=b?c=d   | @a#8a=b?c=d grp | ?a#8 a=b?c=d    |

  Scenario: receiver renames a received share with share, read, change permissions
    Given user "Alice" has created folder "folderToShare"
    And user "Alice" has uploaded file with content "thisIsAFileInsideTheSharedFolder" to "/folderToShare/fileInside"
    And user "Alice" has shared folder "folderToShare" with user "Brian" with permissions "share,read,change"
    And user "Brian" has accepted share "/folderToShare" offered by user "Alice"
    When user "Brian" moves folder "/Shares/folderToShare" to "myFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "myFolder" should exist
    But as "Alice" folder "myFolder" should not exist
    When user "Brian" moves file "/myFolder/fileInside" to "/myFolder/renamedFile" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/myFolder/renamedFile" should exist
    And as "Alice" file "/folderToShare/renamedFile" should exist
    But as "Alice" file "/folderToShare/fileInside" should not exist

  Scenario: receiver tries to rename a received share with share, read permissions
    Given user "Alice" has created folder "folderToShare"
    And user "Alice" has uploaded file with content "thisIsAFileInsideTheSharedFolder" to "/folderToShare/fileInside"
    And user "Alice" has shared folder "folderToShare" with user "Brian" with permissions "share,read"
    And user "Brian" has accepted share "/folderToShare" offered by user "Alice"
    When user "Brian" moves folder "/Shares/folderToShare" to "/myFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "myFolder" should exist
    But as "Alice" folder "myFolder" should not exist
    When user "Brian" moves file "/myFolder/fileInside" to "/myFolder/renamedFile" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Brian" file "/myFolder/renamedFile" should not exist
    But as "Brian" file "/myFolder/fileInside" should exist

  Scenario: receiver renames a received folder share to a different name on the same folder
    Given user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" moves folder "/Shares/PARENT" to "/Shares/myFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "/Shares/myFolder" should exist
    But as "Alice" folder "myFolder" should not exist

  Scenario: receiver renames a received file share to different name on the same folder
    Given user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" moves file "/Shares/textfile0.txt" to "/Shares/newFile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/Shares/newFile.txt" should exist
    But as "Alice" file "newFile.txt" should not exist

  Scenario: receiver renames a received file share to different name on the same folder for group sharing
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" moves file "/Shares/textfile0.txt" to "/Shares/newFile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/Shares/newFile.txt" should exist
    But as "Alice" file "newFile.txt" should not exist

  Scenario: receiver renames a received folder share to different name on the same folder for group sharing
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared folder "PARENT" with group "grp1"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" moves folder "/Shares/PARENT" to "/Shares/myFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "/Shares/myFolder" should exist
    But as "Alice" folder "myFolder" should not exist

  Scenario: receiver renames a received file share with read,update,share permissions in group sharing
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1" with permissions "read,update,share"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" moves folder "/Shares/textfile0.txt" to "newFile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "newFile.txt" should exist
    But as "Alice" file "newFile.txt" should not exist

  Scenario: receiver renames a received folder share with share, read, change permissions in group sharing
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared folder "PARENT" with group "grp1" with permissions "share,read,change"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" moves folder "/Shares/PARENT" to "myFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "myFolder" should exist
    But as "Alice" folder "myFolder" should not exist

  Scenario: receiver tries to rename a received file share with share, read permissions in group sharing
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1" with permissions "share,read"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" moves file "/Shares/textfile0.txt" to "/newFile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "newFile.txt" should exist
    But as "Alice" file "newFile.txt" should not exist

  Scenario: receiver tries to rename a received folder share with share, read permissions in group sharing
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared folder "PARENT" with group "grp1" with permissions "share,read"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" moves folder "/Shares/PARENT" to "/myFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "myFolder" should exist
    But as "Alice" folder "myFolder" should not exist

  Scenario Outline: receiver tries to rename a received folder share to name with special characters in group sharing
    Given group "grp1" has been created
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "<sharer_folder>"
    And user "Alice" has created folder "<group_folder>"
    And user "Alice" has shared folder "<sharer_folder>" with user "Brian"
    And user "Brian" has accepted share "/<sharer_folder>" offered by user "Alice"
    When user "Brian" moves folder "/Shares/<sharer_folder>" to "/Shares/<receiver_folder>" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "<receiver_folder>" should not exist
    And as "Brian" folder "/Shares/<receiver_folder>" should exist
    When user "Alice" shares folder "<group_folder>" with group "grp1" using the sharing API
    And user "Carol" accepts share "/<group_folder>" offered by user "Alice" using the sharing API
    And user "Carol" moves folder "/Shares/<group_folder>" to "/Shares/<receiver_folder>" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "<receiver_folder>" should not exist
    But as "Carol" folder "/Shares/<receiver_folder>" should exist
    Examples:
      | sharer_folder | group_folder    | receiver_folder |
      | ?abc=oc #     | ?abc=oc g%rp#   | # oc?test=oc&a  |
      | @a#8a=b?c=d   | @a#8a=b?c=d grp | ?a#8 a=b?c=d    |

  Scenario Outline: receiver tries to rename a received file share to name with special characters with share, read, change permissions in group sharing
    Given group "grp1" has been created
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "<sharer_folder>"
    And user "Alice" has created folder "<group_folder>"
    And user "Alice" has uploaded file with content "thisIsAFileInsideTheSharedFolder" to "/<sharer_folder>/fileInside"
    And user "Alice" has uploaded file with content "thisIsAFileInsideTheSharedFolder" to "/<group_folder>/fileInside"
    And user "Alice" has shared folder "<sharer_folder>" with user "Brian" with permissions "share,read,change"
    And user "Brian" has accepted share "/<sharer_folder>" offered by user "Alice"
    When user "Brian" moves folder "/Shares/<sharer_folder>/fileInside" to "/Shares/<sharer_folder>/<receiver_file>" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "<sharer_folder>/<receiver_file>" should exist
    And as "Brian" file "/Shares/<sharer_folder>/<receiver_file>" should exist
    When user "Alice" shares folder "<group_folder>" with group "grp1" with permissions "share,read,change" using the sharing API
    And user "Carol" accepts share "/<group_folder>" offered by user "Alice" using the sharing API
    And user "Carol" moves folder "/Shares/<group_folder>/fileInside" to "/Shares/<group_folder>/<reciever_file>" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "<group_folder>/<reciever_file>" should exist
    And as "Carol" file "/Shares/<group_folder>/<reciever_file>" should exist
    Examples:
      | sharer_folder | group_folder    | receiver_file  |
      | ?abc=oc #     | ?abc=oc g%rp#   | # oc?test=oc&a |
      | @a#8a=b?c=d   | @a#8a=b?c=d grp | ?a#8 a=b?c=d   |
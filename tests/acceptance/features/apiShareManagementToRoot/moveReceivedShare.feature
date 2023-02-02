@api @files_sharing-app-required
Feature: sharing

  Background:
    Given using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
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
    And user "Brian" creates folder "/myFOLDER" using the WebDAV API
    And user "Brian" moves folder "/TMP" to "/myFOLDER/myTMP" using the WebDAV API
    And the administrator deletes user "Carol" using the provisioning API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And user "Brian" should see the following elements
      | /myFOLDER/myTMP/ |


  Scenario: keep user shared file name same after one of recipient has renamed the file
    Given user "Alice" has uploaded file with content "foo" to "/sharefile.txt"
    And user "Alice" has shared file "/sharefile.txt" with user "Brian"
    And user "Alice" has shared file "/sharefile.txt" with user "Carol"
    When user "Carol" moves file "/sharefile.txt" to "/renamedsharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Carol" file "/renamedsharefile.txt" should exist
    And as "Alice" file "/sharefile.txt" should exist
    And as "Brian" file "/sharefile.txt" should exist


  Scenario: keep user shared file directory same in respect to respective user if one of the recipient has moved the file
    Given user "Alice" has uploaded file with content "foo" to "/sharefile.txt"
    And user "Alice" has shared file "/sharefile.txt" with user "Brian"
    And user "Alice" has shared file "/sharefile.txt" with user "Carol"
    And user "Carol" has created folder "newfolder"
    When user "Carol" moves file "/sharefile.txt" to "/newfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Carol" file "/newfolder/sharefile.txt" should exist
    And as "Alice" file "/sharefile.txt" should exist
    And as "Brian" file "/sharefile.txt" should exist


  Scenario Outline: move folder inside received folder with special characters
    Given group "grp1" has been created
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "<sharer_folder>"
    And user "Alice" has created folder "<group_folder>"
    And user "Brian" has created folder "<receiver_folder>"
    And user "Carol" has created folder "<receiver_folder>"
    When user "Alice" shares folder "<sharer_folder>" with user "Brian" using the sharing API
    And user "Brian" moves folder "<receiver_folder>" to "<sharer_folder>/<receiver_folder>" using the WebDAV API
    Then the HTTP status code of responses on each endpoint should be "200, 201" respectively
    #OCS status code is checked only for Sharing API request
    And the OCS status code of responses on all endpoints should be "100"
    And as "Alice" folder "<sharer_folder>/<receiver_folder>" should exist
    And as "Brian" folder "<sharer_folder>/<receiver_folder>" should exist
    When user "Alice" shares folder "<group_folder>" with group "grp1" using the sharing API
    And user "Carol" moves folder "<receiver_folder>" to "<group_folder>/<receiver_folder>" using the WebDAV API
    Then the HTTP status code of responses on each endpoint should be "200, 201" respectively
    And the OCS status code of responses on all endpoints should be "100"
    And as "Alice" folder "<group_folder>/<receiver_folder>" should exist
    And as "Carol" folder "<group_folder>/<receiver_folder>" should exist
    Examples:
      | sharer_folder | group_folder    | receiver_folder |
      | ?abc=oc #     | ?abc=oc g%rp#   | # oc?test=oc&a  |
      | @a#8a=b?c=d   | @a#8a=b?c=d grp | ?a#8 a=b?c=d    |


  Scenario: receiver renames a received share with share, read, change permissions
    Given user "Alice" has created folder "folderToShare"
    And user "Alice" has uploaded file with content "thisIsAFileInsideTheSharedFolder" to "/folderToShare/fileInside"
    And user "Alice" has shared folder "folderToShare" with user "Brian" with permissions "share,read,change"
    When user "Brian" moves folder "folderToShare" to "myFolder" using the WebDAV API
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
    When user "Brian" moves folder "folderToShare" to "myFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "myFolder" should exist
    But as "Alice" folder "myFolder" should not exist
    When user "Brian" moves file "/myFolder/fileInside" to "/myFolder/renamedFile" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Brian" file "/myFolder/renamedFile" should not exist
    But as "Brian" file "/myFolder/fileInside" should exist

@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files
    And user "user2" has been created with default attributes and skeleton files

  Scenario: Keep usergroup shares (#22143)
    Given group "grp1" has been created
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
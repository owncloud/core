@api @issue-ocis-reva-14
Feature: move (rename) folder
  As a user
  I want to be able to move and rename folders
  So that I can quickly manage my file system

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: Renaming a folder to a backslash should return an error
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" moves folder "/testshare" to "\" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Renaming a folder beginning with a backslash should return an error
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" moves folder "/testshare" to "\testshare" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Renaming a folder including a backslash encoded should return an error
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" moves folder "/testshare" to "/hola\hola" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Move a folder into an other one
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    And user "Alice" has created folder "/an-other-folder"
    When user "Alice" moves folder "/testshare" to "/an-other-folder/testshare" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should not see the following elements
      | /testshare/ |
    And user "Alice" should see the following elements
      | /an-other-folder/testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Move a folder into a nonexistent one
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" moves folder "/testshare" to "/not-existing/testshare" using the WebDAV API
    Then the HTTP status code should be "409"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: renaming folder with dots in the path
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    And user "Alice" has uploaded file with content "uploaded content for file name ending with a dot" to "<folder_name>/abc.txt"
    When user "Alice" moves folder "<folder_name>" to "/uploadFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/uploadFolder/abc.txt" for user "Alice" should be "uploaded content for file name ending with a dot"
    Examples:
      | dav_version | folder_name   |
      | old         | /upload.      |
      | old         | /upload.1     |
      | old         | /upload...1.. |
      | old         | /...          |
      | old         | /..upload     |
      | new         | /upload.      |
      | new         | /upload.1     |
      | new         | /upload...1.. |
      | new         | /...          |
      | new         | /..upload     |

  @issue-ocis-3023
  Scenario Outline: Moving a folder into a sub-folder of itself
    Given using <dav_version> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file with content "parent text" to "/PARENT/parent.txt"
    And user "Alice" has uploaded file with content "child text" to "/PARENT/CHILD/child.txt"
    When user "Alice" moves folder "/PARENT" to "/PARENT/CHILD/PARENT" using the WebDAV API
    Then the HTTP status code should be "409"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "parent text"
    And the content of file "/PARENT/CHILD/child.txt" for user "Alice" should be "child text"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created folder "/testshare/testsubfolder"
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    When user "<mover>" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "<mover>" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist
    Examples:
      | dav_version | mover |
      | old         | Alice |
      | old         | Brian |
      | new         | Alice |
      | new         | Brian |

  @files_sharing-app-required
  Scenario Outline: Moving a folder into a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "<mover>" has created folder "/testsubfolder"
    And user "<mover>" has uploaded file with content "test data" to "/testsubfolder/testfile.txt"
    When user "<mover>" moves folder "/testsubfolder" to "/testshare/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testshare/testsubfolder/testfile.txt" for user "Alice" should be "test data"
    And the content of file "/testshare/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "<mover>" file "/testsubfolder" should not exist
    Examples:
      | dav_version | mover |
      | old         | Alice |
      | old         | Brian |
      | new         | Alice |
      | new         | Brian |
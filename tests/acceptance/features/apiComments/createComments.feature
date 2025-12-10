@api @comments-app-required @files_sharing-app-required
Feature: Comments

  Background:
    Given using new DAV path
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario Outline: Creating a comment on a file belonging to myself
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    When user "Alice" comments with content "<comment>" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should have the following comments on file "/myFileToComment.txt"
      | user  | comment   |
      | Alice | <comment> |
    Examples:
      | comment          |
      | My first comment |
      | 😀    🤖         |
      | नेपालि           |


  Scenario: Creating a comment on a shared file belonging to another user
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "Alice" has shared file "/myFileToComment.txt" with user "Brian"
    When user "Brian" comments with content "A comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    And user "Alice" comments with content "A comment from sharer" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Brian" should have the following comments on file "/myFileToComment.txt"
      | user  | comment               |
      | Brian | A comment from sharee |
      | Alice | A comment from sharer |


  Scenario: sharee comments on a group shared file
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "Alice" has shared file "/myFileToComment.txt" with group "grp1"
    When user "Brian" comments with content "Comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should have the following comments on file "/myFileToComment.txt"
      | user  | comment             |
      | Brian | Comment from sharee |


  Scenario: sharee comments on read-only shared file
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "Alice" has created a share with settings
      | path        | /myFileToComment.txt |
      | shareType   | user                 |
      | shareWith   | Brian                |
      | permissions | read                 |
    When user "Brian" comments with content "Comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should have the following comments on file "/myFileToComment.txt"
      | user  | comment             |
      | Brian | Comment from sharee |


  Scenario: sharee comments on upload-only shared folder
    Given user "Alice" has created folder "/FOLDER_TO_SHARE"
    And user "Alice" has created a share with settings
      | path        | /FOLDER_TO_SHARE |
      | shareType   | user             |
      | shareWith   | Brian            |
      | permissions | create           |
    When user "Brian" comments with content "Comment from sharee" on folder "/FOLDER_TO_SHARE" using the WebDAV API
    Then the HTTP status code should be "501"
    And user "Alice" should have 0 comments on file "/FOLDER_TO_SHARE"


  Scenario: Creating a comment on a folder belonging to myself
    Given user "Alice" has created folder "/FOLDER"
    When user "Alice" comments with content "My first comment" on folder "/FOLDER" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should have the following comments on folder "/FOLDER"
      | user  | comment          |
      | Alice | My first comment |


  Scenario: Creating a comment on a shared folder belonging to another user
    Given user "Alice" has created folder "/FOLDER_TO_SHARE"
    And user "Alice" has shared folder "/FOLDER_TO_SHARE" with user "Brian"
    When user "Brian" comments with content "A comment from sharee" on folder "/FOLDER_TO_SHARE" using the WebDAV API
    And user "Alice" comments with content "A comment from sharer" on folder "/FOLDER_TO_SHARE" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Brian" should have the following comments on file "/FOLDER_TO_SHARE"
      | user  | comment               |
      | Brian | A comment from sharee |
      | Alice | A comment from sharer |


  Scenario: sharee comments on a group shared folder
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/FOLDER_TO_COMMENT"
    And user "Alice" has shared folder "/FOLDER_TO_COMMENT" with group "grp1"
    When user "Brian" comments with content "Comment from sharee" on folder "/FOLDER_TO_COMMENT" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should have the following comments on folder "/FOLDER_TO_COMMENT"
      | user  | comment             |
      | Brian | Comment from sharee |

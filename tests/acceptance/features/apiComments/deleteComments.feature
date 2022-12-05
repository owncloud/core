@api @comments-app-required @issue-ocis-reva-38
Feature: Comments

  Background:
    Given using new DAV path
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |

  @smokeTest
  Scenario Outline: Deleting my own comments on a file belonging to myself
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "Alice" has commented with content "<comment>" on file "/myFileToComment.txt"
    When user "Alice" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "Alice" should have 0 comments on file "/myFileToComment.txt"
    Examples:
      | comment          |
      | My first comment |
      | 😀 🤖            |
      | नेपालि           |


  Scenario: Deleting a comment on a file belonging to myself having several comments
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "Alice" has commented with content "My first comment" on file "/myFileToComment.txt"
    And user "Alice" has commented with content "My second comment" on file "/myFileToComment.txt"
    And user "Alice" has commented with content "My third comment" on file "/myFileToComment.txt"
    And user "Alice" has commented with content "My fourth comment" on file "/myFileToComment.txt"
    When user "Alice" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "Alice" should have 3 comments on file "/myFileToComment.txt"

  @files_sharing-app-required
  Scenario: Deleting my own comments on a file shared by somebody else
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "Alice" has shared file "/myFileToComment.txt" with user "Brian"
    And user "Alice" has commented with content "File owner comment" on file "/myFileToComment.txt"
    And user "Brian" has commented with content "Sharee comment" on file "/myFileToComment.txt"
    And user "Brian" should have the following comments on file "/myFileToComment.txt"
      | user  | comment            |
      | Alice | File owner comment |
      | Brian | Sharee comment     |
    When user "Brian" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "Brian" should have 1 comments on file "/myFileToComment.txt"


  Scenario: Deleting my own comments on a folder belonging to myself
    Given user "Alice" has created folder "/FOLDER_TO_COMMENT_AND_DELETE"
    And user "Alice" has commented with content "My first comment" on folder "/FOLDER_TO_COMMENT_AND_DELETE"
    When user "Alice" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "Alice" should have 0 comments on folder "/FOLDER_TO_COMMENT_AND_DELETE"


  Scenario: Deleting a comment on a folder belonging to myself having several comments
    Given user "Alice" has created folder "/FOLDER_TO_COMMENT"
    And user "Alice" has commented with content "My first comment" on folder "/FOLDER_TO_COMMENT"
    And user "Alice" has commented with content "My second comment" on folder "/FOLDER_TO_COMMENT"
    And user "Alice" has commented with content "My third comment" on folder "/FOLDER_TO_COMMENT"
    And user "Alice" has commented with content "My fourth comment" on folder "/FOLDER_TO_COMMENT"
    When user "Alice" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "Alice" should have 3 comments on folder "/FOLDER_TO_COMMENT"

  @files_sharing-app-required
  Scenario: Deleting my own comments on a folder shared by somebody else
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/FOLDER_TO_COMMENT"
    And user "Alice" has shared folder "/FOLDER_TO_COMMENT" with user "Brian"
    And user "Alice" has commented with content "Folder owner comment" on folder "/FOLDER_TO_COMMENT"
    And user "Brian" has commented with content "Sharee comment" on folder "/FOLDER_TO_COMMENT"
    When user "Brian" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "Brian" should have 1 comments on folder "/FOLDER_TO_COMMENT"


  Scenario: deleting a folder removes existing comments on the folder
    Given user "Alice" has created folder "/FOLDER_TO_DELETE"
    When user "Alice" comments with content "This should be deleted" on folder "/FOLDER_TO_DELETE" using the WebDAV API
    And user "Alice" deletes folder "/FOLDER_TO_DELETE" using the WebDAV API
    And user "Alice" has created folder "/FOLDER_TO_DELETE"
    Then the HTTP status code should be "201"
    And user "Alice" should have 0 comments on folder "/FOLDER_TO_DELETE"

  @files_sharing-app-required
  Scenario: deleting a user does not remove the comment
    Given user "Alice" has created folder "/FOLDER_TO_COMMENT"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared folder "/FOLDER_TO_COMMENT" with user "Brian"
    And user "Brian" has commented with content "Comment from sharee" on folder "/FOLDER_TO_COMMENT"
    When the administrator deletes user "Brian" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should have 1 comments on folder "/FOLDER_TO_COMMENT"
    And user "Alice" should have the following comments on folder "/FOLDER_TO_COMMENT"
      | user          | comment             |
      | deleted_users | Comment from sharee |


  Scenario: deleting a content owner deletes the comment
    Given user "Alice" has created folder "/FOLDER_TO_COMMENT"
    And user "Alice" has commented with content "Comment from owner" on folder "/FOLDER_TO_COMMENT"
    And user "Alice" has been deleted
    And user "Alice" has been created with default attributes and without skeleton files
    When user "Alice" creates folder "/FOLDER_TO_COMMENT" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should have 0 comments on folder "/FOLDER_TO_COMMENT"

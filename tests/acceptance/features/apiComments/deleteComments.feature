@api @TestAlsoOnExternalUserBackend @comments-app-required @skipOnOcis @issue-ocis-reva-38
Feature: Comments

  Background:
    Given using new DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |

  @smokeTest
  Scenario Outline: Deleting my own comments on a file belonging to myself
    Given user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has commented with content "<comment>" on file "/myFileToComment.txt"
    When user "user0" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user0" should have 0 comments on file "/myFileToComment.txt"
    Examples:
      | comment          |
      | My first comment |
      | 😀 🤖            |
      | नेपालि           |

  Scenario: Deleting a comment on a file belonging to myself having several comments
    Given user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has commented with content "My first comment" on file "/myFileToComment.txt"
    And user "user0" has commented with content "My second comment" on file "/myFileToComment.txt"
    And user "user0" has commented with content "My third comment" on file "/myFileToComment.txt"
    And user "user0" has commented with content "My fourth comment" on file "/myFileToComment.txt"
    When user "user0" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user0" should have 3 comments on file "/myFileToComment.txt"

  @files_sharing-app-required
  Scenario: Deleting my own comments on a file shared by somebody else
    Given user "user0" has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has shared file "/myFileToComment.txt" with user "user1"
    And user "user0" has commented with content "File owner comment" on file "/myFileToComment.txt"
    And user "user1" has commented with content "Sharee comment" on file "/myFileToComment.txt"
    And user "user1" should have the following comments on file "/myFileToComment.txt"
      | user  | comment            |
      | user0 | File owner comment |
      | user1 | Sharee comment     |
    When user "user1" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user1" should have 1 comments on file "/myFileToComment.txt"

  Scenario: Deleting my own comments on a folder belonging to myself
    Given user "user0" has created folder "/FOLDER_TO_COMMENT_AND_DELETE"
    And user "user0" has commented with content "My first comment" on folder "/FOLDER_TO_COMMENT_AND_DELETE"
    When user "user0" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user0" should have 0 comments on folder "/FOLDER_TO_COMMENT_AND_DELETE"

  Scenario: Deleting a comment on a file belonging to myself having several comments
    Given user "user0" has created folder "/FOLDER_TO_COMMENT"
    And user "user0" has commented with content "My first comment" on folder "/FOLDER_TO_COMMENT"
    And user "user0" has commented with content "My second comment" on folder "/FOLDER_TO_COMMENT"
    And user "user0" has commented with content "My third comment" on folder "/FOLDER_TO_COMMENT"
    And user "user0" has commented with content "My fourth comment" on folder "/FOLDER_TO_COMMENT"
    When user "user0" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user0" should have 3 comments on folder "/FOLDER_TO_COMMENT"

  @files_sharing-app-required
  Scenario: Deleting my own comments on a file shared by somebody else
    Given user "user0" has created folder "/FOLDER_TO_COMMENT"
    And user "user0" has shared folder "/FOLDER_TO_COMMENT" with user "user1"
    And user "user0" has commented with content "Folder owner comment" on folder "/FOLDER_TO_COMMENT"
    And user "user1" has commented with content "Sharee comment" on folder "/FOLDER_TO_COMMENT"
    And user "user1" should have the following comments on folder "/FOLDER_TO_COMMENT"
      | user  | comment              |
      | user0 | Folder owner comment |
      | user1 | Sharee comment       |
    When user "user1" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user1" should have 1 comments on folder "/FOLDER_TO_COMMENT"

  Scenario: deleting a folder removes existing comments on the folder
    Given user "user0" has created folder "/FOLDER_TO_DELETE"
    When user "user0" comments with content "This should be deleted" on folder "/FOLDER_TO_DELETE" using the WebDAV API
    And user "user0" deletes folder "/FOLDER_TO_DELETE" using the WebDAV API
    And user "user0" has created folder "/FOLDER_TO_DELETE"
    Then user "user0" should have 0 comments on folder "/FOLDER_TO_DELETE"

  @files_sharing-app-required
  Scenario: deleting a user does not remove the comment
    Given user "user0" has created folder "/FOLDER_TO_COMMENT"
    And user "user0" has shared folder "/FOLDER_TO_COMMENT" with user "user1"
    And user "user1" has commented with content "Comment from sharee" on folder "/FOLDER_TO_COMMENT"
    When the administrator deletes user "user1" using the provisioning API
    Then user "user0" should have 1 comments on folder "/FOLDER_TO_COMMENT"
    And user "user0" should have the following comments on folder "/FOLDER_TO_COMMENT"
      | user          | comment             |
      | deleted_users | Comment from sharee |

  Scenario: deleting a content owner deletes the comment
    Given user "user0" has created folder "/FOLDER_TO_COMMENT"
    And user "user0" has commented with content "Comment from owner" on folder "/FOLDER_TO_COMMENT"
    And user "user0" has been deleted
    And user "user0" has been created with default attributes and skeleton files
    When user "user0" creates folder "/FOLDER_TO_COMMENT" using the WebDAV API
    Then user "user0" should have 0 comments on folder "/FOLDER_TO_COMMENT"

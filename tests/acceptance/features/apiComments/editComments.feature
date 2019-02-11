@api @TestAlsoOnExternalUserBackend @comments-app-required
Feature: Comments

  Background:
    Given using new DAV path
    And user "user0" has been created with default attributes
    And user "user1" has been created with default attributes
    And as user "user0"

  @smokeTest
  Scenario Outline: Edit my own comments on a file belonging to myself
    Given the user has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And the user has commented with content "File owner comment" on file "/myFileToComment.txt"
    When the user edits the last created comment with content "<comment>" using the WebDAV API
    Then the HTTP status code should be "207"
    And the user should have the following comments on file "/myFileToComment.txt"
      | user0 | <comment> |
    Examples:
      | comment           |
      | My edited comment |
      | 😀 🤖             |
      | नेपालि            |

  Scenario: Edit my own comments on a file shared by someone with me
    Given the user has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And the user has shared file "/myFileToComment.txt" with user "user1"
    And user "user1" has commented with content "Sharee comment" on file "/myFileToComment.txt"
    When user "user1" edits the last created comment with content "My edited comment" using the WebDAV API
    Then the HTTP status code should be "207"
    And user "user1" should have the following comments on file "/myFileToComment.txt"
      | user1 | My edited comment |

  Scenario: Editing comments of other users should not be possible
    Given the user has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And the user has shared file "/myFileToComment.txt" with user "user1"
    And user "user1" has commented with content "Sharee comment" on file "/myFileToComment.txt"
    And the user should have the following comments on file "/myFileToComment.txt"
      | user1 | Sharee comment |
    When the user edits the last created comment with content "User1 edited comment" using the WebDAV API
    Then the HTTP status code should be "403"
    And the user should have the following comments on file "/myFileToComment.txt"
      | user1 | Sharee comment |

  Scenario: Edit my own comments on a folder belonging to myself
    Given the user has created folder "/FOLDER_TO_COMMENT"
    And the user has commented with content "Folder owner comment" on folder "/FOLDER_TO_COMMENT"
    When the user edits the last created comment with content "My edited comment" using the WebDAV API
    Then the HTTP status code should be "207"
    And the user should have the following comments on folder "/FOLDER_TO_COMMENT"
      | user0 | My edited comment |

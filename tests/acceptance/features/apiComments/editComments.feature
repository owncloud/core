@api @TestAlsoOnExternalUserBackend @comments-app-required
Feature: Comments

  Background:
    Given using new DAV path

  @smokeTest
  Scenario: Edit my own comments on a file belonging to myself
    Given user "user0" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has commented with content "File owner comment" on file "/myFileToComment.txt"
    When user "user0" edits the last created comment with content "My edited comment" using the WebDAV API
    Then the HTTP status code should be "207"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
      | user0 | My edited comment |

  Scenario: Edit my own comments on a file shared by someone with me
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has shared file "/myFileToComment.txt" with user "user1"
    And user "user1" has commented with content "Sharee comment" on file "/myFileToComment.txt"
    When user "user1" edits the last created comment with content "My edited comment" using the WebDAV API
    Then the HTTP status code should be "207"
    And user "user1" should have the following comments on file "/myFileToComment.txt"
      | user1 | My edited comment |

  Scenario: Editing comments of other users should not be possible
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has shared file "/myFileToComment.txt" with user "user1"
    And user "user1" has commented with content "Sharee comment" on file "/myFileToComment.txt"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
      | user1 | Sharee comment |
    When user "user0" edits the last created comment with content "User1 edited comment" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
      | user1 | Sharee comment |

  Scenario: Edit my own comments on a folder belonging to myself
    Given user "user0" has been created
    And user "user0" has created a folder "/FOLDER_TO_COMMENT"
    And user "user0" has commented with content "Folder owner comment" on folder "/FOLDER_TO_COMMENT"
    When user "user0" edits the last created comment with content "My edited comment" using the WebDAV API
    Then the HTTP status code should be "207"
    And user "user0" should have the following comments on folder "/FOLDER_TO_COMMENT"
      | user0 | My edited comment |
@api @TestAlsoOnExternalUserBackend @comments-app-required
Feature: Comments

  Background:
    Given using new DAV path

  @smokeTest
  Scenario Outline: Creating a comment on a file belonging to myself
    Given user "user0" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    When user "user0" comments with content "<comment>" on file "/myFileToComment.txt" using the WebDAV API
    Then user "user0" should have the following comments on file "/myFileToComment.txt"
      | user0 | <comment> |
    Examples:
      | comment          |
      | My first comment |
      | 😀    🤖         |
      | नेपालि           |

  Scenario: Creating a comment on a shared file belonging to another user
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has shared file "/myFileToComment.txt" with user "user1"
    When user "user1" comments with content "A comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    And user "user0" comments with content "A comment from sharer" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "user1" should have the following comments on file "/myFileToComment.txt"
      | user1 | A comment from sharee |
      | user0 | A comment from sharer |

  Scenario: sharee comments on a group shared file
    Given user "user0" has been created
    And user "user1" has been created
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has shared file "/myFileToComment.txt" with group "grp1"
    When user "user1" comments with content "Comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
      | user1 | Comment from sharee |

  Scenario: sharee comments on read-only shared file
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has created a share with settings
      | path        | /myFileToComment.txt |
      | shareType   | 0                    |
      | shareWith   | user1                |
      | permissions | 1                    |
    When user "user1" comments with content "Comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
      | user1 | Comment from sharee |

  Scenario: sharee comments on upload-only shared file
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has created a share with settings
      | path        | /myFileToComment.txt |
      | shareType   | 0                    |
      | shareWith   | user1                |
      | permissions | 4                    |
    When user "user1" comments with content "Comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "501"
    And user "user0" should have 0 comments on file "/myFileToComment.txt"

  Scenario: Creating a comment on a folder belonging to myself
    Given user "user0" has been created
    When user "user0" comments with content "My first comment" on folder "/FOLDER" using the WebDAV API
    Then user "user0" should have the following comments on folder "/FOLDER"
      | user0 | My first comment |

  Scenario: Creating a comment on a shared folder belonging to another user
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/FOLDER_TO_SHARE"
    And user "user0" has shared folder "/FOLDER_TO_SHARE" with user "user1"
    When user "user1" comments with content "A comment from sharee" on folder "/FOLDER_TO_SHARE" using the WebDAV API
    And user "user0" comments with content "A comment from sharer" on folder "/FOLDER_TO_SHARE" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "user1" should have the following comments on file "/FOLDER_TO_SHARE"
      | user1 | A comment from sharee |
      | user0 | A comment from sharer |

  Scenario: sharee comments on a group shared folder
    Given user "user0" has been created
    And user "user1" has been created
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has created a folder "/FOLDER_TO_COMMENT"
    And user "user0" has shared folder "/FOLDER_TO_COMMENT" with group "grp1"
    When user "user1" comments with content "Comment from sharee" on folder "/FOLDER_TO_COMMENT" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "user0" should have the following comments on folder "/FOLDER_TO_COMMENT"
      | user1 | Comment from sharee |
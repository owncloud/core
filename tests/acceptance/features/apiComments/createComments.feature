@api @TestAlsoOnExternalUserBackend @comments-app-required
Feature: Comments

  Background:
    Given using new DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files
    And as user "user0"

  @smokeTest
  Scenario Outline: Creating a comment on a file belonging to myself
    Given the user has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    When the user comments with content "<comment>" on file "/myFileToComment.txt" using the WebDAV API
    Then the user should have the following comments on file "/myFileToComment.txt"
      | user0 | <comment> |
    Examples:
      | comment          |
      | My first comment |
      | 😀    🤖         |
      | नेपालि           |

  Scenario: Creating a comment on a shared file belonging to another user
    Given the user has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And the user has shared file "/myFileToComment.txt" with user "user1"
    When user "user1" comments with content "A comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    And the user comments with content "A comment from sharer" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "user1" should have the following comments on file "/myFileToComment.txt"
      | user1 | A comment from sharee |
      | user0 | A comment from sharer |

  Scenario: sharee comments on a group shared file
    Given group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And the user has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And the user has shared file "/myFileToComment.txt" with group "grp1"
    When user "user1" comments with content "Comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should have the following comments on file "/myFileToComment.txt"
      | user1 | Comment from sharee |

  Scenario: sharee comments on read-only shared file
    Given the user has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And the user has created a share with settings
      | path        | /myFileToComment.txt |
      | shareType   | 0                    |
      | shareWith   | user1                |
      | permissions | 1                    |
    When user "user1" comments with content "Comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should have the following comments on file "/myFileToComment.txt"
      | user1 | Comment from sharee |

  Scenario: sharee comments on upload-only shared file
    Given the user has uploaded file "filesForUpload/textfile.txt" to "/myFileToComment.txt"
    And the user has created a share with settings
      | path        | /myFileToComment.txt |
      | shareType   | 0                    |
      | shareWith   | user1                |
      | permissions | 4                    |
    When user "user1" comments with content "Comment from sharee" on file "/myFileToComment.txt" using the WebDAV API
    Then the HTTP status code should be "501"
    And the user should have 0 comments on file "/myFileToComment.txt"

  Scenario: Creating a comment on a folder belonging to myself
    When the user comments with content "My first comment" on folder "/FOLDER" using the WebDAV API
    Then the user should have the following comments on folder "/FOLDER"
      | user0 | My first comment |

  Scenario: Creating a comment on a shared folder belonging to another user
    Given the user has created folder "/FOLDER_TO_SHARE"
    And the user has shared folder "/FOLDER_TO_SHARE" with user "user1"
    When user "user1" comments with content "A comment from sharee" on folder "/FOLDER_TO_SHARE" using the WebDAV API
    And the user comments with content "A comment from sharer" on folder "/FOLDER_TO_SHARE" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "user1" should have the following comments on file "/FOLDER_TO_SHARE"
      | user1 | A comment from sharee |
      | user0 | A comment from sharer |

  Scenario: sharee comments on a group shared folder
    Given group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And the user has created folder "/FOLDER_TO_COMMENT"
    And the user has shared folder "/FOLDER_TO_COMMENT" with group "grp1"
    When user "user1" comments with content "Comment from sharee" on folder "/FOLDER_TO_COMMENT" using the WebDAV API
    Then the HTTP status code should be "201"
    And the user should have the following comments on folder "/FOLDER_TO_COMMENT"
      | user1 | Comment from sharee |

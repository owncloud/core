@api @TestAlsoOnExternalUserBackend
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
      | 😀    🤖        |
      | नेपालि                      |

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

  @smokeTest
  Scenario: Deleting my own comments on a file belonging to myself
    Given user "user0" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has commented with content "My first comment" on file "/myFileToComment.txt"
    When user "user0" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user0" should have 0 comments on file "/myFileToComment.txt"

  Scenario: Deleting a comment on a file belonging to myself having several comments
    Given user "user0" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has commented with content "My first comment" on file "/myFileToComment.txt"
    And user "user0" has commented with content "My second comment" on file "/myFileToComment.txt"
    And user "user0" has commented with content "My third comment" on file "/myFileToComment.txt"
    And user "user0" has commented with content "My fourth comment" on file "/myFileToComment.txt"
    When user "user0" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user0" should have 3 comments on file "/myFileToComment.txt"

  Scenario: Deleting my own comments on a file shared by somebody else
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has shared file "/myFileToComment.txt" with user "user1"
    And user "user0" has commented with content "File owner comment" on file "/myFileToComment.txt"
    And user "user1" has commented with content "Sharee comment" on file "/myFileToComment.txt"
    And user "user1" should have the following comments on file "/myFileToComment.txt"
      | user0 | File owner comment |
      | user1 | Sharee comment     |
    When user "user1" deletes the last created comment using the WebDAV API
    Then the HTTP status code should be "204"
    And user "user1" should have 1 comments on file "/myFileToComment.txt"

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

  @smokeTest
  Scenario: Getting info of comments using files endpoint
    Given user "user0" has been created
    And user "user0" has uploaded file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" has commented with content "My first comment" on file "/myFileToComment.txt"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
      | user0 | My first comment |
    When user "user0" gets the following properties of folder "/myFileToComment.txt" using the WebDAV API
      | {http://owncloud.org/ns}comments-href   |
      | {http://owncloud.org/ns}comments-count  |
      | {http://owncloud.org/ns}comments-unread |
    Then the single response should contain a property "{http://owncloud.org/ns}comments-count" with value "1"
    And the single response should contain a property "{http://owncloud.org/ns}comments-unread" with value "0"
    And the single response should contain a property "{http://owncloud.org/ns}comments-href" with value "a_comment_url"

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

	Scenario: Deleting my own comments on a folder belonging to myself
		Given user "user0" has been created
		And user "user0" has created a folder "/FOLDER_TO_COMMENT_AND_DELETE"
		And user "user0" has commented with content "My first comment" on folder "/FOLDER_TO_COMMENT_AND_DELETE"
		When user "user0" deletes the last created comment using the WebDAV API
		Then the HTTP status code should be "204"
		And user "user0" should have 0 comments on folder "/FOLDER_TO_COMMENT_AND_DELETE"

	Scenario: Deleting a comment on a file belonging to myself having several comments
		Given user "user0" has been created
		And user "user0" has created a folder "/FOLDER_TO_COMMENT"
		And user "user0" has commented with content "My first comment" on folder "/FOLDER_TO_COMMENT"
		And user "user0" has commented with content "My second comment" on folder "/FOLDER_TO_COMMENT"
		And user "user0" has commented with content "My third comment" on folder "/FOLDER_TO_COMMENT"
		And user "user0" has commented with content "My fourth comment" on folder "/FOLDER_TO_COMMENT"
		When user "user0" deletes the last created comment using the WebDAV API
		Then the HTTP status code should be "204"
		And user "user0" should have 3 comments on folder "/FOLDER_TO_COMMENT"

	Scenario: Deleting my own comments on a file shared by somebody else
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/FOLDER_TO_COMMENT"
		And user "user0" has shared folder "/FOLDER_TO_COMMENT" with user "user1"
		And user "user0" has commented with content "Folder owner comment" on folder "/FOLDER_TO_COMMENT"
		And user "user1" has commented with content "Sharee comment" on folder "/FOLDER_TO_COMMENT"
		And user "user1" should have the following comments on folder "/FOLDER_TO_COMMENT"
			| user0 | Folder owner comment |
			| user1 | Sharee comment     |
		When user "user1" deletes the last created comment using the WebDAV API
		Then the HTTP status code should be "204"
		And user "user1" should have 1 comments on folder "/FOLDER_TO_COMMENT"

	Scenario: Edit my own comments on a folder belonging to myself
		Given user "user0" has been created
		And user "user0" has created a folder "/FOLDER_TO_COMMENT"
		And user "user0" has commented with content "Folder owner comment" on folder "/FOLDER_TO_COMMENT"
		When user "user0" edits the last created comment with content "My edited comment" using the WebDAV API
		Then the HTTP status code should be "207"
		And user "user0" should have the following comments on folder "/FOLDER_TO_COMMENT"
			| user0 | My edited comment |

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

	Scenario: deleting a folder removes existing comments on the folder
		Given user "user0" has been created
		And user "user0" has created a folder "/FOLDER_TO_DELETE"
		When user "user0" comments with content "This should be deleted" on folder "/FOLDER_TO_DELETE" using the WebDAV API
		Then user "user0" should have 1 comments on folder "/FOLDER_TO_DELETE"
		When user "user0" deletes folder "/FOLDER_TO_DELETE" using the WebDAV API
		And user "user0" has created a folder "/FOLDER_TO_DELETE"
		Then user "user0" should have 0 comments on folder "/FOLDER_TO_DELETE"

	Scenario: deleting a user does not remove the comment
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/FOLDER_TO_COMMENT"
		And user "user0" has shared folder "/FOLDER_TO_COMMENT" with user "user1"
		And user "user1" has commented with content "Comment from sharee" on folder "/FOLDER_TO_COMMENT"
		Then user "user0" should have the following comments on folder "/FOLDER_TO_COMMENT"
			| user1 | Comment from sharee |
		And user "user1" has been deleted
		Then user "user0" should have 1 comments on folder "/FOLDER_TO_COMMENT"
		And user "user0" should have the following comments on folder "/FOLDER_TO_COMMENT"
			| deleted_users | Comment from sharee |

	Scenario: deleting a content owner deletes the comment
		Given user "user0" has been created
		And user "user0" has created a folder "/FOLDER_TO_COMMENT"
		And user "user0" has commented with content "Comment from owner" on folder "/FOLDER_TO_COMMENT"
		And user "user0" has been deleted
		And user "user0" has been created
		When user "user0" creates a folder "/FOLDER_TO_COMMENT" using the WebDAV API
		Then user "user0" should have 0 comments on folder "/FOLDER_TO_COMMENT"
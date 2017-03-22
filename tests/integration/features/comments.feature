Feature: Comments
  Background:
    Given using new dav path

  Scenario: Creating a comment on a file belonging to myself
    Given user "user0" exists
    And As an "user0"
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    When user "user0" comments with content "My first comment" on file "/myFileToComment.txt"
    Then user "user0" should have the following comments on file "/myFileToComment.txt"
            | user0 | My first comment |

  Scenario: Creating a comment on a shared file belonging to another user
    Given user "user0" exists
    And user "user1" exists
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    And file "/myFileToComment.txt" of user "user0" is shared with user "user1"
    And user "user1" comments with content "A comment from sharee" on file "/myFileToComment.txt"
    And user "user0" comments with content "A comment from sharer" on file "/myFileToComment.txt"
    And the HTTP status code should be "201"
    Then user "user1" should have the following comments on file "/myFileToComment.txt"
            | user1 | A comment from sharee |
            | user0 | A comment from sharer |

  Scenario: Deleting my own comments on a file belonging to myself
    Given user "user0" exists
    And As an "user0"
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" comments with content "My first comment" on file "/myFileToComment.txt"
    When user "user0" deletes the last created comment
    Then the HTTP status code should be "204"
    And user "user0" should have 0 comments on file "/myFileToComment.txt"

  Scenario: Deleting a comment on a file belonging to myself having several comments
    Given user "user0" exists
    And As an "user0"
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" comments with content "My first comment" on file "/myFileToComment.txt"
    And user "user0" comments with content "My second comment" on file "/myFileToComment.txt"
    And user "user0" comments with content "My third comment" on file "/myFileToComment.txt"
    And user "user0" comments with content "My fourth comment" on file "/myFileToComment.txt"
    When user "user0" deletes the last created comment
    Then the HTTP status code should be "204"
    And user "user0" should have 3 comments on file "/myFileToComment.txt"

  Scenario: Deleting my own comments on a file shared by somebody else
    Given user "user0" exists
    And user "user1" exists
    And As an "user0"
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    And file "/myFileToComment.txt" of user "user0" is shared with user "user1"
    And user "user0" comments with content "File owner comment" on file "/myFileToComment.txt"
    And user "user1" comments with content "Sharee comment" on file "/myFileToComment.txt"
    And user "user1" should have the following comments on file "/myFileToComment.txt"
            | user0 | File owner comment |
            | user1 | Sharee comment |
    When user "user1" deletes the last created comment
    Then user "user1" should have 1 comments on file "/myFileToComment.txt"

  Scenario: Edit my own comments on a file belonging to myself
    Given user "user0" exists
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" comments with content "File owner comment" on file "/myFileToComment.txt"
    When user "user0" edits last comment with content "My edited comment"
    Then the HTTP status code should be "207"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
            | user0 | My edited comment |

  Scenario: Edit my own comments on a file shared by someone with me
    Given user "user0" exists
    And user "user1" exists
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    And file "/myFileToComment.txt" of user "user0" is shared with user "user1"
    And user "user1" comments with content "Sharee comment" on file "/myFileToComment.txt"
    When user "user1" edits last comment with content "My edited comment"
    Then the HTTP status code should be "207"
    And user "user1" should have the following comments on file "/myFileToComment.txt"
            | user1 | My edited comment |

  Scenario: Edit comments of other users should not be possible
    Given user "user0" exists
    And user "user1" exists
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    And file "/myFileToComment.txt" of user "user0" is shared with user "user1"
    And user "user1" comments with content "Sharee comment" on file "/myFileToComment.txt"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
            | user1 | Sharee comment |
    When user "user0" edits last comment with content "User1 edited comment"
    Then the HTTP status code should be "403"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
            | user1 | Sharee comment |

  Scenario: Getting info of comments using files endpoint
    Given user "user0" exists
    And As an "user0"
    And User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    And user "user0" comments with content "My first comment" on file "/myFileToComment.txt"
    And user "user0" should have the following comments on file "/myFileToComment.txt"
            | user0 | My first comment |
    When as "user0" gets properties of folder "/myFileToComment.txt" with
          | {http://owncloud.org/ns}comments-href |
          | {http://owncloud.org/ns}comments-count |
          | {http://owncloud.org/ns}comments-unread |
    #Then the single response should contain a property "{http://owncloud.org/ns}comments-count" with value "1"
    And the single response should contain a property "{http://owncloud.org/ns}comments-unread" with value "0"
    And the single response should contain a property "{http://owncloud.org/ns}comments-href" with value "a_comment_url"

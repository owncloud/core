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



    # When As "user0" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    # Then the response should contain a property "oc:parentId" with value "0"
    # Then the response should contain a property "oc:childrenCount" with value "0"
    # And the response should contain a property "oc:verb" with value "comment"
    # And the response should contain a property "oc:actorType" with value "users"
    # And the response should contain a property "oc:objectType" with value "files"
    # And the response should contain a property "oc:message" with value "My first comment"
    # And the response should contain a property "oc:actorDisplayName" with value "user0"
    # And the response should contain only "1" comments
    # And As "user0" delete the created comment it should return "204"
    # And As "user0" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    # And the response should contain only "0" comments

  Scenario: Deleting my own comments on a file shared by somebody else
    Given user "user0" exists
    Given user "user1" exists
    Given As an "user0"
    Given User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    Given As "user0" sending "POST" to "/apps/files_sharing/api/v1/shares" with
      | path | myFileToComment.txt |
      | shareWith | user1 |
      | shareType | 0 |
    Given "user1" posts a comment with content "My first comment" on the file named "/myFileToComment.txt" it should return "201"
    When As "user1" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    Then the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My first comment"
    And the response should contain a property "oc:actorDisplayName" with value "user1"
    And the response should contain only "1" comments
    And As "user1" delete the created comment it should return "204"
    And As "user1" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    And the response should contain only "0" comments

  Scenario: Deleting my own comments on a file unshared by someone else
    Given user "user0" exists
    Given user "user1" exists
    Given User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    Given As "user0" sending "POST" to "/apps/files_sharing/api/v1/shares" with
      | path | myFileToComment.txt |
      | shareWith | user1 |
      | shareType | 0 |
    Given "user1" posts a comment with content "My first comment" on the file named "/myFileToComment.txt" it should return "201"
    When As "user1" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    Then the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My first comment"
    And the response should contain a property "oc:actorDisplayName" with value "user1"
    And the response should contain only "1" comments
    And As "user0" remove all shares from the file named "/myFileToComment.txt"
    And As "user1" delete the created comment it should return "404"
    And As "user1" load all the comments of the file named "/myFileToComment.txt" it should return "404"

  Scenario: Edit my own comments on a file belonging to myself
    Given user "user0" exists
    Given User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    Given "user0" posts a comment with content "My first comment" on the file named "/myFileToComment.txt" it should return "201"
    When As "user0" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    Then the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My first comment"
    And the response should contain a property "oc:actorDisplayName" with value "user0"
    And the response should contain only "1" comments
    When As "user0" edit the last created comment and set text to "My edited comment" it should return "207"
    Then As "user0" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    And the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My edited comment"
    And the response should contain a property "oc:actorDisplayName" with value "user0"

  Scenario: Edit my own comments on a file shared by someone with me
    Given user "user0" exists
    Given user "user1" exists
    Given User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    Given As "user0" sending "POST" to "/apps/files_sharing/api/v1/shares" with
      | path | myFileToComment.txt |
      | shareWith | user1 |
      | shareType | 0 |
    Given "user1" posts a comment with content "My first comment" on the file named "/myFileToComment.txt" it should return "201"
    When As "user0" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    Then the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My first comment"
    And the response should contain a property "oc:actorDisplayName" with value "user1"
    And the response should contain only "1" comments
    Given As "user1" edit the last created comment and set text to "My edited comment" it should return "207"
    Then As "user1" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    And the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My edited comment"
    And the response should contain a property "oc:actorDisplayName" with value "user1"

  Scenario: Edit my own comments on a file unshared by someone with me
    Given user "user0" exists
    Given user "user1" exists
    Given User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    Given As "user0" sending "POST" to "/apps/files_sharing/api/v1/shares" with
      | path | myFileToComment.txt |
      | shareWith | user1 |
      | shareType | 0 |
    When "user1" posts a comment with content "My first comment" on the file named "/myFileToComment.txt" it should return "201"
    Then As "user0" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    And the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My first comment"
    And the response should contain a property "oc:actorDisplayName" with value "user1"
    And the response should contain only "1" comments
    And As "user0" remove all shares from the file named "/myFileToComment.txt"
    When As "user1" edit the last created comment and set text to "My edited comment" it should return "404"
    Then As "user0" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    And the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My first comment"
    And the response should contain a property "oc:actorDisplayName" with value "user1"

  Scenario: Edit comments of other users should not be possible
    Given user "user0" exists
    Given user "user1" exists
    Given User "user0" uploads file "data/textfile.txt" to "/myFileToComment.txt"
    Given As "user0" sending "POST" to "/apps/files_sharing/api/v1/shares" with
      | path | myFileToComment.txt |
      | shareWith | user1 |
      | shareType | 0 |
    Given "user1" posts a comment with content "My first comment" on the file named "/myFileToComment.txt" it should return "201"
    When As "user0" load all the comments of the file named "/myFileToComment.txt" it should return "207"
    Then the response should contain a property "oc:parentId" with value "0"
    And the response should contain a property "oc:childrenCount" with value "0"
    And the response should contain a property "oc:verb" with value "comment"
    And the response should contain a property "oc:actorType" with value "users"
    And the response should contain a property "oc:objectType" with value "files"
    And the response should contain a property "oc:message" with value "My first comment"
    And the response should contain a property "oc:actorDisplayName" with value "user1"
    And the response should contain only "1" comments
    Then As "user0" edit the last created comment and set text to "My edited comment" it should return "403"
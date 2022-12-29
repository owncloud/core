@api @systemtags-app-required @files_sharing-app-required @issue-ocis-reva-51
Feature: Unassigning tags from file/folder
  As a user
  I want to be able to remove tags from file/folder

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario: Unassigning a normal tag from a file shared by someone else as regular user should work
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has added tag "MyFirstTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    When user "Brian" removes tag "MyFirstTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type   |
      | MySecondTag | normal |


  Scenario: Unassigning a normal tag from a file unshared by someone else as regular user should fail
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has added tag "MyFirstTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    When user "Brian" removes tag "MyFirstTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "404"
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type   |
      | MyFirstTag  | normal |
      | MySecondTag | normal |


  Scenario: Unassigning a not user-visible tag from a file shared by someone else as regular user should fail
    Given the administrator has created a "not user-visible" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And the administrator has added tag "MyFirstTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    When user "Brian" removes tag "MyFirstTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "404"
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type   |
      | MySecondTag | normal |
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | name        | type             |
      | MyFirstTag  | not user-visible |
      | MySecondTag | normal           |


  Scenario: Unassigning a static tag from a file and not part of static tags group shared by someone else as regular user should fail
    Given the administrator has created a "static" tag with name "StaticTag"
    And user "Alice" has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And the administrator has added tag "StaticTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    When user "Brian" removes tag "StaticTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type   |
      | MySecondTag | normal |
      | StaticTag   | static |
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | name        | type   |
      | StaticTag   | static |
      | MySecondTag | normal |


  Scenario: Unassigning a not user-visible tag from a file shared by someone else as admin should work
    Given the administrator has created a "not user-visible" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And the administrator has added tag "MyFirstTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    When the administrator removes tag "MyFirstTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type   |
      | MySecondTag | normal |
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | name        | type   |
      | MySecondTag | normal |


  Scenario: Unassigning a static tag from a file shared by someone else as admin should work
    Given the administrator has created a "static" tag with name "StaticTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And the administrator has added tag "StaticTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    When the administrator removes tag "StaticTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type   |
      | MySecondTag | normal |
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | name        | type   |
      | MySecondTag | normal |


  Scenario: Unassigning a not user-visible tag from a file unshared by someone else should fail
    Given the administrator has created a "not user-visible" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And the administrator has added tag "MyFirstTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    And user "Alice" has removed all shares from the file named "/myFileToTag.txt"
    When the administrator removes tag "MyFirstTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "404"


  Scenario: Unassigning a not user-assignable tag from a file shared by someone else as regular user should fail
    Given the administrator has created a "not user-assignable" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And the administrator has added tag "MyFirstTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    When user "Brian" removes tag "MyFirstTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type                |
      | MyFirstTag  | not user-assignable |
      | MySecondTag | normal              |
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | name        | type                |
      | MyFirstTag  | not user-assignable |
      | MySecondTag | normal              |


  Scenario: Unassigning a not user-assignable tag from a file shared by someone else as admin should work
    Given the administrator has created a "not user-assignable" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And the administrator has added tag "MyFirstTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    When the administrator removes tag "MyFirstTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type   |
      | MySecondTag | normal |
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | name        | type   |
      | MySecondTag | normal |


  Scenario: Unassigning a not user-assignable tag from a file unshared by someone else should fail
    Given the administrator has created a "not user-assignable" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And the administrator has added tag "MyFirstTag" to file "/myFileToTag.txt"
    And user "Alice" has added tag "MySecondTag" to file "/myFileToTag.txt"
    And user "Alice" has removed all shares from the file named "/myFileToTag.txt"
    When the administrator removes tag "MyFirstTag" from file "/myFileToTag.txt" shared by "Alice" using the WebDAV API
    Then the HTTP status code should be "404"

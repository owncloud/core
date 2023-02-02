@api @systemtags-app-required @files_sharing-app-required @issue-ocis-reva-51
Feature: Assign tags to file/folder
  As a user
  I want to assign tags to the file/folder
  So that I can organize the files/folders easily

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario: Assigning a normal tag to a file shared by someone else as regular user should work
    Given the administrator has created a "normal" tag with name "JustARegularTagName"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    When user "Brian" adds tag "JustARegularTagName" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by user "Alice" should have the following tags
      | name                | type   |
      | JustARegularTagName | normal |


  Scenario: Assigning a normal tag to a file belonging to someone else as regular user should fail
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "normal" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has added tag "MyFirstTag" to file "/myFileToTag.txt"
    When user "Brian" adds tag "MySecondTag" to file "/myFileToTag.txt" owned by user "Alice" using the WebDAV API
    Then the HTTP status code should be "404"
    And file "/myFileToTag.txt" owned by user "Alice" should have the following tags
      | name       | type   |
      | MyFirstTag | normal |


  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user should fail
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "not user-assignable" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has added tag "MyFirstTag" to file "/myFileToTag.txt"
    When user "Brian" adds tag "MySecondTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" shared by user "Alice" should have the following tags
      | name       | type   |
      | MyFirstTag | normal |


  Scenario: Assigning a not user-assignable tag to a file shared by someone else as regular user belongs to tag's groups should work
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And the administrator has created a "not user-assignable" tag with name "JustARegularTagName" and groups "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    When user "Brian" adds tag "JustARegularTagName" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by user "Alice" should have the following tags
      | name                | type                |
      | JustARegularTagName | not user-assignable |


  Scenario: Assigning a static tag to a file shared by someone else as regular user belongs to tag's groups should work
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And the administrator has created a "static" tag with name "StaticTagName" and groups "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    When user "Brian" adds tag "StaticTagName" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" shared by user "Alice" should have the following tags
      | name          | type   |
      | StaticTagName | static |


  Scenario: Assigning a not user-visible tag to a file shared by someone else as regular user should fail
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "not user-visible" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has added tag "MyFirstTag" to file "/myFileToTag.txt"
    When user "Brian" adds tag "MySecondTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "412"
    And file "/myFileToTag.txt" shared by user "Alice" should have the following tags
      | name       | type   |
      | MyFirstTag | normal |


  Scenario: Assigning a static tag to a file shared by someone else as regular user does not belong to tag's group should fail
    Given group "hash#group" has been created
    And user "Alice" has been added to group "hash#group"
    And the administrator has created a "normal" tag with name "NormalTag"
    And the administrator has created a "static" tag with name "StaticTag" and groups "hash#group"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with user "Brian"
    And user "Alice" has added tag "NormalTag" to file "/myFileToTag.txt"
    When user "Brian" adds tag "StaticTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And file "/myFileToTag.txt" shared by user "Alice" should have the following tags
      | name      | type   |
      | NormalTag | normal |


  Scenario: Assigning a not user-visible tag to a file shared by someone else as admin user should work
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "not user-visible" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And user "Alice" has added tag "MyFirstTag" to file "/myFileToTag.txt"
    When the administrator adds tag "MySecondTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | name        | type             |
      | MyFirstTag  | normal           |
      | MySecondTag | not user-visible |
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name       | type   |
      | MyFirstTag | normal |


  Scenario: Assigning a not user-assignable tag to a file shared by someone else as admin user should work
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And the administrator has created a "not user-assignable" tag with name "MySecondTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    And user "Alice" has added tag "MyFirstTag" to file "/myFileToTag.txt"
    When the administrator adds tag "MySecondTag" to file "/myFileToTag.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And file "/myFileToTag.txt" should have the following tags for the administrator
      | name        | type                |
      | MyFirstTag  | normal              |
      | MySecondTag | not user-assignable |
    And file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name        | type                |
      | MyFirstTag  | normal              |
      | MySecondTag | not user-assignable |

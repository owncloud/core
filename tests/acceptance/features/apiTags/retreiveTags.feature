@api @systemtags-app-required
Feature: tags

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario: Getting tags only works with access to the file
    Given the administrator has created a "normal" tag with name "MyFirstTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has added tag "MyFirstTag" to file "/myFileToTag.txt"
    When user "Brian" requests tags for file "/myFileToTag.txt" owned by user "Alice" using the WebDAV API
    And user "Alice" gets the following properties of file "/myFileToTag.txt" using the WebDAV API
      | propertyName |
      | oc:tags      |
    Then the HTTP status code of responses on all endpoints should be "404"
    And the single response should contain a property "oc:tags" with value ""

  @files_sharing-app-required
  Scenario: Static tags should be available while accessing the file if it is assigned to file
    Given the administrator has created a "static" tag with name "StaticTag"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/myFileToTag.txt"
    And user "Alice" has shared file "/myFileToTag.txt" with the administrator
    When the administrator adds tag "StaticTag" to file "/myFileToTag.txt" using the WebDAV API
    Then file "/myFileToTag.txt" should have the following tags for user "Alice"
      | name      | type   |
      | StaticTag | static |
    And the HTTP status when user "Brian" requests tags for file "/myFileToTag.txt" owned by user "Alice" should be "404"

@api @skipOnOcis-OC-Storage
Feature: propagation of etags when restoring a version of a file

  Background:
    Given using OCS API version "2"
    And using new DAV path
    And user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: Restoring a file changes the etags of all parents
    Given user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/sub/file.txt"
    And user "Alice" has uploaded file with content "changed content" to "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" restores version index "1" of file "/upload/sub/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | element    |
      |            |
      | upload     |
      | upload/sub |

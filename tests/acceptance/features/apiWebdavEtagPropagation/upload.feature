@api @skipOnOcis-OC-Storage
Feature: propagation of etags when uploading data

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/upload"

  Scenario Outline: uploading a file inside a folder changes its etag
    Given using <dav_version> DAV path
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" uploads file with content "uploaded content" to "/upload/file.txt" using the WebDAV API
    Then the content of file "/upload/file.txt" for user "Alice" should be "uploaded content"
    And the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |

  Scenario Outline: overwriting a file inside a folder changes its etag
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" uploads file with content "new content" to "/upload/file.txt" using the WebDAV API
    Then the content of file "/upload/file.txt" for user "Alice" should be "new content"
    And the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element         |
      | old         |                 |
      | old         | upload          |
      | old         | upload/file.txt |
      | new         |                 |
      | new         | upload          |
      | new         | upload/file.txt |

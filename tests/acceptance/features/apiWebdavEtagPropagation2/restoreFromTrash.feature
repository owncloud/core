@api @skipOnOcis-OC-Storage
Feature: propagation of etags when restoring a file or folder from trash

  Background:
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/upload"

  Scenario Outline: restoring a file to its original location changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/sub/file.txt"
    And user "Alice" has deleted file "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" restores the file with original path "/upload/sub/file.txt" using the trashbin API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element    |
      | old         |            |
      | old         | upload     |
      | old         | upload/sub |
      | new         |            |
      | new         | upload     |
      | new         | upload/sub |

  Scenario Outline: restoring a file to an other location changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has created folder "/restore"
    And user "Alice" has created folder "/restore/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/sub/file.txt"
    And user "Alice" has deleted file "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" restores the file with original path "/upload/sub/file.txt" to "/restore/sub/file.txt" using the trashbin API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element     |
      | old         |             |
      | old         | restore     |
      | old         | restore/sub |
      | new         |             |
      | new         | restore     |
      | new         | restore/sub |

  Scenario Outline: restoring a folder to its original location changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has created folder "/upload/sub/toDelete"
    And user "Alice" has deleted folder "/upload/sub/toDelete"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" restores the folder with original path "/upload/sub/toDelete" using the trashbin API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element    |
      | old         |            |
      | old         | upload     |
      | old         | upload/sub |
      | new         |            |
      | new         | upload     |
      | new         | upload/sub |

  Scenario Outline: restoring a folder to an other location changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has created folder "/upload/sub/toDelete"
    And user "Alice" has deleted folder "/upload/sub/toDelete"
    And user "Alice" has created folder "/restore"
    And user "Alice" has created folder "/restore/sub"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" restores the folder with original path "/upload/sub/toDelete" to "/restore/sub/toDelete" using the trashbin API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element     |
      | old         |             |
      | old         | restore     |
      | old         | restore/sub |
      | new         |             |
      | new         | restore     |
      | new         | restore/sub |

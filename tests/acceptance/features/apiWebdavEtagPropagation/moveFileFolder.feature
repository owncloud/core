@api @skipOnOcis-OC-Storage
Feature: propagation of etags when moving files or folders

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: renaming a file inside a folder changes its etag
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" moves file "/upload/file.txt" to "/upload/renamed.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |

  Scenario Outline: moving a file from one folder to an other changes the etags of both folders
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/src"
    And user "Alice" has created folder "/dst"
    And user "Alice" has uploaded file with content "uploaded content" to "/src/file.txt"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" moves file "/src/file.txt" to "/dst/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | src     |
      | old         | dst     |
      | new         |         |
      | new         | src     |
      | new         | dst     |

  Scenario Outline: moving a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" moves file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element    |
      | old         |            |
      | old         | upload     |
      | old         | upload/sub |
      | new         |            |
      | new         | upload     |
      | new         | upload/sub |

  Scenario Outline: renaming a folder inside a folder changes its etag
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/src"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" moves folder "/upload/src" to "/upload/dst" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |

  Scenario Outline: moving a folder from one folder to an other changes the etags of both folders
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/src"
    And user "Alice" has created folder "/src/folder"
    And user "Alice" has created folder "/dst"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" moves folder "/src/folder" to "/dst/folder" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | src     |
      | old         | dst     |
      | new         |         |
      | new         | src     |
      | new         | dst     |

  Scenario Outline: moving a folder into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/folder"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" moves folder "/upload/folder" to "/upload/sub/folder" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element    |
      | old         |            |
      | old         | upload     |
      | old         | upload/sub |
      | new         |            |
      | new         | upload     |
      | new         | upload/sub |

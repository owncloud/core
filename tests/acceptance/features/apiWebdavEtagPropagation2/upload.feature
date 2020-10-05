@api @skipOnOcis-OC-Storage
Feature: propagation of etags when uploading data

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
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

  Scenario Outline: as share receiver uploading a file inside a received shared folder should update etags for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And using <dav_version> DAV path
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/upload/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |

  Scenario Outline: as sharer uploading a file inside a shared folder should update etags for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And using <dav_version> DAV path
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Alice" uploads file with content "uploaded content" to "/upload/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |

  Scenario Outline: as share receiver overwriting a file inside a received shared folder should update etags for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Brian" uploads file with content "new content" to "/Shares/upload/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |

  Scenario Outline: as sharer overwriting a file inside a shared folder should update etags for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Alice" uploads file with content "new content" to "/upload/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |

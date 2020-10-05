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

  Scenario Outline: as share receiver renaming a file inside a folder changes its etag for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Brian" moves file "/Shares/upload/file.txt" to "/Shares/upload/renamed.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |

  Scenario Outline: as sharer renaming a file inside a folder changes its etag for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Alice" moves file "/upload/file.txt" to "/upload/renamed.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | upload  |
      | new         |         |
      | new         | upload  |


  Scenario Outline: as sharer moving a file from one folder to an other changes the etags of both folders for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/src"
    And user "Alice" has created folder "/dst"
    And user "Alice" has uploaded file with content "uploaded content" to "/src/file.txt"
    And user "Alice" has shared folder "/src" with user "Brian"
    And user "Brian" has accepted share "/src" offered by user "Alice"
    And user "Alice" has shared folder "/dst" with user "Brian"
    And user "Brian" has accepted share "/dst" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Alice" moves file "/src/file.txt" to "/dst/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | src     |
      | old         | dst     |
      | new         |         |
      | new         | src     |
      | new         | dst     |

  Scenario Outline: as share receiver moving a file from one folder to an other changes the etags of both folders for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/src"
    And user "Alice" has created folder "/dst"
    And user "Alice" has uploaded file with content "uploaded content" to "/src/file.txt"
    And user "Alice" has shared folder "/src" with user "Brian"
    And user "Brian" has accepted share "/src" offered by user "Alice"
    And user "Alice" has shared folder "/dst" with user "Brian"
    And user "Brian" has accepted share "/dst" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Brian" moves file "/Shares/src/file.txt" to "/Shares/dst/file.txt" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | src     |
      | old         | dst     |
      | new         |         |
      | new         | src     |
      | new         | dst     |

  Scenario Outline: as sharer moving a folder from one folder to an other changes the etags of both folders for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/src"
    And user "Alice" has created folder "/dst"
    And user "Alice" has created folder "/src/toMove"
    And user "Alice" has shared folder "/src" with user "Brian"
    And user "Brian" has accepted share "/src" offered by user "Alice"
    And user "Alice" has shared folder "/dst" with user "Brian"
    And user "Brian" has accepted share "/dst" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Alice" moves folder "/src/toMove" to "/dst/toMove" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | src     |
      | old         | dst     |
      | new         |         |
      | new         | src     |
      | new         | dst     |

  Scenario Outline: as share receiver moving a folder from one folder to an other changes the etags of both folders for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/src"
    And user "Alice" has created folder "/dst"
    And user "Alice" has created folder "/src/toMove"
    And user "Alice" has shared folder "/src" with user "Brian"
    And user "Brian" has accepted share "/src" offered by user "Alice"
    And user "Alice" has shared folder "/dst" with user "Brian"
    And user "Brian" has accepted share "/dst" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Brian" moves folder "/Shares/src/toMove" to "/Shares/dst/toMove" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | src     |
      | old         | dst     |
      | new         |         |
      | new         | src     |
      | new         | dst     |

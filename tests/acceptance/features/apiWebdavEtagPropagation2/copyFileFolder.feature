@api @skipOnOcis-OC-Storage
Feature: propagation of etags when copying files or folders

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: copying a file does not changes its etag
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/file.txt"
    And user "Alice" has stored etag of element "/file.txt" on path "/renamedFile.txt"
    When user "Alice" copies file "/file.txt" to "/renamedFile.txt" using the WebDAV API
    Then these etags should not have changed:
      | user  | path      |
      | Alice | /file.txt |
    And these etags should have changed:
      | user  | path             |
      | Alice | /                |
      | Alice | /renamedFile.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: copying a file inside a folder changes its etag
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/folder"
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    And user "Alice" has stored etag of element "/file.txt"
    And user "Alice" has stored etag of element "/folder"
    And user "Alice" has stored etag of element "/file.txt" on path "/folder/renamedFile.txt"
    When user "Alice" copies file "/file.txt" to "/folder/renamedFile.txt" using the WebDAV API
    Then these etags should not have changed:
      | user  | path      |
      | Alice | /file.txt |
    And these etags should have changed:
      | user  | path                    |
      | Alice | /folder/renamedFile.txt |
      | Alice | /folder                 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: copying a file from one folder to an other changes the etags of destination
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/src"
    And user "Alice" has uploaded file with content "uploaded content" to "/src/file.txt"
    And user "Alice" has created folder "/dst"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/src"
    And user "Alice" has stored etag of element "/dst"
    When user "Alice" copies folder "/src/file.txt" to "/dst/file.txt" using the WebDAV API
    Then these etags should have changed:
      | user  | path |
      | Alice | /    |
      | Alice | /dst |
    And these etags should not have changed:
      | user  | path |
      | Alice | /src |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: copying a file inside a publicly shared folder by public changes etag for the sharer
    Given the administrator has enabled DAV tech_preview
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has created a public link share with settings
      | path        | upload |
      | permissions | change |
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/renamedFile.txt"
    When the public copies file "file.txt" to "/renamedFile.txt" using the new public WebDAV API
    Then these etags should have changed:
      | user  | path                    |
      | Alice | /                       |
      | Alice | /upload                 |
      | Alice | /upload/renamedFile.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: as share receiver copying a file inside a folder changes its etag for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/renamed.txt"
    And user "Brian" has stored etag of element "/"
    And user "Brian" has stored etag of element "/Shares"
    And user "Brian" has stored etag of element "/Shares/upload"
    And user "Brian" has stored etag of element "/Shares/upload/file.txt"
    And user "Brian" has stored etag of element "/Shares/upload/file.txt" on path "/Shares/upload/renamed.txt"
    When user "Brian" copies file "/Shares/upload/file.txt" to "/Shares/upload/renamed.txt" using the WebDAV API
    Then these etags should have changed:
      | user  | path                       |
      | Alice | /                          |
      | Alice | /upload                    |
      | Alice | /upload/renamed.txt        |
      | Brian | /                          |
      | Brian | /Shares                    |
      | Brian | /Shares/upload             |
      | Brian | /Shares/upload/renamed.txt |
    And these etags should not have changed:
      | user  | path                    |
      | Alice | /upload/file.txt        |
      | Brian | /Shares/upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: as sharer copying a file inside a folder changes its etag for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/renamed.txt"
    And user "Brian" has stored etag of element "/"
    And user "Brian" has stored etag of element "/Shares"
    And user "Brian" has stored etag of element "/Shares/upload"
    And user "Brian" has stored etag of element "/Shares/upload/file.txt"
    And user "Brian" has stored etag of element "/Shares/upload/file.txt" on path "/Shares/upload/renamed.txt"
    When user "Alice" copies file "/upload/file.txt" to "/upload/renamed.txt" using the WebDAV API
    Then these etags should have changed:
      | user  | path                       |
      | Alice | /                          |
      | Alice | /upload                    |
      | Alice | /upload/renamed.txt        |
      | Brian | /                          |
      | Brian | /Shares                    |
      | Brian | /Shares/upload             |
      | Brian | /Shares/upload/renamed.txt |
    And these etags should not have changed:
      | user  | path                    |
      | Alice | /upload/file.txt        |
      | Brian | /Shares/upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |
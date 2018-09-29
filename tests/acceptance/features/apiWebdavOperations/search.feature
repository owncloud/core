@api @TestAlsoOnExternalUserBackend
Feature: Search
  As a user
  I would like to be able to search for files
  So that I can find needed files quickly

  Background:
    Given user "user0" has been created
    And user "user0" has created a folder "/just-a-folder"
    And user "user0" has created a folder "/फनी näme"
    And user "user0" has uploaded file with content "does-not-matter" to "/upload.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/a-image.png"
    And user "user0" has uploaded file with content "does-not-matter" to "/just-a-folder/upload.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/just-a-folder/a-image.png"
    And user "user0" has uploaded file with content "does-not-matter" to "/just-a-folder/uploadÜठिF.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/फनी näme/upload.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/फनी näme/a-image.png"

  @smokeTest
  Scenario Outline: search for files by pattern
    Given using <dav_version> DAV path
    When user "user0" searches for "upload" using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result of "user0" should contain these files:
      | /upload.txt                   |
      | /just-a-folder/upload.txt     |
      | /just-a-folder/uploadÜठिF.txt |
      | /फनी näme/upload.txt          |
    But the search result of "user0" should not contain these files:
      | /a-image.png |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: search for files by extension
    Given using <dav_version> DAV path
    When user "user0" searches for "png" using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result of "user0" should contain these files:
      | /a-image.png               |
      | /just-a-folder/a-image.png |
      | /फनी näme/a-image.png      |
    But the search result of "user0" should not contain these files:
      | /upload.txt                   |
      | /just-a-folder/upload.txt     |
      | /just-a-folder/uploadÜठिF.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: limit returned search results
    Given using <dav_version> DAV path
    When user "user0" searches for "upload" and limits the results to "3" items using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result of "user0" should contain "3" files
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: report extra properties in search results
    Given using <dav_version> DAV path
    When user "user0" searches for "upload" using the WebDAV API requesting these properties:
      | oc:fileid             |
      | oc:permissions        |
      | a:getlastmodified     |
      | a:getetag             |
      | a:getcontenttype      |
      | oc:size               |
      | oc:owner-id           |
      | oc:owner-display-name |
      | oc:size               |
    Then the HTTP status code should be "207"
    And the file "/upload.txt" in the search result of "user0" should contain these properties:
      | name                                       | value                                                                                             |
      | {http://owncloud.org/ns}fileid             | \d*                                                                                               |
      | {http://owncloud.org/ns}permissions        | ^(RDNVW\|RMDNVW)$                                                                                 |
      | {DAV:}getlastmodified                      | ^[MTWFS][uedhfriatno]{2},\s(\d){2}\s[JFMAJSOND][anebrpyulgctov]{2}\s\d{4}\s\d{2}:\d{2}:\d{2} GMT$ |
      | {DAV:}getetag                              | ^\"[a-f0-9]{1,32}\"$                                                                              |
      | {DAV:}getcontenttype                       | text\/plain                                                                                       |
      | {http://owncloud.org/ns}size               | 15                                                                                                |
      | {http://owncloud.org/ns}owner-id           | user0                                                                                             |
      | {http://owncloud.org/ns}owner-display-name | User Zero                                                                                         |
    Examples:
      | dav_version |
      | old         |
      | new         |
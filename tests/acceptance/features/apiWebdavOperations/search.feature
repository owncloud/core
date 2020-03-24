@api @TestAlsoOnExternalUserBackend @skipOnOcis @issue-ocis-reva-39
Feature: Search
  As a user
  I would like to be able to search for files
  So that I can find needed files quickly

  Background:
    Given user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/just-a-folder"
    And user "user0" has created folder "/फनी näme"
    And user "user0" has created folder "/upload folder"
    And user "user0" has created folder "/upload😀 😁"
    And user "user0" has uploaded file with content "does-not-matter" to "/upload.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/a-image.png"
    And user "user0" has uploaded file with content "does-not-matter" to "/just-a-folder/upload.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/just-a-folder/lolol.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/just-a-folder/a-image.png"
    And user "user0" has uploaded file with content "does-not-matter" to "/just-a-folder/uploadÜठिF.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/फनी näme/upload.txt"
    And user "user0" has uploaded file with content "does-not-matter" to "/फनी näme/a-image.png"
    And user "user0" has uploaded file with content "does-not-matter" to "/upload😀 😁/upload😀 😁.txt"

  @smokeTest
  Scenario Outline: search for entry by pattern
    Given using <dav_version> DAV path
    When user "user0" searches for "upload" using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result of user "user0" should contain these entries:
      | /upload.txt                   |
      | /just-a-folder/upload.txt     |
      | /upload folder                |
      | /just-a-folder/uploadÜठिF.txt |
      | /फनी näme/upload.txt          |
      | /upload😀 😁                  |
      | /upload😀 😁/upload😀 😁.txt  |
    But the search result of user "user0" should not contain these entries:
      | /a-image.png |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: search for entries by only some letters from the middle of the entry name
    Given using <dav_version> DAV path
    When user "user0" searches for "ol" using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result should contain "4" entries
    And the search result of user "user0" should contain these entries:
      | /just-a-folder           |
      | /upload folder           |
      | /FOLDER                  |
      | /just-a-folder/lolol.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: search for files by extension
    Given using <dav_version> DAV path
    When user "user0" searches for "png" using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result of user "user0" should contain these entries:
      | /a-image.png               |
      | /just-a-folder/a-image.png |
      | /फनी näme/a-image.png      |
    But the search result of user "user0" should not contain these entries:
      | /upload.txt                   |
      | /just-a-folder/upload.txt     |
      | /just-a-folder/uploadÜठिF.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: search with empty field
    Given using <dav_version> DAV path
    When user "user0" searches for "" using the WebDAV API
    Then the HTTP status code should be "400"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: limit returned search entries
    Given using <dav_version> DAV path
    When user "user0" searches for "upload" and limits the results to "3" items using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result of user "user0" should contain any "3" of these entries:
      | /just-a-folder/upload.txt     |
      | /just-a-folder/uploadÜठिF.txt |
      | /upload folder                |
      | /upload.txt                   |
      | /फनी näme/upload.txt          |
      | /upload😀 😁                  |
      | /upload😀 😁/upload😀 😁.txt  |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: limit returned search entries to only 1 entry
    Given using <dav_version> DAV path
    When user "user0" searches for "upload" and limits the results to "1" items using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result of user "user0" should contain any "1" of these entries:
      | /just-a-folder/upload.txt     |
      | /just-a-folder/uploadÜठिF.txt |
      | /upload folder                |
      | /upload.txt                   |
      | /फनी näme/upload.txt          |
      | /upload😀 😁                  |
      | /upload😀 😁/upload😀 😁.txt  |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: limit returned search entries to more entires than there are
    Given using <dav_version> DAV path
    When user "user0" searches for "upload" and limits the results to "100" items using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result should contain "7" entries
    And the search result of user "user0" should contain these entries:
      | /upload.txt                   |
      | /just-a-folder/upload.txt     |
      | /upload folder                |
      | /just-a-folder/uploadÜठिF.txt |
      | /फनी näme/upload.txt          |
      | /upload😀 😁                  |
      | /upload😀 😁/upload😀 😁.txt  |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: report extra properties in search entries for a file
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
    And file "/upload.txt" in the search result of user "user0" should contain these properties:
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

  Scenario Outline: report extra properties in search entries for a folder
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
    And folder "/upload folder" in the search result of user "user0" should contain these properties:
      | name                                       | value                                                                                             |
      | {http://owncloud.org/ns}fileid             | \d*                                                                                               |
      | {http://owncloud.org/ns}permissions        | ^(RDNVCK\|RMDNVCK)$                                                                               |
      | {DAV:}getlastmodified                      | ^[MTWFS][uedhfriatno]{2},\s(\d){2}\s[JFMAJSOND][anebrpyulgctov]{2}\s\d{4}\s\d{2}:\d{2}:\d{2} GMT$ |
      | {DAV:}getetag                              | ^\"[a-f0-9]{1,32}\"$                                                                              |
      | {http://owncloud.org/ns}size               | 0                                                                                                 |
      | {http://owncloud.org/ns}owner-id           | user0                                                                                             |
      | {http://owncloud.org/ns}owner-display-name | User Zero                                                                                         |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: search for entry with emoji by pattern
    Given using <dav_version> DAV path
    When user "user0" searches for "😀 😁" using the WebDAV API
    Then the HTTP status code should be "207"
    And the search result of user "user0" should contain these entries:
      | /upload😀 😁                 |
      | /upload😀 😁/upload😀 😁.txt |
    But the search result of user "user0" should not contain these entries:
      | /a-image.png                  |
      | /upload.txt                   |
      | /just-a-folder/upload.txt     |
      | /upload folder                |
      | /just-a-folder/uploadÜठिF.txt |
      | /फनी näme/upload.txt          |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario: search for entry by tags using REPORT method
    Given user "user0" has created a "normal" tag with name "JustARegularTag1"
    And user "user0" has created a "normal" tag with name "JustARegularTag2"
    And user "user0" has added tag "JustARegularTag1" to folder "फनी näme"
    And user "user0" has added tag "JustARegularTag1" to file "upload.txt"
    And user "user0" has added tag "JustARegularTag2" to file "upload.txt"
    When user "user0" searches for tag "JustARegularTag1" using the webDAV API
    Then the HTTP status code should be "207"
    And the search result by tags for user "user0" should contain these entries:
      | फनी näme   |
      | upload.txt |
    When user "user0" searches for tag "JustARegularTag2" using the webDAV API
    Then the HTTP status code should be "207"
    And the search result by tags for user "user0" should contain these entries:
      | upload.txt |

  Scenario: share a tagged resource to another internal user and sharee search for tag using REPORT method
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created a "normal" tag with name "JustARegularTag1"
    And user "user0" has created a "normal" tag with name "JustARegularTag2"
    And user "user0" has added tag "JustARegularTag1" to folder "फनी näme"
    And user "user0" has added tag "JustARegularTag1" to file "upload.txt"
    And user "user0" has added tag "JustARegularTag2" to file "upload.txt"
    And user "user0" has shared file "फनी näme" with user "user1"
    And user "user0" has shared file "upload.txt" with user "user1"
    When user "user1" searches for tag "JustARegularTag1" using the webDAV API
    Then the HTTP status code should be "207"
    And the search result by tags for user "user1" should contain these entries:
      | फनी näme   |
      | upload.txt |
    When user "user1" searches for tag "JustARegularTag2" using the webDAV API
    Then the HTTP status code should be "207"
    And the search result by tags for user "user1" should contain these entries:
      | upload.txt |
    When user "user1" searches for following tag using the webDAV API
      | JustARegularTag1 |
      | JustARegularTag2 |
    Then the HTTP status code should be "207"
    And as user "user1" the response should contain file "upload.txt"
    And as user "user1" the response should not contain file "फनी näme"

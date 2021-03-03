@api @skipOnOcV10
Feature: checksums

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: Uploading a file with checksum should work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    When user "Alice" uploads file with checksum "<checksum>" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textFile.txt" for user "Alice" should be "12345"
    Examples:
      | dav_version | checksum                                      |
      | old         | MD5 827ccb0eea8a706c4c34a16891f84e7b          |
      | new         | MD5 827ccb0eea8a706c4c34a16891f84e7b          |
      | old         | SHA1 8cb2237d0679ca88db6464eac60da96345513964 |
      | new         | SHA1 8cb2237d0679ca88db6464eac60da96345513964 |

  Scenario Outline: Uploading a file with checksum should return the checksum in the propfind
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    When user "Alice" uploads file with checksum "MD5 827ccb0eea8a706c4c34a16891f84e7b" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    And user "Alice" requests the checksum of "/textFile.txt" via propfind
    Then the webdav checksum should match "SHA1:8cb2237d0679ca88db6464eac60da96345513964 MD5:827ccb0eea8a706c4c34a16891f84e7b ADLER32:02f80100"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Uploading a file with checksum should return the checksum in the download header
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded file with checksum "MD5 827ccb0eea8a706c4c34a16891f84e7b" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    When user "Alice" downloads file "/textFile.txt" using the WebDAV API
    Then the header checksum should match "SHA1:8cb2237d0679ca88db6464eac60da96345513964"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading a file with incorrect checksum should not work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    When user "Alice" uploads file with checksum "<incorrect_checksum>" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "406"
    And as "Alice" file "textFile.txt" should not exist
    Examples:
      | dav_version | incorrect_checksum                            |
      | old         | MD5 827ccb0eea8a706c4c34a16891f84e7a          |
      | new         | MD5 827ccb0eea8a706c4c34a16891f84e7a          |
      | old         | SHA1 8cb2237d0679ca88db6464eac60da96345513963 |
      | new         | SHA1 8cb2237d0679ca88db6464eac60da96345513963 |

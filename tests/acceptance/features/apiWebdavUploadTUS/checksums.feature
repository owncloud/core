@api @skipOnOcV10
Feature: checksums

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: Uploading a file with checksum should work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
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
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    When user "Alice" uploads file with checksum "MD5 827ccb0eea8a706c4c34a16891f84e7b" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    And user "Alice" requests the checksum of "/textFile.txt" via propfind
    Then the HTTP status code should be "207"
    And the webdav checksum should match "SHA1:8cb2237d0679ca88db6464eac60da96345513964 MD5:827ccb0eea8a706c4c34a16891f84e7b ADLER32:02f80100"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading a file with checksum should return the checksum in the download header
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded file with checksum "MD5 827ccb0eea8a706c4c34a16891f84e7b" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    When user "Alice" downloads file "/textFile.txt" using the WebDAV API
    Then the HTTP status code should be "200"
    And the header checksum should match "SHA1:8cb2237d0679ca88db6464eac60da96345513964"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading a file with incorrect checksum should not work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
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


  Scenario Outline: Uploading a chunked file with correct checksum should work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 10                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    When user "Alice" sends a chunk to the last created TUS Location with offset "0" and data "01234" with checksum "MD5 4100c4d44da9177247e44a5fc1546778" using the TUS protocol on the WebDAV API
    And user "Alice" sends a chunk to the last created TUS Location with offset "5" and data "56789" with checksum "MD5 099ebea48ea9666a7da2177267983138" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textFile.txt" for user "Alice" should be "0123456789"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading a chunked file with correct checksum should return the checksum in the propfind
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 10                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded a chunk to the last created TUS Location with offset "0" and data "01234" with checksum "MD5 4100c4d44da9177247e44a5fc1546778" using the TUS protocol on the WebDAV API
    And user "Alice" has uploaded a chunk to the last created TUS Location with offset "5" and data "56789" with checksum "MD5 099ebea48ea9666a7da2177267983138" using the TUS protocol on the WebDAV API
    When user "Alice" requests the checksum of "/textFile.txt" via propfind
    Then the HTTP status code should be "207"
    And the webdav checksum should match "SHA1:87acec17cd9dcd20a716cc2cf67417b71c8a7016 MD5:781e5e245d69b566979b86e28d23f2c7 ADLER32:0aff020e"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading a chunked file with checksum should return the checksum in the download header
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 10                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded a chunk to the last created TUS Location with offset "0" and data "01234" with checksum "MD5 4100c4d44da9177247e44a5fc1546778" using the TUS protocol on the WebDAV API
    And user "Alice" has uploaded a chunk to the last created TUS Location with offset "5" and data "56789" with checksum "MD5 099ebea48ea9666a7da2177267983138" using the TUS protocol on the WebDAV API
    When user "Alice" downloads file "/textFile.txt" using the WebDAV API
    Then the HTTP status code should be "200"
    And the header checksum should match "SHA1:87acec17cd9dcd20a716cc2cf67417b71c8a7016"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading second chunk of file with incorrect checksum should not work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 10                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    When user "Alice" sends a chunk to the last created TUS Location with offset "0" and data "01234" with checksum "MD5 4100c4d44da9177247e44a5fc1546799" using the TUS protocol on the WebDAV API
    And user "Alice" sends a chunk to the last created TUS Location with offset "5" and data "56789" with checksum "MD5 781e5e245d69b566979b86e28d23f2c7" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "409"
    And as "Alice" file "textFile.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Uploading a file with correct checksum and overwriting an existing file should return the checksum for new data in the propfind
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 10                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded a chunk to the last created TUS Location with offset "0" and data "01234" with checksum "MD5 4100c4d44da9177247e44a5fc1546778" using the TUS protocol on the WebDAV API
    And user "Alice" has uploaded a chunk to the last created TUS Location with offset "5" and data "56789" with checksum "MD5 099ebea48ea9666a7da2177267983138" using the TUS protocol on the WebDAV API
    When user "Alice" overwrites existing file with offset "0" and data "hello" with checksum "<overwriteChecksum>" using the TUS protocol on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" requests the checksum of "/textFile.txt" via propfind
    Then the HTTP status code should be "207"
    And the webdav checksum should match "SHA1:aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d MD5:5d41402abc4b2a76b9719d911017c592 ADLER32:062c0215"
    And the content of file "/textFile.txt" for user "Alice" should be "hello"
    Examples:
      | dav_version | overwriteChecksum                             |
      | old         | MD5 5d41402abc4b2a76b9719d911017c592          |
      | new         | MD5 5d41402abc4b2a76b9719d911017c592          |
      | old         | SHA1 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d |
      | new         | SHA1 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d |


  Scenario Outline: Uploading a file with correct checksum and overwriting an existing file with invalid checksum should not work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 10                        |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded a chunk to the last created TUS Location with offset "0" and data "01234" with checksum "MD5 4100c4d44da9177247e44a5fc1546778" using the TUS protocol on the WebDAV API
    And user "Alice" has uploaded a chunk to the last created TUS Location with offset "5" and data "56789" with checksum "MD5 099ebea48ea9666a7da2177267983138" using the TUS protocol on the WebDAV API
    When user "Alice" overwrites existing file with offset "0" and data "hello" with checksum "<overwriteInvalidChecksum>" using the TUS protocol on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    Then the HTTP status code should be "406"
    And the content of file "/textFile.txt" for user "Alice" should be "0123456789"
    Examples:
      | dav_version | overwriteInvalidChecksum                      |
      | old         | MD5 5d41402abc4b2a76b9719d911017c593          |
      | new         | MD5 5d41402abc4b2a76b9719d911017c593          |
      | old         | SHA1 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434a |
      | new         | SHA1 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434a |


  Scenario Outline: Overwriting an existing file with new data and checksum should return the checksum of new data in the propfind
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded file with checksum "MD5 827ccb0eea8a706c4c34a16891f84e7b" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    When user "Alice" overwrites existing file with offset "0" and data "hello" with checksum "<overwriteChecksum>" using the TUS protocol on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" requests the checksum of "/textFile.txt" via propfind
    Then the HTTP status code should be "207"
    And the webdav checksum should match "SHA1:aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d MD5:5d41402abc4b2a76b9719d911017c592 ADLER32:062c0215"
    And the content of file "/textFile.txt" for user "Alice" should be "hello"
    Examples:
      | dav_version | overwriteChecksum                             |
      | old         | MD5 5d41402abc4b2a76b9719d911017c592          |
      | new         | MD5 5d41402abc4b2a76b9719d911017c592          |
      | old         | SHA1 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d |
      | new         | SHA1 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d |


  Scenario Outline: Overwriting an existing file with new data and invalid checksum should not work
    Given using <dav_version> DAV path
    And user "Alice" has created a new TUS resource on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    And user "Alice" has uploaded file with checksum "MD5 827ccb0eea8a706c4c34a16891f84e7b" to the last created TUS Location with offset "0" and content "12345" using the TUS protocol on the WebDAV API
    When user "Alice" overwrites existing file with offset "0" and data "hello" with checksum "<overwriteChecksum>" using the TUS protocol on the WebDAV API with these headers:
      | Upload-Length   | 5                         |
      #    dGV4dEZpbGUudHh0 is the base64 encode of textFile.txt
      | Upload-Metadata | filename dGV4dEZpbGUudHh0 |
    Then the HTTP status code should be "406"
    And the content of file "/textFile.txt" for user "Alice" should be "12345"
    Examples:
      | dav_version | overwriteChecksum                             |
      | old         | MD5 5d41402abc4b2a76b9719d911017c593          |
      | new         | MD5 5d41402abc4b2a76b9719d911017c593          |
      | old         | SHA1 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434a |
      | new         | SHA1 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434a |

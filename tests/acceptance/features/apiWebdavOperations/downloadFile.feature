@api
Feature: download file
  As a user
  I want to be able to download files
  So that I can work wih local copies of files on my client system

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "Welcome this is just an example file for developers." to "/welcome.txt"

  @smokeTest
  Scenario Outline: download a file
    Given using <dav_version> DAV path
    When user "Alice" downloads file "/textfile0.txt" using the WebDAV API
    Then the downloaded content should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-12
  Scenario Outline: download a file with range
    Given using <dav_version> DAV path
    When user "Alice" downloads file "/welcome.txt" with range "bytes=24-50" using the WebDAV API
    Then the downloaded content should be "example file for developers"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: download a file larger than 4MB (ref: https://github.com/sabre-io/http/pull/119 )
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "/file9000000.txt" ending with "text at end of file" of size 9000000 bytes
    When user "Alice" downloads file "/file9000000.txt" using the WebDAV API
    Then the size of the downloaded file should be 9000000 bytes
    And the downloaded content should end with "text at end of file"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest @skipOnOcV10.5 @skipOnOcV10.6.0
  Scenario Outline: Downloading a file should serve security headers
    Given using <dav_version> DAV path
    When user "Alice" downloads file "/welcome.txt" using the WebDAV API
    Then the following headers should be set
      | header                            | value                                                            |
      | Content-Disposition               | attachment; filename*=UTF-8''welcome.txt; filename="welcome.txt" |
      | Content-Security-Policy           | default-src 'none';                                              |
      | X-Content-Type-Options            | nosniff                                                          |
      | X-Download-Options                | noopen                                                           |
      | X-Frame-Options                   | SAMEORIGIN                                                       |
      | X-Permitted-Cross-Domain-Policies | none                                                             |
      | X-Robots-Tag                      | none                                                             |
      | X-XSS-Protection                  | 0                                                                |
    And the downloaded content should start with "Welcome"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Doing a GET with a web login should work without CSRF token on the new backend
    Given using <dav_version> DAV path
    And user "Alice" has logged in to a web-style session
    When the client sends a "GET" to "/remote.php/dav/files/%username%/welcome.txt" of user "Alice" without requesttoken
    Then the downloaded content should start with "Welcome"
    And the HTTP status code should be "200"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Doing a GET with a web login should work with CSRF token on the new backend
    Given using <dav_version> DAV path
    And user "Alice" has logged in to a web-style session
    When the client sends a "GET" to "/remote.php/dav/files/%username%/welcome.txt" of user "Alice" with requesttoken
    Then the downloaded content should start with "Welcome"
    And the HTTP status code should be "200"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario: Get the size of a file
    Given user "Alice" has uploaded file with content "This is a test file" to "test-file.txt"
    When user "Alice" gets the size of file "test-file.txt" using the WebDAV API
    Then the HTTP status code should be "207"
    And the size of the file should be "19"

  @issue-ocis-reva-98
  Scenario Outline: Get the content-length response header of a pdf file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/simple.pdf" to "/simple.pdf"
    When user "Alice" downloads file "/simple.pdf" using the WebDAV API
    Then the following headers should be set
      | header         | value |
      | Content-Length | 9622  |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-98
  Scenario Outline: Get the content-length response header of an image file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/testavatar.png" to "/testavatar.png"
    When user "Alice" downloads file "/testavatar.png" using the WebDAV API
    Then the following headers should be set
      | header         | value |
      | Content-Length | 35323 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Download a file with comma in the filename
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "file with comma in filename" to <filename>
    When user "Alice" downloads file <filename> using the WebDAV API
    Then the downloaded content should be "file with comma in filename"
    Examples:
      | dav_version | filename       |
      | old         | "sample,1.txt" |
      | old         | ",,,.txt"      |
      | old         | ",,,.,"        |
      | new         | "sample,1.txt" |
      | new         | ",,,.txt"      |
      | new         | ",,,.,"        |

  Scenario Outline: download a file with single part ranges
    Given using <dav_version> DAV path
    When user "Alice" downloads file "/welcome.txt" with range "bytes=0-51" using the WebDAV API
    Then the HTTP status code should be "206"
    And the following headers should be set
      | header         | value         |
      | Content-Length | 52            |
      | Content-Range  | bytes 0-51/52 |
    And the downloaded content should be "Welcome this is just an example file for developers."
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: download a file with multipart ranges
    Given using <dav_version> DAV path
    When user "Alice" downloads file "/welcome.txt" with range "bytes=0-6, 40-51" using the WebDAV API
    Then the HTTP status code should be "206" or "200"
    And if the HTTP status code was "206" then the following headers should match these regular expressions
      | Content-Length | /\d+/                                               |
      | Content-Type   | /^multipart\/byteranges; boundary=[a-zA-Z0-9_.-]*$/ |
    And if the HTTP status code was "206" then the downloaded content for multipart byterange should be:
      """
      Content-type: text/plain;charset=UTF-8
      Content-range: bytes 0-6/52

      Welcome

      Content-type: text/plain;charset=UTF-8
      Content-range: bytes 40-51/52

      developers.
      """
    But if the HTTP status code was "200" then the downloaded content should be "Welcome this is just an example file for developers."
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: download a file with last byte range out of bounds
    Given using <dav_version> DAV path
    When user "Alice" downloads file "/welcome.txt" with range "bytes=0-55" using the WebDAV API
    Then the HTTP status code should be "206"
    And the downloaded content should be "Welcome this is just an example file for developers."
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: download a range at the end of a file
    Given using <dav_version> DAV path
    When user "Alice" downloads file "/welcome.txt" with range "bytes=-11" using the WebDAV API
    Then the HTTP status code should be "206"
    And the downloaded content should be "developers."
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: download a file with range out of bounds
    Given using <dav_version> DAV path
    When user "Alice" downloads file "/welcome.txt" with range "bytes=55-60" using the WebDAV API
    Then the HTTP status code should be "416"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: download a hidden file
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded file with content "I am a hidden file" to "<path>"
    When user "Alice" downloads file "<path>" using the WebDAV API
    Then the downloaded content should be "I am a hidden file"
    Examples:
      | dav_version | path                 |
      | old         | .hidden_file         |
      | old         | /FOLDER/.hidden_file |
      | new         | .hidden_file         |
      | new         | /FOLDER/.hidden_file |
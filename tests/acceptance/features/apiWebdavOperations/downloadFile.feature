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

  @skipOnOcis @issue-ocis-reva-12
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

  @smokeTest
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
      | X-XSS-Protection                  | 1; mode=block                                                    |
    And the downloaded content should start with "Welcome"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis
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

  @skipOnOcis
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

  @skipOnOcis-EOS-Storage @issue-ocis-reva-98
  Scenario Outline: Get the content-length response header of a pdf file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/simple.pdf" to "/simple.pdf"
    When user "Alice" downloads file "/simple.pdf" using the WebDAV API
    Then the following headers should be set
      | header           | value   |
      | Content-Length   | 9622    |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis-EOS-Storage @issue-ocis-reva-98
  Scenario Outline: Get the content-length response header of an image file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/testavatar.png" to "/testavatar.png"
    When user "Alice" downloads file "/testavatar.png" using the WebDAV API
    Then the following headers should be set
      | header             | value  |
      | Content-Length     | 35323  |
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

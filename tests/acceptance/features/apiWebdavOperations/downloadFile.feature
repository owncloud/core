@api @TestAlsoOnExternalUserBackend
Feature: download file
  As a user
  I want to be able to download files
  So that I can work wih local copies of files on my client system

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: download a file
    Given using <dav_version> DAV path
    When user "user0" downloads file "/textfile0.txt" using the WebDAV API
    Then the downloaded content should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: download a file with range
    Given using <dav_version> DAV path
    When user "user0" downloads file "/welcome.txt" with range "bytes=51-77" using the WebDAV API
    Then the downloaded content should be "example file for developers"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @public_link_share-feature-required
  Scenario: download a public shared file with range
    When user "user0" creates a public link share using the sharing API with settings
      | path | welcome.txt |
    And the public downloads the last public shared file with range "bytes=51-77" using the public WebDAV API
    Then the downloaded content should be "example file for developers"

  @public_link_share-feature-required
  Scenario: download a public shared file inside a folder with range
    When user "user0" creates a public link share using the sharing API with settings
      | path | PARENT |
    And the public downloads file "/parent.txt" from inside the last public shared folder with range "bytes=1-7" using the public WebDAV API
    Then the downloaded content should be "wnCloud"

  @smokeTest
  Scenario Outline: Downloading a file should serve security headers
    Given using <dav_version> DAV path
    When user "user0" downloads file "/welcome.txt" using the WebDAV API
    Then the following headers should be set
      | Content-Disposition               | attachment; filename*=UTF-8''welcome.txt; filename="welcome.txt" |
      | Content-Security-Policy           | default-src 'none';                                              |
      | X-Content-Type-Options            | nosniff                                                          |
      | X-Download-Options                | noopen                                                           |
      | X-Frame-Options                   | SAMEORIGIN                                                       |
      | X-Permitted-Cross-Domain-Policies | none                                                             |
      | X-Robots-Tag                      | none                                                             |
      | X-XSS-Protection                  | 1; mode=block                                                    |
    And the downloaded content should start with "Welcome to your ownCloud account!"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Doing a GET with a web login should work without CSRF token on the new backend
    Given using <dav_version> DAV path
    And user "user0" has logged in to a web-style session
    When the client sends a "GET" to "/remote.php/dav/files/user0/welcome.txt" without requesttoken
    Then the downloaded content should start with "Welcome to your ownCloud account!"
    And the HTTP status code should be "200"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Doing a GET with a web login should work with CSRF token on the new backend
    Given using <dav_version> DAV path
    And user "user0" has logged in to a web-style session
    When the client sends a "GET" to "/remote.php/dav/files/user0/welcome.txt" with requesttoken
    Then the downloaded content should start with "Welcome to your ownCloud account!"
    And the HTTP status code should be "200"
    Examples:
      | dav_version |
      | old         |
      | new         |

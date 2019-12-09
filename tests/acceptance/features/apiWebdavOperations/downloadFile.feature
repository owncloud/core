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

  Scenario Outline: download a file larger than 4MB (ref: https://github.com/sabre-io/http/pull/119 )
    Given using <dav_version> DAV path
    And user "user0" has uploaded file "/file9000000.txt" ending with "text at end of file" of size 9000000 bytes
    When user "user0" downloads file "/file9000000.txt" using the WebDAV API
    Then the size of the downloaded file should be 9000000 bytes
    And the downloaded content should end with "text at end of file"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: download a public shared file with range
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path | welcome.txt |
    When the public downloads the last public shared file with range "bytes=51-77" using the old public WebDAV API
    Then the downloaded content should be "example file for developers"
    When the public downloads the last public shared file with range "bytes=59-77" using the new public WebDAV API
    Then the downloaded content should be "file for developers"

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: download a public shared file inside a folder with range
    Given the administrator has enabled DAV tech_preview
    When user "user0" creates a public link share using the sharing API with settings
      | path | PARENT |
    And the public downloads file "/parent.txt" from inside the last public shared folder with range "bytes=1-7" using the old public WebDAV API
    Then the downloaded content should be "wnCloud"
    When the public downloads file "/parent.txt" from inside the last public shared folder with range "bytes=2-7" using the new public WebDAV API
    Then the downloaded content should be "nCloud"

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

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: download a public shared file with correct password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path     | welcome.txt |
      | password | newpasswd   |
    When the public downloads the last public shared file with range "bytes=51-77" and password "newpasswd" using the new public WebDAV API
    Then the downloaded content should be "example file for developers"
    And the HTTP status code should be "206"
    When the public downloads the last public shared file with range "bytes=51-77" and password "newpasswd" using the old public WebDAV API
    Then the downloaded content should be "example file for developers"
    And the HTTP status code should be "206"

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: download a public shared file with wrong password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path     | welcome.txt |
      | password | newpasswd   |
    When the public downloads the last public shared file with password "wrongpasswd" using the new public WebDAV API
    Then the value of the item "//s:message" in the response should match "/Username or password was incorrect/"
    And the HTTP status code should be "401"
    When the public downloads the last public shared file with password "wrongpasswd" using the old public WebDAV API
    Then the value of the item "//s:message" in the response should be "Cannot authenticate over ajax calls"
    And the HTTP status code should be "401"

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: download a public shared file without password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path     | welcome.txt |
      | password | newpasswd   |
    When the public downloads the last public shared file using the new public WebDAV API
    Then the value of the item "//s:message" in the response should match "/No 'Authorization: Basic' header found/"
    And the HTTP status code should be "401"
    When the public downloads the last public shared file with password "" using the old public WebDAV API
    Then the value of the item "//s:message" in the response should be "Cannot authenticate over ajax calls"
    And the HTTP status code should be "401"

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: try to download from a public share that has upload only permissions
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | PARENT          |
      | permissions | uploadwriteonly |
    When the public downloads file "parent.txt" from inside the last public shared folder using the new public WebDAV API
    Then the value of the item "//s:message" in the response should be "File not found: parent.txt"
    And the HTTP status code should be "404"
    When the public downloads file "parent.txt" from inside the last public shared folder using the old public WebDAV API
    Then the value of the item "//s:message" in the response should be ""
    And the HTTP status code should be "404"

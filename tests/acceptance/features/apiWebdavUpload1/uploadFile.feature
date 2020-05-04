@api @TestAlsoOnExternalUserBackend
Feature: upload file
  As a user
  I want to be able to upload files
  So that I can store and share files between multiple client systems

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: upload a file and check download content
    Given using <dav_version> DAV path
    When user "Alice" uploads file with content "uploaded content" to "<file_name>" using the WebDAV API
    Then the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9]{1,32}"$/ |
    And the content of file "<file_name>" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version | file_name         |
      | old         | /upload.txt       |
      | old         | /नेपाली.txt       |
      | old         | /strängé file.txt |
      | new         | /upload.txt       |
      | new         | /strängé file.txt |
      | new         | /नेपाली.txt       |

  Scenario Outline: upload a file and check download content
    Given using <dav_version> DAV path
    When user "Alice" uploads file with content "uploaded content" to <file_name> using the WebDAV API
    Then the content of file <file_name> for user "Alice" should be "uploaded content"
    Examples:
      | dav_version | file_name           |
      | old         | "C++ file.cpp"      |
      | old         | "file #2.txt"       |
      | old         | "file ?2.txt"       |
      | old         | " ?fi=le&%#2 . txt" |
      | old         | " # %ab ab?=ed "    |
      | new         | "C++ file.cpp"      |
      | new         | "file #2.txt"       |
      | new         | "file ?2.txt"       |
      | new         | " ?fi=le&%#2 . txt" |
      | new         | " # %ab ab?=ed "    |

  Scenario Outline: upload a file into a folder and check download content
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    When user "Alice" uploads file with content "uploaded content" to "<folder_name>/<file_name>" using the WebDAV API
    Then the content of file "<folder_name>/<file_name>" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version | folder_name                      | file_name                     |
      | old         | /upload                          | abc.txt                       |
      | old         | /strängé folder                  | strängé file.txt              |
      | old         | /C++ folder                      | C++ file.cpp                  |
      | old         | /नेपाली                          | नेपाली                        |
      | old         | /folder #2.txt                   | file #2.txt                   |
      | old         | /folder ?2.txt                   | file ?2.txt                   |
      | old         | /?fi=le&%#2 . txt                | # %ab ab?=ed                  |
      | new         | /upload                          | abc.txt                       |
      | new         | /strängé folder (duplicate #2 &) | strängé file (duplicate #2 &) |
      | new         | /C++ folder                      | C++ file.cpp                  |
      | new         | /नेपाली                          | नेपाली                        |
      | new         | /folder #2.txt                   | file #2.txt                   |
      | new         | /folder ?2.txt                   | file ?2.txt                   |
      | new         | /?fi=le&%#2 . txt                | # %ab ab?=ed                  |

  @skipOnOcis @issue-ocis-reva-15
  Scenario Outline: Uploading file to path with extension .part should not be possible
    Given using <dav_version> DAV path
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/textfile.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "Alice" should not see the following elements
      | /textfile.part |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: upload a file into a folder with dots in the path and check download content
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    When user "Alice" uploads file with content "uploaded content for file name ending with a dot" to "<folder_name>/<file_name>" using the WebDAV API
    Then as "Alice" file "/<folder_name>/<file_name>" should exist
    And the content of file "<folder_name>/<file_name>" for user "Alice" should be "uploaded content for file name ending with a dot"
    Examples:
      | dav_version | folder_name   | file_name   |
      | old         | /upload.      | abc.        |
      | old         | /upload.      | abc .       |
      | old         | /upload.1     | abc.txt     |
      | old         | /upload...1.. | abc...txt.. |
      | old         | /...          | ...         |
      | new         | /..upload     | ..abc       |
      | new         | /upload.      | abc.        |
      | new         | /upload.      | abc .       |
      | new         | /upload.1     | abc.txt     |
      | new         | /upload...1.. | abc...txt.. |
      | new         | /...          | ...         |

@api @TestAlsoOnExternalUserBackend
Feature: upload file
  As a user
  I want to be able to upload files
  So that I can store and share files between multiple client systems

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes

  @smokeTest
  Scenario Outline: upload a file and check download content
    Given using <dav_version> DAV path
    When user "user0" uploads file with content "uploaded content" to "<file_name>" using the WebDAV API
    Then the content of file "<file_name>" for user "user0" should be "uploaded content"
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
    When user "user0" uploads file with content "uploaded content" to "<file_name>" using the WebDAV API
    Then the content of file "<file_name>" for user "user0" should be "uploaded content"
    Examples:
      | dav_version | file_name     |
      | old         | /C++ file.cpp |
      | old         | /file #2.txt  |
      | old         | /file ?2.txt  |
      | new         | /C++ file.cpp |
      | new         | /file #2.txt  |
      | new         | /file ?2.txt  |

  Scenario Outline: upload a file into a folder and check download content
    Given using <dav_version> DAV path
    And user "user0" has created a folder "<folder_name>"
    When user "user0" uploads file with content "uploaded content" to "<folder_name>/<file_name>" using the WebDAV API
    Then the content of file "<folder_name>/<file_name>" for user "user0" should be "uploaded content"
    Examples:
      | dav_version | folder_name                      | file_name                     |
      | old         | /upload                          | abc.txt                       |
      | old         | /strängé folder                  | strängé file.txt              |
      | old         | /C++ folder                      | C++ file.cpp                  |
      | old         | /नेपाली                          | नेपाली                        |
      | old         | /folder #2.txt                   | file #2.txt                   |
      | old         | /folder ?2.txt                   | file ?2.txt                   |
      | new         | /upload                          | abc.txt                       |
      | new         | /strängé folder (duplicate #2 &) | strängé file (duplicate #2 &) |
      | new         | /C++ folder                      | C++ file.cpp                  |
      | new         | /नेपाली                          | नेपाली                        |
      | new         | /folder #2.txt                   | file #2.txt                   |
      | new         | /folder ?2.txt                   | file ?2.txt                   |

  Scenario Outline: Uploading file to path with extension .part should not be possible
    Given using <dav_version> DAV path
    When user "user0" uploads file "data/textfile.txt" to "/textfile.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "user0" should not see the following elements
      | /textfile.part |
    Examples:
      | dav_version |
      | old         |
      | new         |

@api
Feature: create files and folder
  As a user
  I want to be able to create files and folders
  So that I can organise the files in my file system

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @issue-ocis-reva-269
  Scenario Outline: create a folder
    Given using <dav_version> DAV path
    When user "Alice" creates folder "<folder_name>" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "<folder_name>" should exist
    Examples:
      | dav_version | folder_name     |
      | old         | /upload         |
      | old         | /strängé folder |
      | old         | /C++ folder.cpp |
      | old         | /नेपाली           |
      | old         | /folder #2      |
      | old         | /folder ?2      |
      | old         | /😀 🤖          |
      | old         | /new&folder     |
      | new         | /upload         |
      | new         | /strängé folder |
      | new         | /C++ folder.cpp |
      | new         | /नेपाली           |
      | new         | /folder #2      |
      | new         | /folder ?2      |
      | new         | /😀 🤖          |
      | new         | /new&folder     |

  @smokeTest
  Scenario Outline: Creating a folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test_folder"
    When user "Alice" gets the following properties of folder "/test_folder" using the WebDAV API
      | propertyName   |
      | d:resourcetype |
    Then the HTTP status code should be "201"
    And the single response should contain a property "d:resourcetype" with a child property "d:collection"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Creating a folder with special chars
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test_folder:5"
    When user "Alice" gets the following properties of folder "/test_folder:5" using the WebDAV API
      | propertyName   |
      | d:resourcetype |
    Then the HTTP status code should be "201"
    And the single response should contain a property "d:resourcetype" with a child property "d:collection"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-15
  Scenario Outline: Creating a directory which contains .part should not be possible
    Given using <dav_version> DAV path
    When user "Alice" creates folder "/folder.with.ext.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "Alice" should not see the following elements
      | /folder.with.ext.part |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-168
  Scenario Outline: try to create a folder that already exists
    Given using <dav_version> DAV path
    And user "Alice" has created folder "my-data"
    When user "Alice" creates folder "my-data" using the WebDAV API
    Then the HTTP status code should be "405"
    And as "Alice" folder "my-data" should exist
    And the DAV exception should be "Sabre\DAV\Exception\MethodNotAllowed"
    And the DAV message should be "The resource you tried to create already exists"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-168
  Scenario Outline: try to create a folder with a name of an existing file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded data" to "/my-data.txt"
    When user "Alice" creates folder "my-data.txt" using the WebDAV API
    Then the HTTP status code should be "405"
    And the DAV exception should be "Sabre\DAV\Exception\MethodNotAllowed"
    And the DAV message should be "The resource you tried to create already exists"
    And the content of file "/my-data.txt" for user "Alice" should be "uploaded data"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Create a file
    Given using <dav_version> DAV path
    When user "Alice" uploads file with content "some text" to "<file_name>" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "<file_name>" should exist
    And the content of file "<file_name>" for user "Alice" should be "some text"
    Examples:
      | dav_version | file_name        |
      | old         | /upload.txt      |
      | old         | /strängéfile.txt |
      | old         | /C++ file.cpp    |
      | old         | /नेपाली            |
      | old         | /file #2.txt     |
      | old         | /file ?2.pdf     |
      | old         | /😀 🤖.txt       |
      | old         | /new&file.txt    |
      | new         | /upload.txt      |
      | new         | /strängéfile.txt |
      | new         | /C++ file.cpp    |
      | new         | /नेपाली            |
      | new         | /file #2.txt     |
      | new         | /file ?2.pdf     |
      | new         | /😀 🤖.txt       |
      | new         | /new&file.txt    |
@api @TestAlsoOnExternalUserBackend
Feature: create folder
  As a user
  I want to be able to create folders
  So that I can organise the files in my file system

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes

  Scenario Outline: create a folder
    Given using <dav_version> DAV path
    When user "user0" creates a folder "<folder_name>" using the WebDAV API
    Then as "user0" folder "<folder_name>" should exist
    Examples:
      | dav_version | folder_name     |
      | old         | /upload         |
      | old         | /strängé folder |
      | old         | /C++ folder.cpp |
      | old         | /नेपाली         |
      | old         | /folder #2      |
      | old         | /folder ?2      |
      | new         | /upload         |
      | new         | /strängé folder |
      | new         | /C++ folder.cpp |
      | new         | /नेपाली         |
      | new         | /folder #2      |
      | new         | /folder ?2      |

  @smokeTest
  Scenario Outline: Creating a folder
    Given using <dav_version> DAV path
    And user "user0" has created a folder "/test_folder"
    When user "user0" gets the following properties of folder "/test_folder" using the WebDAV API
      | {DAV:}resourcetype |
    Then the single response should contain a property "{DAV:}resourcetype" with value "{DAV:}collection"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Creating a folder with special chars
    Given using <dav_version> DAV path
    And user "user0" has created a folder "/test_folder:5"
    When user "user0" gets the following properties of folder "/test_folder:5" using the WebDAV API
      | {DAV:}resourcetype |
    Then the single response should contain a property "{DAV:}resourcetype" with value "{DAV:}collection"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Creating a directory which contains .part should not be possible
    Given using <dav_version> DAV path
    When user "user0" creates a folder "/folder.with.ext.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "user0" should not see the following elements
      | /folder.with.ext.part |
    Examples:
      | dav_version |
      | old         |
      | new         |

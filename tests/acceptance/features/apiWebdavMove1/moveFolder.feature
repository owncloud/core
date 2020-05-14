@api @TestAlsoOnExternalUserBackend @skipOnOcis @issue-ocis-reva-14
Feature: move (rename) folder
  As a user
  I want to be able to move and rename folders
  So that I can quickly manage my file system

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and skeleton files

  Scenario Outline: Renaming a folder to a backslash should return an error
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "\" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Renaming a folder beginning with a backslash should return an error
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "\testshare" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Renaming a folder including a backslash encoded should return an error
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "/hola\hola" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Move a folder into a not existing one
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "/not-existing/testshare" using the WebDAV API
    Then the HTTP status code should be "409"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: renaming folder with dots in the path
    Given using <dav_version> DAV path
    And user "user0" has created folder "<folder_name>"
    When user "user0" uploads file with content "uploaded content for file name ending with a dot" to "<folder_name>/abc.txt" using the WebDAV API
    And user "user0" moves folder "<folder_name>" to "/uploadFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" folder "/uploadFolder" should exist
    And the content of file "/uploadFolder/abc.txt" for user "user0" should be "uploaded content for file name ending with a dot"
    Examples:
      | dav_version | folder_name   |
      | old         | /upload.      |
      | old         | /upload.1     |
      | old         | /upload...1.. |
      | old         | /...          |
      | old         | /..upload     |
      | new         | /upload.      |
      | new         | /upload.1     |
      | new         | /upload...1.. |
      | new         | /...          |
      | new         | /..upload     |

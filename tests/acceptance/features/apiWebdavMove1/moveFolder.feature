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
    And user "user0" moves file "/<folder_name>" to "/<renamed_folder>" using the WebDAV API
    Then the HTTP status code should be "201"
    Examples:
      | dav_version | folder_name   | renamed_folder |
      | old         | /upload.      | uploadFolder   |
      | old         | /upload.      | uploadFolder   |
      | old         | /upload.1     | uploadFolder   |
      | old         | /upload...1.. | uploadFolder   |
      | old         | /...          | uploadFolder   |
      | new         | /upload.      | uploadFolder   |
      | new         | /upload.      | uploadFolder   |
      | new         | /upload.1     | uploadFolder   |
      | new         | /upload...1.. | uploadFolder   |
      | new         | /...          | uploadFolder   |
      | new         | /..upload     | uploadFolder   |
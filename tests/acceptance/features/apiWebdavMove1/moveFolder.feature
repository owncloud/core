@api @issue-ocis-reva-14
Feature: move (rename) folder
  As a user
  I want to be able to move and rename folders
  So that I can quickly manage my file system

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @issue-ocis-reva-211 @skipOnOcis
  Scenario Outline: Renaming a folder to a backslash should return an error
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" moves folder "/testshare" to "\" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-211 @skipOnOcis
  Scenario Outline: Renaming a folder beginning with a backslash should return an error
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" moves folder "/testshare" to "\testshare" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-211 @skipOnOcis
  Scenario Outline: Renaming a folder including a backslash encoded should return an error
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" moves folder "/testshare" to "/hola\hola" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Move a folder into an other one
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    And user "Alice" has created folder "/an-other-folder"
    When user "Alice" moves folder "/testshare" to "/an-other-folder/testshare" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should not see the following elements
      | /testshare/ |
    And user "Alice" should see the following elements
      | /an-other-folder/testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Move a folder into a not existing one
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" moves folder "/testshare" to "/not-existing/testshare" using the WebDAV API
    Then the HTTP status code should be "409"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: renaming folder with dots in the path
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    When user "Alice" uploads file with content "uploaded content for file name ending with a dot" to "<folder_name>/abc.txt" using the WebDAV API
    And user "Alice" moves folder "<folder_name>" to "/uploadFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/uploadFolder/abc.txt" for user "Alice" should be "uploaded content for file name ending with a dot"
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

@api @TestAlsoOnExternalUserBackend
Feature: delete folder
  As a user
  I want to be able to delete folders
  So that I can quickly remove unwanted data

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and skeleton files

  Scenario Outline: delete a folder
    Given using <dav_version> DAV path
    When user "user0" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" folder "/PARENT" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: delete a folder when 2 folder exist with different case
    Given using <dav_version> DAV path
    And user "user0" creates folder "/PARENT" using the WebDAV API
    And user "user0" creates folder "/parent" using the WebDAV API
    When user "user0" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" folder "/PARENT" should not exist
    But as "user0" folder "/parent" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: delete a sub-folder
    Given using <dav_version> DAV path
    When user "user0" deletes folder "/PARENT/CHILD" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" folder "/PARENT/CHILD" should not exist
    But as "user0" folder "/PARENT" should exist
    And as "user0" file "/PARENT/parent.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

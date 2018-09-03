@api @TestAlsoOnExternalUserBackend
Feature: delete folder
  As a user
  I want to be able to delete folders
  So that I can quickly remove unwanted data

  Background:
    Given using OCS API version "1"
    And user "meta" has been created

  Scenario Outline: delete a folder
    Given using <dav_version> DAV path
    When user "meta" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "meta" the folder "/PARENT" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: delete a sub-folder
    Given using <dav_version> DAV path
    When user "meta" deletes folder "/PARENT/CHILD" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "meta" the folder "/PARENT/CHILD" should not exist
    But as "meta" the folder "/PARENT" should exist
    And as "meta" the file "/PARENT/parent.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

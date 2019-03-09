@api @TestAlsoOnExternalUserBackend
Feature: delete file
  As a user
  I want to be able to delete files
  So that I can remove unwanted data

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes

  @smokeTest
  Scenario Outline: delete a file
    Given using <dav_version> DAV path
    When user "user0" deletes file "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" file "/textfile0.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: delete a file when 2 files exist with different case
    Given using <dav_version> DAV path
    And user "user0" has uploaded file with content "to delete" to "/textfile1.txt"
    And user "user0" has uploaded file with content "uploaded content" to "/TextFile1.txt"
    When user "user0" deletes file "/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" file "/textfile1.txt" should not exist
    And as "user0" file "/TextFile1.txt" should exist
    And the content of file "/TextFile1.txt" for user "user0" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |

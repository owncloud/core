@api @TestAlsoOnExternalUserBackend
Feature: delete file
  As a user
  I want to be able to delete files
  So that I can remove unwanted data

  Background:
    Given using OCS API version "1"
    And user "meta" has been created

  @smokeTest
  Scenario Outline: delete a file
    Given using <dav_version> DAV path
    When user "meta" deletes file "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "meta" the file "/textfile0.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

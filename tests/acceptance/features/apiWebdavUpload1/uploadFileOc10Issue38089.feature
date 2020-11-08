@api @notToImplementOnOCIS
Feature: upload file
  As a user
  I want to be able to upload files
  So that I can store and share files between multiple client systems

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @issue-38089
  Scenario Outline: attempt to upload a file into a non-existent folder
    Given using <dav_version> DAV path
    When user "Alice" uploads file with content "uploaded content" to "non-existent-folder/new-file.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    And as "Alice" folder "non-existent-folder" should not exist
    And as "Alice" file "non-existent-folder/new-file.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

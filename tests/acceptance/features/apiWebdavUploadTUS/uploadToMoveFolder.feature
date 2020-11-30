@api @skipOnOcV10
Feature: move folders
  As a user
  I want to be able to move and upload files/folders
  So that I can organise my data structure

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: Uploading file to a received share folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    And user "Alice" has created folder "/test-moved"
    And the user has moved folder "/test-moved" to "/test"
    When user "Alice" uploads file with content "uploaded content" to "/test/test-moved" using the TUS protocol on the WebDAV API
    Examples:
      | dav_version |
      | old         |
      | new         |

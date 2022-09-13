@api @skipOnOcV10
Feature: move folders
  As a user
  I want to be able to move and upload files/folders
  So that I can organise my data structure

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: Uploading file into a moved folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    And user "Alice" has created folder "/test-moved"
    And user "Alice" has moved folder "/test-moved" to "/test/test-moved"
    When user "Alice" uploads file with content "uploaded content" to "/test/test-moved/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Alice" file "/test/test-moved/textfile.txt" should exist
    And the content of file "/test/test-moved/textfile.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |

    @personalSpace
    Examples:
      | dav_version |
      | spaces      |


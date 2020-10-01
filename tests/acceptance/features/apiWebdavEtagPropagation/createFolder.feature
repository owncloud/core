@api @skipOnOcis-OC-Storage
Feature: propagation of etags when creating folders

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: creating a folder inside a folder changes its etag
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/folder"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" creates folder "/folder/new" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | folder  |
      | new         |         |
      | new         | folder  |

  Scenario Outline: creating an invalid folder inside a folder should not change any etags
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/folder"
    And user "Alice" has created folder "/folder/sub"
    And user "Alice" has stored etag of element "/<element>"
    When user "Alice" creates folder "/folder/sub/.." using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should not have changed
    Examples:
      | dav_version | element    |
      | old         |            |
      | old         | folder     |
      | old         | folder/sub |
      | new         |            |
      | new         | folder     |
      | new         | folder/sub |

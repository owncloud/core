@api @skipOnOcis-OC-Storage
Feature: propagation of etags when creating folders

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"

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

  Scenario Outline: as share receiver creating a folder inside a folder received as a share changes its etag for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And using <dav_version> DAV path
    And user "Alice" has created folder "/folder"
    And user "Alice" has shared folder "/folder" with user "Brian"
    And user "Brian" has accepted share "/folder" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Brian" creates folder "/Shares/folder/new" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element |
      | old         |         |
      | old         | folder  |
      | new         |         |
      | new         | folder  |

  Scenario Outline: as sharer creating a folder inside a folder received as a share changes its etag for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And using <dav_version> DAV path
    And user "Alice" has created folder "/folder"
    And user "Alice" has shared folder "/folder" with user "Brian"
    And user "Brian" has accepted share "/folder" offered by user "Alice"
    And user "Alice" has stored etag of element "/<element>"
    And user "Brian" has stored etag of element "/Shares/<element>"
    When user "Alice" creates folder "/folder/new" using the WebDAV API
    Then the etag of element "/<element>" of user "Alice" should have changed
    And the etag of element "/Shares/<element>" of user "Brian" should have changed
    Examples:
      | dav_version | element       |
      | old         |               |
      | old         | folder        |
      | new         |               |
      | new         | folder        |


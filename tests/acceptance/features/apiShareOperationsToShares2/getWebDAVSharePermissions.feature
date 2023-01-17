@api @files_sharing-app-required
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario Outline: Correct webdav share-permissions for owned file
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    When user "Alice" gets the following properties of file "/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "201"
    And the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received file with edit and reshare permissions
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has shared file "/tmp.txt" with user "Brian"
    And user "Brian" has accepted share "/tmp.txt" offered by user "Alice"
    When user "Brian" gets the following properties of file "/Shares/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received group shared file with edit and reshare permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has created a share with settings
      | path        | /tmp.txt          |
      | shareType   | group             |
      | permissions | share,update,read |
      | shareWith   | grp1              |
    And user "Brian" has accepted share "/tmp.txt" offered by user "Alice"
    When user "Brian" gets the following properties of file "/Shares/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @issue-ocis-2213
  Scenario Outline: Correct webdav share-permissions for received file with edit permissions but no reshare permissions
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has shared file "tmp.txt" with user "Brian"
    And user "Brian" has accepted share "/tmp.txt" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | update,read |
    Then the HTTP status code should be "200"
    And as user "Brian" file "/Shares/tmp.txt" should contain a property "ocs:share-permissions" with value "3"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @issue-ocis-2213
  Scenario Outline: Correct webdav share-permissions for received group shared file with edit permissions but no reshare permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has created a share with settings
      | path        | /tmp.txt    |
      | shareType   | group       |
      | permissions | update,read |
      | shareWith   | grp1        |
    And user "Brian" has accepted share "/tmp.txt" offered by user "Alice"
    When user "Brian" gets the following properties of file "/Shares/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "3"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @issue-ocis-2213
  Scenario Outline: Correct webdav share-permissions for received file with reshare permissions but no edit permissions
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has shared file "tmp.txt" with user "Brian"
    And user "Brian" has accepted share "/tmp.txt" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | share,read |
    Then the HTTP status code should be "200"
    And as user "Brian" file "/Shares/tmp.txt" should contain a property "ocs:share-permissions" with value "17"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received group shared file with reshare permissions but no edit permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has created a share with settings
      | path        | /tmp.txt   |
      | shareType   | group      |
      | permissions | share,read |
      | shareWith   | grp1       |
    And user "Brian" has accepted share "/tmp.txt" offered by user "Alice"
    When user "Brian" gets the following properties of file "/Shares/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "17"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for owned folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    When user "Alice" gets the following properties of folder "/" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "201"
    And the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received folder with all permissions
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Brian" gets the following properties of folder "/Shares/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/tmp"
    And user "Alice" has created a share with settings
      | path      | tmp   |
      | shareType | group |
      | shareWith | grp1  |
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Brian" gets the following properties of folder "/Shares/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @issue-ocis-2213
  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but edit
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | share,delete,create,read |
    Then the HTTP status code should be "200"
    And as user "Brian" folder "/Shares/tmp" should contain a property "ocs:share-permissions" with value "29"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions but edit
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/tmp"
    And user "Alice" has created a share with settings
      | path        | tmp                      |
      | shareType   | group                    |
      | shareWith   | grp1                     |
      | permissions | share,delete,create,read |
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Brian" gets the following properties of folder "/Shares/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "29"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but create
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | share,delete,update,read |
    Then the HTTP status code should be "200"
    And as user "Brian" folder "/Shares/tmp" should contain a property "ocs:share-permissions" with value "27"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions but create
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/tmp"
    And user "Alice" has created a share with settings
      | path        | tmp                      |
      | shareType   | group                    |
      | shareWith   | grp1                     |
      | permissions | share,delete,update,read |
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Brian" gets the following properties of folder "/Shares/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "27"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but delete
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | share,create,update,read |
    Then the HTTP status code should be "200"
    And as user "Brian" folder "/Shares/tmp" should contain a property "ocs:share-permissions" with value "23"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions but delete
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/tmp"
    And user "Alice" has created a share with settings
      | path        | tmp                      |
      | shareType   | group                    |
      | shareWith   | grp1                     |
      | permissions | share,create,update,read |
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Brian" gets the following properties of folder "/Shares/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "23"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but share
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | change |
    Then the HTTP status code should be "200"
    And as user "Brian" folder "/Shares/tmp" should contain a property "ocs:share-permissions" with value "15"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions but share
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/tmp"
    And user "Alice" has created a share with settings
      | path        | tmp    |
      | shareType   | group  |
      | shareWith   | grp1   |
      | permissions | change |
    And user "Brian" has accepted share "/tmp" offered by user "Alice"
    When user "Brian" gets the following properties of folder "/Shares/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the HTTP status code should be "200"
    And the single response should contain a property "ocs:share-permissions" with value "15"
    Examples:
      | dav-path |
      | old      |
      | new      |

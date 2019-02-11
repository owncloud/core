@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes
    And user "user1" has been created with default attributes

  @smokeTest
  Scenario Outline: Correct webdav share-permissions for owned file
    Given using <dav-path> DAV path
    And user "user0" has uploaded file with content "foo" to "/tmp.txt"
    When user "user0" gets the following properties of file "/tmp.txt" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received file with edit and reshare permissions
    Given using <dav-path> DAV path
    And user "user0" has uploaded file with content "foo" to "/tmp.txt"
    And user "user0" has shared file "/tmp.txt" with user "user1"
    When user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received group shared file with edit and reshare permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has uploaded file with content "foo" to "/tmp.txt"
    And user "user0" has created a share with settings
      | path        | /tmp.txt |
      | shareType   | 1        |
      | permissions | 19       |
      | shareWith   | grp1     |
    When user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received file with edit permissions but no reshare permissions
    Given using <dav-path> DAV path
    And user "user0" has uploaded file with content "foo" to "/tmp.txt"
    And user "user0" has shared file "tmp.txt" with user "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | 3 |
    Then as user "user1" file "/tmp.txt" should contain a property "ocs:share-permissions" with value "3"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received group shared file with edit permissions but no reshare permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has uploaded file with content "foo" to "/tmp.txt"
    And user "user0" has created a share with settings
      | path        | /tmp.txt |
      | shareType   | 1        |
      | permissions | 3        |
      | shareWith   | grp1     |
    When user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "3"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received file with reshare permissions but no edit permissions
    Given using <dav-path> DAV path
    And user "user0" has uploaded file with content "foo" to "/tmp.txt"
    And user "user0" has shared file "tmp.txt" with user "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | 17 |
    Then as user "user1" file "/tmp.txt" should contain a property "ocs:share-permissions" with value "17"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received group shared file with reshare permissions but no edit permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has uploaded file with content "foo" to "/tmp.txt"
    And user "user0" has created a share with settings
      | path        | /tmp.txt |
      | shareType   | 1        |
      | permissions | 17       |
      | shareWith   | grp1     |
    When user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "17"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for owned folder
    Given using <dav-path> DAV path
    And user "user0" has created folder "/tmp"
    When user "user0" gets the following properties of folder "/" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received folder with all permissions
    Given using <dav-path> DAV path
    And user "user0" has created folder "/tmp"
    And user "user0" has shared file "/tmp" with user "user1"
    When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has created folder "/tmp"
    And user "user0" has created a share with settings
      | path      | tmp  |
      | shareType | 1    |
      | shareWith | grp1 |
    When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but edit
    Given using <dav-path> DAV path
    And user "user0" has created folder "/tmp"
    And user "user0" has shared file "/tmp" with user "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | 29 |
    Then as user "user1" folder "/tmp" should contain a property "ocs:share-permissions" with value "29"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions but edit
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has created folder "/tmp"
    And user "user0" has created a share with settings
      | path        | tmp  |
      | shareType   | 1    |
      | shareWith   | grp1 |
      | permissions | 29   |
    When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "29"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but create
    Given using <dav-path> DAV path
    And user "user0" has created folder "/tmp"
    And user "user0" has shared file "/tmp" with user "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | 27 |
    Then as user "user1" folder "/tmp" should contain a property "ocs:share-permissions" with value "27"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions but create
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has created folder "/tmp"
    And user "user0" has created a share with settings
      | path        | tmp  |
      | shareType   | 1    |
      | shareWith   | grp1 |
      | permissions | 27   |
    When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "27"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but delete
    Given using <dav-path> DAV path
    And user "user0" has created folder "/tmp"
    And user "user0" has shared file "/tmp" with user "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | 23 |
    Then as user "user1" folder "/tmp" should contain a property "ocs:share-permissions" with value "23"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions but delete
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has created folder "/tmp"
    And user "user0" has created a share with settings
      | path        | tmp  |
      | shareType   | 1    |
      | shareWith   | grp1 |
      | permissions | 23   |
    When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "23"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but share
    Given using <dav-path> DAV path
    And user "user0" has created folder "/tmp"
    And user "user0" has shared file "/tmp" with user "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | 15 |
    Then as user "user1" folder "/tmp" should contain a property "ocs:share-permissions" with value "15"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions but share
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has created folder "/tmp"
    And user "user0" has created a share with settings
      | path        | tmp  |
      | shareType   | 1    |
      | shareWith   | grp1 |
      | permissions | 15   |
    When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "15"
    Examples:
      | dav-path |
      | old      |
      | new      |

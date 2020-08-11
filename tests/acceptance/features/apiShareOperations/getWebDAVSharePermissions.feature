@api @files_sharing-app-required @issue-ocis-reva-47
Feature: sharing

  Background:
    Given using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest @skipOnOcis @issue-ocis-reva-47
  Scenario Outline: Correct webdav share-permissions for owned file
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    When user "Alice" gets the following properties of file "/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received file with edit and reshare permissions
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has shared file "/tmp.txt" with user "Brian"
    When user "Brian" gets the following properties of file "/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
    When user "Brian" gets the following properties of file "/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "19"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received file with edit permissions but no reshare permissions
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has shared file "tmp.txt" with user "Brian"
    When user "Alice" updates the last share using the sharing API with
      | permissions | update,read |
    Then as user "Brian" file "/tmp.txt" should contain a property "ocs:share-permissions" with value "3"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
    When user "Brian" gets the following properties of file "/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "3"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received file with reshare permissions but no edit permissions
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "foo" to "/tmp.txt"
    And user "Alice" has shared file "tmp.txt" with user "Brian"
    When user "Alice" updates the last share using the sharing API with
      | permissions | share,read |
    Then as user "Brian" file "/tmp.txt" should contain a property "ocs:share-permissions" with value "17"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
    When user "Brian" gets the following properties of file "/tmp.txt" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "17"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis
  Scenario Outline: Correct webdav share-permissions for owned folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    When user "Alice" gets the following properties of folder "/" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received folder with all permissions
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    When user "Brian" gets the following properties of folder "/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received group shared folder with all permissions
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/tmp"
    And user "Alice" has created a share with settings
      | path      | tmp   |
      | shareType | group |
      | shareWith | grp1  |
    When user "Brian" gets the following properties of folder "/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "31"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but edit
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    When user "Alice" updates the last share using the sharing API with
      | permissions | share,delete,create,read |
    Then as user "Brian" folder "/tmp" should contain a property "ocs:share-permissions" with value "29"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
    When user "Brian" gets the following properties of folder "/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "29"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but create
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    When user "Alice" updates the last share using the sharing API with
      | permissions | share,delete,update,read |
    Then as user "Brian" folder "/tmp" should contain a property "ocs:share-permissions" with value "27"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
    When user "Brian" gets the following properties of folder "/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "27"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but delete
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    When user "Alice" updates the last share using the sharing API with
      | permissions | share,create,update,read |
    Then as user "Brian" folder "/tmp" should contain a property "ocs:share-permissions" with value "23"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
    When user "Brian" gets the following properties of folder "/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "23"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Correct webdav share-permissions for received folder with all permissions but share
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/tmp"
    And user "Alice" has shared file "/tmp" with user "Brian"
    When user "Alice" updates the last share using the sharing API with
      | permissions | change |
    Then as user "Brian" folder "/tmp" should contain a property "ocs:share-permissions" with value "15"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
    When user "Brian" gets the following properties of folder "/tmp" using the WebDAV API
      | propertyName          |
      | ocs:share-permissions |
    Then the single response should contain a property "ocs:share-permissions" with value "15"
    Examples:
      | dav-path |
      | old      |
      | new      |

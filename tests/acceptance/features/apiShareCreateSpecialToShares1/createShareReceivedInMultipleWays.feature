@api @files_sharing-app-required @issue-ocis-reva-34
Feature: share resources where the sharee receives the share in multiple ways

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  Scenario Outline: Creating a new share with user who already received a share through their group
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Alice" shares file "/textfile0.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%              |
      | share_with_displayname | %displayname%           |
      | file_target            | /Shares/textfile0 (2).txt |
      | path                   | /Shares/textfile0 (2).txt |
      | permissions            | share,read,update       |
      | uid_owner              | %username%              |
      | displayname_owner      | %displayname%           |
      | item_type              | file                    |
      | mimetype               | text/plain              |
      | storage_id             | ANY_VALUE               |
      | share_type             | user                    |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-1289
  Scenario Outline: Share of folder and sub-folder to same user
    Given using OCS API version "<ocs_api_version>"
    And group "grp4" has been created
    And user "Brian" has been added to group "grp4"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created folder "/PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/parent.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/CHILD/child.txt"
    When user "Alice" shares folder "/PARENT" with user "Brian" using the sharing API
    And user "Alice" shares folder "/PARENT/CHILD" with group "grp4" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" accepts share "/PARENT/CHILD" offered by user "Alice" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/CHILD/            |
      | /Shares/CHILD/child.txt   |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-2021
  Scenario Outline: sharing subfolder when parent already shared
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has created folder "/test"
    And user "Alice" has created folder "/test/sub"
    And user "Alice" has shared folder "/test" with group "grp1"
    When user "Alice" shares folder "/test/sub" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/test/sub" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" folder "/Shares/sub" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-2021
  Scenario Outline: sharing subfolder when parent already shared with group of sharer
    Given using OCS API version "<ocs_api_version>"
    And group "grp0" has been created
    And user "Alice" has been added to group "grp0"
    And user "Alice" has created folder "/test"
    And user "Alice" has created folder "/test/sub"
    And user "Alice" has shared folder "/test" with group "grp0"
    When user "Alice" shares folder "/test/sub" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/test/sub" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" folder "/Shares/sub" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-2133
  Scenario Outline: multiple users share a file with the same name but different permissions to a user
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "First data" to "/randomfile.txt"
    And user "Carol" has uploaded file with content "Second data" to "/randomfile.txt"
    When user "Brian" shares file "randomfile.txt" with user "Alice" with permissions "read" using the sharing API
    And user "Alice" accepts share "/randomfile.txt" offered by user "Brian" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response about user "Brian" sharing with user "Alice" should include
      | uid_owner   | %username%             |
      | share_with  | %username%             |
      | file_target | /Shares/randomfile.txt |
      | item_type   | file                   |
      | permissions | read                   |
    When user "Carol" shares file "randomfile.txt" with user "Alice" with permissions "read,update" using the sharing API
    And user "Alice" accepts share "/randomfile.txt" offered by user "Carol" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response about user "Carol" sharing with user "Alice" should include
      | uid_owner   | %username%                 |
      | share_with  | %username%                 |
      | file_target | /Shares/randomfile (2).txt |
      | item_type   | file                       |
      | permissions | read,update                |
    And the content of file "/Shares/randomfile.txt" for user "Alice" should be "First data"
    And the content of file "/Shares/randomfile (2).txt" for user "Alice" should be "Second data"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @issue-ocis-2133
  Scenario Outline: multiple users share a folder with the same name to a user
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/zzzfolder"
    And user "Brian" has created folder "zzzfolder/Brian"
    And user "Carol" has created folder "/zzzfolder"
    And user "Carol" has created folder "zzzfolder/Carol"
    When user "Brian" shares folder "zzzfolder" with user "Alice" with permissions "read,delete" using the sharing API
    And user "Alice" accepts share "/zzzfolder" offered by user "Brian" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response about user "Brian" sharing with user "Alice" should include
      | uid_owner   | %username%        |
      | share_with  | %username%        |
      | file_target | /Shares/zzzfolder |
      | item_type   | folder            |
      | permissions | read,delete       |
    When user "Carol" shares folder "zzzfolder" with user "Alice" with permissions "read,share" using the sharing API
    And user "Alice" accepts share "/zzzfolder" offered by user "Carol" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response about user "Carol" sharing with user "Alice" should include
      | uid_owner   | %username%            |
      | share_with  | %username%            |
      | file_target | /Shares/zzzfolder (2) |
      | item_type   | folder                |
      | permissions | read,share            |
    And as "Alice" folder "/Shares/zzzfolder/Brian" should exist
    And as "Alice" folder "/Shares/zzzfolder (2)/Carol" should exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnEncryptionType:user-keys @encryption-issue-132 @skipOnLDAP
  Scenario Outline: share with a group and then add a user to that group that already has a file with the shared name
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "Shared content" to "lorem.txt"
    And user "Carol" has uploaded file with content "My content" to "lorem.txt"
    When user "Alice" shares file "lorem.txt" with group "grp1" using the sharing API
    And user "Brian" accepts share "/lorem.txt" offered by user "Alice" using the sharing API
    And the administrator adds user "Carol" to group "grp1" using the provisioning API
    And user "Carol" accepts share "/lorem.txt" offered by user "Alice" using the sharing API
    Then the content of file "Shares/lorem.txt" for user "Brian" should be "Shared content"
    And the content of file "lorem.txt" for user "Carol" should be "My content"
    And the content of file "Shares/lorem.txt" for user "Carol" should be "Shared content"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  Scenario: Sharing parent folder to user with all permissions and its child folder to group with read permission then check create operation
    Given group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    When user "Carol" shares folder "/parent" with user "Brian" with permissions "all" using the sharing API
    And user "Carol" shares folder "/parent/child1" with group "grp1" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to create folder "/Shares/parent/fo1"
    And user "Brian" should be able to create folder "/Shares/parent/child1/fo2"
    And as "Brian" folder "/Shares/child1" should exist
    And user "Brian" should not be able to create folder "/Shares/child1/fo3"
    And as "Alice" folder "/Shares/child1" should exist
    And user "Alice" should not be able to create folder "/Shares/child1/fo3"

  Scenario: Sharing parent folder to user with all permissions and its child folder to group with read permission then check rename operation
    Given group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has uploaded file with content "some data" to "/parent/child1/child2/textfile-2.txt"
    When user "Carol" shares folder "/parent" with user "Brian" with permissions "all" using the sharing API
    And user "Carol" shares folder "/parent/child1" with group "grp1" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to rename file "/Shares/parent/child1/child2/textfile-2.txt" to "/Shares/parent/child1/child2/rename.txt"
    And as "Brian" file "/Shares/child1/child2/rename.txt" should exist
    And user "Brian" should not be able to rename file "/Shares/child1/child2/rename.txt" to "/Shares/child1/child2/rename2.txt"
    And as "Alice" file "/Shares/child1/child2/rename.txt" should exist
    And user "Alice" should not be able to rename file "/Shares/child1/child2/rename.txt" to "/Shares/child1/child2/rename2.txt"

  Scenario: Sharing parent folder to user with all permissions and its child folder to group with read permission then check delete operation
    Given group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has uploaded file with content "some data" to "/parent/child1/child2/textfile-2.txt"
    When user "Carol" shares folder "/parent" with user "Brian" with permissions "all" using the sharing API
    And user "Carol" shares folder "/parent/child1" with group "grp1" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to delete file "/Shares/parent/child1/child2/textfile-2.txt"
    And as "Brian" folder "/Shares/child1" should exist
    And user "Brian" should not be able to delete folder "/Shares/child1/child2"
    And as "Alice" folder "/Shares/child1" should exist
    And user "Alice" should not be able to delete folder "/Shares/child1/child2"

  Scenario: Sharing parent folder to user with all permissions and its child folder to group with read permission then check reshare operation
    Given group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    When user "Carol" shares folder "/parent" with user "Brian" with permissions "all" using the sharing API
    And user "Carol" shares folder "/parent/child1" with group "grp1" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to share folder "/Shares/parent" with user "Alice" with permissions "read" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Brian" using the sharing API
    And as "Brian" folder "/Shares/child1" should exist
    And as "Alice" folder "/Shares/child1" should exist
    And as "Alice" folder "/Shares/parent" should exist

  Scenario: Sharing parent folder to group with read permission and its child folder to user with all permissions then check create operation
    Given group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    When user "Carol" shares folder "/parent" with group "grp1" with permissions "read" using the sharing API
    And user "Carol" shares folder "/parent/child1" with user "Brian" with permissions "all" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to create folder "/Shares/child1/fo1"
    And user "Brian" should be able to create folder "/Shares/child1/child2/fo2"
    And as "Brian" folder "/Shares/parent" should exist
    And user "Brian" should not be able to create folder "/Shares/parent/fo3"
    And as "Alice" folder "/Shares/parent" should exist
    And user "Alice" should not be able to create folder "/Shares/parent/fo3"

  Scenario: Sharing parent folder to group with read permission and its child folder to user with all permissions then check rename operation
    Given group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has uploaded file with content "some data" to "/parent/child1/child2/textfile-2.txt"
    When user "Carol" shares folder "/parent" with group "grp1" with permissions "read" using the sharing API
    And user "Carol" shares folder "/parent/child1" with user "Brian" with permissions "all" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to rename file "/Shares/child1/child2/textfile-2.txt" to "/Shares/child1/child2/rename.txt"
    And as "Brian" file "/Shares/parent/child1/child2/rename.txt" should exist
    And user "Brian" should not be able to rename file "/Shares/parent/child1/child2/rename.txt" to "/Shares/parent/child1/child2/rename2.txt"
    And as "Alice" file "/Shares/parent/child1/child2/rename.txt" should exist
    And user "Alice" should not be able to rename file "/Shares/parent/child1/child2/rename.txt" to "/Shares/parent/child1/child2/rename2.txt"

  Scenario: Sharing parent folder to group with read permission and its child folder to user with all permissions then check delete operation
    Given group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has uploaded file with content "some data" to "/parent/child1/child2/textfile-2.txt"
    When user "Carol" shares folder "/parent" with group "grp1" with permissions "read" using the sharing API
    And user "Carol" shares folder "/parent/child1" with user "Brian" with permissions "all" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to delete file "/Shares/child1/child2/textfile-2.txt"
    And as "Brian" folder "/Shares/parent" should exist
    And user "Brian" should not be able to delete folder "/Shares/parent/child1"
    And as "Alice" folder "/Shares/parent" should exist
    And user "Alice" should not be able to delete folder "/Shares/parent/child1"

  Scenario: Sharing parent folder to group with read permission and its child folder to user with all permissions then check reshare operation
    Given group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    When user "Carol" shares folder "/parent" with group "grp1" with permissions "read" using the sharing API
    And user "Carol" shares folder "/parent/child1" with user "Brian" with permissions "all" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to share folder "/Shares/child1" with user "Alice" with permissions "read" using the sharing API
    And user "Alice" accepts share "/parent/child1" offered by user "Brian" using the sharing API
    And as "Brian" folder "/Shares/parent" should exist
    And as "Alice" folder "/Shares/parent" should exist
    And as "Alice" folder "/Shares/child1" should exist

  Scenario: Sharing parent folder to one group with all permissions and its child folder to another group with read permission
    Given these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created the following folders
      | path                  |
      | /parent               |
      | /parent/child1        |
      | /parent/child1/child2 |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/parent/child1/child2/textfile-2.txt"
    When user "Carol" shares folder "/parent" with group "grp1" with permissions "all" using the sharing API
    And user "Carol" shares folder "/parent/child1" with group "grp2" with permissions "read" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent/child1" offered by user "Carol" using the sharing API
    Then user "Alice" should be able to create folder "/Shares/parent/child1/fo1"
    And user "Alice" should be able to create folder "/Shares/parent/child1/child2/fo2"
    And user "Alice" should be able to delete folder "/Shares/parent/child1/fo1"
    And user "Alice" should be able to delete folder "/Shares/parent/child1/child2/fo2"
    And user "Alice" should be able to rename file "/Shares/parent/child1/child2/textfile-2.txt" to "/Shares/parent/child1/child2/rename.txt"
    And user "Alice" should be able to share folder "/Shares/parent/child1" with group "grp3" with permissions "all" using the sharing API
    And as "Brian" folder "/Shares/child1" should exist
    And user "Brian" should not be able to create folder "/Shares/child1/fo1"
    And user "Brian" should not be able to create folder "/Shares/child1/child2/fo2"
    And user "Brian" should not be able to rename file "/Shares/child1/child2/rename.txt" to "/Shares/child1/child2/rename2.txt"
    And user "Brian" should not be able to share folder "/Shares/child1" with group "grp3" with permissions "read" using the sharing API
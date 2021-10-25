@api @files_sharing-app-required @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
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
      | share_with             | %username%                |
      | share_with_displayname | %displayname%             |
      | file_target            | <file_target>             |
      | path                   | /Shares/textfile0 (2).txt |
      | permissions            | share,read,update         |
      | uid_owner              | %username%                |
      | displayname_owner      | %displayname%             |
      | item_type              | file                      |
      | mimetype               | text/plain                |
      | storage_id             | ANY_VALUE                 |
      | share_type             | user                      |
    @skipOnOcis
    Examples:
      | ocs_api_version | ocs_status_code | file_target               |
      | 1               | 100             | /Shares/textfile0 (2).txt |
      | 2               | 200             | /Shares/textfile0 (2).txt |

    @skipOnOcV10 @issue-2131
    Examples:
      | ocs_api_version | ocs_status_code | file_target        |
      | 1               | 100             | /textfile0 (2).txt |
      | 2               | 200             | /textfile0 (2).txt |

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
    And user "Brian" accepts share "<pending_sub_share_path>" offered by user "Alice" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
      | /Shares/CHILD/            |
      | /Shares/CHILD/child.txt   |
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | ocs_api_version | ocs_status_code | pending_sub_share_path |
      | 1               | 100             | /CHILD                 |
      | 2               | 200             | /CHILD                 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | ocs_api_version | ocs_status_code | pending_sub_share_path |
      | 1               | 100             | /PARENT/CHILD          |
      | 2               | 200             | /PARENT/CHILD          |

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
    When user "Brian" accepts share "<pending_share_path>" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" folder "/Shares/sub" should exist
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | ocs_api_version | ocs_status_code | pending_share_path |
      | 1               | 100             | /sub               |
      | 2               | 200             | /sub               |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | ocs_api_version | ocs_status_code | pending_share_path |
      | 1               | 100             | /test/sub          |
      | 2               | 200             | /test/sub          |

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
    When user "Brian" accepts share "<pending_share_path>" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" folder "/Shares/sub" should exist
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | ocs_api_version | ocs_status_code | pending_share_path |
      | 1               | 100             | /sub               |
      | 2               | 200             | /sub               |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | ocs_api_version | ocs_status_code | pending_share_path |
      | 1               | 100             | /test/sub          |
      | 2               | 200             | /test/sub          |


  Scenario Outline: multiple users share a file with the same name but different permissions to a user
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "First data" to "/randomfile.txt"
    And user "Carol" has uploaded file with content "Second data" to "/randomfile.txt"
    When user "Brian" shares file "randomfile.txt" with user "Alice" with permissions "read" using the sharing API
    And user "Alice" accepts share "/randomfile.txt" offered by user "Brian" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response about user "Brian" sharing with user "Alice" should include
      | uid_owner   | %username%      |
      | share_with  | %username%      |
      | file_target | <file_target_1> |
      | item_type   | file            |
      | permissions | read            |
    When user "Carol" shares file "randomfile.txt" with user "Alice" with permissions "read,update" using the sharing API
    And user "Alice" accepts share "/randomfile.txt" offered by user "Carol" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response about user "Carol" sharing with user "Alice" should include
      | uid_owner   | %username%      |
      | share_with  | %username%      |
      | file_target | <file_target_2> |
      | item_type   | file            |
      | permissions | read,update     |
    And the content of file "/Shares/randomfile.txt" for user "Alice" should be "First data"
    And the content of file "/Shares/randomfile (2).txt" for user "Alice" should be "Second data"
    @skipOnOcis
    Examples:
      | ocs_api_version | file_target_1          | file_target_2              |
      | 1               | /Shares/randomfile.txt | /Shares/randomfile (2).txt |
      | 2               | /Shares/randomfile.txt | /Shares/randomfile (2).txt |

    @skipOnOcV10 @issue-ocis-2131
    Examples:
      | ocs_api_version | file_target_1   | file_target_2       |
      | 1               | /randomfile.txt | /randomfile (2).txt |
      | 2               | /randomfile.txt | /randomfile (2).txt |


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
      | uid_owner   | %username%      |
      | share_with  | %username%      |
      | file_target | <file_target_1> |
      | item_type   | folder          |
      | permissions | read,delete     |
    When user "Carol" shares folder "zzzfolder" with user "Alice" with permissions "read,share" using the sharing API
    And user "Alice" accepts share "/zzzfolder" offered by user "Carol" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response about user "Carol" sharing with user "Alice" should include
      | uid_owner   | %username%      |
      | share_with  | %username%      |
      | file_target | <file_target_2> |
      | item_type   | folder          |
      | permissions | read,share      |
    And as "Alice" folder "/Shares/zzzfolder/Brian" should exist
    And as "Alice" folder "/Shares/zzzfolder (2)/Carol" should exist
    @skipOnOcis
    Examples:
      | ocs_api_version | file_target_1     | file_target_2         |
      | 1               | /Shares/zzzfolder | /Shares/zzzfolder (2) |
      | 2               | /Shares/zzzfolder | /Shares/zzzfolder (2) |

    @skipOnOcV10 @issue-ocis-2131
    Examples:
      | ocs_api_version | file_target_1 | file_target_2  |
      | 1               | /zzzfolder    | /zzzfolder (2) |
      | 2               | /zzzfolder    | /zzzfolder (2) |

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


  Scenario Outline: Sharing parent folder to user with all permissions and its child folder to group with read permission then check create operation
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "<path>" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to create folder "/Shares/parent/fo1"
    And user "Brian" should be able to create folder "/Shares/parent/child1/fo2"
    And as "Brian" folder "/Shares/child1" should exist
    And user "Brian" should not be able to create folder "/Shares/child1/fo3"
    And as "Alice" folder "/Shares/child1" should exist
    And user "Alice" should not be able to create folder "/Shares/child1/fo3"
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @issue-2440
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  Scenario Outline: Sharing parent folder to user with all permissions and its child folder to group with read permission then check rename operation
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "<path>" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to rename file "/Shares/parent/child1/child2/textfile-2.txt" to "/Shares/parent/child1/child2/rename.txt"
    And as "Brian" file "/Shares/child1/child2/rename.txt" should exist
    And user "Brian" should not be able to rename file "/Shares/child1/child2/rename.txt" to "/Shares/child1/child2/rename2.txt"
    And as "Alice" file "/Shares/child1/child2/rename.txt" should exist
    And user "Alice" should not be able to rename file "/Shares/child1/child2/rename.txt" to "/Shares/child1/child2/rename2.txt"
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @issue-2440
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  Scenario Outline: Sharing parent folder to user with all permissions and its child folder to group with read permission then check delete operation
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "<path>" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to delete file "/Shares/parent/child1/child2/textfile-2.txt"
    And as "Brian" folder "/Shares/child1" should exist
    And user "Brian" should not be able to delete folder "/Shares/child1/child2"
    And as "Alice" folder "/Shares/child1" should exist
    And user "Alice" should not be able to delete folder "/Shares/child1/child2"
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @issue-2440
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  Scenario Outline: Sharing parent folder to user with all permissions and its child folder to group with read permission then check reshare operation
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "<path>" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to share folder "/Shares/parent" with user "Alice" with permissions "read" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Brian" using the sharing API
    And as "Brian" folder "/Shares/child1" should exist
    And as "Alice" folder "/Shares/child1" should exist
    And as "Alice" folder "/Shares/parent" should exist
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  Scenario Outline: Sharing parent folder to group with read permission and its child folder to user with all permissions then check create operation
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to create folder "/Shares/child1/fo1"
    And user "Brian" should be able to create folder "/Shares/child1/child2/fo2"
    And as "Brian" folder "/Shares/parent" should exist
    And user "Brian" should not be able to create folder "/Shares/parent/fo3"
    And as "Alice" folder "/Shares/parent" should exist
    And user "Alice" should not be able to create folder "/Shares/parent/fo3"
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  Scenario Outline: Sharing parent folder to group with read permission and its child folder to user with all permissions then check rename operation
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to rename file "/Shares/child1/child2/textfile-2.txt" to "/Shares/child1/child2/rename.txt"
    And as "Brian" file "/Shares/parent/child1/child2/rename.txt" should exist
    And user "Brian" should not be able to rename file "/Shares/parent/child1/child2/rename.txt" to "/Shares/parent/child1/child2/rename2.txt"
    And as "Alice" file "/Shares/parent/child1/child2/rename.txt" should exist
    And user "Alice" should not be able to rename file "/Shares/parent/child1/child2/rename.txt" to "/Shares/parent/child1/child2/rename2.txt"
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @issue-ocis-2440
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  Scenario Outline: Sharing parent folder to group with read permission and its child folder to user with all permissions then check delete operation
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to delete file "/Shares/child1/child2/textfile-2.txt"
    And as "Brian" folder "/Shares/parent" should exist
    And user "Brian" should not be able to delete folder "/Shares/parent/child1"
    And as "Alice" folder "/Shares/parent" should exist
    And user "Alice" should not be able to delete folder "/Shares/parent/child1"
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @issue-ocis-2440
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  Scenario Outline: Sharing parent folder to group with read permission and its child folder to user with all permissions then check reshare operation
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Carol" using the sharing API
    And user "Alice" accepts share "/parent" offered by user "Carol" using the sharing API
    Then user "Brian" should be able to share folder "/Shares/child1" with user "Alice" with permissions "read" using the sharing API
    And user "Alice" accepts share "<path>" offered by user "Brian" using the sharing API
    And as "Brian" folder "/Shares/parent" should exist
    And as "Alice" folder "/Shares/parent" should exist
    And as "Alice" folder "/Shares/child1" should exist
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  Scenario Outline: Sharing parent folder to one group with all permissions and its child folder to another group with read permission
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
    And user "Brian" accepts share "<path>" offered by user "Carol" using the sharing API
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
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | path    |
      | /child1 |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis
    Examples:
      | path           |
      | /parent/child1 |


  @skipOnOcV10 @issue-39347
  Scenario Outline: Share reciever renames the recieved group share and share same folder through user share again
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    When user "Alice" shares folder "parent" with group "grp" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    And user "Brian" moves folder "/Shares/parent" to "/Shares/sharedParent" using the WebDAV API
    And user "Alice" shares folder "parent" with user "Brian" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then as "Brian" folder "Shares/parent" should not exist
    And as "Brian" folder "Shares/sharedParent" should exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10 @issue-39347
  Scenario Outline: Share reciever renames the recieved group share and declines another share of same folder through user share again
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    When user "Alice" shares folder "parent" with group "grp" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    And user "Brian" moves folder "/Shares/parent" to "/Shares/sharedParent" using the WebDAV API
    And user "Alice" shares folder "parent" with user "Brian" using the sharing API
    And user "Brian" declines share "/parent" offered by user "Alice" using the sharing API
    Then as "Brian" folder "Shares/parent" should not exist
    And as "Brian" folder "Shares/sharedParent" should exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10 @issue-39347
  Scenario Outline: Share reciever renames a group share and recieves same resource through user share with additional permissions
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    When user "Alice" shares folder "parent" with group "grp" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    And user "Brian" moves folder "/Shares/parent" to "/Shares/sharedParent" using the WebDAV API
    And user "Alice" shares folder "parent" with user "Brian" with permissions "all" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then as "Brian" folder "Shares/parent" should not exist
    And as "Brian" folder "Shares/sharedParent" should exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should exist
    And user "Brian" should be able to delete file "Shares/parent/child/lorem.txt"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10 @issue-39347
  Scenario Outline: Share reciever renames a group share and recieves same resource through user share with less permissions
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    When user "Alice" shares folder "parent" with group "grp" with permissions "all" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    And user "Brian" moves folder "/Shares/parent" to "/Shares/sharedParent" using the WebDAV API
    And user "Alice" shares folder "parent" with user "Brian" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then as "Brian" folder "Shares/parent" should not exist
    And as "Brian" folder "Shares/sharedParent" should exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should exist
    Then user "Brian" should be able to delete file "Shares/parent/child/lorem.txt"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

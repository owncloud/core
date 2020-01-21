@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: share resources where the sharee receives the share in multiple ways

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  Scenario Outline: Creating a new share with user who already received a share through their group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user1" has been added to group "grp1"
    And user "user0" has shared file "welcome.txt" with group "grp1"
    When user "user0" shares file "/welcome.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with             | user1             |
      | share_with_displayname | User One          |
      | file_target            | /welcome.txt      |
      | path                   | /welcome.txt      |
      | permissions            | share,read,update |
      | uid_owner              | user0             |
      | displayname_owner      | User Zero         |
      | item_type              | file              |
      | mimetype               | text/plain        |
      | storage_id             | ANY_VALUE         |
      | share_type             | user              |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Share of folder and sub-folder to same user - core#20645
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and skeleton files
    And group "grp4" has been created
    # Note: in the user_ldap test environment user1 is in grp4
    And user "user1" has been added to group "grp4"
    When user "user0" shares folder "/PARENT" with user "user1" using the sharing API
    And user "user0" shares folder "/PARENT/CHILD" with group "grp4" using the sharing API
    Then user "user1" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /PARENT/parent.txt       |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /CHILD/                  |
      | /CHILD/child.txt         |
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: sharing subfolder when parent already shared
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "user0" has created folder "/test"
    And user "user0" has created folder "/test/sub"
    And user "user0" has shared folder "/test" with group "grp1"
    When user "user0" shares folder "/test/sub" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user1" folder "/sub" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: sharing subfolder when parent already shared with group of sharer
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user3" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user1" has been added to group "grp1"
    And user "user1" has created folder "/test"
    And user "user1" has created folder "/test/sub"
    And user "user1" has shared folder "/test" with group "grp1"
    When user "user1" shares folder "/test/sub" with user "user3" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user3" folder "/sub" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: multiple users share a file with the same name but different permissions to a user
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user2" has uploaded file with content "user2 file" to "/randomfile.txt"
    And user "user3" has uploaded file with content "user3 file" to "/randomfile.txt"
    When user "user2" shares file "randomfile.txt" with user "user1" with permissions "read" using the sharing API
    And user "user1" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | uid_owner   | user2           |
      | share_with  | user1           |
      | file_target | /randomfile.txt |
      | item_type   | file            |
      | permissions | read            |
    When user "user3" shares file "randomfile.txt" with user "user1" with permissions "read,update" using the sharing API
    And user "user1" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | uid_owner   | user3               |
      | share_with  | user1               |
      | file_target | /randomfile (2).txt |
      | item_type   | file                |
      | permissions | read,update         |
    And the content of file "randomfile.txt" for user "user1" should be "user2 file"
    And the content of file "randomfile (2).txt" for user "user1" should be "user3 file"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  Scenario Outline: multiple users share a folder with the same name to a user
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user2" has created folder "/zzzfolder"
    And user "user2" has created folder "zzzfolder/user2"
    And user "user3" has created folder "/zzzfolder"
    And user "user3" has created folder "zzzfolder/user3"
    When user "user2" shares folder "zzzfolder" with user "user1" with permissions "read,delete" using the sharing API
    And user "user1" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | uid_owner   | user2       |
      | share_with  | user1       |
      | file_target | /zzzfolder  |
      | item_type   | folder      |
      | permissions | read,delete |
    When user "user3" shares folder "zzzfolder" with user "user1" with permissions "read,share" using the sharing API
    And user "user1" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | uid_owner   | user3          |
      | share_with  | user1          |
      | file_target | /zzzfolder (2) |
      | item_type   | folder         |
      | permissions | read,share     |
    And as "user1" folder "zzzfolder/user2" should exist
    And as "user1" folder "zzzfolder (2)/user3" should exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnEncryptionType:user-keys @encryption-issue-132
  Scenario Outline: share with a group and then add a user to that group that already has a file with the shared name
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And these groups have been created:
      | groupname |
      | grp1      |
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user1" has been added to group "grp1"
    And user "user0" has uploaded file with content "user0 content" to "lorem.txt"
    And user "user2" has uploaded file with content "user2 content" to "lorem.txt"
    When user "user0" shares file "lorem.txt" with group "grp1" using the sharing API
    And the administrator adds user "user2" to group "grp1" using the provisioning API
    Then the content of file "lorem.txt" for user "user1" should be "user0 content"
    And the content of file "lorem.txt" for user "user2" should be "user2 content"
    And the content of file "lorem (2).txt" for user "user2" should be "user0 content"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


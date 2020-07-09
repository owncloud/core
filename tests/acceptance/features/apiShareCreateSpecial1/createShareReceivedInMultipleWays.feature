@api @files_sharing-app-required @skipOnOcis @issue-ocis-reva-34
Feature: share resources where the sharee receives the share in multiple ways

  Background:
    Given using the OCS API version defined externally
    And user "Alice" has been created with default attributes and skeleton files

  Scenario: Creating a new share with user who already received a share through their group
    Given user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "welcome.txt" with group "grp1"
    When user "Alice" shares file "/welcome.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "100" for OCS API version 1 or "200" for OCS API version 2
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%        |
      | share_with_displayname | %displayname%     |
      | file_target            | /welcome.txt      |
      | path                   | /welcome.txt      |
      | permissions            | share,read,update |
      | uid_owner              | %username%        |
      | displayname_owner      | %displayname%     |
      | item_type              | file              |
      | mimetype               | text/plain        |
      | storage_id             | ANY_VALUE         |
      | share_type             | user              |

  @issue-ocis-reva-243
  Scenario: Share of folder and sub-folder to same user - core#20645
    Given user "Brian" has been created with default attributes and skeleton files
    And group "grp4" has been created
    And user "Brian" has been added to group "grp4"
    When user "Alice" shares folder "/PARENT" with user "Brian" using the sharing API
    And user "Alice" shares folder "/PARENT/CHILD" with group "grp4" using the sharing API
    Then the OCS status code should be "100" for OCS API version 1 or "200" for OCS API version 2
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /PARENT/parent.txt       |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
      | /CHILD/                  |
      | /CHILD/child.txt         |

  @issue-ocis-reva-243
  Scenario: sharing subfolder when parent already shared
    Given user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has created folder "/test"
    And user "Alice" has created folder "/test/sub"
    And user "Alice" has shared folder "/test" with group "grp1"
    When user "Alice" shares folder "/test/sub" with user "Brian" using the sharing API
    Then the OCS status code should be "100" for OCS API version 1 or "200" for OCS API version 2
    And the HTTP status code should be "200"
    And as "Brian" folder "/sub" should exist

  @issue-ocis-reva-243
  Scenario: sharing subfolder when parent already shared with group of sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And group "grp0" has been created
    And user "Alice" has been added to group "grp0"
    And user "Alice" has created folder "/test"
    And user "Alice" has created folder "/test/sub"
    And user "Alice" has shared folder "/test" with group "grp0"
    When user "Alice" shares folder "/test/sub" with user "Brian" using the sharing API
    Then the OCS status code should be "100" for OCS API version 1 or "200" for OCS API version 2
    And the HTTP status code should be "200"
    And as "Brian" folder "/sub" should exist

  @issue-ocis-reva-243
  Scenario: multiple users share a file with the same name but different permissions to a user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Brian" has uploaded file with content "First data" to "/randomfile.txt"
    And user "Carol" has uploaded file with content "Second data" to "/randomfile.txt"
    When user "Brian" shares file "randomfile.txt" with user "Alice" with permissions "read" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | uid_owner   | Brian           |
      | share_with  | Alice           |
      | file_target | /randomfile.txt |
      | item_type   | file            |
      | permissions | read            |
    When user "Carol" shares file "randomfile.txt" with user "Alice" with permissions "read,update" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | uid_owner   | Carol               |
      | share_with  | Alice               |
      | file_target | /randomfile (2).txt |
      | item_type   | file                |
      | permissions | read,update         |
    And the content of file "randomfile.txt" for user "Alice" should be "First data"
    And the content of file "randomfile (2).txt" for user "Alice" should be "Second data"

  @issue-ocis-reva-243
  Scenario: multiple users share a folder with the same name to a user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Brian" has created folder "/zzzfolder"
    And user "Brian" has created folder "zzzfolder/Brian"
    And user "Carol" has created folder "/zzzfolder"
    And user "Carol" has created folder "zzzfolder/Carol"
    When user "Brian" shares folder "zzzfolder" with user "Alice" with permissions "read,delete" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | uid_owner   | Brian       |
      | share_with  | Alice       |
      | file_target | /zzzfolder  |
      | item_type   | folder      |
      | permissions | read,delete |
    When user "Carol" shares folder "zzzfolder" with user "Alice" with permissions "read,share" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | file_target | /zzzfolder (2) |
      | item_type   | folder         |
      | permissions | read,share     |
    And as "Alice" folder "zzzfolder/Brian" should exist
    And as "Alice" folder "zzzfolder (2)/Carol" should exist

  @skipOnEncryptionType:user-keys @encryption-issue-132 @skipOnLDAP
  Scenario: share with a group and then add a user to that group that already has a file with the shared name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "Shared content" to "lorem.txt"
    And user "Carol" has uploaded file with content "My content" to "lorem.txt"
    When user "Alice" shares file "lorem.txt" with group "grp1" using the sharing API
    And the administrator adds user "Carol" to group "grp1" using the provisioning API
    Then the content of file "lorem.txt" for user "Brian" should be "Shared content"
    And the content of file "lorem.txt" for user "Carol" should be "My content"
    And the content of file "lorem (2).txt" for user "Carol" should be "Shared content"

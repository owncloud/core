@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using old DAV path
    And user "user0" has been created with default attributes

  @smokeTest
  @skipOnEncryptionType:user-keys @issue-32322
  Scenario Outline: Creating a new share with user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    When user "user0" shares file "welcome.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with  | user1        |
      | file_target | /welcome.txt |
      | path        | /welcome.txt |
      | permissions | 19           |
      | uid_owner   | user0        |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a share with a group
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    When user "user0" shares file "/welcome.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with  | grp1         |
      | file_target | /welcome.txt |
      | path        | /welcome.txt |
      | permissions | 19           |
      | uid_owner   | user0        |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new share with user who already received a share through their group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has shared file "welcome.txt" with group "grp1"
    When user "user0" shares file "/welcome.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with  | user1        |
      | file_target | /welcome.txt |
      | path        | /welcome.txt |
      | permissions | 19           |
      | uid_owner   | user0        |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a new public link share of a file
    Given using OCS API version "<ocs_api_version>"
    When user "user0" creates a public link share using the sharing API with settings
      | path | welcome.txt |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last public shared file should be able to be downloaded without a password
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @public_link_share-feature-required
  Scenario Outline: Creating a new public link share of a file with password
    Given using OCS API version "<ocs_api_version>"
    When user "user0" creates a public link share using the sharing API with settings
      | path     | welcome.txt |
      | password | %public%    |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last public shared file should be able to be downloaded with password "%public%"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Trying to create a new public link share of a file with edit permissions results in a read-only share
    Given using OCS API version "<ocs_api_version>"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | welcome.txt |
      | permissions | 31          |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | file_target | /welcome.txt |
      | path        | /welcome.txt |
      | item_type   | file         |
      | share_type  | 3            |
      | permissions | 1            |
      | uid_owner   | user0        |
    And the last public shared file should be able to be downloaded without a password
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a new public link share of a folder
    Given using OCS API version "<ocs_api_version>"
    When user "user0" creates a public link share using the sharing API with settings
      | path     | PARENT   |
      | password | %public% |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Then the public should be able to download the range "bytes=1-7" of file "/parent.txt" from inside the last public shared folder with password "%public%" and the content should be "wnCloud"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Getting the share information of public link share form OCS API does not expose sensitive information
    Given using OCS API version "<ocs_api_version>"
    When user "user0" creates a public link share using the sharing API with settings
      | path     | welcome.txt   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | file_target            | /welcome.txt   |
      | path                   | /welcome.txt   |
      | item_type              | file           |
      | share_type             | 3              |
      | permissions            | 1              |
      | uid_owner              | user0          |
      | share_with             | ***redacted*** |
      | share_with_displayname | ***redacted*** |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new share with a disabled user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has been disabled
    When user "user0" shares file "welcome.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "401"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 997             |

  @issue-32068
  Scenario: Creating a new share with a disabled user
    Given using OCS API version "2"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has been disabled
    When user "user0" shares file "welcome.txt" with user "user1" using the sharing API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"

  @public_link_share-feature-required
  Scenario Outline: Creating a link share with no specified permissions defaults to read permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/afolder"
    When user "user0" creates a public link share using the sharing API with settings
      | path | /afolder |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | id          | A_NUMBER |
      | share_type  | 3        |
      | permissions | 1        |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a link share with no specified permissions defaults to read permissions when public upload disabled globally
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "user0" has created folder "/afolder"
    When user "user0" creates a public link share using the sharing API with settings
      | path | /afolder |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | id          | A_NUMBER |
      | share_type  | 3        |
      | permissions | 1        |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a link share with edit permissions keeps it
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/afolder"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | /afolder |
      | permissions | 15       |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | id          | A_NUMBER |
      | share_type  | 3        |
      | permissions | 15       |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a link share with upload permissions keeps it
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/afolder"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | /afolder |
      | permissions | 5        |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | id          | A_NUMBER |
      | share_type  | 3        |
      | permissions | 5        |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Share of folder and sub-folder to same user - core#20645
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes
    And group "grp4" has been created
    And user "user1" has been added to group "grp4"
    When user "user0" shares file "/PARENT" with user "user1" using the sharing API
    And user "user0" shares file "/PARENT/CHILD" with group "grp4" using the sharing API
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

  @smokeTest
  Scenario Outline: Share of folder to a group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes
    And user "user2" has been created with default attributes
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    Then user "user1" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /PARENT/parent.txt       |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "user2" should see the following elements
      | /FOLDER/                 |
      | /PARENT/                 |
      | /PARENT/parent.txt       |
      | /PARENT%20(2)/           |
      | /PARENT%20(2)/parent.txt |
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-33733 @public_link_share-feature-required
  Scenario Outline: Do not allow public sharing of the root
    Given using OCS API version "<ocs_api_version>"
    When user "user0" creates a public link share using the sharing API with settings
      | path | / |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
    #  | 1               | 403             | 403              |
      | 2               | 403             | 403              |

  @public_link_share-feature-required
  Scenario: Only allow 1 link share per file/folder
    Given using OCS API version "1"
    And as user "user0"
    And the user has created a public link share with settings
      | path | welcome.txt |
    And the last share id has been remembered
    When the user creates a public link share using the sharing API with settings
      | path | welcome.txt |
    Then the share ids should match

  @smokeTest
  Scenario: unique target names for incoming shares
    Given using OCS API version "1"
    And user "user1" has been created with default attributes
    And user "user2" has been created with default attributes
    And user "user0" has created folder "/foo"
    And user "user1" has created folder "/foo"
    When user "user0" shares file "/foo" with user "user2" using the sharing API
    And user "user1" shares file "/foo" with user "user2" using the sharing API
    Then user "user2" should see the following elements
      | /foo/       |
      | /foo%20(2)/ |

  Scenario Outline: sharing again an own file while belonging to a group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user1" has shared file "welcome.txt" with group "grp1"
    And user "user1" has deleted the last share
    When user "user1" shares file "/welcome.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
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
    And user "user0" has shared file "/test" with group "grp1"
    When user "user0" shares file "/test/sub" with user "user1" using the sharing API
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
    And group "grp1" has been created
    And user "user0" has been added to group "grp1"
    And user "user0" has created folder "/test"
    And user "user0" has created folder "/test/sub"
    And user "user0" has shared file "/test" with group "grp1"
    When user "user0" shares file "/test/sub" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user1" folder "/sub" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: sharing subfolder of already shared folder, GET result is correct
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
      | user4    |
    And user "user0" has created folder "/folder1"
    And user "user0" has shared file "/folder1" with user "user1"
    And user "user0" has shared file "/folder1" with user "user2"
    And user "user0" has created folder "/folder1/folder2"
    And user "user0" has shared file "/folder1/folder2" with user "user3"
    And user "user0" has shared file "/folder1/folder2" with user "user4"
    And as user "user0"
    When the user sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the response should contain 4 entries
    And file "/folder1" should be included as path in the response
    And file "/folder1/folder2" should be included as path in the response
    And the user sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares?path=/folder1/folder2"
    And the response should contain 2 entries
    And file "/folder1" should not be included as path in the response
    And file "/folder1/folder2" should be included as path in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-33733
  Scenario Outline: Cannot create share with zero permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    When user "user0" sends HTTP method "POST" to OCS API endpoint "/apps/files_sharing/api/v1/shares" with body
      | path        | welcome.txt |
      | shareWith   | user1       |
      | shareType   | 0           |
      | permissions | 0           |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 400             | 200              |
    #  | 1               | 400             | 400              |
      | 2               | 400             | 400              |

  @issue-33733 @skipOnLDAP @user_ldap-issue-378
  Scenario Outline: user who is excluded from sharing tries to share a file with another user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "excludedFromSharing" has been created
    And user "user0" has been added to group "excludedFromSharing"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["excludedFromSharing"]'
    And user "user0" has moved file "welcome.txt" to "fileToShare.txt"
    When user "user0" shares file "fileToShare.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "user1" file "fileToShare.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
    #  | 1               | 403             | 403              |
      | 2               | 200             | 200              |
    #  | 2               | 403             | 403              |

  @issue-33733
  Scenario Outline: user who is excluded from sharing tries to share a file with a group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "excludedFromSharing" has been created
    And group "anotherGroup" has been created
    And user "user0" has been added to group "excludedFromSharing"
    And user "user1" has been added to group "anotherGroup"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["excludedFromSharing"]'
    And user "user0" has moved file "welcome.txt" to "fileToShare.txt"
    When user "user0" shares file "fileToShare.txt" with group "anotherGroup" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "user1" file "fileToShare.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
    #  | 1               | 403             | 403              |
      | 2               | 200             | 200              |
    #  | 2               | 403             | 403              |

  @issue-33733 @skipOnLDAP @user_ldap-issue-378
  Scenario Outline: user who is excluded from sharing tries to share a folder with another user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "excludedFromSharing" has been created
    And user "user0" has been added to group "excludedFromSharing"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["excludedFromSharing"]'
    And user "user0" has created folder "folderToShare"
    When user "user0" shares folder "folderToShare" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "user1" folder "folderToShare" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
    #  | 1               | 403             | 403              |
      | 2               | 200             | 200              |
    #  | 2               | 403             | 403              |

  @issue-33733
  Scenario Outline: user who is excluded from sharing tries to share a folder with a group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "excludedFromSharing" has been created
    And group "anotherGroup" has been created
    And user "user0" has been added to group "excludedFromSharing"
    And user "user1" has been added to group "anotherGroup"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["excludedFromSharing"]'
    And user "user0" has created folder "folderToShare"
    When user "user0" shares file "folderToShare" with group "anotherGroup" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "user1" file "folderToShare" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
    #  | 1               | 403             | 403              |
      | 2               | 200             | 200              |
    #  | 2               | 403             | 403              |

  Scenario Outline: user shares a file with file name longer than 64 chars to another user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has moved file "welcome.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
    When user "user0" shares file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user1" file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: user shares a file with file name longer than 64 chars to a group
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been created with default attributes and without skeleton files
    And user "user1" has been added to group "grp1"
    And user "user0" has moved file "welcome.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
    When user "user0" shares file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user1" file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: user shares a folder with folder name longer than 64 chars to another user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "user0" has moved file "welcome.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/welcome.txt"
    When user "user0" shares folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the downloaded content when downloading file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/welcome.txt" for user "user1" with range "bytes=1-6" should be "elcome"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: user shares a folder with folder name longer than 64 chars to a group
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been created with default attributes and without skeleton files
    And user "user1" has been added to group "grp1"
    And user "user0" has created folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "user0" has moved file "welcome.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/welcome.txt"
    When user "user0" shares folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the downloaded content when downloading file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/welcome.txt" for user "user1" with range "bytes=1-6" should be "elcome"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: user creates a public link share of a file with file name longer than 64 chars
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has moved file "welcome.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
    When user "user0" creates a public link share using the sharing API with settings
      | path | /aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last public shared file should be able to be downloaded without a password
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: user creates a public link share of a folder with folder name longer than 64 chars
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "user0" has moved file "welcome.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/welcome.txt"
    When user "user0" creates a public link share using the sharing API with settings
      | path | /aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Then the public should be able to download the range "bytes=1-6" of file "/welcome.txt" from inside the last public shared folder and the content should be "elcome"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnEncryption @issue-encryption-126
  Scenario: share with user when username contains capital letters
    Given these users have been created without skeleton files:
      | username |
      | user1    |
    When user "user0" shares file "/welcome.txt" with user "USER1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with  |  user1       |
      | file_target | /welcome.txt |
      | path        | /welcome.txt |
      | permissions | 19           |
      | uid_owner   | user0        |
    And user "user1" should see the following elements
      | /welcome.txt |

  Scenario: creating a new share with user of a group when username contains capital letters
    Given these users have been created without skeleton files:
      | username |
      | user1    |
    And group "grp1" has been created
    And user "USER1" has been added to group "grp1"
    And user "user0" has shared file "welcome.txt" with group "grp1"
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /welcome.txt |

@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: sharing

  Background:
    Given user "user0" has been created with default attributes and without skeleton files
    And user "user0" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"

  @smokeTest
    @skipOnEncryptionType:user-keys @issue-32322
  Scenario Outline: Creating a share of a file with a user, the default permissions are read(1)+update(2)+can-share(16)
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    When user "user0" shares file "textfile0.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with             | user1             |
      | share_with_displayname | User One          |
      | file_target            | /textfile0.txt    |
      | path                   | /textfile0.txt    |
      | permissions            | share,read,update |
      | uid_owner              | user0             |
      | displayname_owner      | User Zero         |
      | item_type              | file              |
      | mimetype               | text/plain        |
      | storage_id             | ANY_VALUE         |
      | share_type             | user              |
    And the content of file "/textfile0.txt" for user "user1" should be "ownCloud test text file 0"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a share of a file with a user and asking for various permission combinations
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    When user "user0" shares file "textfile0.txt" with user "user1" with permissions <requested_permissions> using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with             | user1                 |
      | share_with_displayname | User One              |
      | file_target            | /textfile0.txt        |
      | path                   | /textfile0.txt        |
      | permissions            | <granted_permissions> |
      | uid_owner              | user0                 |
      | displayname_owner      | User Zero             |
      | item_type              | file                  |
      | mimetype               | text/plain            |
      | storage_id             | ANY_VALUE             |
      | share_type             | user                  |
    Examples:
      | ocs_api_version | requested_permissions | granted_permissions | ocs_status_code |
      # Ask for full permissions. You get share plus read plus update. create and delete do not apply to shares of a file
      | 1               | 31                    | 19                  | 100             |
      | 2               | 31                    | 19                  | 200             |
      # Ask for read, share (17), create and delete. You get share plus read
      | 1               | 29                    | 17                  | 100             |
      | 2               | 29                    | 17                  | 200             |
      # Ask for read, update, create, delete. You get read plus update.
      | 1               | 15                    | 3                   | 100             |
      | 2               | 15                    | 3                   | 200             |
      # Ask for just update. You get exactly update (you do not get read or anything else)
      | 1               | 2                     | 2                   | 100             |
      | 2               | 2                     | 2                   | 200             |

  Scenario Outline: Creating a share of a file with no permissions should fail
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has uploaded file with content "user0 file" to "randomfile.txt"
    When user "user0" shares file "randomfile.txt" with user "user1" with permissions "0" using the sharing API
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And as "user1" file "randomfile.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  Scenario Outline: Creating a share of a folder with no permissions should fail
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/afolder"
    When user "user0" shares folder "afolder" with user "user1" with permissions "0" using the sharing API
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And as "user1" folder "afolder" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  Scenario Outline: Creating a share of a folder with a user, the default permissions are all permissions(31)
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/FOLDER"
    When user "user0" shares folder "/FOLDER" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with             | user1                |
      | share_with_displayname | User One             |
      | file_target            | /FOLDER              |
      | path                   | /FOLDER              |
      | permissions            | all                  |
      | uid_owner              | user0                |
      | displayname_owner      | User Zero            |
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | storage_id             | ANY_VALUE            |
      | share_type             | user                 |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a share of a file with a group, the default permissions are read(1)+update(2)+can-share(16)
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    When user "user0" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with             | grp1              |
      | share_with_displayname | grp1              |
      | file_target            | /textfile0.txt    |
      | path                   | /textfile0.txt    |
      | permissions            | share,read,update |
      | uid_owner              | user0             |
      | displayname_owner      | User Zero         |
      | item_type              | file              |
      | mimetype               | text/plain        |
      | storage_id             | ANY_VALUE         |
      | share_type             | group             |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a share of a folder with a group, the default permissions are all permissions(31)
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user0" has created folder "/FOLDER"
    When user "user0" shares folder "/FOLDER" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with             | grp1                 |
      | share_with_displayname | grp1                 |
      | file_target            | /FOLDER              |
      | path                   | /FOLDER              |
      | permissions            | all                  |
      | uid_owner              | user0                |
      | displayname_owner      | User Zero            |
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | storage_id             | ANY_VALUE            |
      | share_type             | group                |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Share of folder to a group
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 and user2 are in grp1
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user0" has created folder "/PARENT"
    And user "user0" has uploaded file with content "file in parent folder" to "/PARENT/parent.txt"
    When user "user0" shares folder "/PARENT" with group "grp1" using the sharing API
    Then user "user1" should see the following elements
      | /PARENT/           |
      | /PARENT/parent.txt |
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "user2" should see the following elements
      | /PARENT/           |
      | /PARENT/parent.txt |
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: sharing again an own file while belonging to a group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user1" has been added to group "grp1"
    And user "user1" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "user1" has shared file "textfile0.txt" with group "grp1"
    And user "user1" has deleted the last share
    When user "user1" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
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
    And user "user0" has shared folder "/folder1" with user "user1"
    And user "user0" has shared folder "/folder1" with user "user2"
    And user "user0" has created folder "/folder1/folder2"
    And user "user0" has shared folder "/folder1/folder2" with user "user3"
    And user "user0" has shared folder "/folder1/folder2" with user "user4"
    And as user "user0"
    When the user sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the response should contain 4 entries
    And folder "/folder1" should be included as path in the response
    And folder "/folder1/folder2" should be included as path in the response
    And the user sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares?path=/folder1/folder2"
    And the response should contain 2 entries
    And folder "/folder1" should not be included as path in the response
    And folder "/folder1/folder2" should be included as path in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: user shares a file with file name longer than 64 chars to another user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has moved file "textfile0.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
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
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user1" has been added to group "grp1"
    And user "user0" has moved file "textfile0.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
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
    And user "user0" has moved file "textfile0.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/textfile0.txt"
    When user "user0" shares folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the downloaded content when downloading file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/textfile0.txt" for user "user1" with range "bytes=1-6" should be "wnClou"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: user shares a folder with folder name longer than 64 chars to a group
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been created with default attributes and without skeleton files
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user1" has been added to group "grp1"
    And user "user0" has created folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "user0" has moved file "textfile0.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/textfile0.txt"
    When user "user0" shares folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the downloaded content when downloading file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/textfile0.txt" for user "user1" with range "bytes=1-6" should be "wnClou"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-35484
  Scenario: share with user when username contains capital letters
    Given these users have been created without skeleton files:
      | username |
      | user1    |
    And user "user0" has uploaded file with content "user0 file" to "/randomfile.txt"
    When user "user0" shares file "/randomfile.txt" with user "USER1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with  | USER1             |
      | file_target | /randomfile.txt   |
      | path        | /randomfile.txt   |
      | permissions | share,read,update |
      | uid_owner   | user0             |
    #And user "user1" should see the following elements
    #  | /randomfile.txt |
    #And the content of file "randomfile.txt" for user "user1" should be "user0 file"
    And user "user1" should not see the following elements
      | /randomfile.txt |

  Scenario: creating a new share with user of a group when username contains capital letters
    Given these users have been created without skeleton files:
      | username |
      | user1    |
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 is in grp1
    And user "USER1" has been added to group "grp1"
    And user "user0" has uploaded file with content "user0 file" to "/randomfile.txt"
    And user "user0" has shared file "randomfile.txt" with group "grp1"
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /randomfile.txt |
    And the content of file "randomfile.txt" for user "user1" should be "user0 file"

  Scenario Outline: Share of folder to a group with emoji in the name
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "😀 😁" has been created
    # Note: in the user_ldap test environment user1 and user2 are already in this group
    And user "user1" has been added to group "😀 😁"
    And user "user2" has been added to group "😀 😁"
    And user "user0" has created folder "/PARENT"
    And user "user0" has uploaded file with content "file in parent folder" to "/PARENT/parent.txt"
    When user "user0" shares folder "/PARENT" with group "😀 😁" using the sharing API
    Then user "user1" should see the following elements
      | /PARENT/           |
      | /PARENT/parent.txt |
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "user2" should see the following elements
      | /PARENT/           |
      | /PARENT/parent.txt |
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnEncryptionType:user-keys @encryption-issue-132
  Scenario Outline: share with a group and then add a user to that group
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
    And user "user0" has uploaded file with content "some content" to "lorem.txt"
    When user "user0" shares file "lorem.txt" with group "grp1" using the sharing API
    And the administrator adds user "user2" to group "grp1" using the provisioning API
    Then the content of file "lorem.txt" for user "user1" should be "some content"
    And the content of file "lorem.txt" for user "user2" should be "some content"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnLDAP
  # deleting an LDAP group is not relevant or possible using the provisioning API
  Scenario Outline: shares shared to deleted group should not be available
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user0" has shared file "/textfile0.txt" with group "grp1"
    And as user "user0"
    When the user sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with  | grp1           |
      | file_target | /textfile0.txt |
      | path        | /textfile0.txt |
      | uid_owner   | user0          |
    And as "user1" file "/textfile0.txt" should exist
    And as "user2" file "/textfile0.txt" should exist
    When the administrator deletes group "grp1" using the provisioning API
    And as user "user0"
    When the user sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And file "/textfile0.txt" should not be included as path in the response
    And as "user1" file "/textfile0.txt" should not exist
    And as "user2" file "/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario: Share a file by multiple channels and download from sub-folder and direct file share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user0" has created folder "/common"
    And user "user0" has created folder "/common/sub"
    And user "user0" has shared folder "common" with group "grp1"
    And user "user1" has uploaded file with content "ownCloud" to "/textfile0.txt"
    And user "user1" has shared file "textfile0.txt" with user "user2"
    And user "user1" has moved file "/textfile0.txt" to "/common/textfile0.txt"
    And user "user1" has moved file "/common/textfile0.txt" to "/common/sub/textfile0.txt"
    When user "user2" uploads file "filesForUpload/file_to_overwrite.txt" to "/textfile0.txt" using the WebDAV API
    And the content of file "/common/sub/textfile0.txt" for user "user2" should be "BLABLABLA" plus end-of-line
    And the content of file "/textfile0.txt" for user "user2" should be "BLABLABLA" plus end-of-line
    And user "user2" should see the following elements
      | /common/sub/textfile0.txt |
      | /textfile0.txt            |


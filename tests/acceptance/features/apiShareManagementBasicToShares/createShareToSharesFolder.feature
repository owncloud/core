@api @files_sharing-app-required
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files

  @smokeTest @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  @skipOnEncryptionType:user-keys @issue-32322
  Scenario Outline: Creating a share of a file with a user, the default permissions are read(1)+update(2)+can-share(16)
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    When user "Alice" shares file "textfile0.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%            |
      | share_with_displayname | %displayname%         |
      | share_with_user_type   | 0                     |
      | file_target            | /Shares/textfile0.txt |
      | path                   | /textfile0.txt        |
      | permissions            | share,read,update     |
      | uid_owner              | %username%            |
      | displayname_owner      | %displayname%         |
      | item_type              | file                  |
      | mimetype               | text/plain            |
      | storage_id             | ANY_VALUE             |
      | share_type             | user                  |
    When user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the content of file "/Shares/textfile0.txt" for user "Brian" should be "ownCloud test text file 0"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  @skipOnEncryptionType:user-keys @issue-32322 @issue-ocis-2133
  Scenario Outline: Creating a share of a file containing commas in the filename, with a user, the default permissions are read(1)+update(2)+can-share(16)
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "file with comma in filename" to "/sample,1.txt"
    When user "Alice" shares file "sample,1.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%           |
      | share_with_displayname | %displayname%        |
      | file_target            | /Shares/sample,1.txt |
      | path                   | /sample,1.txt        |
      | permissions            | share,read,update    |
      | uid_owner              | %username%           |
      | displayname_owner      | %displayname%        |
      | item_type              | file                 |
      | mimetype               | text/plain           |
      | storage_id             | ANY_VALUE            |
      | share_type             | user                 |
    When user "Brian" accepts share "/sample,1.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the content of file "/Shares/sample,1.txt" for user "Brian" should be "file with comma in filename"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-2133 @issue-ocis-reva-301 @issue-ocis-reva-302
  Scenario Outline: Creating a share of a file with a user and asking for various permission combinations
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    When user "Alice" shares file "textfile0.txt" with user "Brian" with permissions <requested_permissions> using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%            |
      | share_with_displayname | %displayname%         |
      | file_target            | /Shares/textfile0.txt |
      | path                   | /textfile0.txt        |
      | permissions            | <granted_permissions> |
      | uid_owner              | %username%            |
      | displayname_owner      | %displayname%         |
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
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "Random data" to "randomfile.txt"
    When user "Alice" shares file "randomfile.txt" with user "Brian" with permissions "0" using the sharing API
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And the sharing API should report that no shares are shared with user "Brian"
    And as "Brian" file "/Shares/randomfile.txt" should not exist
    And as "Brian" file "randomfile.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  Scenario Outline: Creating a share of a folder with no permissions should fail
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/afolder"
    When user "Alice" shares folder "afolder" with user "Brian" with permissions "0" using the sharing API
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And the sharing API should report that no shares are shared with user "Brian"
    And as "Brian" folder "/Shares/afolder" should not exist
    And as "Brian" folder "afolder" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  @issue-ocis-2133
  Scenario Outline: Creating a share of a folder with a user, the default permissions are all permissions(31)
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/FOLDER"
    When user "Alice" shares folder "/FOLDER" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%           |
      | share_with_displayname | %displayname%        |
      | file_target            | /Shares/FOLDER       |
      | path                   | /FOLDER              |
      | permissions            | all                  |
      | uid_owner              | %username%           |
      | displayname_owner      | %displayname%        |
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | storage_id             | ANY_VALUE            |
      | share_type             | user                 |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-34
  Scenario Outline: Creating a share of a file with a group, the default permissions are read(1)+update(2)+can-share(16)
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    When user "Alice" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | share_with             | grp1                  |
      | share_with_displayname | grp1                  |
      | file_target            | /Shares/textfile0.txt |
      | path                   | /textfile0.txt        |
      | permissions            | share,read,update     |
      | uid_owner              | %username%            |
      | displayname_owner      | %displayname%         |
      | item_type              | file                  |
      | mimetype               | text/plain            |
      | storage_id             | ANY_VALUE             |
      | share_type             | group                 |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-34
  Scenario Outline: Creating a share of a folder with a group, the default permissions are all permissions(31)
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has created folder "/FOLDER"
    When user "Alice" shares folder "/FOLDER" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | grp1                 |
      | share_with_displayname | grp1                 |
      | file_target            | /Shares/FOLDER       |
      | path                   | /FOLDER              |
      | permissions            | all                  |
      | uid_owner              | %username%           |
      | displayname_owner      | %displayname%        |
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | storage_id             | ANY_VALUE            |
      | share_type             | group                |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: Share of folder to a group
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "file in parent folder" to "/PARENT/parent.txt"
    When user "Alice" shares folder "/PARENT" with group "grp1" using the sharing API
    And user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And user "Brian" should see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
    And user "Carol" should see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @skipOnReva # reva doesn't have a pre-created admin user
  Scenario Outline: User included in multiple groups receives a share from the admin
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Alice" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And admin has created folder "/PARENT"
    When user "admin" shares folder "/PARENT" with group "grp1" using the sharing API
    And user "Alice" accepts share "/PARENT" offered by user "admin" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: user included in multiple groups, shares a folder with a group
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Alice" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has been added to group "grp2"
    And user "Alice" has created folder "/PARENT"
    When user "Alice" shares folder "/PARENT" with group "grp1" using the sharing API
    And user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: sharing again an own file while belonging to a group
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has uploaded file with content "ownCloud test text file 0" to "/randomfile.txt"
    And user "Brian" has shared file "randomfile.txt" with group "grp1"
    And user "Brian" has deleted the last share
    When user "Brian" shares file "/randomfile.txt" with group "grp1" using the sharing API
    And user "Alice" accepts share "/randomfile.txt" offered by user "Brian" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Alice" file "/Shares/randomfile.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-2201
  Scenario Outline: sharing subfolder of already shared folder, GET result is correct
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
      | David    |
      | Emily    |
    And user "Alice" has created folder "/folder1"
    And user "Alice" has shared folder "/folder1" with user "Brian"
    And user "Alice" has shared folder "/folder1" with user "Carol"
    And user "Alice" has created folder "/folder1/folder2"
    And user "Alice" has shared folder "/folder1/folder2" with user "David"
    And user "Alice" has shared folder "/folder1/folder2" with user "Emily"
    When user "Alice" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the response should contain 4 entries
    And folder "/folder1" should be included as path in the response
    And folder "/folder1/folder2" should be included as path in the response
    When user "Alice" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares?path=/folder1/folder2"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the response should contain 2 entries
    And folder "/folder1" should not be included as path in the response
    And folder "/folder1/folder2" should be included as path in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: user shares a file with file name longer than 64 chars to another user
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has moved file "textfile0.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
    When user "Alice" shares file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" with user "Brian" using the sharing API
    And user "Brian" accepts share "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" file "/Shares/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: user shares a file with file name longer than 64 chars to a group
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has moved file "textfile0.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
    When user "Alice" shares file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" with group "grp1" using the sharing API
    And user "Brian" accepts share "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" file "/Shares/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: user shares a folder with folder name longer than 64 chars to another user
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test" to "/textfile0.txt"
    And user "Alice" has created folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "Alice" has moved file "textfile0.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/textfile0.txt"
    When user "Alice" shares folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" with user "Brian" using the sharing API
    And user "Brian" accepts share "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And the content of file "/Shares/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/textfile0.txt" for user "Brian" should be "ownCloud test"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: user shares a folder with folder name longer than 64 chars to a group
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "ownCloud test" to "/textfile0.txt"
    And user "Alice" has created folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "Alice" has moved file "textfile0.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/textfile0.txt"
    When user "Alice" shares folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" with group "grp1" using the sharing API
    And user "Brian" accepts share "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And the content of file "/Shares/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/textfile0.txt" for user "Brian" should be "ownCloud test"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-11 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: share with user when username contains capital letters
    Given these users have been created without skeleton files:
      | username |
      | brian    |
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" shares file "/randomfile.txt" with user "BRIAN" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "BRIAN" should include
      | share_with  | brian                  |
      | file_target | /Shares/randomfile.txt |
      | path        | /randomfile.txt        |
      | permissions | share,read,update      |
      | uid_owner   | %username%             |
    When user "brian" accepts share "/randomfile.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brian" should see the following elements
     | /Shares/randomfile.txt |
    And the content of file "Shares/randomfile.txt" for user "brian" should be "Random data"

  @skipOnLDAP @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: creating a new share with user of a group when username contains capital letters
    Given these users have been created without skeleton files:
      | username |
      | Brian    |
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    And user "Alice" has shared file "randomfile.txt" with group "grp1"
    When user "Brian" accepts share "/randomfile.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /Shares/randomfile.txt |
    And the content of file "/Shares/randomfile.txt" for user "Brian" should be "Random data"

  @issue-ocis-reva-34 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: Share of folder to a group with emoji in the name
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And group "😀 😁" has been created
    And user "Brian" has been added to group "😀 😁"
    And user "Carol" has been added to group "😀 😁"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "file in parent folder" to "/PARENT/parent.txt"
    When user "Alice" shares folder "/PARENT" with group "😀 😁" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Carol" accepts share "/PARENT" offered by user "Alice" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
    And user "Carol" should see the following elements
      | /Shares/PARENT/           |
      | /Shares/PARENT/parent.txt |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnEncryptionType:user-keys @encryption-issue-132 @skipOnLDAP @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @skipOnGraph
  Scenario Outline: share with a group and then add a user to that group
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file with content "some content" to "lorem.txt"
    When user "Alice" shares file "lorem.txt" with group "grp1" using the sharing API
    And user "Brian" accepts share "/lorem.txt" offered by user "Alice" using the sharing API
    And the administrator adds user "Carol" to group "grp1" using the provisioning API
    And user "Carol" accepts share "/lorem.txt" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And the content of file "/Shares/lorem.txt" for user "Brian" should be "some content"
    And the content of file "/Shares/lorem.txt" for user "Carol" should be "some content"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnLDAP
  # deleting an LDAP group is not relevant or possible using the provisioning API
  Scenario Outline: shares shared to deleted group should not be available
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with group "grp1"
    When user "Alice" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | share_with  | grp1           |
      | file_target | <path>         |
      | path        | /textfile0.txt |
      | uid_owner   | %username%     |
    When user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And user "Carol" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then as "Brian" file "/Shares/textfile0.txt" should exist
    And as "Carol" file "/Shares/textfile0.txt" should exist
    When the administrator deletes group "grp1" using the provisioning API
    And user "Alice" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And file "/textfile0.txt" should not be included as path in the response
    And as "Brian" file "/Shares/textfile0.txt" should not exist
    And as "Carol" file "/Shares/textfile0.txt" should not exist
    @skipOnOcis @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | ocs_api_version | ocs_status_code | path                  |
      | 1               | 100             | /Shares/textfile0.txt |
      | 2               | 200             | /Shares/textfile0.txt |
    @skipOnOcV10 @issue-ocis-2441
    Examples:
      | ocs_api_version | ocs_status_code | path           |
      | 1               | 100             | /textfile0.txt |
      | 2               | 200             | /textfile0.txt |


  @skipOnFilesClassifier @issue-files-classifier-291 @issue-ocis-2146 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: Share a file by multiple channels and download from sub-folder and direct file share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "/common"
    And user "Alice" has created folder "/common/sub"
    And user "Alice" has shared folder "common" with group "grp1"
    And user "Brian" has accepted share "/common" offered by user "Alice"
    And user "Carol" has accepted share "/common" offered by user "Alice"
    And user "Brian" has uploaded file with content "ownCloud" to "/textfile0.txt"
    And user "Brian" has shared file "textfile0.txt" with user "Carol"
    And user "Carol" has accepted share "/textfile0.txt" offered by user "Brian"
    And user "Brian" has moved file "/textfile0.txt" to "/Shares/common/textfile0.txt"
    And user "Brian" has moved file "/Shares/common/textfile0.txt" to "/Shares/common/sub/textfile0.txt"
    When user "Carol" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/Shares/common/sub/textfile0.txt" for user "Carol" should be "BLABLABLA" plus end-of-line
    And the content of file "/Shares/textfile0.txt" for user "Carol" should be "BLABLABLA" plus end-of-line
    And user "Carol" should see the following elements
      | /Shares/common/sub/textfile0.txt |
      | /Shares/textfile0.txt            |
    And the content of file "/Shares/common/sub/textfile0.txt" for user "Brian" should be "BLABLABLA" plus end-of-line
    And the content of file "/common/sub/textfile0.txt" for user "Alice" should be "BLABLABLA" plus end-of-line

  @issue-enterprise-3896 @issue-ocis-2201
  Scenario Outline: sharing back to resharer is allowed
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "userZeroFolder"
    And user "Alice" has shared folder "userZeroFolder" with user "Brian"
    And user "Brian" has accepted share "/userZeroFolder" offered by user "Alice"
    And user "Brian" has created folder "/Shares/userZeroFolder/userOneFolder"
    And user "Brian" has shared folder "/Shares/userZeroFolder/userOneFolder" with user "Carol" with permissions "read, share"
    And user "Carol" has accepted share "<pending_share_path>" offered by user "Brian"
    When user "Carol" shares folder "/Shares/userOneFolder" with user "Brian" using the sharing API
    Then the HTTP status code should be "200"
#    Then the HTTP status code should be "405"
    And the sharing API should report to user "Brian" that no shares are in the pending state
    And as "Brian" folder "/Shares/userOneFolder" should not exist
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | pending_share_path |
      | /userOneFolder     |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | pending_share_path            |
      | /userZeroFolder/userOneFolder |

  @issue-enterprise-3896 @issue-ocis-2201
  Scenario Outline: sharing back to original sharer is allowed
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "userZeroFolder"
    And user "Alice" has shared folder "userZeroFolder" with user "Brian"
    And user "Brian" has accepted share "/userZeroFolder" offered by user "Alice"
    And user "Brian" has created folder "/Shares/userZeroFolder/userOneFolder"
    And user "Brian" has shared folder "/Shares/userZeroFolder/userOneFolder" with user "Carol" with permissions "read, share"
    And user "Carol" has accepted share "<pending_share_path>" offered by user "Brian"
    When user "Carol" shares folder "/Shares/userOneFolder" with user "Alice" using the sharing API
    Then the HTTP status code should be "200"
#    Then the HTTP status code should be "405"
    And the sharing API should report to user "Alice" that no shares are in the pending state
    And as "Alice" folder "/Shares/userOneFolder" should not exist
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | pending_share_path |
      | /userOneFolder     |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | pending_share_path            |
      | /userZeroFolder/userOneFolder |

  @issue-enterprise-3896 @issue-ocis-2201
  Scenario Outline: sharing a subfolder to a user that already received parent folder share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
      | David    |
    And user "Alice" has created folder "userZeroFolder"
    And user "Alice" has shared folder "userZeroFolder" with user "Brian"
    And user "Alice" has shared folder "userZeroFolder" with user "Carol"
    And user "Brian" has accepted share "/userZeroFolder" offered by user "Alice"
    And user "Carol" has accepted share "/userZeroFolder" offered by user "Alice"
    And user "Brian" has created folder "/Shares/userZeroFolder/userOneFolder"
    And user "Brian" has shared folder "/Shares/userZeroFolder/userOneFolder" with user "David" with permissions "read, share"
    And user "David" has accepted share "<pending_share_path>" offered by user "Brian"
    When user "David" shares folder "/Shares/userOneFolder" with user "Carol" using the sharing API
    Then the HTTP status code should be "200"
#    Then the HTTP status code should be "405"
    And the sharing API should report to user "Carol" that no shares are in the pending state
    And as "Carol" folder "/Shares/userOneFolder" should not exist
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | pending_share_path |
      | /userOneFolder     |

    @skipOnAllVersionsGreaterThanOcV10.8.0 @skipOnOcis @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
    Examples:
      | pending_share_path            |
      | /userZeroFolder/userOneFolder |

  @smokeTest @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: Creating a share of a renamed file
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has moved file "/textfile0.txt" to "/renamed.txt"
    When user "Alice" shares file "renamed.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%            |
      | share_with_displayname | %displayname%         |
      | file_target            | /Shares/renamed.txt |
      | path                   | /renamed.txt        |
      | permissions            | share,read,update     |
      | uid_owner              | %username%            |
      | displayname_owner      | %displayname%         |
      | item_type              | file                  |
      | mimetype               | text/plain            |
      | storage_id             | ANY_VALUE             |
      | share_type             | user                  |
    When user "Brian" accepts share "/renamed.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the content of file "/Shares/renamed.txt" for user "Brian" should be "ownCloud test text file 0"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @issue-ocis-903
  Scenario Outline: shares to a deleted user should not be listed as shares for the sharer
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has shared file "textfile0.txt" with user "Carol"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    And user "Carol" has accepted share "/textfile0.txt" offered by user "Alice"
    And the administrator has deleted user "Brian" using the provisioning API
    When user "Alice" gets all the shares from the file "textfile0.txt" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Carol" should be included in the response
    But user "Brian" should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-719 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: Creating a share of a renamed file when another share exists
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/Folder1"
    And user "Alice" has created folder "/Folder2"
    And user "Alice" has shared folder "/Folder1" with user "Brian"
    And user "Brian" has accepted share "/Folder1" offered by user "Alice"
    And user "Alice" has moved file "/Folder2" to "/renamedFolder2"
    When user "Alice" shares folder "/renamedFolder2" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%             |
      | share_with_displayname | %displayname%          |
      | file_target            | /Shares/renamedFolder2 |
      | path                   | /renamedFolder2        |
      | permissions            | all                    |
      | uid_owner              | %username%             |
      | displayname_owner      | %displayname%          |
      | item_type              | folder                 |
      | mimetype               | httpd/unix-directory   |
      | storage_id             | ANY_VALUE              |
      | share_type             | user                   |
    When user "Brian" accepts share "/renamedFolder2" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" folder "/Shares/renamedFolder2" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-1710
  Scenario Outline: Sharing a same file twice to the same group is not possible
    Given using OCS API version "<ocs-api-version>"
    And group "grp1" has been created
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    When user "Alice" shares file "textfile0.txt" with group "grp1" using the sharing API
    Then the HTTP status code should be "<http-status>"
    And the OCS status code should be "403"
    And the OCS status message should be "Path already shared with this group"
    Examples:
      | ocs-api-version | http-status |
      | 1               | 200         |
      | 2               | 403         |

  @issue-ocis-2215 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: Sharing the shares folder to users is not possible
    Given using OCS API version "<ocs-api-version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" shares folder "Shares" with user "Carol" using the sharing API
    Then the HTTP status code should be "<http-status>"
    And the OCS status code should be "403"
    And the OCS status message should be "Path contains files shared with you"
    Examples:
      | ocs-api-version | http-status |
      | 1               | 200         |
      | 2               | 403         |

  @issue-ocis-2215 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: Sharing the shares folder to groups is not possible
    Given using OCS API version "<ocs-api-version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And group "share_group" has been created
    And user "Carol" has been added to group "share_group"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" shares folder "Shares" with group "share_group" using the sharing API
    Then the HTTP status code should be "<http-status>"
    And the OCS status code should be "403"
    And the OCS status message should be "Path contains files shared with you"
    Examples:
      | ocs-api-version | http-status |
      | 1               | 200         |
      | 2               | 403         |

  @issue-ocis-2215 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: Sharing the shares folder as public link is not possible
    Given using OCS API version "<ocs-api-version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" creates a public link share of folder "Shares" using the sharing API
    Then the HTTP status code should be "<http-status>"
    And the OCS status code should be "403"
    And the OCS status message should be "Path contains files shared with you"
    Examples:
      | ocs-api-version | http-status |
      | 1               | 200         |
      | 2               | 403         |

@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: sharing

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: Allow modification of reshare
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user0" has created folder "/TMP"
    And user "user0" has shared folder "TMP" with user "user1"
    And user "user1" has shared folder "TMP" with user "user2"
    When user "user1" updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And user "user2" should not be able to upload file "filesForUpload/textfile.txt" to "TMP/textfile.txt"
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "TMP/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: keep group permissions in sync
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and skeleton files
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user1" has been added to group "grp1"
    And user "user0" has shared file "textfile0.txt" with group "grp1"
    And user "user1" has moved file "/textfile0 (2).txt" to "/FOLDER/textfile0.txt"
    And as user "user0"
    When the user updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | id                | A_NUMBER       |
      | item_type         | file           |
      | item_source       | A_NUMBER       |
      | share_type        | group          |
      | file_source       | A_NUMBER       |
      | file_target       | /textfile0.txt |
      | permissions       | read           |
      | stime             | A_NUMBER       |
      | storage           | A_NUMBER       |
      | mail_send         | 0              |
      | uid_owner         | user0          |
      | file_parent       | A_NUMBER       |
      | displayname_owner | User Zero      |
      | mimetype          | text/plain     |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Cannot set permissions to zero
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user0" has shared folder "/FOLDER" with group "grp1"
    When user "user0" updates the last share using the sharing API with
      | permissions | 0 |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  Scenario Outline: Cannot update a share of a file with a user to have only create and/or delete permission
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has shared file "textfile0.txt" with user "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | <permissions> |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    # user1 should still have at least read access to the shared file
    And as "user1" entry "textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code | permissions   |
      | 1               | 200              | create        |
      | 2               | 400              | create        |
      | 1               | 200              | delete        |
      | 2               | 400              | delete        |
      | 1               | 200              | create,delete |
      | 2               | 400              | create,delete |

  Scenario Outline: Cannot update a share of a file with a group to have only create and/or delete permission
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has shared file "textfile0.txt" with group "grp1"
    When user "user0" updates the last share using the sharing API with
      | permissions | <permissions> |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    # user1 in grp1 should still have at least read access to the shared file
    And as "user1" entry "textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code | permissions   |
      | 1               | 200              | create        |
      | 2               | 400              | create        |
      | 1               | 200              | delete        |
      | 2               | 400              | delete        |
      | 1               | 200              | create,delete |
      | 2               | 400              | create,delete |

  Scenario: Share ownership change after moving a shared file outside of an outer share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user0" has created folder "/folder1"
    And user "user0" has created folder "/folder1/folder2"
    And user "user1" has created folder "/moved-out"
    And user "user0" has shared folder "/folder1" with user "user1" with permissions "all"
    And user "user1" has shared folder "/folder1/folder2" with user "user2" with permissions "all"
    When user "user1" moves folder "/folder1/folder2" to "/moved-out/folder2" using the WebDAV API
    And user "user1" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | user                 |
      | file_source       | A_NUMBER             |
      | file_target       | /folder2             |
      | permissions       | all                  |
      | stime             | A_NUMBER             |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user1                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User One             |
      | mimetype          | httpd/unix-directory |
    And as "user0" folder "/folder1/folder2" should not exist
    And as "user2" folder "/folder2" should exist

  Scenario: Share ownership change after moving a shared file to another share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user0" has created folder "/user0-folder"
    And user "user0" has created folder "/user0-folder/folder2"
    And user "user2" has created folder "/user2-folder"
    And user "user0" has shared folder "/user0-folder" with user "user1" with permissions "all"
    And user "user2" has shared folder "/user2-folder" with user "user1" with permissions "all"
    When user "user1" moves folder "/user0-folder/folder2" to "/user2-folder/folder2" using the WebDAV API
    And user "user2" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | user                 |
      | file_source       | A_NUMBER             |
      | file_target       | /user2-folder        |
      | permissions       | all                  |
      | stime             | A_NUMBER             |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user2                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Two             |
      | mimetype          | httpd/unix-directory |
    And as "user0" folder "/user0-folder/folder2" should not exist
    And as "user2" folder "/user2-folder/folder2" should exist

  Scenario Outline: Increasing permissions is allowed for owner
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user2" has been created with default attributes and skeleton files
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 and user2 are in grp1
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And as user "user2"
    And the user has shared folder "/FOLDER" with group "grp1"
    And the user has updated the last share with
      | permissions | read |
    When the user updates the last share using the sharing API with
      | permissions | all |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "FOLDER/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Forbid sharing with groups
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "user0" shares file "/welcome.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: Editing share permission of existing share is forbidden when sharing with groups is forbidden
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user0" has shared file "textfile0.txt" with group "grp1"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "user0" updates the last share using the sharing API with
      | permissions | read, create |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    When user "user0" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | item_type         | file                |
      | item_source       | A_NUMBER            |
      | share_type        | group               |
      | file_target       | /textfile0.txt      |
      | permissions       | read, update, share |
      | mail_send         | 0                   |
      | uid_owner         | user0               |
      | file_parent       | A_NUMBER            |
      | displayname_owner | User Zero           |
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  Scenario Outline: Deleting group share is allowed when sharing with groups is forbidden
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    # Note: in the user_ldap test environment user1 is in grp1
    And user "user0" has shared file "textfile0.txt" with group "grp1"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "user0" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "user0" gets the info of the last share using the sharing API
    Then the last response should be empty
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

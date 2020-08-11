@api @files_sharing-app-required
Feature: sharing

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files

  @smokeTest @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Allow modification of reshare
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "/TMP"
    And user "Alice" has shared folder "TMP" with user "Brian"
    And user "Brian" has shared folder "TMP" with user "Carol"
    When user "Brian" updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And user "Carol" should not be able to upload file "filesForUpload/textfile.txt" to "TMP/textfile.txt"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "TMP/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-243
  Scenario Outline: keep group permissions in sync
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has moved file "/textfile0 (2).txt" to "/FOLDER/textfile0.txt"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | id                | A_STRING       |
      | item_type         | file           |
      | item_source       | A_STRING       |
      | share_type        | group          |
      | file_source       | A_STRING       |
      | file_target       | /textfile0.txt |
      | permissions       | read           |
      | stime             | A_NUMBER       |
      | storage           | A_STRING       |
      | mail_send         | 0              |
      | uid_owner         | %username%     |
      | displayname_owner | %displayname%  |
      | mimetype          | text/plain     |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-243
  Scenario Outline: Cannot set permissions to zero
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    When user "Alice" updates the last share using the sharing API with
      | permissions | 0 |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario Outline: Cannot update a share of a file with a user to have only create and/or delete permission
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Alice" updates the last share using the sharing API with
      | permissions | <permissions> |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    # Brian should still have at least read access to the shared file
    And as "Brian" entry "textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code | permissions   |
      | 1               | 200              | create        |
      | 2               | 400              | create        |
      | 1               | 200              | delete        |
      | 2               | 400              | delete        |
      | 1               | 200              | create,delete |
      | 2               | 400              | create,delete |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-243
  Scenario Outline: Cannot update a share of a file with a group to have only create and/or delete permission
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    When user "Alice" updates the last share using the sharing API with
      | permissions | <permissions> |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    # Brian in grp1 should still have at least read access to the shared file
    And as "Brian" entry "textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code | permissions   |
      | 1               | 200              | create        |
      | 2               | 400              | create        |
      | 1               | 200              | delete        |
      | 2               | 400              | delete        |
      | 1               | 200              | create,delete |
      | 2               | 400              | create,delete |

  @skipOnFilesClassifier @issue-files-classifier-291 @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @issue-ocis-reva-243
  Scenario: Share ownership change after moving a shared file outside of an outer share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "/folder1"
    And user "Alice" has created folder "/folder1/folder2"
    And user "Brian" has created folder "/moved-out"
    And user "Alice" has shared folder "/folder1" with user "Brian" with permissions "all"
    And user "Brian" has shared folder "/folder1/folder2" with user "Carol" with permissions "all"
    When user "Brian" moves folder "/folder1/folder2" to "/moved-out/folder2" using the WebDAV API
    And user "Brian" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Brian" sharing with user "Carol" should include
      | id                | A_STRING             |
      | item_type         | folder               |
      | item_source       | A_STRING             |
      | share_type        | user                 |
      | file_source       | A_STRING             |
      | file_target       | /folder2             |
      | permissions       | all                  |
      | stime             | A_NUMBER             |
      | storage           | A_STRING             |
      | mail_send         | 0                    |
      | uid_owner         | %username%           |
      | displayname_owner | %displayname%        |
      | mimetype          | httpd/unix-directory |
    And as "Alice" folder "/folder1/folder2" should not exist
    And as "Carol" folder "/folder2" should exist

  @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @issue-ocis-reva-243
  Scenario: Share ownership change after moving a shared file to another share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "/Alice-folder"
    And user "Alice" has created folder "/Alice-folder/folder2"
    And user "Carol" has created folder "/Carol-folder"
    And user "Alice" has shared folder "/Alice-folder" with user "Brian" with permissions "all"
    And user "Carol" has shared folder "/Carol-folder" with user "Brian" with permissions "all"
    When user "Brian" moves folder "/Alice-folder/folder2" to "/Carol-folder/folder2" using the WebDAV API
    And user "Carol" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Carol" sharing with user "Brian" should include
      | id                | A_STRING             |
      | item_type         | folder               |
      | item_source       | A_STRING             |
      | share_type        | user                 |
      | file_source       | A_STRING             |
      | file_target       | /Carol-folder        |
      | permissions       | all                  |
      | stime             | A_NUMBER             |
      | storage           | A_STRING             |
      | mail_send         | 0                    |
      | uid_owner         | %username%           |
      | displayname_owner | %displayname%        |
      | mimetype          | httpd/unix-directory |
    And as "Alice" folder "/Alice-folder/folder2" should not exist
    And as "Carol" folder "/Carol-folder/folder2" should exist

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @toFixOnOcV10 @issue-ocis-reva-243 @issue-ocis-reva-349 @issue-ocis-reva-350 @issue-ocis-reva-352 @issue-37653
  #after fixing all the issues merge this scenario with the one below
  Scenario Outline: API responds with a full set of parameters when owner changes the permission of a share
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/Alice-folder"
    And user "Alice" has shared folder "/Alice-folder" with user "Brian" with permissions "read"
    When user "Alice" updates the last share using the sharing API with
      | permissions | all |
    Then the OCS status code should be "<ocs_status_code>"
    And the OCS status message should be ""
    And the HTTP status code should be "200"
    Then the fields of the last response to user "Alice" sharing with user "Brian" should include
      | id                         | A_STRING             |
      | share_type                 | user                 |
      | uid_owner                  | %username%           |
      | displayname_owner          | %displayname%        |
      | permissions                | all                  |
      | stime                      | A_NUMBER             |
      | parent                     |                      |
      | expiration                 |                      |
      | token                      |                      |
      | uid_file_owner             | %username%           |
      | displayname_file_owner     | %displayname%        |
      | additional_info_owner      |                      |
      | additional_info_file_owner |                      |
      | item_type                  | folder               |
      | item_source                | A_STRING             |
      | path                       | /Alice-folder        |
      | mimetype                   | httpd/unix-directory |
      | storage_id                 | A_STRING             |
      | storage                    | A_STRING             |
      | file_source                | A_STRING             |
      | file_target                | /Alice-folder        |
      | share_with                 | %username%           |
      | share_with_displayname     | %displayname%        |
      | share_with_additional_info |                      |
      | mail_send                  | 0                    |
      | attributes                 |                      |
    And the fields of the last response should not include
      | name  |  |
      # | token |  |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-243
  Scenario Outline: Increasing permissions is allowed for owner
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Carol" has shared folder "/FOLDER" with group "grp1"
    And user "Carol" has updated the last share with
      | permissions | read |
    When user "Carol" updates the last share using the sharing API with
      | permissions | all |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "FOLDER/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-243
  Scenario Outline: Forbid sharing with groups
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "Alice" shares file "/welcome.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-41
  Scenario Outline: Editing share permission of existing share is forbidden when sharing with groups is forbidden
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read, create |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    When user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" sharing with group "grp1" should include
      | item_type         | file                |
      | item_source       | A_STRING            |
      | share_type        | group               |
      | file_target       | /textfile0.txt      |
      | permissions       | read, update, share |
      | mail_send         | 0                   |
      | uid_owner         | %username%          |
      | displayname_owner | %displayname%       |
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-41
  Scenario Outline: Deleting group share is allowed when sharing with groups is forbidden
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" gets the info of the last share using the sharing API
    Then the last response should be empty
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-41
  Scenario Outline: user can update the role in an existing share after the system maximum expiry date has been reduced
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
      | expireDate  | +30 days      |
    Then the HTTP status code should be "200"
    When the administrator sets parameter "shareapi_expire_after_n_days_user_share" of app "core" to "5"
    And user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    When user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | permissions | read     |
      | expiration  | +30 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-37217 @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194 @issue-ocis-reva-41
  Scenario Outline: user cannot concurrently update the role and date in an existing share after the system maximum expiry date has been reduced
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created a share with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
      | expireDate  | +30 days      |
    When the administrator sets parameter "shareapi_expire_after_n_days_user_share" of app "core" to "10"
    And user "Alice" updates the last share using the sharing API with
      | permissions | read |
      | expireDate  | +28  |
    Then the OCS status message should be "Expiration date is in the past"
#    Then the OCS status message should be "Cannot set expiration date more than 10 days in the future"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    When user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | permissions | read, share |
      | expiration  | +30 days    |
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

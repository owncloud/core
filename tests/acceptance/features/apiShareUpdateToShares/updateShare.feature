@api @files_sharing-app-required
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario Outline: Allow modification of reshare
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "/TMP"
    And user "Alice" has shared folder "TMP" with user "Brian"
    And user "Brian" has accepted share "/TMP" offered by user "Alice"
    And user "Brian" has shared folder "/Shares/TMP" with user "Carol"
    And user "Carol" has accepted share "/TMP" offered by user "Brian"
    When user "Brian" updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Carol" should not be able to upload file "filesForUpload/textfile.txt" to "/Shares/TMP/textfile.txt"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "/Shares/TMP/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-1289
  Scenario Outline: keep group permissions in sync when the share is moved to another folder by the receiver and then the sharer updates the permissions
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    And user "Brian" has created folder "/FOLDER"
    And user "Brian" has moved file "/Shares/textfile0.txt" to "/FOLDER/textfile0.txt"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | id                | A_STRING              |
      | item_type         | file                  |
      | item_source       | A_STRING              |
      | share_type        | group                 |
      | file_source       | A_STRING              |
      | file_target       | /Shares/textfile0.txt |
      | permissions       | read                  |
      | stime             | A_NUMBER              |
      | storage           | A_STRING              |
      | mail_send         | 0                     |
      | uid_owner         | %username%            |
      | displayname_owner | %displayname%         |
      | mimetype          | text/plain            |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-1289
  Scenario Outline: keep group permissions in sync when the share is renamed by the receiver and then the permissions are updated by sharer
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    And user "Brian" has moved file "/Shares/textfile0.txt" to "/Shares/textfile_new.txt"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | id                | A_STRING              |
      | item_type         | file                  |
      | item_source       | A_STRING              |
      | share_type        | group                 |
      | file_source       | A_STRING              |
      | file_target       | /Shares/textfile0.txt |
      | permissions       | read                  |
      | stime             | A_NUMBER              |
      | storage           | A_STRING              |
      | mail_send         | 0                     |
      | uid_owner         | %username%            |
      | displayname_owner | %displayname%         |
      | mimetype          | text/plain            |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: Cannot set permissions to zero
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with group "grp1"
    When user "Alice" updates the last share using the sharing API with
      | permissions | 0 |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  @issue-ocis-2173
  Scenario Outline: Cannot update a share of a file with a user to have only create and/or delete permission
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | <permissions> |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    # Brian should still have at least read access to the shared file
    And as "Brian" entry "/Shares/textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code | permissions   |
      | 1               | 200              | create        |
      | 2               | 400              | create        |
      | 1               | 200              | delete        |
      | 2               | 400              | delete        |
      | 1               | 200              | create,delete |
      | 2               | 400              | create,delete |

  @issue-ocis-2173
  Scenario Outline: Cannot update a share of a file with a group to have only create and/or delete permission
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | <permissions> |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    # Brian in grp1 should still have at least read access to the shared file
    And as "Brian" entry "/Shares/textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code | permissions   |
      | 1               | 200              | create        |
      | 2               | 400              | create        |
      | 1               | 200              | delete        |
      | 2               | 400              | delete        |
      | 1               | 200              | create,delete |
      | 2               | 400              | create,delete |

  @skipOnFilesClassifier @issue-files-classifier-291 @toFixOnOCIS @issue-ocis-2201
  Scenario Outline: Share ownership change after moving a shared file outside of an outer share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "/folder1"
    And user "Alice" has created folder "/folder1/folder2"
    And user "Brian" has created folder "/moved-out"
    And user "Alice" has shared folder "/folder1" with user "Brian" with permissions "all"
    And user "Brian" has accepted share "/folder1" offered by user "Alice"
    And user "Brian" has shared folder "/Shares/folder1/folder2" with user "Carol" with permissions "all"
    And user "Carol" has accepted share "<folder2_share_path>" offered by user "Brian"
    When user "Brian" moves folder "/Shares/folder1/folder2" to "/moved-out/folder2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the response when user "Brian" gets the info of the last share should include
      | id                | A_STRING             |
      | item_type         | folder               |
      | item_source       | A_STRING             |
      | share_type        | user                 |
      | file_source       | A_STRING             |
      | file_target       | /Shares/folder2      |
      | permissions       | all                  |
      | stime             | A_NUMBER             |
      | storage           | A_STRING             |
      | mail_send         | 0                    |
      | uid_owner         | %username%           |
      | displayname_owner | %displayname%        |
      | mimetype          | httpd/unix-directory |
    And as "Alice" folder "/Shares/folder1/folder2" should not exist
    And as "Carol" folder "/Shares/folder2" should exist
    Examples:
      | folder2_share_path |
      | /folder2           |


  Scenario Outline: Share ownership change after moving a shared file to another share
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Alice" has created folder "/Alice-folder"
    And user "Alice" has created folder "/Alice-folder/folder2"
    And user "Carol" has created folder "/Carol-folder"
    And user "Alice" has shared folder "/Alice-folder" with user "Brian" with permissions "all"
    And user "Brian" has accepted share "/Alice-folder" offered by user "Alice"
    And user "Carol" has shared folder "/Carol-folder" with user "Brian" with permissions "all"
    And user "Brian" has accepted share "/Carol-folder" offered by user "Carol"
    When user "Brian" moves folder "/Shares/Alice-folder/folder2" to "/Shares/Carol-folder/folder2" using the WebDAV API
    Then the HTTP status code should be "201"
    And the response when user "Carol" gets the info of the last share should include
      | id                | A_STRING             |
      | item_type         | folder               |
      | item_source       | A_STRING             |
      | share_type        | user                 |
      | file_source       | A_STRING             |
      | file_target       | <path>               |
      | permissions       | all                  |
      | stime             | A_NUMBER             |
      | storage           | A_STRING             |
      | mail_send         | 0                    |
      | uid_owner         | %username%           |
      | displayname_owner | %displayname%        |
      | mimetype          | httpd/unix-directory |
    And as "Alice" folder "/Alice-folder/folder2" should not exist
    And as "Carol" folder "/Carol-folder/folder2" should exist
    Examples:
      | path                 |
      | /Shares/Carol-folder |

  @toFixOnOCIS @toFixOnOcV10 @issue-ocis-reva-349 @issue-ocis-reva-350 @issue-ocis-reva-352 @issue-37653
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
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
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
      | file_target                | /Shares/Alice-folder |
      | share_with                 | %username%           |
      | share_with_displayname     | %displayname%        |
      | share_with_additional_info |                      |
      | mail_send                  | 0                    |
      | attributes                 |                      |
    And the fields of the last response should not include
      | name |  |
      # | token |  |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: Increasing permissions is allowed for owner
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Carol" has created folder "/FOLDER"
    And user "Carol" has shared folder "/FOLDER" with group "grp1"
    And user "Brian" has accepted share "/FOLDER" offered by user "Carol"
    And user "Carol" has updated the last share with
      | permissions | read |
    When user "Carol" updates the last share using the sharing API with
      | permissions | all |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "/Shares/FOLDER/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-1328
  Scenario Outline: Forbid sharing with groups
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @issue-ocis-1328
  Scenario Outline: Editing share permission of existing share is forbidden when sharing with groups is forbidden
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read, create |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And the response when user "Alice" gets the info of the last share should include
      | item_type         | file                  |
      | item_source       | A_STRING              |
      | share_type        | group                 |
      | file_target       | /Shares/textfile0.txt |
      | permissions       | read, update, share   |
      | mail_send         | 0                     |
      | uid_owner         | %username%            |
      | displayname_owner | %displayname%         |
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  @issue-ocis-1328
  Scenario Outline: Deleting group share is allowed when sharing with groups is forbidden
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And the last response should be empty
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
      | 2               | 200             | 404              |

  @issue-ocis-1328
  Scenario Outline: user can update the role in an existing share after the system maximum expiry date has been reduced
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has created a share with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
      | expireDate  | +30 days      |
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "5"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the fields of the last response to user "Alice" should include
      | permissions | read     |
      | expiration  | +30 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-1328
  Scenario Outline: user cannot concurrently update the role and date in an existing share after the system maximum expiry date has been reduced
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has created a share with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
      | expireDate  | +30 days      |
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "10"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read     |
      | expireDate  | +28 days |
    Then the OCS status message should be "Cannot set expiration date more than 10 days in the future"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the response when user "Alice" gets the info of the last share should include
      | permissions | read, share |
      | expiration  | +30 days    |
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: Sharer deletes file uploaded with upload-only permission by sharee to a shared folder
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | user   |
      | permissions | create |
      | shareWith   | Brian  |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And user "Brian" has uploaded file with content "some content" to "/Shares/FOLDER/textFile.txt"
    When user "Alice" deletes file "/FOLDER/textFile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" file "/Shares/FOLDER/textFile.txt" should not exist
    And as "Alice" file "/textFile.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

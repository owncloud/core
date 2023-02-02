@api @files_sharing-app-required
Feature: a default expiration date can be specified for shares with users or groups

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: sharing with default expiration date enabled but not enforced for users, user shares without specifying expireDate
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    When user "Alice" shares folder "/FOLDER" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | expiration |  |
    And the response when user "Brian" gets the info of the last share should include
      | expiration |  |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enabled but not enforced for users, user shares with expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | user       |
      | shareWith   | Brian      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_type  | user       |
      | file_target | /FOLDER    |
      | uid_owner   | %username% |
      | expiration  | +15 days   |
      | share_with  | %username% |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date not enabled, user shares with expiration date set
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | user       |
      | shareWith   | Brian      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_type  | user       |
      | file_target | /FOLDER    |
      | uid_owner   | %username% |
      | expiration  | +15 days   |
      | share_with  | %username% |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enabled but not enforced for users, user shares with expiration date and then disables
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | /FOLDER    |
      | shareType   | user       |
      | shareWith   | Brian      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    When the administrator sets parameter "shareapi_default_expire_date_user_share" of app "core" to "no"
    Then the HTTP status code should be "200"
    And the info about the last share by user "Alice" with user "Brian" should include
      | share_type  | user       |
      | file_target | /FOLDER    |
      | uid_owner   | %username% |
      | expiration  | +15 days   |
      | share_with  | %username% |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enabled and enforced for users, user shares with expiration date and then disables
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | /FOLDER    |
      | shareType   | user       |
      | shareWith   | Brian      |
      | permissions | read,share |
    When the administrator sets parameter "shareapi_default_expire_date_user_share" of app "core" to "no"
    Then the HTTP status code should be "200"
    And the info about the last share by user "Alice" with user "Brian" should include
      | share_type  | user       |
      | file_target | /FOLDER    |
      | uid_owner   | %username% |
      | share_with  | %username% |
      | expiration  | +7 days    |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +7 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enabled but not enforced for groups, user shares without specifying expireDate
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" shares folder "/FOLDER" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | expiration |  |
    And the response when user "Brian" gets the info of the last share should include
      | expiration |  |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enabled but not enforced for groups, user shares with expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +15 days   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | share_type  | group      |
      | file_target | /FOLDER    |
      | uid_owner   | %username% |
      | expiration  | +15 days   |
      | share_with  | grp1       |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date not enabled for groups, user shares with expiration date set
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +15 days   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | share_type  | group      |
      | file_target | /FOLDER    |
      | uid_owner   | %username% |
      | expiration  | +15 days   |
      | share_with  | grp1       |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enabled but not enforced for groups, user shares with expiration date and then disables
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | /FOLDER    |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +15 days   |
    When the administrator sets parameter "shareapi_default_expire_date_group_share" of app "core" to "no"
    Then the HTTP status code should be "200"
    And the info about the last share by user "Alice" with group "grp1" should include
      | share_type  | group      |
      | file_target | /FOLDER    |
      | uid_owner   | %username% |
      | share_with  | grp1       |
      | expiration  | +15 days   |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enabled and enforced for groups, user shares with expiration date and then disables
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | /FOLDER    |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +3 days    |
    When the administrator sets parameter "shareapi_default_expire_date_group_share" of app "core" to "no"
    Then the HTTP status code should be "200"
    And the info about the last share by user "Alice" with group "grp1" should include
      | share_type  | group      |
      | file_target | /FOLDER    |
      | uid_owner   | %username% |
      | share_with  | grp1       |
      | expiration  | +3 days    |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +3 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enabled and enforced for users, user shares without setting expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares file "textfile0.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_type  | user           |
      | file_target | /textfile0.txt |
      | uid_owner   | %username%     |
      | share_with  | %username%     |
      | expiration  | +7 days        |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +7 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enabled and enforced for users, user shares with expiration date more than the default
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
      | expireDate  | +10 days      |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the OCS status message should be "Cannot set expiration date more than 7 days in the future"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: sharing with default expiration date enabled and enforced for users/max expire date is set, user shares without setting expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares file "textfile0.txt" with user "Brian" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_type  | user           |
      | file_target | /textfile0.txt |
      | uid_owner   | %username%     |
      | share_with  | %username%     |
      | expiration  | +30 days       |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enabled and enforced for users/max expire date set, user shares with expiration date more than the max expire date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
      | expireDate  | +40 days      |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the OCS status message should be "Cannot set expiration date more than 30 days in the future"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: sharing with default expiration date enabled and enforced for users/max expire date is set, user shares and changes the max expire date greater than the previous one
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian" with permissions "read,share"
    When the administrator sets parameter "shareapi_expire_after_n_days_user_share" of app "core" to "40"
    Then the info about the last share by user "Alice" with user "Brian" should include
      | expiration       | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enabled for users/max expire date is set, user shares and changes max expire date less than the previous one
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian" with permissions "read,share"
    When the administrator sets parameter "shareapi_expire_after_n_days_user_share" of app "core" to "15"
    Then the HTTP status code should be "200"
    And the info about the last share by user "Alice" with user "Brian" should include
      | expiration       | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enabled and enforced for groups, user shares without setting expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares file "textfile0.txt" with group "grp1" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | share_type  | group          |
      | file_target | /textfile0.txt |
      | uid_owner   | %username%     |
      | share_with  | grp1           |
      | expiration  | +7 days        |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +7 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enabled and enforced for groups, user shares with expiration date more than the default
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | group         |
      | shareWith   | grp1          |
      | permissions | read,share    |
      | expireDate  | +10 days      |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the OCS status message should be "Cannot set expiration date more than 7 days in the future"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: sharing with default expiration date enabled and enforced for groups/max expire date is set, user shares without setting expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares file "textfile0.txt" with group "grp1" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the fields of the last response to user "Alice" sharing with group "grp1" should include
      | share_type  | group          |
      | file_target | /textfile0.txt |
      | uid_owner   | %username%     |
      | share_with  | grp1           |
      | expiration  | +30 days       |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enabled and enforced for groups/max expire date set, user shares with expiration date more than the max expire date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | group         |
      | shareWith   | grp1          |
      | permissions | read,share    |
      | expireDate  | +40 days      |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the OCS status message should be "Cannot set expiration date more than 30 days in the future"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: sharing with default expiration date enabled for groups/max expire date is set, user shares and changes the max expire date greater than the previous one
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1" with permissions "read,share"
    When the administrator sets parameter "shareapi_expire_after_n_days_group_share" of app "core" to "40"
    Then the HTTP status code should be "200"
    And the info about the last share by user "Alice" with user "Brian" should include
      | expiration | +30 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enabled for groups/max expire date is set, user shares and changes max expire date less than the previous one
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with group "grp1" with permissions "read,share"
    When the administrator sets parameter "shareapi_expire_after_n_days_group_share" of app "core" to "15"
    Then the HTTP status code should be "200"
    And the response when user "Alice" gets the info of the last share should include
      | expiration | +30 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enforced for users, user shares to a group without setting an expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    When user "Alice" shares file "FOLDER" with group "grp1" with permissions "read,share" using the sharing API
    Then the HTTP status code should be "200"
    And the info about the last share by user "Alice" with group "grp1" should include
      | expiration |  |
    And the response when user "Brian" gets the info of the last share should include
      | expiration |  |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enforced for groups, user shares to another user
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    When user "Alice" shares file "/FOLDER" with user "Brian" with permissions "read,share" using the sharing API
    Then the info about the last share by user "Alice" with user "Brian" should include
      | expiration |  |
    And the response when user "Brian" gets the info of the last share should include
      | expiration |  |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: sharing with default expiration date enforced for users, user shares with invalid expiration date set
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt |
      | shareType          | user          |
      | shareWith          | Brian         |
      | permissions        | read,share    |
      | expireDateAsString | INVALID-DATE  |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "<ocs_status_code>"
    And the OCS status message should be "Invalid date, date format must be YYYY-MM-DD"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 404             | 200              |
      | 2               | 404             | 404              |


  Scenario Outline: sharing with default expiration date enforced for users, user shares with different time format
    Given using OCS API version "2"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt |
      | shareType          | user          |
      | shareWith          | Brian         |
      | permissions        | read,share    |
      | expireDateAsString | <date>        |
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the fields of the last response to user "Alice" should include
      | expiration | 2050-12-11 |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | 2050-12-11 |
    Examples:
      | date                |
      | 2050-12-11          |
      | 11-12-2050          |
      | 12/11/2050          |
      | 11.12.2050          |
      | 11.12.2050 12:30:40 |


  Scenario Outline: user shares with humanized expiration date format
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "<default>"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "<enforce>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt     |
      | shareType          | user              |
      | shareWith          | Brian             |
      | permissions        | read,share        |
      | expireDateAsString | <expiration_date> |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the fields of the last response to user "Alice" should include
      | expiration | <expiration_date> |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | <expiration_date> |
    Examples:
      | ocs_api_version | expiration_date | default | enforce | ocs_status_code |
      | 1               | today           | yes     | yes     | 100             |
      | 2               | today           | yes     | yes     | 200             |
      | 1               | tomorrow        | yes     | yes     | 100             |
      | 2               | tomorrow        | yes     | yes     | 200             |
      | 1               | today           | yes     | no      | 100             |
      | 2               | today           | yes     | no      | 200             |
      | 1               | tomorrow        | yes     | no      | 100             |
      | 2               | tomorrow        | yes     | no      | 200             |
      | 1               | today           | no      | no      | 100             |
      | 2               | today           | no      | no      | 200             |
      | 1               | tomorrow        | no      | no      | 100             |
      | 2               | tomorrow        | no      | no      | 200             |


  Scenario Outline: user shares with humanized expiration date format in past
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "<default>"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "<enforce>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt |
      | shareType          | user          |
      | shareWith          | Brian         |
      | permissions        | read,share    |
      | expireDateAsString | yesterday     |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "<ocs_status_code>"
    And the OCS status message should be "Expiration date is in the past"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | default | enforce |
      | 1               | 404             | 200              | yes     | yes     |
      | 2               | 404             | 404              | yes     | yes     |
      | 1               | 404             | 200              | yes     | no      |
      | 2               | 404             | 404              | yes     | no      |
      | 1               | 404             | 200              | no      | no      |
      | 2               | 404             | 404              | no      | no      |


  Scenario Outline: user shares with invalid humanized expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "<default>"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "<enforce>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt |
      | shareType          | user          |
      | shareWith          | Brian         |
      | permissions        | read,share    |
      | expireDateAsString | 123           |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the OCS status message should be "Invalid date, date format must be YYYY-MM-DD"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | http_status_code | default | enforce |
      | 1               | 200              | yes     | yes     |
      | 2               | 404              | yes     | yes     |
      | 1               | 200              | yes     | no      |
      | 2               | 404              | yes     | no      |
      | 1               | 200              | no      | no      |
      | 2               | 404              | no      | no      |


  Scenario Outline: sharing with default expiration date enforced for users, user shares with past expiration date set
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt |
      | shareType          | user          |
      | shareWith          | Brian         |
      | permissions        | read,share    |
      | expireDateAsString | -10 days      |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the OCS status message should be "Expiration date is in the past"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @issue-36569
  Scenario Outline: sharing with default expiration date enforced for users, max expire date is 0, user shares without specifying expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "0"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the fields of the last response to user "Alice" should include
      | expiration | today |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | today |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with default expiration date enforced for users, max expire date is 1, user shares without specifying expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "1"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the fields of the last response to user "Alice" should include
      | expiration | tomorrow |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | tomorrow |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario: accessing a user share that is expired should not be possible
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has created a share with settings
      | path       | /textfile0.txt |
      | shareType  | user           |
      | shareWith  | Brian          |
      | expireDate | +15 days       |
    And the administrator has expired the last created share using the testing API
    When user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "200"
    And user "Alice" should not see the share id of the last share
    And user "Brian" should not see the share id of the last share
    And as "Brian" file "/textfile0.txt" should not exist
    And as "Alice" file "/textfile0.txt" should exist


  Scenario: accessing a group share that is expired should not be possible
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
    And group "brand-new-group" has been created
    And user "Brian" has been added to group "brand-new-group"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has created a share with settings
      | path       | /textfile0.txt  |
      | shareType  | group           |
      | shareWith  | brand-new-group |
      | expireDate | +15 days        |
    And the administrator has expired the last created share using the testing API
    When user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "200"
    And user "Alice" should not see the share id of the last share
    And user "Brian" should not see the share id of the last share
    And as "Brian" file "/textfile0.txt" should not exist
    And as "Alice" file "/textfile0.txt" should exist


  Scenario: accessing a link share that is expired should not be possible
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
    And group "brand-new-group" has been created
    And user "Brian" has been added to group "brand-new-group"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has created a public link share with settings
      | path       | /textfile0.txt  |
      | shareWith  | brand-new-group |
      | expireDate | +15 days        |
    And the administrator has expired the last created public link share using the testing API
    When the public accesses the preview of file "textfile0.txt" from the last shared public link using the sharing API
    Then the HTTP status code should be "404"
    And as "Alice" file "/textfile0.txt" should exist


  Scenario Outline: sharing file with edit permissions
    Given using OCS API version "<ocs_api_version>"
    And auto-accept shares has been disabled
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "Random data" to "/file.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | file.txt    |
      | shareType   | user        |
      | shareWith   | Brian       |
      | permissions | read,update |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | item_type   | file        |
      | mimetype    | text/plain  |
      | share_type  | user        |
      | file_target | /file.txt   |
      | uid_owner   | %username%  |
      | share_with  | %username%  |
      | permissions | read,update |
    When user "Brian" accepts share "/file.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" uploads the following files with content "new content"
      | path      |
      | /file.txt |
    Then the content of the following files for user "Brian" should be "new content"
      | path      |
      | /file.txt |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
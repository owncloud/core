@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @skipOnOcis @issue-ocis-reva-41
Feature: a default expiration date can be specified for shares with users or groups

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled but not enforced for users, user shares without specifying expireDate
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" shares folder "/FOLDER" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the fields of the last response to user "Alice" should include
      | expiration |  |
    And the response when user "Brian" gets the info of the last share should include
      | expiration |  |
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
      | 2               | 200             | 200              |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled but not enforced for users, user shares with expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | user       |
      | shareWith   | Brian      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the fields of the last response to user "Alice" should include
      | share_type  | user     |
      | file_target | /FOLDER  |
      | uid_owner   | Alice    |
      | expiration  | +15 days |
      | share_with  | Brian    |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
      | 2               | 200             | 200              |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date not enabled, user shares with expiration date set
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | user       |
      | shareWith   | Brian      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the fields of the last response to user "Alice" should include
      | share_type  | user     |
      | file_target | /FOLDER  |
      | uid_owner   | Alice    |
      | share_with  | Brian    |
      | expiration  | +15 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
      | 2               | 200             | 200              |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled but not enforced for users, user shares with expiration date and then disables
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | user       |
      | shareWith   | Brian      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And the administrator sets parameter "shareapi_default_expire_date_user_share" of app "core" to "no"
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | share_type  | user     |
      | file_target | /FOLDER  |
      | uid_owner   | Alice    |
      | share_with  | Brian    |
      | expiration  | +15 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for users, user shares with expiration date and then disables
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | user       |
      | shareWith   | Brian      |
      | permissions | read,share |
    And the administrator sets parameter "shareapi_default_expire_date_user_share" of app "core" to "no"
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | share_type  | user    |
      | file_target | /FOLDER |
      | uid_owner   | Alice   |
      | share_with  | Brian   |
      | expiration  | +7 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +7 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled but not enforced for groups, user shares without specifying expireDate
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" shares folder "/FOLDER" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the fields of the last response to user "Alice" should include
      | expiration |  |
    And the response when user "Brian" gets the info of the last share should include
      | expiration |  |
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
      | 2               | 200             | 200              |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled but not enforced for groups, user shares with expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +15 days   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the fields of the last response to user "Alice" should include
      | share_type  | group    |
      | file_target | /FOLDER  |
      | uid_owner   | Alice    |
      | expiration  | +15 days |
      | share_with  | grp1     |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
      | 2               | 200             | 200              |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date not enabled for groups, user shares with expiration date set
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +15 days   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the fields of the last response to user "Alice" should include
      | share_type  | group    |
      | file_target | /FOLDER  |
      | uid_owner   | Alice    |
      | expiration  | +15 days |
      | share_with  | grp1     |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
      | 2               | 200             | 200              |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled but not enforced for groups, user shares with expiration date and then disables
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And the administrator sets parameter "shareapi_default_expire_date_group_share" of app "core" to "no"
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | share_type  | group    |
      | file_target | /FOLDER  |
      | uid_owner   | Alice    |
      | share_with  | grp1     |
      | expiration  | +15 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +15 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for groups, user shares with expiration date and then disables
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /FOLDER    |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +3 days    |
    And the administrator sets parameter "shareapi_default_expire_date_group_share" of app "core" to "no"
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | share_type  | group   |
      | file_target | /FOLDER |
      | uid_owner   | Alice   |
      | share_with  | grp1    |
      | expiration  | +3 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +3 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for users, user shares without setting expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" shares file "textfile0.txt" with user "Brian" using the sharing API
    Then the fields of the last response to user "Alice" should include
      | share_type  | user           |
      | file_target | /textfile0.txt |
      | uid_owner   | Alice          |
      | share_with  | Brian          |
      | expiration  | +7 days        |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +7 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for users, user shares with expiration date more than the default
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
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

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for users/max expire date is set, user shares without setting expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" shares file "textfile0.txt" with user "Brian" using the sharing API
    Then the fields of the last response to user "Alice" should include
      | share_type  | user           |
      | file_target | /textfile0.txt |
      | uid_owner   | Alice          |
      | share_with  | Brian          |
      | expiration  | +30 days       |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for users/max expire date set, user shares with expiration date more than the max expire date
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
      | expireDate  | +40 days      |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the OCS status message should be "Cannot set expiration date more than 30 days in the future"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for users/max expire date is set, user shares and changes the max expire date greater than the previous one
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" shares file "textfile0.txt" with user "Brian" with permissions "read,share" using the sharing API
    And the administrator sets parameter "shareapi_expire_after_n_days_user_share" of app "core" to "40"
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled for users/max expire date is set, user shares and changes max expire date less than the previous one
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" shares file "textfile0.txt" with user "Brian" with permissions "read,share" using the sharing API
    And the administrator sets parameter "shareapi_expire_after_n_days_user_share" of app "core" to "15"
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for groups, user shares without setting expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" shares file "textfile0.txt" with group "grp1" using the sharing API
    Then the fields of the last response to user "Alice" should include
      | share_type  | group          |
      | file_target | /textfile0.txt |
      | uid_owner   | Alice          |
      | share_with  | grp1           |
      | expiration  | +7 days        |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +7 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for groups, user shares with expiration date more than the default
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
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

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for groups/max expire date is set, user shares without setting expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" shares file "textfile0.txt" with group "grp1" using the sharing API
    Then the fields of the last response to user "Alice" should include
      | share_type  | group          |
      | file_target | /textfile0.txt |
      | uid_owner   | Alice          |
      | share_with  | grp1           |
      | expiration  | +30 days       |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled and enforced for groups/max expire date set, user shares with expiration date more than the max expire date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
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

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled for groups/max expire date is set, user shares and changes the max expire date greater than the previous one
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" shares file "textfile0.txt" with group "grp1" with permissions "read,share" using the sharing API
    And the administrator sets parameter "shareapi_expire_after_n_days_group_share" of app "core" to "40"
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration | +30 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enabled for groups/max expire date is set, user shares and changes max expire date less than the previous one
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" shares file "textfile0.txt" with group "grp1" with permissions "read,share" using the sharing API
    And the administrator sets parameter "shareapi_expire_after_n_days_group_share" of app "core" to "15"
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration | +30 days |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | +30 days |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enforced for users, user shares to a group without setting an expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" shares file "FOLDER" with group "grp1" with permissions "read,share" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration |  |
    And the response when user "Brian" gets the info of the last share should include
      | expiration |  |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enforced for groups, user shares to another user
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" shares file "/FOLDER" with user "Brian" with permissions "read,share" using the sharing API
    And user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration |  |
    And the response when user "Brian" gets the info of the last share should include
      | expiration |  |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enforced for users, user shares with invalid expiration date set
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
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

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enforced for users, user shares with different time format
    Given using OCS API version "2"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt |
      | shareType          | user          |
      | shareWith          | Brian         |
      | permissions        | read,share    |
      | expireDateAsString | <date>        |
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    Then the fields of the last response to user "Alice" should include
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

  @skipOnOcV10.3
  Scenario Outline: user shares with humanized expiration date format
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "<default>"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "<enforce>"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt     |
      | shareType          | user              |
      | shareWith          | Brian             |
      | permissions        | read,share        |
      | expireDateAsString | <expiration_date> |
    Then the fields of the last response to user "Alice" should include
      | expiration | <expiration_date> |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | <expiration_date> |
    Examples:
      | ocs_api_version | expiration_date | default | enforce |
      | 1               | today           | yes     | yes     |
      | 2               | today           | yes     | yes     |
      | 1               | tomorrow        | yes     | yes     |
      | 2               | tomorrow        | yes     | yes     |
      | 1               | today           | yes     | no      |
      | 2               | today           | yes     | no      |
      | 1               | tomorrow        | yes     | no      |
      | 2               | tomorrow        | yes     | no      |
      | 1               | today           | no      | no      |
      | 2               | today           | no      | no      |
      | 1               | tomorrow        | no      | no      |
      | 2               | tomorrow        | no      | no      |

  @skipOnOcV10.3
  Scenario Outline: user shares with humanized expiration date format in past
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "<default>"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "<enforce>"
    And user "Brian" has been created with default attributes and without skeleton files
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

  @skipOnOcV10.3
  Scenario Outline: user shares with invalid humanized expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "<default>"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "<enforce>"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt |
      | shareType          | user          |
      | shareWith          | Brian         |
      | permissions        | read,share    |
      | expireDateAsString | 123           |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "<ocs_status_code>"
    And the OCS status message should be "Invalid date, date format must be YYYY-MM-DD"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | default | enforce |
      | 1               | 404             | 200              | yes     | yes     |
      | 2               | 404             | 404              | yes     | yes     |
      | 1               | 404             | 200              | yes     | no      |
      | 2               | 404             | 404              | yes     | no      |
      | 1               | 404             | 200              | no      | no      |
      | 2               | 404             | 404              | no      | no      |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enforced for users, user shares with past expiration date set
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path               | textfile0.txt |
      | shareType          | user          |
      | shareWith          | Brian         |
      | permissions        | read,share    |
      | expireDateAsString | -10 days      |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "<ocs_status_code>"
    And the OCS status message should be "Expiration date is in the past"
    And user "Brian" should not have any received shares
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 404             | 200              |
      | 2               | 404             | 404              |

  @skipOnOcV10.3 @issue-36569
  Scenario Outline: sharing with default expiration date enforced for users, max expire date is 0, user shares without specifying expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "0"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
    Then the fields of the last response to user "Alice" should include
      | expiration | today |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | today |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @skipOnOcV10.3
  Scenario Outline: sharing with default expiration date enforced for users, max expire date is 1, user shares without specifying expiration date
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "1"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | shareWith   | Brian         |
      | permissions | read,share    |
    Then the fields of the last response to user "Alice" should include
      | expiration | tomorrow |
    And the response when user "Brian" gets the info of the last share should include
      | expiration | tomorrow |
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

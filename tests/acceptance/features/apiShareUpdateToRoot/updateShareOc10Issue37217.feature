@api @files_sharing-app-required @notToImplementOnOCIS
Feature: sharing

  @issue-37217
  Scenario Outline: user cannot concurrently update the role and date in an existing share after the system maximum expiry date has been reduced
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and small skeleton files
    And using OCS API version "<ocs_api_version>"
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

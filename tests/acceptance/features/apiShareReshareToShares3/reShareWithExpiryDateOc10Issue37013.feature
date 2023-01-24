@api @files_sharing-app-required @issue-ocis-1250
Feature: resharing a resource with an expiration date

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"

  @issue-37013
  Scenario Outline: reshare extends the received expiry date up to the default by default
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "<default-expire-date>"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "<enforce-expire-date>"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created a share with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | permissions | all           |
      | shareWith   | Brian         |
      | expireDate  | +20 days      |
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" creates a share using the sharing API with settings
      | path        | /Shares/textfile0.txt |
      | shareType   | user                  |
      | permissions | change                |
      | shareWith   | Carol                 |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And user "Carol" should be able to accept pending share "/textfile0.txt" offered by user "Brian"
    And the information of the last share of user "Alice" should include
      | expiration | +20 days |
    And the response when user "Carol" gets the info of the last share should include
      | expiration | <actual-expire-date> |
    Examples:
      | ocs_api_version | default-expire-date | enforce-expire-date | actual-expire-date | ocs_status_code |
      | 1               | yes                 | yes                 | +30 days           | 100             |
      | 2               | yes                 | yes                 | +30 days           | 200             |
      | 1               | yes                 | no                  |                    | 100             |
      | 2               | yes                 | no                  |                    | 200             |
      | 1               | no                  | no                  |                    | 100             |
      | 2               | no                  | no                  |                    | 200             |

  @issue-37013
  Scenario Outline: reshare can extend the received expiry date further into the future
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "<default-expire-date>"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created a share with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | permissions | all           |
      | shareWith   | Brian         |
      | expireDate  | +20 days      |
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" creates a share using the sharing API with settings
      | path        | /Shares/textfile0.txt |
      | shareType   | user                  |
      | permissions | change                |
      | shareWith   | Carol                 |
      | expireDate  | +40 days              |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And user "Carol" should be able to accept pending share "/textfile0.txt" offered by user "Brian"
    And the information of the last share of user "Alice" should include
      | expiration | +20 days |
    And the response when user "Carol" gets the info of the last share should include
      | expiration | +40 days |
    Examples:
      | ocs_api_version | default-expire-date | ocs_status_code |
      | 1               | yes                 | 100             |
      | 2               | yes                 | 200             |
      | 1               | no                  | 100             |
      | 2               | no                  | 200             |

  @issue-37013
  Scenario Outline: reshare cannot extend the received expiry date past the default when the default is enforced
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created a share with settings
      | path        | textfile0.txt |
      | shareType   | user          |
      | permissions | all           |
      | shareWith   | Brian         |
      | expireDate  | +20 days      |
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" creates a share using the sharing API with settings
      | path        | /Shares/textfile0.txt |
      | shareType   | user                  |
      | permissions | change                |
      | shareWith   | Carol                 |
      | expireDate  | +40 days              |
    Then the HTTP status code should be "<http_status_code>"
    And the OCS status code should be "404"
    And the sharing API should report to user "Carol" that no shares are in the pending state
    And the information of the last share of user "Alice" should include
      | expiration | +20 days |
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

@api @TestAlsoOnExternalUserBackend
Feature: auth

  Background:
    Given user "user0" has been created with default attributes
    And a new client token for "user0" has been generated

  @issue-32068
  Scenario Outline: send PUT requests to OCS endpoints as admin with wrong password
    Given using OCS API version "<ocs_api_version>"
    When the administrator sends HTTP method "PUT" to OCS API endpoint "<endpoint>" with body using password "invalid"
      | data        | doesnotmatter |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                   | ocs-code | http-code |
      | 1               |/cloud/users/user0         | 997      | 401       |
      | 2               |/cloud/users/user0         | 997      | 401       |
      | 1               |/cloud/users/user0/disable | 997      | 401       |
      | 2               |/cloud/users/user0/disable | 997      | 401       |
      | 1               |/cloud/users/user0/enable  | 997      | 401       |
      | 2               |/cloud/users/user0/enable  | 997      | 401       |

  #merge into previous scenario when fixed
  @issue-34626
  Scenario Outline: send PUT requests to OCS endpoints as admin with wrong password
    Given using OCS API version "<ocs_api_version>"
    When the administrator sends HTTP method "PUT" to OCS API endpoint "/apps/files_sharing/api/v1/shares/123" with body using password "invalid"
      | data        | doesnotmatter |
    Then the HTTP status code should be "200"
    And the body of the response should be empty
    #And the OCS status code should be "997"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

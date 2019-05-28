@api @TestAlsoOnExternalUserBackend
Feature: auth

  @issue-32068
  Scenario Outline: send PUT requests to OCS endpoints as admin with wrong password
    Given using OCS API version "<ocs_api_version>"
    When the administrator sends HTTP method "PUT" to OCS API endpoint "<endpoint>" with body using password "invalid"
      | data        | doesnotmatter |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                              | ocs-code | http-code |
      | 1               |/cloud/users/user0                    | 997      | 401       |
      | 2               |/cloud/users/user0                    | 997      | 401       |
      | 1               |/cloud/users/user0/disable            | 997      | 401       |
      | 2               |/cloud/users/user0/disable            | 997      | 401       |
      | 1               |/cloud/users/user0/enable             | 997      | 401       |
      | 2               |/cloud/users/user0/enable             | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares/123 | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/123 | 997      | 401       |


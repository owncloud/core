@api @TestAlsoOnExternalUserBackend
Feature: auth

  Background:
    Given user "user0" has been created with default attributes
    And a new client token for "user0" has been generated

  @issue-32068
  Scenario Outline: send DELETE requests to OCS endpoints as admin with wrong password
    Given using OCS API version "<ocs_api_version>"
    And group "group1" has been created
    When the administrator sends HTTP method "DELETE" to OCS API endpoint "<endpoint>" using password "invalid"
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                                             | ocs-code | http-code |
      | 1               |/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/remote_shares/123         | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/123         | 997      | 401       |
      | 1               |/cloud/apps/testing                                  | 997      | 401       |
      | 2               |/cloud/apps/testing                                  | 997      | 401       |
      | 1               |/cloud/groups/group1                                 | 997      | 401       |
      | 2               |/cloud/groups/group1                                 | 997      | 401       |
      | 1               |/cloud/users/user0                                   | 997      | 401       |
      | 2               |/cloud/users/user0                                   | 997      | 401       |
      | 1               |/cloud/users/user0/groups                            | 997      | 401       |
      | 2               |/cloud/users/user0/groups                            | 997      | 401       |
      | 1               |/cloud/users/user0/subadmins                         | 997      | 401       |
      | 2               |/cloud/users/user0/subadmins                         | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares/123                | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/123                | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |


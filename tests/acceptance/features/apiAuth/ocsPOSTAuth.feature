@api @TestAlsoOnExternalUserBackend
Feature: auth

  Background:
    Given user "user0" has been created with default attributes
    And a new client token for "user0" has been generated

  @issue-32068
  Scenario Outline: send POST requests to OCS endpoints as normal user with wrong password
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes
    When user "user0" sends HTTP method "POST" to OCS API endpoint "<endpoint>" with body using password "invalid"
      | data        | doesnotmatter |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                                             | ocs-code | http-code |
      | 1               |/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares                    | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares                    | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | 1               |/cloud/apps/testing                                  | 997      | 401       |
      | 2               |/cloud/apps/testing                                  | 997      | 401       |
      | 1               |/cloud/groups                                        | 997      | 401       |
      | 2               |/cloud/groups                                        | 997      | 401       |
      | 1               |/cloud/users                                         | 997      | 401       |
      | 2               |/cloud/users                                         | 997      | 401       |
      | 1               |/cloud/users/user0/groups                            | 997      | 401       |
      | 2               |/cloud/users/user0/groups                            | 997      | 401       |
      | 1               |/cloud/users/user0/subadmins                         | 997      | 401       |
      | 2               |/cloud/users/user0/subadmins                         | 997      | 401       |
      | 1               |/person/check                                        | 101      | 200       |
      | 2               |/person/check                                        | 400      | 400       |
      | 1               |/privatedata/deleteattribute/testing/test            | 997      | 401       |
      | 2               |/privatedata/deleteattribute/testing/test            | 997      | 401       |
      | 1               |/privatedata/setattribute/testing/test               | 997      | 401       |
      | 2               |/privatedata/setattribute/testing/test               | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares                    | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares                    | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |


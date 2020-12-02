@api @skipOnOcV10
Feature: CORS headers

  @files_sharing-app-required
  Scenario Outline: CORS headers should be returned when sending Origin header using the TUS protocol
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has been created with default attributes and skeleton files
    When user "Alice" sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers
      | header | value               |
      | Origin | https://aphno.badal |
    Then the following headers should be set
      | header        | value               |
      | Tus-Resumable | 1.0.0               |
      | Tus-Version   | 1.0.0,0.2.2,0.2.1   |
      | Tus-Max-Size  | 1073741824          |
      | Tus-Extension | creation,expiration |
    Examples:
      | ocs_api_version | endpoint                                         |
      | 1               | /apps/files_external/api/v1/mounts               |
      | 2               | /apps/files_external/api/v1/mounts               |
      | 1               | /apps/files_sharing/api/v1/remote_shares         |
      | 2               | /apps/files_sharing/api/v1/remote_shares         |
      | 1               | /apps/files_sharing/api/v1/remote_shares/pending |
      | 2               | /apps/files_sharing/api/v1/remote_shares/pending |
      | 1               | /apps/files_sharing/api/v1/shares                |
      | 2               | /apps/files_sharing/api/v1/shares                |
      | 1               | /privatedata/getattribute                        |
      | 2               | /privatedata/getattribute                        |
      | 1               | /cloud/apps                                      |
      | 2               | /cloud/apps                                      |
      | 1               | /cloud/groups                                    |
      | 2               | /cloud/groups                                    |
      | 1               | /cloud/users                                     |
      | 2               | /cloud/users                                     |

  Scenario Outline: CORS headers should be returned when sending Origin header (admin only endpoints)
    Given using OCS API version "<ocs_api_version>"
    When the administrator sends HTTP method "OPTIONS" to OCS API endpoint "<endpoint>" with headers
      | header | value               |
      | Origin | https://aphno.badal |
    Then the following headers should be set
      | header        | value               |
      | Tus-Resumable | 1.0.0               |
      | Tus-Version   | 1.0.0,0.2.2,0.2.1   |
      | Tus-Max-Size  | 1073741824          |
      | Tus-Extension | creation,expiration |
    Examples:
      | ocs_api_version | endpoint      |
      | 1               | /cloud/apps   |
      | 2               | /cloud/apps   |
      | 1               | /cloud/groups |
      | 2               | /cloud/groups |
      | 1               | /cloud/users  |
      | 2               | /cloud/users  |

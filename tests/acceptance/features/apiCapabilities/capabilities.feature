@api @files_sharing-app-required @issue-ocis-reva-41
Feature: capabilities

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: Check that the sharing API can be enabled
    Given parameter "shareapi_enabled" of app "core" has been set to "no"
    And the capabilities setting of "files_sharing" path "api_enabled" has been confirmed to be ""
    When the administrator sets parameter "shareapi_enabled" of app "core" to "yes"
    Then the capabilities setting of "files_sharing" path "api_enabled" should be "1"

  @smokeTest
  Scenario: Check that the sharing API can be disabled
    Given parameter "shareapi_enabled" of app "core" has been set to "yes"
    And the capabilities setting of "files_sharing" path "api_enabled" has been confirmed to be "1"
    When the administrator sets parameter "shareapi_enabled" of app "core" to "no"
    Then the capabilities setting of "files_sharing" path "api_enabled" should be ""


  Scenario: Check that group sharing can be enabled
    Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    And the capabilities setting of "files_sharing" path "group_sharing" has been confirmed to be ""
    When the administrator sets parameter "shareapi_allow_group_sharing" of app "core" to "yes"
    Then the capabilities setting of "files_sharing" path "group_sharing" should be "1"


  Scenario: Check that group sharing can be disabled
    Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "yes"
    And the capabilities setting of "files_sharing" path "group_sharing" has been confirmed to be "1"
    When the administrator sets parameter "shareapi_allow_group_sharing" of app "core" to "no"
    Then the capabilities setting of "files_sharing" path "group_sharing" should be ""

  @smokeTest
  Scenario: getting default capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                           | value             |
      | core          | pollinterval                              | 30000             |
      | core          | webdav-root                               | remote.php/webdav |
      | core          | status@@@edition                          | %edition%         |
      | core          | status@@@productname                      | %productname%     |
      | core          | status@@@version                          | %version%         |
      | core          | status@@@versionstring                    | %versionstring%   |
      | files_sharing | api_enabled                               | 1                 |
      | files_sharing | default_permissions                       | 31                |
      | files_sharing | search_min_length                         | 2                 |
      | files_sharing | public@@@enabled                          | 1                 |
      | files_sharing | public@@@multiple                         | 1                 |
      | files_sharing | public@@@upload                           | 1                 |
      | files_sharing | public@@@supports_upload_only             | 1                 |
      | files_sharing | public@@@send_mail                        | EMPTY             |
      | files_sharing | public@@@social_share                     | 1                 |
      | files_sharing | public@@@enforced                         | EMPTY             |
      | files_sharing | public@@@enforced_for@@@read_only         | EMPTY             |
      | files_sharing | public@@@enforced_for@@@read_write        | EMPTY             |
      | files_sharing | public@@@enforced_for@@@upload_only       | EMPTY             |
      | files_sharing | public@@@enforced_for@@@read_write_delete | EMPTY             |
      | files_sharing | public@@@expire_date@@@enabled            | EMPTY             |
      | files_sharing | public@@@defaultPublicLinkShareName       | Public link       |
      | files_sharing | resharing                                 | 1                 |
      | files_sharing | federation@@@outgoing                     | 1                 |
      | files_sharing | federation@@@incoming                     | 1                 |
      | files_sharing | group_sharing                             | 1                 |
      | files_sharing | share_with_group_members_only             | EMPTY             |
      | files_sharing | share_with_membership_groups_only         | EMPTY             |
      | files_sharing | auto_accept_share                         | 1                 |
      | files_sharing | user_enumeration@@@enabled                | 1                 |
      | files_sharing | user_enumeration@@@group_members_only     | EMPTY             |
      | files_sharing | user@@@send_mail                          | EMPTY             |
      | files         | bigfilechunking                           | 1                 |
      | files         | privateLinks                              | 1                 |
      | files         | privateLinksDetailsParam                  | 1                 |

  @smokeTest
  Scenario: getting default capabilities with admin user with new values
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                                          | value             |
      | files_sharing | user@@@expire_date@@@enabled                             | EMPTY             |
      | files_sharing | group@@@expire_date@@@enabled                            | EMPTY             |
      | files_sharing | providers_capabilities@@@ocinternal@@@user@@@element[0]  | shareExpiration   |
      | files_sharing | providers_capabilities@@@ocinternal@@@group@@@element[0] | shareExpiration   |
      | files_sharing | providers_capabilities@@@ocinternal@@@link@@@element[0]  | shareExpiration   |
      | files_sharing | providers_capabilities@@@ocinternal@@@link@@@element[1]  | passwordProtected |

  @smokeTest
  Scenario: the default capabilities should include share expiration for all of user, group, link and remote (federated)
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                                                   | value           |
      | files_sharing | user@@@expire_date@@@enabled                                      | EMPTY           |
      | files_sharing | group@@@expire_date@@@enabled                                     | EMPTY           |
      | files_sharing | remote@@@expire_date@@@enabled                                    | EMPTY           |
      | files_sharing | providers_capabilities@@@ocinternal@@@user@@@element[0]           | shareExpiration |
      | files_sharing | providers_capabilities@@@ocinternal@@@group@@@element[0]          | shareExpiration |
      | files_sharing | providers_capabilities@@@ocinternal@@@link@@@element[0]           | shareExpiration |
      | files_sharing | providers_capabilities@@@ocFederatedSharing@@@remote@@@element[0] | shareExpiration |

  @smokeTest
  Scenario: getting new default capabilities in versions after 10.5.0 with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability | path_to_element                 | value |
      | files      | favorites                       | 1     |
      | files      | file_locking_support            | 1     |
      | files      | file_locking_enable_file_action | EMPTY |

  @smokeTest
  Scenario: lock file action can be enabled
    Given parameter "enable_lock_file_action" of app "files" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability | path_to_element                 | value |
      | files      | file_locking_support            | 1     |
      | files      | file_locking_enable_file_action | 1     |

  @smokeTest
  Scenario: getting default capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element        | value |
      | files_sharing | user@@@profile_picture | 1     |

  @files_trashbin-app-required @skipOnReva
  Scenario: getting trashbin app capability with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability | path_to_element | value |
      | files      | undelete        | 1     |

  @files_versions-app-required @skipOnReva
  Scenario: getting versions app capability with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability | path_to_element | value |
      | files      | versioning      | 1     |


  Scenario: getting default_permissions capability with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element     | value |
      | files_sharing | default_permissions | 31    |


  Scenario: default_permissions capability can be changed
    Given parameter "shareapi_default_permissions" of app "core" has been set to "7"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element     | value |
      | files_sharing | default_permissions | 7     |


  Scenario: .htaccess is reported as a blacklisted file by default
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability | path_to_element                | value     |
      | files      | blacklisted_files@@@element[0] | .htaccess |


  Scenario: multiple files can be reported as blacklisted
    Given the administrator has updated system config key "blacklisted_files" with value '["test.txt",".htaccess"]' and type "json"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability | path_to_element                | value     |
      | files      | blacklisted_files@@@element[0] | test.txt  |
      | files      | blacklisted_files@@@element[1] | .htaccess |


  Scenario: user expire date can be enabled
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element               | value |
      | files_sharing | user@@@expire_date@@@enabled  | 1     |
      | files_sharing | user@@@expire_date@@@days     | 7     |
      | files_sharing | user@@@expire_date@@@enforced | EMPTY |


  Scenario: user expire date can be enforced
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element               | value |
      | files_sharing | user@@@expire_date@@@enabled  | 1     |
      | files_sharing | user@@@expire_date@@@days     | 7     |
      | files_sharing | user@@@expire_date@@@enforced | 1     |


  Scenario: user expire date days can be set
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "14"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element               | value |
      | files_sharing | user@@@expire_date@@@enabled  | 1     |
      | files_sharing | user@@@expire_date@@@days     | 14    |
      | files_sharing | user@@@expire_date@@@enforced | EMPTY |


  Scenario: group expire date can be enabled
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                | value |
      | files_sharing | group@@@expire_date@@@enabled  | 1     |
      | files_sharing | group@@@expire_date@@@days     | 7     |
      | files_sharing | group@@@expire_date@@@enforced | EMPTY |


  Scenario: group expire date can be enforced
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                | value |
      | files_sharing | group@@@expire_date@@@enabled  | 1     |
      | files_sharing | group@@@expire_date@@@days     | 7     |
      | files_sharing | group@@@expire_date@@@enforced | 1     |


  Scenario: group expire date days can be set
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "14"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                | value |
      | files_sharing | group@@@expire_date@@@enabled  | 1     |
      | files_sharing | group@@@expire_date@@@days     | 14    |
      | files_sharing | group@@@expire_date@@@enforced | EMPTY |

  #feature added in #31824 released in 10.0.10
  @smokeTest
  Scenario: getting capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element | value |
      | files_sharing | can_share       | 1     |


  #feature added in #32414 released in 10.0.10
  Scenario: getting async capabilities when async operations are enabled
    Given the administrator has enabled async operations
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability | path_to_element | value |
      | async      |                 | 1.0   |


  Scenario: getting async capabilities when async operations are disabled
    Given the administrator has disabled async operations
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability | path_to_element | value |
      | async      |                 | EMPTY |


  Scenario: Changing public upload
    Given parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@multiple                     | 1                 |
      | files_sharing | public@@@upload                       | EMPTY             |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Disabling share api
    Given parameter "shareapi_enabled" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element       | value             |
      | core          | pollinterval          | 30000             |
      | core          | webdav-root           | remote.php/webdav |
      | files_sharing | api_enabled           | EMPTY             |
      | files_sharing | can_share             | EMPTY             |
      | files_sharing | public@@@enabled      | EMPTY             |
      | files_sharing | public@@@multiple     | EMPTY             |
      | files_sharing | public@@@upload       | EMPTY             |
      | files_sharing | resharing             | EMPTY             |
      | files_sharing | federation@@@outgoing | 1                 |
      | files_sharing | federation@@@incoming | 1                 |
      | files         | bigfilechunking       | 1                 |


  Scenario: Disabling public links
    Given parameter "shareapi_allow_links" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | EMPTY             |
      | files_sharing | public@@@multiple                     | EMPTY             |
      | files_sharing | public@@@upload                       | EMPTY             |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing resharing
    Given parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | EMPTY             |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing federation outgoing
    Given parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | EMPTY             |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing federation incoming
    Given parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | EMPTY             |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing "password enforced for read-only public link shares"
    Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                                | value             |
      | core          | pollinterval                                   | 30000             |
      | core          | webdav-root                                    | remote.php/webdav |
      | files_sharing | api_enabled                                    | 1                 |
      | files_sharing | can_share                                      | 1                 |
      | files_sharing | public@@@enabled                               | 1                 |
      | files_sharing | public@@@upload                                | 1                 |
      | files_sharing | public@@@send_mail                             | EMPTY             |
      | files_sharing | public@@@social_share                          | 1                 |
      | files_sharing | public@@@password@@@enforced_for@@@read_only   | 1                 |
      | files_sharing | public@@@password@@@enforced_for@@@read_write  | EMPTY             |
      | files_sharing | public@@@password@@@enforced_for@@@upload_only | EMPTY             |
      | files_sharing | resharing                                      | 1                 |
      | files_sharing | federation@@@outgoing                          | 1                 |
      | files_sharing | federation@@@incoming                          | 1                 |
      | files_sharing | group_sharing                                  | 1                 |
      | files_sharing | share_with_group_members_only                  | EMPTY             |
      | files_sharing | user_enumeration@@@enabled                     | 1                 |
      | files_sharing | user_enumeration@@@group_members_only          | EMPTY             |
      | files         | bigfilechunking                                | 1                 |


  Scenario: Changing "password enforced for read-write public link shares"
    Given parameter "shareapi_enforce_links_password_read_write" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                                | value             |
      | core          | pollinterval                                   | 30000             |
      | core          | webdav-root                                    | remote.php/webdav |
      | files_sharing | api_enabled                                    | 1                 |
      | files_sharing | can_share                                      | 1                 |
      | files_sharing | public@@@enabled                               | 1                 |
      | files_sharing | public@@@upload                                | 1                 |
      | files_sharing | public@@@send_mail                             | EMPTY             |
      | files_sharing | public@@@social_share                          | 1                 |
      | files_sharing | public@@@password@@@enforced_for@@@read_only   | EMPTY             |
      | files_sharing | public@@@password@@@enforced_for@@@read_write  | 1                 |
      | files_sharing | public@@@password@@@enforced_for@@@upload_only | EMPTY             |
      | files_sharing | resharing                                      | 1                 |
      | files_sharing | federation@@@outgoing                          | 1                 |
      | files_sharing | federation@@@incoming                          | 1                 |
      | files_sharing | group_sharing                                  | 1                 |
      | files_sharing | share_with_group_members_only                  | EMPTY             |
      | files_sharing | user_enumeration@@@enabled                     | 1                 |
      | files_sharing | user_enumeration@@@group_members_only          | EMPTY             |
      | files         | bigfilechunking                                | 1                 |


  Scenario: Changing "password enforced for write-only public link shares"
    Given parameter "shareapi_enforce_links_password_write_only" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                                | value             |
      | core          | pollinterval                                   | 30000             |
      | core          | webdav-root                                    | remote.php/webdav |
      | files_sharing | api_enabled                                    | 1                 |
      | files_sharing | can_share                                      | 1                 |
      | files_sharing | public@@@enabled                               | 1                 |
      | files_sharing | public@@@upload                                | 1                 |
      | files_sharing | public@@@send_mail                             | EMPTY             |
      | files_sharing | public@@@social_share                          | 1                 |
      | files_sharing | public@@@password@@@enforced_for@@@read_only   | EMPTY             |
      | files_sharing | public@@@password@@@enforced_for@@@read_write  | EMPTY             |
      | files_sharing | public@@@password@@@enforced_for@@@upload_only | 1                 |
      | files_sharing | resharing                                      | 1                 |
      | files_sharing | federation@@@outgoing                          | 1                 |
      | files_sharing | federation@@@incoming                          | 1                 |
      | files_sharing | group_sharing                                  | 1                 |
      | files_sharing | share_with_group_members_only                  | EMPTY             |
      | files_sharing | user_enumeration@@@enabled                     | 1                 |
      | files_sharing | user_enumeration@@@group_members_only          | EMPTY             |
      | files         | bigfilechunking                                | 1                 |


  Scenario: Changing public notifications
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | 1                 |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing public social share
    Given parameter "shareapi_allow_social_share" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | EMPTY             |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing expire date
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | public@@@expire_date@@@enabled        | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing expire date enforcing
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | public@@@expire_date@@@enabled        | 1                 |
      | files_sharing | public@@@expire_date@@@enforced       | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing group sharing allowed
    Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | EMPTY             |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing only share with group member
    Given parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | 1                 |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing only share with membership groups
    Given parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | share_with_membership_groups_only     | 1                 |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing auto accept share
    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | share_with_membership_groups_only     | EMPTY             |
      | files_sharing | auto_accept_share                     | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing allow share dialog user enumeration
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element               | value             |
      | core          | pollinterval                  | 30000             |
      | core          | webdav-root                   | remote.php/webdav |
      | files_sharing | api_enabled                   | 1                 |
      | files_sharing | can_share                     | 1                 |
      | files_sharing | public@@@enabled              | 1                 |
      | files_sharing | public@@@upload               | 1                 |
      | files_sharing | public@@@send_mail            | EMPTY             |
      | files_sharing | public@@@social_share         | 1                 |
      | files_sharing | resharing                     | 1                 |
      | files_sharing | federation@@@outgoing         | 1                 |
      | files_sharing | federation@@@incoming         | 1                 |
      | files_sharing | group_sharing                 | 1                 |
      | files_sharing | share_with_group_members_only | EMPTY             |
      | files_sharing | user_enumeration@@@enabled    | EMPTY             |
      | files         | bigfilechunking               | 1                 |


  Scenario: Changing allow share dialog user enumeration for group members only
    Given parameter "shareapi_share_dialog_user_enumeration_group_members" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | 1                 |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing allow mail notification
    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files_sharing | user@@@send_mail                      | 1                 |
      | files         | bigfilechunking                       | 1                 |


  Scenario: Changing exclude groups from sharing
    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And group "group1" has been created
    And group "hash#group" has been created
    And group "group-3" has been created
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: When in a group that is excluded from sharing, can_share is off
    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And user "Alice" has been created with default attributes and without skeleton files
    And group "group1" has been created
    And group "hash#group" has been created
    And group "group-3" has been created
    And group "ordinary-group" has been created
    And user "Alice" has been added to group "hash#group"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
    When user "Alice" retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | EMPTY             |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: When not in any group that is excluded from sharing, can_share is on
    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And user "Alice" has been created with default attributes and without skeleton files
    And group "group1" has been created
    And group "hash#group" has been created
    And group "group-3" has been created
    And group "ordinary-group" has been created
    And user "Alice" has been added to group "ordinary-group"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
    When user "Alice" retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: When in a group that is excluded from sharing and in another group, can_share is off
    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And user "Alice" has been created with default attributes and without skeleton files
    And group "group1" has been created
    And group "hash#group" has been created
    And group "group-3" has been created
    And group "ordinary-group" has been created
    And user "Alice" has been added to group "hash#group"
    And user "Alice" has been added to group "ordinary-group"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
    When user "Alice" retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 30000             |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | EMPTY             |
      | files_sharing | public@@@enabled                      | 1                 |
      | files_sharing | public@@@upload                       | 1                 |
      | files_sharing | public@@@send_mail                    | EMPTY             |
      | files_sharing | public@@@social_share                 | 1                 |
      | files_sharing | resharing                             | 1                 |
      | files_sharing | federation@@@outgoing                 | 1                 |
      | files_sharing | federation@@@incoming                 | 1                 |
      | files_sharing | group_sharing                         | 1                 |
      | files_sharing | share_with_group_members_only         | EMPTY             |
      | files_sharing | user_enumeration@@@enabled            | 1                 |
      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
      | files         | bigfilechunking                       | 1                 |


  Scenario: blacklisted_files_regex is reported in capabilities
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the capabilities should contain
      | capability | path_to_element         | value    |
      | files      | blacklisted_files_regex | \.(part\|filepart)$ |

  @smokeTest
  Scenario: getting default capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element                           | value             |
      | core          | status@@@edition                          | %edition%         |
      | core          | status@@@product                          | %productname%     |
      | core          | status@@@productname                      | %productname%     |
      | core          | status@@@version                          | %version%         |
      | core          | status@@@versionstring                    | %versionstring%   |
    And the version data in the response should contain
      | name    | value             |
      | string  | %versionstring%   |
      | edition | %edition%         |
      | product | %productname%     |
    And the major-minor-micro version data in the response should match the version string

@api @TestAlsoOnExternalUserBackend
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
  Scenario: getting capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
      | core          | webdav-root                           | remote.php/webdav |
      | core          | status@@@edition                      | %edition%         |
      | core          | status@@@productname                  | %productname%     |
      | core          | status@@@version                      | %version%         |
      | core          | status@@@versionstring                | %versionstring%   |
      | files_sharing | api_enabled                           | 1                 |
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

  @files_trashbin-app-required
  Scenario: getting trashbin app capability with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | files | undelete | 1 |

  @files_versions-app-required
  Scenario: getting versions app capability with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | files | versioning | 1 |

	#feature added in #31824 will be released in 10.0.10
  @smokeTest @skipOnOcV10.0.9
  Scenario: getting capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element | value |
      | files_sharing | can_share       | 1     |

	#feature added in #32414 will be released in 10.0.10
  @skipOnOcV10.0.9
  Scenario: getting async capabilites when async operations are enabled
    Given the administrator has enabled async operations
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability | path_to_element | value |
      | async      |                 | 1.0   |

	#feature added in #32414 will be released in 10.0.10
  @skipOnOcV10.0.9
  Scenario: getting async capabilites when async operations are disabled
    Given the administrator has disabled async operations
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability | path_to_element | value |
      | async      |                 | EMPTY |

  Scenario: Changing public upload
    Given parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | 1                 |
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
    Then the capabilities should contain
      | capability    | path_to_element       | value             |
      | core          | pollinterval          | 60                |
      | core          | webdav-root           | remote.php/webdav |
      | files_sharing | api_enabled           | EMPTY             |
      | files_sharing | can_share             | EMPTY             |
      | files_sharing | public@@@enabled      | EMPTY             |
      | files_sharing | public@@@upload       | EMPTY             |
      | files_sharing | resharing             | EMPTY             |
      | files_sharing | federation@@@outgoing | 1                 |
      | files_sharing | federation@@@incoming | 1                 |
      | files         | bigfilechunking       | 1                 |

  Scenario: Disabling public links
    Given parameter "shareapi_allow_links" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
      | core          | webdav-root                           | remote.php/webdav |
      | files_sharing | api_enabled                           | 1                 |
      | files_sharing | can_share                             | 1                 |
      | files_sharing | public@@@enabled                      | EMPTY             |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                                | value             |
      | core          | pollinterval                                   | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                                | value             |
      | core          | pollinterval                                   | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                                | value             |
      | core          | pollinterval                                   | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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

  Scenario: Changing allow share dialog user enumeration
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element               | value             |
      | core          | pollinterval                  | 60                |
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
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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

  Scenario: Changing exclude groups from sharing
    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And group "group1" has been created
    And group "hash#group" has been created
    And group "group-3" has been created
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
    When the administrator retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    And user "user0" has been created with default attributes and skeleton files
    And group "group1" has been created
    And group "hash#group" has been created
    And group "group-3" has been created
    And group "ordinary-group" has been created
    And user "user0" has been added to group "hash#group"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
    When user "user0" retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    And user "user1" has been created with default attributes and skeleton files
    And group "group1" has been created
    And group "hash#group" has been created
    And group "group-3" has been created
    And group "ordinary-group" has been created
    And user "user1" has been added to group "ordinary-group"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
    When user "user1" retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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
    And user "user2" has been created with default attributes and skeleton files
    And group "group1" has been created
    And group "hash#group" has been created
    And group "group-3" has been created
    And group "ordinary-group" has been created
    And user "user2" has been added to group "hash#group"
    And user "user2" has been added to group "ordinary-group"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
    When user "user2" retrieves the capabilities using the capabilities API
    Then the capabilities should contain
      | capability    | path_to_element                       | value             |
      | core          | pollinterval                          | 60                |
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

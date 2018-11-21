@api @TestAlsoOnExternalUserBackend
Feature: sharees

  Background:
    Given these users have been created with default attributes:
      | username |
      | user1    |
      | sharee1  |
    And group "ShareeGroup" has been created
    And group "ShareeGroup2" has been created
    And user "user1" has been added to group "ShareeGroup2"

  @smokeTest
  Scenario Outline: Search without exact match
    Given using OCS API version "<ocs-api-version>"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search without exact match not-exact casing
    Given using OCS API version "<ocs-api-version>"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sHaRee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search only with group members - denied
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  @skipOnLDAP
  Scenario Outline: Search only with group members - allowed
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And user "Sharee1" has been added to group "ShareeGroup2"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search only with group members - no group as non-member
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "Sharee1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search only with membership groups - denied
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "Sharee1" gets the sharees using the sharing API with parameters
      | search   | ShareeGroup |
      | itemType | file        |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search only with membership groups - denied but users match
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "Sharee1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search only with membership groups - allowed
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | ShareeGroup |
      | itemType | file        |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search only with membership groups - allowed including users
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search without exact match no iteration allowed
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search with exact match no iteration allowed
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee1 |
      | itemType | file    |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search with exact match group no iteration allowed
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | ShareeGroup |
      | itemType | file        |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be
      | ShareeGroup | 1 | ShareeGroup |
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search with exact match
    Given using OCS API version "<ocs-api-version>"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee1 |
      | itemType | file    |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search with exact match not-exact casing
    Given using OCS API version "<ocs-api-version>"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee1 |
      | itemType | file    |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search with exact match not-exact casing group
    Given using OCS API version "<ocs-api-version>"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | shareegroup2 |
      | itemType | file         |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Search with "self"
    Given using OCS API version "<ocs-api-version>"
    When user "Sharee1" gets the sharees using the sharing API with parameters
      | search   | Sharee1 |
      | itemType | file    |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Remote sharee for files
    Given using OCS API version "<ocs-api-version>"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | test@localhost |
      | itemType | file           |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be
      | test@localhost | 6 | test@localhost |
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Remote sharee for calendars not allowed
    Given using OCS API version "<ocs-api-version>"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | test@localhost |
      | itemType | calendar       |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Group sharees not returned when group sharing is disabled
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  @skipOnLDAP
  Scenario Outline: Enumerate only group members - only show partial results from member groups
    Given using OCS API version "<ocs-api-version>"
    Given these users have been created with default attributes:
    | username | displayname |
    | another  | Another     |
    And user "Another" has been added to group "ShareeGroup2"
    And parameter "shareapi_share_dialog_user_enumeration_group_members" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | anot |
      | itemType | file |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Another | 0 | another |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Enumerate only group members - accept exact match from non-member groups
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_share_dialog_user_enumeration_group_members" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee1 |
      | itemType | file    |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: Enumerate only group members - only show partial results from member groups
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_share_dialog_user_enumeration_group_members" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | ShareeG |
      | itemType | file    |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  @skipOnLDAP
  Scenario Outline: Enumerate only group members - only accept exact group match from non-memberships
    Given using OCS API version "<ocs-api-version>"
    And group "ShareeGroupNonMember" has been created
    And parameter "shareapi_share_dialog_user_enumeration_group_members" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | ShareeGroupNonMember |
      | itemType | file                 |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be
      | ShareeGroupNonMember | 1 | ShareeGroupNonMember |
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

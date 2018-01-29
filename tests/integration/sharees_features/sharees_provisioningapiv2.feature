Feature: sharees_provisioningapiv2
  Background:
    Given using api version "2"
    And user "test" has been created
    And user "Sharee1" has been created
    And group "ShareeGroup" has been created
    And group "ShareeGroup2" has been created
    And user "test" has been added to group "ShareeGroup2"

  Scenario: Search without exact match
    Given as user "test"
    When the user gets the sharees using the API with parameters
      | search | Sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup | 1 | ShareeGroup |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search without exact match not-exact casing
    Given as user "test"
    When the user gets the sharees using the API with parameters
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup | 1 | ShareeGroup |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with group members - denied
    Given as user "test"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    When the user gets the sharees using the API with parameters
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup | 1 | ShareeGroup |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with group members - allowed
    Given as user "test"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And user "Sharee1" has been added to group "ShareeGroup2"
    When the user gets the sharees using the API with parameters
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup | 1 | ShareeGroup |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with group members - no group as non-member
    Given as user "Sharee1"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When the user gets the sharees using the API with parameters
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with membership groups - denied
    Given as user "Sharee1"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When the user gets the sharees using the API with parameters
      | search | ShareeGroup |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with membership groups - denied but users match
    Given as user "Sharee1"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When the user gets the sharees using the API with parameters
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with membership groups - allowed
    Given as user "test"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When the user gets the sharees using the API with parameters
      | search | ShareeGroup |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with membership groups - allowed including users
    Given as user "test"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When the user gets the sharees using the API with parameters
      | search | Sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search without exact match no iteration allowed
    Given as user "test"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When the user gets the sharees using the API with parameters
      | search | Sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search with exact match no iteration allowed
    Given as user "test"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When the user gets the sharees using the API with parameters
      | search | Sharee1 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search with exact match group no iteration allowed
    Given as user "test"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When the user gets the sharees using the API with parameters
      | search | ShareeGroup |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be
      | ShareeGroup | 1 | ShareeGroup |
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search with exact match
    Given as user "test"
    When the user gets the sharees using the API with parameters
      | search | Sharee1 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then the "exact users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    Then the "users" sharees returned should be empty
    Then the "exact groups" sharees returned should be empty
    Then the "groups" sharees returned should be empty
    Then the "exact remotes" sharees returned should be empty
    Then the "remotes" sharees returned should be empty

  Scenario: Search with exact match not-exact casing
    Given as user "test"
    When the user gets the sharees using the API with parameters
      | search | sharee1 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then the "exact users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    Then the "users" sharees returned should be empty
    Then the "exact groups" sharees returned should be empty
    Then the "groups" sharees returned should be empty
    Then the "exact remotes" sharees returned should be empty
    Then the "remotes" sharees returned should be empty

  Scenario: Search with exact match not-exact casing group
    Given as user "test"
    When the user gets the sharees using the API with parameters
      | search | shareegroup2 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then the "exact users" sharees returned should be empty
    Then the "users" sharees returned should be empty
    Then the "exact groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    Then the "groups" sharees returned should be empty
    Then the "exact remotes" sharees returned should be empty
    Then the "remotes" sharees returned should be empty

  Scenario: Search with "self"
    Given as user "Sharee1"
    When the user gets the sharees using the API with parameters
      | search | Sharee1 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then the "exact users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    Then the "users" sharees returned should be empty
    Then the "exact groups" sharees returned should be empty
    Then the "groups" sharees returned should be empty
    Then the "exact remotes" sharees returned should be empty
    Then the "remotes" sharees returned should be empty

  Scenario: Remote sharee for files
    Given as user "test"
    When the user gets the sharees using the API with parameters
      | search | test@localhost |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then the "exact users" sharees returned should be empty
    Then the "users" sharees returned should be empty
    Then the "exact groups" sharees returned should be empty
    Then the "groups" sharees returned should be empty
    Then the "exact remotes" sharees returned should be
      | test@localhost | 6 | test@localhost |
    Then the "remotes" sharees returned should be empty

  Scenario: Remote sharee for calendars not allowed
    Given as user "test"
    When the user gets the sharees using the API with parameters
      | search | test@localhost |
      | itemType | calendar |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then the "exact users" sharees returned should be empty
    Then the "users" sharees returned should be empty
    Then the "exact groups" sharees returned should be empty
    Then the "groups" sharees returned should be empty
    Then the "exact remotes" sharees returned should be empty
    Then the "remotes" sharees returned should be empty

  Scenario: Group sharees not returned when group sharing is disabled
    Given as user "test"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When the user gets the sharees using the API with parameters
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee1 | 0 | Sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

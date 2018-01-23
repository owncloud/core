Feature: sharees_provisioningapiv2
  Background:
    Given using api version "2"
    And user "test" exists
    And user "Sharee1" exists
    And group "ShareeGroup" exists
    And group "ShareeGroup2" exists
    And user "test" belongs to group "ShareeGroup2"

  Scenario: Search without exact match
    Given as an "test"
    When getting sharees for
      | search | Sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    And "exact groups" sharees returned is empty
    And "groups" sharees returned are
      | ShareeGroup | 1 | ShareeGroup |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search without exact match not-exact casing
    Given as an "test"
    When getting sharees for
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    And "exact groups" sharees returned is empty
    And "groups" sharees returned are
      | ShareeGroup | 1 | ShareeGroup |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search only with group members - denied
    Given as an "test"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    When getting sharees for
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned is empty
    And "exact groups" sharees returned is empty
    And "groups" sharees returned are
      | ShareeGroup | 1 | ShareeGroup |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search only with group members - allowed
    Given as an "test"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And user "Sharee1" belongs to group "ShareeGroup2"
    When getting sharees for
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    And "exact groups" sharees returned is empty
    And "groups" sharees returned are
      | ShareeGroup | 1 | ShareeGroup |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search only with group members - no group as non-member
    Given as an "Sharee1"
    And parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When getting sharees for
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned is empty
    And "exact groups" sharees returned is empty
    And "groups" sharees returned is empty
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search only with membership groups - denied
    Given as an "Sharee1"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When getting sharees for
      | search | ShareeGroup |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned is empty
    And "exact groups" sharees returned is empty
    And "groups" sharees returned is empty
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search only with membership groups - denied but users match
    Given as an "Sharee1"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When getting sharees for
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    And "exact groups" sharees returned is empty
    And "groups" sharees returned is empty
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search only with membership groups - allowed
    Given as an "test"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When getting sharees for
      | search | ShareeGroup |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned is empty
    And "exact groups" sharees returned is empty
    And "groups" sharees returned are
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search only with membership groups - allowed including users
    Given as an "test"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When getting sharees for
      | search | Sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    And "exact groups" sharees returned is empty
    And "groups" sharees returned are
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search without exact match no iteration allowed
    Given as an "test"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When getting sharees for
      | search | Sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned is empty
    And "exact groups" sharees returned is empty
    And "groups" sharees returned is empty
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search with exact match no iteration allowed
    Given as an "test"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When getting sharees for
      | search | Sharee1 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    And "users" sharees returned is empty
    And "exact groups" sharees returned is empty
    And "groups" sharees returned is empty
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search with exact match group no iteration allowed
    Given as an "test"
    And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When getting sharees for
      | search | ShareeGroup |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned is empty
    And "exact groups" sharees returned are
      | ShareeGroup | 1 | ShareeGroup |
    And "groups" sharees returned is empty
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

  Scenario: Search with exact match
    Given as an "test"
    When getting sharees for
      | search | Sharee1 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then "exact users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    Then "users" sharees returned is empty
    Then "exact groups" sharees returned is empty
    Then "groups" sharees returned is empty
    Then "exact remotes" sharees returned is empty
    Then "remotes" sharees returned is empty

  Scenario: Search with exact match not-exact casing
    Given as an "test"
    When getting sharees for
      | search | sharee1 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then "exact users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    Then "users" sharees returned is empty
    Then "exact groups" sharees returned is empty
    Then "groups" sharees returned is empty
    Then "exact remotes" sharees returned is empty
    Then "remotes" sharees returned is empty

  Scenario: Search with exact match not-exact casing group
    Given as an "test"
    When getting sharees for
      | search | shareegroup2 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then "exact users" sharees returned is empty
    Then "users" sharees returned is empty
    Then "exact groups" sharees returned are
      | ShareeGroup2 | 1 | ShareeGroup2 |
    Then "groups" sharees returned is empty
    Then "exact remotes" sharees returned is empty
    Then "remotes" sharees returned is empty

  Scenario: Search with "self"
    Given as an "Sharee1"
    When getting sharees for
      | search | Sharee1 |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then "exact users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    Then "users" sharees returned is empty
    Then "exact groups" sharees returned is empty
    Then "groups" sharees returned is empty
    Then "exact remotes" sharees returned is empty
    Then "remotes" sharees returned is empty

  Scenario: Remote sharee for files
    Given as an "test"
    When getting sharees for
      | search | test@localhost |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then "exact users" sharees returned is empty
    Then "users" sharees returned is empty
    Then "exact groups" sharees returned is empty
    Then "groups" sharees returned is empty
    Then "exact remotes" sharees returned are
      | test@localhost | 6 | test@localhost |
    Then "remotes" sharees returned is empty

  Scenario: Remote sharee for calendars not allowed
    Given as an "test"
    When getting sharees for
      | search | test@localhost |
      | itemType | calendar |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Then "exact users" sharees returned is empty
    Then "users" sharees returned is empty
    Then "exact groups" sharees returned is empty
    Then "groups" sharees returned is empty
    Then "exact remotes" sharees returned is empty
    Then "remotes" sharees returned is empty

  Scenario: Group sharees not returned when group sharing is disabled
    Given as an "test"
    And parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When getting sharees for
      | search | sharee |
      | itemType | file |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And "exact users" sharees returned is empty
    And "users" sharees returned are
      | Sharee1 | 0 | Sharee1 |
    And "exact groups" sharees returned is empty
    And "groups" sharees returned is empty
    And "exact remotes" sharees returned is empty
    And "remotes" sharees returned is empty

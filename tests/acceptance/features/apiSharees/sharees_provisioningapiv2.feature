@api @TestAlsoOnExternalUserBackend
Feature: sharees_provisioningapiv2

  Background:
    Given using OCS API version "2"
    And these users have been created:
      | username |
      | user1    |
      | sharee1  |
    And group "ShareeGroup" has been created
    And group "ShareeGroup2" has been created
    And user "user1" has been added to group "ShareeGroup2"

  @smokeTest
  Scenario: Search without exact match
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search without exact match not-exact casing
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sHaRee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with group members - denied
    Given parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  @skipOnLDAP
  Scenario: Search only with group members - allowed
    Given parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And user "Sharee1" has been added to group "ShareeGroup2"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with group members - no group as non-member
    Given parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "Sharee1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with membership groups - denied
    Given parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "Sharee1" gets the sharees using the sharing API with parameters
      | search   | ShareeGroup |
      | itemType | file        |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with membership groups - denied but users match
    Given parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "Sharee1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search only with membership groups - allowed
    Given parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | ShareeGroup |
      | itemType | file        |
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
    Given parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search without exact match no iteration allowed
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search with exact match no iteration allowed
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee1 |
      | itemType | file    |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search with exact match group no iteration allowed
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | ShareeGroup |
      | itemType | file        |
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
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | Sharee1 |
      | itemType | file    |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search with exact match not-exact casing
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee1 |
      | itemType | file    |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search with exact match not-exact casing group
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | shareegroup2 |
      | itemType | file         |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Search with "self"
    When user "Sharee1" gets the sharees using the sharing API with parameters
      | search   | Sharee1 |
      | itemType | file    |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Remote sharee for files
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | test@localhost |
      | itemType | file           |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be
      | test@localhost | 6 | test@localhost |
    And the "remotes" sharees returned should be empty

  Scenario: Remote sharee for calendars not allowed
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | test@localhost |
      | itemType | calendar       |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be empty
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

  Scenario: Group sharees not returned when group sharing is disabled
    Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When user "user1" gets the sharees using the sharing API with parameters
      | search   | sharee |
      | itemType | file   |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the "exact users" sharees returned should be empty
    And the "users" sharees returned should be
      | Sharee One | 0 | sharee1 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should be empty
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty

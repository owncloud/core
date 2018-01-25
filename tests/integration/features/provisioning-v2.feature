Feature: provisioning
  Background:
    Given using api version "2"

  Scenario: Getting a not existing user
    Given as an "admin"
    When sending "GET" to "/cloud/users/test"
    Then the HTTP status code should be "404"

  Scenario Outline: adding a user to a group
    Given as an "admin"
    And user "brand-new-user" exists
    And group "<group_id>" exists
    When sending "POST" to "/cloud/users/brand-new-user/groups" with
      | groupid | <group_id> |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Examples:
      | group_id  |
      | new-group |
      | 0         |

  Scenario Outline: removing a user from a group
    Given as an "admin"
    And user "brand-new-user" exists
    And group "<group_id>" exists
    And user "brand-new-user" belongs to group "<group_id>"
    When sending "DELETE" to "/cloud/users/brand-new-user/groups" with
      | groupid | <group_id> |
    Then the OCS status code should be "200"
    And user "brand-new-user" should not belong to group "<group_id>"
    Examples:
      | group_id  |
      | new-group |
      | 0         |

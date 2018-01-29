Feature: provisioning
  Background:
    Given using api version "2"

  Scenario: Getting a not existing user
    Given as an "admin"
    When the user sends HTTP method "GET" to API endpoint "/cloud/users/test"
    Then the HTTP status code should be "404"

  Scenario Outline: adding a user to a group
    Given as an "admin"
    And user "brand-new-user" has been created
    And group "<group_id>" has been created
    When the user sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | <group_id> |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Examples:
      | group_id  |
      | new-group |
      | 0         |

  Scenario Outline: removing a user from a group
    Given as an "admin"
    And user "brand-new-user" has been created
    And group "<group_id>" has been created
    And user "brand-new-user" has been added to group "<group_id>"
    When the user sends HTTP method "DELETE" to API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | <group_id> |
    Then the OCS status code should be "200"
    And user "brand-new-user" should not belong to group "<group_id>"
    Examples:
      | group_id  |
      | new-group |
      | 0         |

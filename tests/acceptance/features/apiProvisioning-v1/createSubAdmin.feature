@api @provisioning_api-app-required
Feature: create a subadmin
  As an admin
  I want to be able to make a user the subadmin of a group
  So that I can give administrative privilege of a group to a user

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin creates a subadmin
    Given user "brand-new-user" has been created
    And group "new-group" has been created
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/subadmins" with body
      | groupid | new-group |
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should be a subadmin of group "new-group"

  Scenario: admin tries to create a subadmin using a user which does not exist
    Given user "not-user" has been deleted
    And group "new-group" has been created
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/not-user/subadmins" with body
      | groupid | new-group |
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And user "not-user" should not be a subadmin of group "new-group"

  Scenario: admin tries to create a subadmin using a group which does not exist
    Given user "brand-new-user" has been created
    And group "not-group" has been deleted
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/subadmins" with body
      | groupid | not-group |
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And the API should not return any data

  Scenario: subadmin of a group tries to make another user subadmin of their group
    Given user "subadmin" has been created
    And user "brand-new-user" has been created
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    And the administrator has sent HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | new-group |
    When user "subadmin" sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/subadmins" with body
      | groupid | new-group |
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "brand-new-user" should not be a subadmin of group "new-group"

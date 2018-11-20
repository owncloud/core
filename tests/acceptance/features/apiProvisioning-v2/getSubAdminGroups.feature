@api @provisioning_api-app-required
Feature: get subadmin groups
  As an admin
  I want to be able to get the groups in which the user is subadmin
  So that I can know in which groups the user has administrative rights

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets subadmin groups of a user
    Given user "brand-new-user" has been created with default attributes
    And group "new-group" has been created
    And user "brand-new-user" has been made a subadmin of group "new-group"
    When the administrator sends HTTP method "GET" to OCS API endpoint "/cloud/users/brand-new-user/subadmins"
    Then the subadmin groups returned by the API should be
      | new-group |
    And the OCS status code should be "200"
    And the HTTP status code should be "200"

  Scenario: admin tries to get subadmin groups of a user which do not exist
    Given user "not-user" has been deleted
    And group "new-group" has been created
    When the administrator sends HTTP method "GET" to OCS API endpoint "/cloud/users/not-user/subadmins"
    Then the OCS status code should be "400"
    And the HTTP status code should be "400"
    And the API should not return any data
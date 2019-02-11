@api @provisioning_api-app-required
Feature: get subadmin groups
  As an admin
  I want to be able to get the groups in which the user is subadmin
  So that I can know in which groups the user has administrative rights

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin gets subadmin groups of a user
    Given user "brand-new-user" has been created with default attributes
    And group "new-group" has been created
    And user "brand-new-user" has been made a subadmin of group "new-group"
    When the administrator gets all the groups where user "brand-new-user" is subadmin using the provisioning API
    Then the subadmin groups returned by the API should be
      | new-group |
    And the OCS status code should be "100"
    And the HTTP status code should be "200"

  Scenario: admin tries to get subadmin groups of a user which do not exist
    Given user "not-user" has been deleted
    And group "new-group" has been created
    When the administrator gets all the groups where user "not-user" is subadmin using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And the API should not return any data
@api @provisioning_api-app-required
Feature: get subadmins
  As an admin
  I want to be able to get the list of subadmins of a group
  So that I can manage subadmins of a group

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin gets subadmin users of a group
    Given user "brand-new-user" has been created with default attributes
    And group "new-group" has been created
    And user "brand-new-user" has been made a subadmin of group "new-group"
    When the administrator gets all the subadmins of group "new-group" using the provisioning API
    Then the subadmin users returned by the API should be
      | brand-new-user |
    And the OCS status code should be "100"
    And the HTTP status code should be "200"

  Scenario: admin tries to get subadmin users of a group which does not exist
    Given user "brand-new-user" has been created with default attributes
    And group "not-group" has been deleted
    When the administrator gets all the subadmins of group "not-group" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And the API should not return any data

  Scenario: subadmin tries to get other subadmins of the same group
    Given user "subadmin" has been created with default attributes
    And user "newsubadmin" has been created with default attributes
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    And user "newsubadmin" has been made a subadmin of group "new-group"
    When user "subadmin" gets all the subadmins of group "new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data

  Scenario: normal user tries to get the subadmins of the group
    Given user "newuser" has been created with default attributes
    And user "subadmin" has been created with default attributes
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "newuser" gets all the subadmins of group "new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data
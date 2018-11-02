@api @provisioning_api-app-required
Feature: get subadmins
  As an admin
  I want to be able to get the list of subadmins of a group
  So that I can manage subadmins of a group

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets subadmin users of a group
    Given user "brand-new-user" has been created
    And group "new-group" has been created
    And user "brand-new-user" has been made a subadmin of group "new-group"
    When user "%admin%" sends HTTP method "GET" to OCS API endpoint "/cloud/groups/new-group/subadmins"
    Then the subadmin users returned by the API should be
      | brand-new-user |
    And the OCS status code should be "200"
    And the HTTP status code should be "200"

  Scenario: admin tries to get subadmin users of a group which does not exist
    Given user "brand-new-user" has been created
    And group "not-group" has been deleted
    When user "%admin%" sends HTTP method "GET" to OCS API endpoint "/cloud/groups/not-group/subadmins"
    Then the OCS status code should be "400"
    And the HTTP status code should be "400"
    And the API should not return any data

  @issue-31276
  Scenario: subadmin tries to get other subadmins of the same group
    Given user "subadmin" has been created
    And user "newsubadmin" has been created
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    And user "newsubadmin" has been made a subadmin of group "new-group"
    When user "subadmin" sends HTTP method "GET" to OCS API endpoint "/cloud/groups/new-group/subadmins"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data

  @issue-31276
  Scenario: normal user tries to get the subadmins of the group
    Given user "newuser" has been created
    And user "subadmin" has been created
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "newuser" sends HTTP method "GET" to OCS API endpoint "/cloud/groups/new-group/subadmins"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data
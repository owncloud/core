@api @provisioning_api-app-required
Feature: get users
  As an admin
  I want to be able to list the users that exist
  So that I can see who has access to ownCloud

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets all users
    Given user "brand-new-user" has been created
    When user "%admin%" sends HTTP method "GET" to OCS API endpoint "/cloud/users"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the users returned by the API should be
      | brand-new-user |
      | admin          |

  @smokeTest
  Scenario: subadmin gets the users in his group
    Given user "brand-new-user" has been created
    And user "another-new-user" has been created
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "brand-new-user" has been made a subadmin of group "new-group"
    When user "brand-new-user" sends HTTP method "GET" to OCS API endpoint "/cloud/users"
    Then the users returned by the API should be
      | brand-new-user |
    And the OCS status code should be "200"
    And the HTTP status code should be "200"

  @issue-31276
  Scenario: normal user tries to get other users
    Given user "normaluser" has been created
    And user "newuser" has been created
    When user "normaluser" sends HTTP method "GET" to OCS API endpoint "/cloud/users"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data
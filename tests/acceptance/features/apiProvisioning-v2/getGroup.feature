@api @provisioning_api-app-required
Feature: get group
  As an admin
  I want to be able to get group details
  So that I can know which users are in a group

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets users in the group
    Given user "brand-new-user" has been created
    And user "123" has been created
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "123" has been added to group "new-group"
    When the administrator sends HTTP method "GET" to OCS API endpoint "/cloud/groups/new-group"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the users returned by the API should be
      | brand-new-user |
      | 123            |

  Scenario: admin tries to get users in the empty group
    Given group "new-group" has been created
    When the administrator sends HTTP method "GET" to OCS API endpoint "/cloud/groups/new-group"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the list of users returned by the API should be empty

  @smokeTest
  Scenario: subadmin gets users in a group he is responsible for
    Given user "user1" has been created
    And user "user2" has been created
    And user "subadmin" has been created
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    And user "user1" has been added to group "new-group"
    And user "user2" has been added to group "new-group"
    When user "subadmin" sends HTTP method "GET" to OCS API endpoint "/cloud/groups/new-group"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the users returned by the API should be
      | user1 |
      | user2 |

  @issue-31276
  Scenario: subadmin tries to get users in a group he is not responsible for
    Given user "subadmin" has been created
    And group "new-group" has been created
    And group "another-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" sends HTTP method "GET" to OCS API endpoint "/cloud/groups/another-group"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"

  @issue-31276
  Scenario: normal user tries to get users in his group
    Given user "newuser" has been created
    And group "new-group" has been created
    When user "newuser" sends HTTP method "GET" to OCS API endpoint "/cloud/groups/new-group"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
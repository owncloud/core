@api @provisioning_api-app-required
Feature: get groups
  As an admin
  I want to be able to get groups
  So that I can see all the groups in my ownCloud

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets all the groups
    Given group "0" has been created
    And group "new-group" has been created
    And group "España" has been created
    When the administrator sends HTTP method "GET" to OCS API endpoint "/cloud/groups"
    Then the groups returned by the API should be
      | España    |
      | admin     |
      | new-group |
      | 0         |

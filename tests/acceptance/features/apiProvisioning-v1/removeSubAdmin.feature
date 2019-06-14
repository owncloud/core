@api @provisioning_api-app-required
Feature: remove subadmin
  As an admin
  I want to be able to remove subadmin rights to a user from a group
  So that I cam manage administrative access rights for groups

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin removes subadmin from a group
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And group "new-group" has been created
    And user "brand-new-user" has been made a subadmin of group "new-group"
    When the administrator removes user "brand-new-user" from being a subadmin of group "new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not be a subadmin of group "new-group"

  Scenario: subadmin tries to remove other subadmin in the group
    Given these users have been created with default attributes and skeleton files:
      | username    |
      | subadmin    |
      | newsubadmin |
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    And user "newsubadmin" has been made a subadmin of group "new-group"
    When user "subadmin" removes user "newsubadmin" from being a subadmin of group "new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "newsubadmin" should be a subadmin of group "new-group"

  Scenario: normal user tries to remove subadmin in the group
    Given these users have been created with default attributes and skeleton files:
      | username |
      | subadmin |
      | newuser |
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    And user "newuser" has been added to group "new-group"
    When user "newuser" removes user "subadmin" from being a subadmin of group "new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "subadmin" should be a subadmin of group "new-group"
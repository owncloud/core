@api @provisioning_api-app-required
Feature: delete users
  As an admin
  I want to be able to delete users
  So that I can remove user from ownCloud

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: Delete a user
    Given user "brand-new-user" has been created
    When the administrator sends a user deletion request for user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist

  @smokeTest
  Scenario: subadmin deletes a user in their group
    Given user "subadmin" has been created
    And user "brand-new-user" has been created
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When the subadmin "subadmin" sends a user deletion request for user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist

  @issue-31276
  Scenario: normal user tries to delete a user
    Given user "user1" has been created
    And user "user2" has been created
    When user "user1" sends HTTP method "DELETE" to OCS API endpoint "/cloud/users/user2"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "user2" should exist
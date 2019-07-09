@api @provisioning_api-app-required
Feature: delete users
  As an admin
  I want to be able to delete users
  So that I can remove user from ownCloud

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: Delete a user
    Given user "brand-new-user" has been created with default attributes and skeleton files
    When the administrator deletes user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist

  Scenario: Delete a user, and specify the user name in different case
    Given user "brand-new-user" has been created with default attributes and skeleton files
    When the administrator deletes user "Brand-New-User" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist

  @smokeTest
  Scenario: subadmin deletes a user in their group
    Given these users have been created with default attributes and skeleton files:
      | username       |
      | subadmin       |
      | brand-new-user |
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" deletes user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist

  @issue-31276
  Scenario: normal user tries to delete a user
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    When user "user1" deletes user "user2" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "user2" should exist
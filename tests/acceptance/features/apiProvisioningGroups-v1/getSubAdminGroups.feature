@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: get subadmin groups
  As an admin
  I want to be able to get the groups in which the user is subadmin
  So that I can know in which groups the user has administrative rights

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin gets subadmin groups of a user
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And group "😅 😆" has been created
    And user "brand-new-user" has been made a subadmin of group "brand-new-group"
    And user "brand-new-user" has been made a subadmin of group "😅 😆"
    When the administrator gets all the groups where user "brand-new-user" is subadmin using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the subadmin groups returned by the API should be
      | brand-new-group |
      | 😅 😆           |


  Scenario: admin tries to get subadmin groups of a user which does not exist
    Given user "nonexistentuser" has been deleted
    And group "brand-new-group" has been created
    When the administrator gets all the groups where user "nonexistentuser" is subadmin using the provisioning API
    Then the OCS status code should be "998"
    And the HTTP status code should be "200"
    And the API should not return any data

  @issue-owncloud-sdk-658
  Scenario: subadmin gets groups where he/she is subadmin
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And group "😅 😆" has been created
    And user "Alice" has been made a subadmin of group "brand-new-group"
    And user "Alice" has been made a subadmin of group "😅 😆"
    When user "Alice" gets all the groups where user "Alice" is subadmin using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the subadmin groups returned by the API should be
      | brand-new-group |
      | 😅 😆           |


  Scenario: subadmin of a group should not be able to get subadmin groups of another subadmin user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And group "brand-new-group" has been created
    And group "😅 😆" has been created
    And user "Alice" has been made a subadmin of group "brand-new-group"
    And user "Brian" has been made a subadmin of group "😅 😆"
    When user "Alice" tries to get all the groups where user "Brian" is subadmin using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data


  Scenario: normal user should not be able to get subadmin groups of a subadmin user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And group "brand-new-group" has been created
    And group "😅 😆" has been created
    And user "Alice" has been made a subadmin of group "brand-new-group"
    And user "Alice" has been made a subadmin of group "😅 😆"
    When user "Brian" tries to get all the groups where user "Alice" is subadmin using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data

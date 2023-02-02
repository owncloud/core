@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: get user groups
  As an admin
  I want to be able to get groups
  So that I can manage group membership

  Background:
    Given using OCS API version "2"

  @issue-31276
  Scenario: normal user tries to get the groups of another user
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-new-user |
    And group "brand-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    When user "another-new-user" gets all the groups of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data

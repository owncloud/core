@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: current oC10 behavior for issue-31276
  As an admin
  I want to be able to disable a user
  So that I can remove access to files and resources for a user, without actually deleting the files and resources

  Background:
    Given using OCS API version "2"

  @issue-31276
  Scenario: Subadmin should not be able to disable an user not in their group
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | subadmin |
    And group "brand-new-group" has been created
    And group "another-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And user "Alice" has been added to group "another-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "Alice" using the provisioning API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "Alice" should be enabled

  @issue-31276
  Scenario: Subadmins should not be able to disable users that have admin permissions in their group
    Given these users have been created with default attributes and without skeleton files:
      | username      |
      | subadmin      |
      | another-admin |
    And group "brand-new-group" has been created
    And user "another-admin" has been added to group "admin"
    And user "subadmin" has been added to group "brand-new-group"
    And user "another-admin" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "another-admin" using the provisioning API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "another-admin" should be enabled

  @issue-31276
  Scenario: disable an user with a regular user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    When user "Alice" disables user "Brian" using the provisioning API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "Brian" should be enabled

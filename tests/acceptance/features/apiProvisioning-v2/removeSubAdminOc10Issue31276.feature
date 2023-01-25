@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: remove subadmin - current oC10 behavior for issue-31276
  As an admin
  I want to be able to remove subadmin rights to a user from a group
  So that I cam manage administrative access rights for groups

  Background:
    Given using OCS API version "2"

  @issue-31276
  Scenario: subadmin tries to remove other subadmin in the group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And user "another-subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" removes user "another-subadmin" from being a subadmin of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "another-subadmin" should be a subadmin of group "brand-new-group"

  @issue-31276
  Scenario: normal user tries to remove subadmin in the group
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | subadmin       |
      | brand-new-user |
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And user "brand-new-user" has been added to group "brand-new-group"
    When user "brand-new-user" removes user "subadmin" from being a subadmin of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "subadmin" should be a subadmin of group "brand-new-group"

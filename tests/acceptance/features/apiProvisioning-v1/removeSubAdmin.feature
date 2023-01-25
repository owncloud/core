@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: remove subadmin
  As an admin
  I want to be able to remove subadmin rights to a user from a group
  So that I cam manage administrative access rights for groups

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin removes subadmin from a group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "brand-new-user" has been made a subadmin of group "brand-new-group"
    When the administrator removes user "brand-new-user" from being a subadmin of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not be a subadmin of group "brand-new-group"


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
    And the HTTP status code should be "401"
    And user "another-subadmin" should be a subadmin of group "brand-new-group"


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
    And the HTTP status code should be "401"
    And user "subadmin" should be a subadmin of group "brand-new-group"


  Scenario: subadmin should not be able to remove subadmin of another group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "new-group-1" has been created
    And group "new-group-2" has been created
    And user "subadmin" has been made a subadmin of group "new-group-1"
    And user "another-subadmin" has been made a subadmin of group "new-group-2"
    When user "subadmin" removes user "another-subadmin" from being a subadmin of group "new-group-2" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "another-subadmin" should be a subadmin of group "new-group-2"

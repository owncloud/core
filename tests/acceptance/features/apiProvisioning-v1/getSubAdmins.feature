@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: get subadmins
  As an admin
  I want to be able to get the list of subadmins of a group
  So that I can manage subadmins of a group

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin gets subadmin users of a group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "brand-new-user" has been made a subadmin of group "brand-new-group"
    When the administrator gets all the subadmins of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the subadmin users returned by the API should be
      | brand-new-user |


  Scenario: admin tries to get subadmin users of a group which does not exist
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "nonexistentgroup" has been deleted
    When the administrator gets all the subadmins of group "nonexistentgroup" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And the API should not return any data


  Scenario: subadmin tries to get other subadmins of the same group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And user "another-subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" gets all the subadmins of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data


  Scenario: normal user tries to get the subadmins of the group
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | subadmin       |
      | brand-new-user |
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "brand-new-user" gets all the subadmins of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data

@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: get group
  As an admin
  I want to be able to get group details
  So that I can know which users are in a group

  Background:
    Given using OCS API version "2"

  @issue-31276
  Scenario: subadmin tries to get users in a group they are not responsible for
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And group "another-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" gets all the members of group "another-group" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"

  @issue-31276
  Scenario: normal user tries to get users in their group
    Given user "newuser" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    When user "newuser" gets all the members of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"

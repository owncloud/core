@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: add users to group
  As a admin
  I want to be able to add users to a group
  So that I can give a user access to the resources of the group

  Background:
    Given using OCS API version "2"

  @issue-31276 @skipOnLDAP
  Scenario: normal user tries to add himself to a group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When user "brand-new-user" tries to add himself to group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data

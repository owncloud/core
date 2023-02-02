@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: add groups
  As an admin
  I want to be able to add groups
  So that I can more easily manage access to resources by groups rather than individual users

  Background:
    Given using OCS API version "2"

  @issue-31276
  Scenario: normal user tries to create a group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When user "brand-new-user" tries to send a group creation request for group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And group "brand-new-group" should not exist

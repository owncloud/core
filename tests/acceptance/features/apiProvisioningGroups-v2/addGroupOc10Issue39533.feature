@api @provisioning_api-app-required @skipOnLDAP
Feature: add groups

  Background:
    Given using OCS API version "2"

  @issue-39533 @skipOnOcis
  Scenario: admin creates a group that has white space at the end of the name
    When the administrator sends a group creation request for group "white-space-at-end " using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    # Note: it seems that white space at the end of a group name gets stripped off
    # Groups "white-space-at-end " and "white-space-at-end" seem to be effectively the same
    And group "white-space-at-end " should exist
    And group "white-space-at-end" should exist

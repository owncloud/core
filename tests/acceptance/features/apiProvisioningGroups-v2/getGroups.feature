@api @provisioning_api-app-required
Feature: get groups
  As an admin
  I want to be able to get groups
  So that I can see all the groups in my ownCloud

  Background:
    Given using OCS API version "2"

  @smokeTest @skipOnLdap @issue-ldap-500
  Scenario: admin gets all the groups
    Given group "0" has been created
    And group "brand-new-group" has been created
    And group "España" has been created
    When the administrator gets all the groups using the provisioning API
    Then the groups returned by the API should be
      | España          |
      | admin           |
      | brand-new-group |
      | 0               |

  @skipOnLdap @issue-ldap-499
  Scenario: admin gets all the groups, including groups with mixed case
    Given group "mixed-case-group" has been created
    And group "Mixed-Case-Group" has been created
    And group "MIXED-CASE-GROUP" has been created
    When the administrator gets all the groups using the provisioning API
    Then the groups returned by the API should be
      | admin            |
      | mixed-case-group |
      | Mixed-Case-Group |
      | MIXED-CASE-GROUP |

@api @provisioning_api-app-required @rememberGroupsThatExist @skipOnLDAP @skipOnGraph
Feature: get groups
  As an admin
  I want to be able to get groups
  So that I can see all the groups in my ownCloud

  Background:
    Given using OCS API version "2"

  @smokeTest @skipOnLdap @issue-ldap-500
  Scenario: admin gets all the groups where admin group exists
    Given group "0" has been created
    And group "brand-new-group" has been created
    And group "España" has been created
    When the administrator gets all the groups using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the extra groups returned by the API should be
      | España          |
      | brand-new-group |
      | 0               |

  @skipOnLdap @issue-ldap-499
  Scenario: admin gets all the groups, including groups with mixed case
    Given group "case-sensitive-group" has been created
    And group "Case-Sensitive-Group" has been created
    And group "CASE-SENSITIVE-GROUP" has been created
    When the administrator gets all the groups using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the extra groups returned by the API should be
      | case-sensitive-group |
      | Case-Sensitive-Group |
      | CASE-SENSITIVE-GROUP |


  Scenario: subadmin gets all the groups
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And group "0" has been created
    And group "España" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" gets all the groups using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the extra groups returned by the API should be
      | España          |
      | brand-new-group |
      | 0               |


  Scenario: normal user cannot get a list of all the groups
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And group "0" has been created
    And group "España" has been created
    When user "Alice" gets all the groups using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data

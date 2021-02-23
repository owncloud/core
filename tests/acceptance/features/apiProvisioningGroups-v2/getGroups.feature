@api @provisioning_api-app-required @skipOnLDAP
Feature: get groups
  As an admin
  I want to be able to get groups
  So that I can see all the groups in my ownCloud

  Background:
    Given using OCS API version "2"

  @smokeTest @skipOnLdap @issue-ldap-500 @notToImplementOnOCIS
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

  @skipOnLdap @issue-ldap-499 @notToImplementOnOCIS
  Scenario: admin gets all the groups, including groups with mixed case
    Given group "case-sensitive-group" has been created
    And group "Case-Sensitive-Group" has been created
    And group "CASE-SENSITIVE-GROUP" has been created
    When the administrator gets all the groups using the provisioning API
    Then the groups returned by the API should be
      | admin                |
      | case-sensitive-group |
      | Case-Sensitive-Group |
      | CASE-SENSITIVE-GROUP |

  @smokeTest @skipOnOcV10
  Scenario: admin gets all the groups
    Given group "0" has been created
    And group "brand-new-group" has been created
    And group "España" has been created
    When the administrator gets all the groups using the provisioning API
    Then the groups returned by the API should be
      | España          |
      | brand-new-group   |
      | 0                 |
      | philosophy-haters |
      | physics-lovers    |
      | polonium-lovers   |
      | quantum-lovers    |
      | radium-lovers     |
      | violin-haters     |
      | users             |
      | sysusers          |
      | sailing-lovers    |

  @smokeTest @skipOnOcV10 @toImplementOnOCIS @issue-product-283
  Scenario: admin gets all the groups, including groups with mixed case
    Given group "case-sensitive-group" has been created
    And group "Case-Sensitive-Group" has been created
    And group "CASE-SENSITIVE-GROUP" has been created
    When the administrator gets all the groups using the provisioning API
    Then the groups returned by the API should be
      | case-sensitive-group |
      | Case-Sensitive-Group |
      | CASE-SENSITIVE-GROUP |
      | philosophy-haters |
      | physics-lovers    |
      | polonium-lovers   |
      | quantum-lovers    |
      | radium-lovers     |
      | violin-haters     |
      | users             |
      | sysusers          |
      | sailing-lovers    |


  Scenario: subadmin gets all the groups
    Given user "subadmin" has been created with default attributes and small skeleton files
    And group "brand-new-group" has been created
    And group "0" has been created
    And group "España" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" gets all the groups using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the groups returned by the API should be
      | España          |
      | admin           |
      | brand-new-group |
      | 0               |


  Scenario: normal user cannot get a list of all the groups
    Given user "Alice" has been created with default attributes and small skeleton files
    And group "brand-new-group" has been created
    And group "0" has been created
    And group "España" has been created
    When user "Alice" gets all the groups using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data

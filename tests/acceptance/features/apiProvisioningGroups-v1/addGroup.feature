@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: add groups
  As an admin
  I want to be able to add groups
  So that I can more easily manage access to resources by groups rather than individual users

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin creates a group
    When the administrator sends a group creation request for the following groups using the provisioning API
      | groupname   | comment                               |
      | simplegroup | nothing special here                  |
      | España§àôœ€ | special European and other characters |
      | नेपाली      | Unicode group name                    |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And these groups should exist:
      | groupname   |
      | simplegroup |
      | España§àôœ€ |
      | नेपाली      |

  @sqliteDB
  Scenario: admin creates a group with special characters
    When the administrator sends a group creation request for the following groups using the provisioning API
      | groupname           | comment            |
      | brand-new-group     | dash               |
      | the.group           | dot                |
      | left,right          | comma              |
      | 0                   | The "false" group  |
      | Finance (NP)        | Space and brackets |
      | Admin&Finance       | Ampersand          |
      | admin:Pokhara@Nepal | Colon and @        |
      | maint+eng           | Plus sign          |
      | $x<=>[y*z^2]!       | Maths symbols      |
      | Mgmt\Middle         | Backslash          |
      | 😅 😆               | emoji              |
      | [group1]            | brackets           |
      | group [ 2 ]         | bracketsAndSpace   |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And these groups should exist:
      | groupname           |
      | brand-new-group     |
      | the.group           |
      | left,right          |
      | 0                   |
      | Finance (NP)        |
      | Admin&Finance       |
      | admin:Pokhara@Nepal |
      | maint+eng           |
      | $x<=>[y*z^2]!       |
      | Mgmt\Middle         |
      | 😅 😆               |
      | [group1]            |
      | group [ 2 ]         |

  @issue-product-284
  Scenario: admin creates a group with % and # in name
    When the administrator sends a group creation request for the following groups using the provisioning API
      | groupname       | comment                                 |
      | maintenance#123 | Hash sign                               |
      | 50%pass         | Percent sign (special escaping happens) |
      | 50%25=0         | %25 literal looks like an escaped "%"   |
      | 50%2Fix         | %2F literal looks like an escaped slash |
      | 50%2Eagle       | %2E literal looks like an escaped "."   |
      | staff?group     | Question mark                           |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And these groups should exist:
      | groupname       |
      | maintenance#123 |
      | 50%pass         |
      | 50%25=0         |
      | 50%2Fix         |
      | 50%2Eagle       |
      | staff?group     |


  Scenario: group names are case-sensitive, multiple groups can exist with different upper and lower case names
    When the administrator sends a group creation request for the following groups using the provisioning API
      | groupname             |
      | Case-Sensitive-Group1 |
      | case-sensitive-group1 |
      | Case-Sensitive-Group2 |
      | CASE-SENSITIVE-GROUP2 |
      | case-sensitive-group3 |
      | CASE-SENSITIVE-GROUP3 |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And these groups should exist:
      | groupname             |
      | Case-Sensitive-Group1 |
      | case-sensitive-group1 |
      | Case-Sensitive-Group2 |
      | CASE-SENSITIVE-GROUP2 |
      | case-sensitive-group3 |
      | CASE-SENSITIVE-GROUP3 |
    And these groups should not exist:
      | groupname             |
      | CASE-SENSITIVE-GROUP1 |
      | case-sensitive-group2 |
      | Case-Sensitive-Group3 |

  @issue-31015 @skipOnOcV10 @issue-product-284
  Scenario: admin creates a group with a forward-slash in the group name
    When the administrator sends a group creation request for the following groups using the provisioning API
      | groupname        | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And these groups should exist:
      | groupname        |
      | Mgmt/Sydney      |
      | Mgmt//NSW/Sydney |
      | var/../etc       |
      | priv/subadmins/1 |

  # A group name must not end in "/subadmins" because that would create ambiguity
  # with the endpoint for getting the subadmins of a group
  @issue-31015 @skipOnOcV10
  Scenario: admin tries to create a group with name ending in "/subadmins"
    Given group "brand-new-group" has been created
    When the administrator tries to send a group creation request for group "priv/subadmins" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And group "priv/subadmins" should not exist


  Scenario: admin tries to create a group that already exists
    Given group "brand-new-group" has been created
    When the administrator sends a group creation request for group "brand-new-group" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And group "brand-new-group" should exist


  Scenario: normal user tries to create a group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When user "brand-new-user" tries to send a group creation request for group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And group "brand-new-group" should not exist


  Scenario: subadmin tries to create a group
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" tries to send a group creation request for group "another-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And group "another-new-group" should not exist


  Scenario: admin tries to create a group that has white space at the end of the name
    When the administrator sends a group creation request for group "white-space-at-end " using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And group "white-space-at-end " should not exist
    And group "white-space-at-end" should not exist


  Scenario: admin tries to create a group that has white space at the start of the name
    When the administrator sends a group creation request for group " white-space-at-start" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And group " white-space-at-start" should not exist
    But group "white-space-at-start" should not exist


  Scenario: admin tries to create a group that is a single space
    When the administrator sends a group creation request for group " " using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And group " " should not exist


  Scenario: admin tries to create a group that is the empty string
    When the administrator tries to send a group creation request for group "" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"

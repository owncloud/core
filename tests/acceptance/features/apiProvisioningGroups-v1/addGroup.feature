@api @provisioning_api-app-required @skipOnLDAP @notToImplementOnOCIS
Feature: add groups
  As an admin
  I want to be able to add groups
  So that I can more easily manage access to resources by groups rather than individual users

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario Outline: admin creates a group
    When the administrator sends a group creation request for group "<group_id>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And group "<group_id>" should exist
    Examples:
      | group_id    | comment                               |
      | simplegroup | nothing special here                  |
      | España§àôœ€ | special European and other characters |
      | नेपाली      | Unicode group name                    |

  Scenario Outline: admin creates a group
    When the administrator sends a group creation request for group "<group_id>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And group "<group_id>" should exist
    Examples:
      | group_id            | comment                                 |
      | brand-new-group     | dash                                    |
      | the.group           | dot                                     |
      | left,right          | comma                                   |
      | 0                   | The "false" group                       |
      | Finance (NP)        | Space and brackets                      |
      | Admin&Finance       | Ampersand                               |
      | admin:Pokhara@Nepal | Colon and @                             |
      | maintenance#123     | Hash sign                               |
      | maint+eng           | Plus sign                               |
      | $x<=>[y*z^2]!       | Maths symbols                           |
      | Mgmt\Middle         | Backslash                               |
      | 50%pass             | Percent sign (special escaping happens) |
      | 50%25=0             | %25 literal looks like an escaped "%"   |
      | 50%2Eagle           | %2E literal looks like an escaped "."   |
      | 50%2Fix             | %2F literal looks like an escaped slash |
      | staff?group         | Question mark                           |
      | 😅 😆               | emoji                                   |

  Scenario Outline: group names are case-sensitive, multiple groups can exist with different upper and lower case names
    When the administrator sends a group creation request for group "<group_id1>" using the provisioning API
    And the administrator sends a group creation request for group "<group_id2>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And group "<group_id1>" should exist
    And group "<group_id2>" should exist
    But group "<group_id3>" should not exist
    Examples:
      | group_id1            | group_id2            | group_id3            |
      | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group |

  @issue-31015 @skipOnOcV10
  Scenario Outline: admin creates a group with a forward-slash in the group name
    When the administrator sends a group creation request for group "<group_id>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And group "<group_id>" should exist
    Examples:
      | group_id         | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |

  # A group name must not end in "/subadmins" because that would create ambiguity
  # with the endpoint for getting the subadmins of a group
  @issue-31015 @skipOnOcV10
  Scenario: admin tries to create a group with name ending in "/subadmins"
    Given group "brand-new-group" has been created
    When the administrator tries to send a group creation request for group "priv/subadmins" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And group "priv/subadmins" should not exist

  Scenario: admin tries to create a group that already exists
    Given group "brand-new-group" has been created
    When the administrator sends a group creation request for group "brand-new-group" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And group "brand-new-group" should exist

  Scenario: normal user tries to create a group
    Given user "brand-new-user" has been created with default attributes and skeleton files
    When user "brand-new-user" tries to send a group creation request for group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And group "brand-new-group" should not exist

  Scenario: subadmin tries to create a group
    Given user "subadmin" has been created with default attributes and skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" tries to send a group creation request for group "another-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And group "another-new-group" should not exist

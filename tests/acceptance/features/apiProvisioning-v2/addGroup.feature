@api @provisioning_api-app-required
Feature: add groups
  As an admin
  I want to be able to add groups
  So that I can more easily manage access to resources by groups rather than individual users

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario Outline: admin creates a group
    When the administrator sends a group creation request for group "<group_id>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And group "<group_id>" should exist
    Examples:
      | group_id    | comment                     |
      | simplegroup | nothing special here        |
      | España      | special European characters |
      | नेपाली      | Unicode group name          |

  Scenario Outline: admin creates a group
    When the administrator sends a group creation request for group "<group_id>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And group "<group_id>" should exist
    Examples:
      | group_id            | comment                                 |
      | new-group           | dash                                    |
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

	# Note: these groups do get created OK, but the "should exist" step fails
	# because the API to check their existence does not work.
  @skip @issue-31015
  Scenario Outline: admin creates a group with a forward-slash in the group name
    When the administrator sends a group creation request for group "<group_id>" using the provisioning API
    Then the OCS status code should be "200"
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
  @skip @issue-31015
  Scenario: admin tries to create a group with name ending in "/subadmins"
    Given group "new-group" has been created
    When the administrator tries to send a group creation request for group "priv/subadmins" using the provisioning API
    Then the OCS status code should be "400"
    And the HTTP status code should be "400"
    And group "priv/subadmins" should not exist

  Scenario: admin tries to create a group that already exists
    Given group "new-group" has been created
    When the administrator sends a group creation request for group "new-group" using the provisioning API
    Then the OCS status code should be "400"
    And the HTTP status code should be "400"
    And group "new-group" should exist

  @issue-31276
  Scenario: normal user tries to create a group
    Given user "brand-new-user" has been created
    When user "brand-new-user" sends HTTP method "POST" to OCS API endpoint "/cloud/groups" with body
      | groupid | new-group |
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And group "new-group" should not exist

  Scenario: subadmin tries to create a group
    Given user "subadmin" has been created
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" sends HTTP method "POST" to OCS API endpoint "/cloud/groups" with body
      | groupid | another-group |
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And group "another-group" should not exist
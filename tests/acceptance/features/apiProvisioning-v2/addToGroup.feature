@api @provisioning_api-app-required
Feature: add users to group
  As a admin
  I want to be able to add users to a group
  So that I can give a user access to the resources of the group

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario Outline: adding a user to a group
    Given user "brand-new-user" has been created
    And group "<group_id>" has been created
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | <group_id> |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Examples:
      | group_id    | comment                     |
      | simplegroup | nothing special here        |
      | España      | special European characters |
      | नेपाली      | Unicode group name          |

  Scenario Outline: adding a user to a group
    Given user "brand-new-user" has been created
    And group "<group_id>" has been created
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | <group_id> |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
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

  @skip @issue-31015
  Scenario Outline: adding a user to a group that has a forward-slash in the group name
    Given user "brand-new-user" has been created
    And group "<group_id>" has been created
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | <group_id> |
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    Examples:
      | group_id         | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |

  @issue-31276
  Scenario: normal user tries to add himself to a group
    Given user "brand-new-user" has been created
    When user "brand-new-user" sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | new-group |
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data

  Scenario: admin tries to add user to a group which does not exist
    Given user "brand-new-user" has been created
    And group "not-group" has been deleted
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | not-group |
    Then the OCS status code should be "400"
    And the HTTP status code should be "400"
    And the API should not return any data

  Scenario: admin tries to add user to a group without sending the group
    Given user "brand-new-user" has been created
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid |  |
    Then the OCS status code should be "400"
    And the HTTP status code should be "400"
    And the API should not return any data

  Scenario: admin tries to add a user which does not exist to a group
    Given user "not-user" has been deleted
    And group "new-group" has been created
    When the administrator sends HTTP method "POST" to OCS API endpoint "/cloud/users/not-user/groups" with body
      | groupid | new-group |
    Then the OCS status code should be "400"
    And the HTTP status code should be "400"
    And the API should not return any data

  Scenario: subadmin adds users to groups the subadmin is responsible for
    Given user "subadmin" has been created
    And user "brand-new-user" has been created
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | new-group |
    Then the OCS status code should be "403"
    And the HTTP status code should be "403"
    And user "brand-new-user" should not belong to group "new-group"

  Scenario: subadmin tries to add user to groups the subadmin is not responsible for
    Given user "other-subadmin" has been created
    And user "brand-new-user" has been created
    And group "new-group" has been created
    And group "other-group" has been created
    And user "other-subadmin" has been made a subadmin of group "other-group"
    When user "other-subadmin" sends HTTP method "POST" to OCS API endpoint "/cloud/users/brand-new-user/groups" with body
      | groupid | new-group |
    Then the OCS status code should be "403"
    And the HTTP status code should be "403"
    And user "brand-new-user" should not belong to group "new-group"

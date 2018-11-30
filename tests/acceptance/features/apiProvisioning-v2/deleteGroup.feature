@api @provisioning_api-app-required
Feature: delete groups
  As an admin
  I want to be able to delete groups
  So that I can remove unnecessary groups

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario Outline: admin deletes a group
    Given group "<group_id>" has been created
    When the administrator deletes group "<group_id>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And group "<group_id>" should not exist
    Examples:
      | group_id    | comment                     |
      | simplegroup | nothing special here        |
      | España      | special European characters |
      | नेपाली      | Unicode group name          |

  Scenario Outline: admin deletes a group
    Given group "<group_id>" has been created
    When the administrator deletes group "<group_id>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And group "<group_id>" should not exist
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
  Scenario Outline: admin deletes a group that has a forward-slash in the group name
    Given group "<group_id>" has been created
    When the administrator deletes group "<group_id>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And group "<group_id>" should not exist
    Examples:
      | group_id         | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |

  @issue-31276
  Scenario: normal user tries to delete the group
    Given user "brand-new-user" has been created with default attributes
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    When user "brand-new-user" tries to delete group "new-group" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And group "new-group" should exist

  @issue-31276
  Scenario: subadmin of the group tries to delete the group
    Given user "subadmin" has been created with default attributes
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" tries to delete group "new-group" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And group "new-group" should exist
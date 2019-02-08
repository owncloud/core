@api @provisioning_api-app-required
Feature: remove a user from a group
  As an admin
  I want to be able to remove a user from a group
  So that I can manage user access to group resources

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario Outline: admin removes a user from a group
    Given user "brand-new-user" has been created with default attributes
    And group "<group_id>" has been created
    And user "brand-new-user" has been added to group "<group_id>"
    When the administrator removes user "brand-new-user" from group "<group_id>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "<group_id>"
    Examples:
      | group_id    | comment                     |
      | simplegroup | nothing special here        |
      | España      | special European characters |
      | नेपाली      | Unicode group name          |

  Scenario Outline: admin removes a user from a group
    Given user "brand-new-user" has been created with default attributes
    And group "<group_id>" has been created
    And user "brand-new-user" has been added to group "<group_id>"
    When the administrator removes user "brand-new-user" from group "<group_id>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "<group_id>"
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

  @issue-31015
  Scenario Outline: admin removes a user from a group that has a forward-slash in the group name
    Given user "brand-new-user" has been created with default attributes
    # After fixing issue-31015, change the following step to "has been created"
    And the administrator sends a group creation request for group "<group_id>" using the provisioning API
    #And group "<group_id>" has been created
    And user "brand-new-user" has been added to group "<group_id>"
    When the administrator removes user "brand-new-user" from group "<group_id>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "<group_id>"
    # The following step is needed so that the group does get cleaned up.
    # After fixing issue-31015, remove the following step:
    And the administrator deletes group "<group_id>" using the occ command
    Examples:
      | group_id         | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |

  Scenario: admin tries to remove a user from a group which does not exist
    Given user "brand-new-user" has been created with default attributes
    And group "not-group" has been deleted
    When the administrator removes user "brand-new-user" from group "not-group" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And the API should not return any data

  @smokeTest
  Scenario: a subadmin can remove users from groups the subadmin is responsible for
    Given user "subadmin" has been created with default attributes
    And user "brand-new-user" has been created with default attributes
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" removes user "brand-new-user" from group "new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "new-group"

  Scenario: a subadmin cannot remove users from groups the subadmin is not responsible for
    Given user "other-subadmin" has been created with default attributes
    And user "brand-new-user" has been created with default attributes
    And group "new-group" has been created
    And group "other-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "other-subadmin" has been made a subadmin of group "other-group"
    When user "other-subadmin" removes user "brand-new-user" from group "new-group" using the provisioning API
    Then the OCS status code should be "104"
    And the HTTP status code should be "200"
    And user "brand-new-user" should belong to group "new-group"

  Scenario: normal user tries to remove a user in their group
    Given user "newuser" has been created with default attributes
    And user "anotheruser" has been created with default attributes
    And group "new-group" has been created
    And user "newuser" has been added to group "new-group"
    And user "anotheruser" has been added to group "new-group"
    When user "newuser" tries to remove user "another-user" from group "new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "anotheruser" should belong to group "new-group"
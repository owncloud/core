@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: remove a user from a group
  As an admin
  I want to be able to remove a user from a group
  So that I can manage user access to group resources

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin removes a user from a group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname       | comment                               |
      | brand-new-group | nothing special here                  |
      | España§àôœ€     | special European and other characters |
      | नेपाली            | Unicode group name                    |
    And the following users have been added to the following groups
      | username       | groupname           |
      | brand-new-user | brand-new-group     |
      | brand-new-user | España§àôœ€         |
      | brand-new-user | नेपाली                |
    When the administrator removes the following users from the following groups using the provisioning API
      | username       | groupname           |
      | brand-new-user | brand-new-group     |
      | brand-new-user | España§àôœ€         |
      | brand-new-user | नेपाली                |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should not belong to the following groups
      | username       | groupname           |
      | brand-new-user | brand-new-group     |
      | brand-new-user | España§àôœ€         |
      | brand-new-user | नेपाली                |


  Scenario: admin removes a user from a group with special characters
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname           | comment                                 |
      | brand-new-group     | dash                                    |
      | the.group           | dot                                     |
      | left,right          | comma                                   |
      | 0                   | The "false" group                       |
      | Finance (NP)        | Space and brackets                      |
      | Admin&Finance       | Ampersand                               |
      | admin:Pokhara@Nepal | Colon and @                             |
      | maint+eng           | Plus sign                               |
      | $x<=>[y*z^2]!       | Maths symbols                           |
      | Mgmt\Middle         | Backslash                               |
      | 😁 😂               | emoji                                   |
    And the following users have been added to the following groups
      | username       | groupname           |
      | brand-new-user | brand-new-group     |
      | brand-new-user | the.group           |
      | brand-new-user | left,right          |
      | brand-new-user | 0                   |
      | brand-new-user | Finance (NP)        |
      | brand-new-user | Admin&Finance       |
      | brand-new-user | admin:Pokhara@Nepal |
      | brand-new-user | maint+eng           |
      | brand-new-user | $x<=>[y*z^2]!       |
      | brand-new-user | Mgmt\Middle         |
      | brand-new-user | 😁 😂               |
    When the administrator removes the following users from the following groups using the provisioning API
      | username       | groupname           |
      | brand-new-user | brand-new-group     |
      | brand-new-user | the.group           |
      | brand-new-user | left,right          |
      | brand-new-user | 0                   |
      | brand-new-user | Finance (NP)        |
      | brand-new-user | Admin&Finance       |
      | brand-new-user | admin:Pokhara@Nepal |
      | brand-new-user | maint+eng           |
      | brand-new-user | $x<=>[y*z^2]!       |
      | brand-new-user | Mgmt\Middle         |
      | brand-new-user | 😁 😂               |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should not belong to the following groups
      | username       | groupname           |
      | brand-new-user | brand-new-group     |
      | brand-new-user | the.group           |
      | brand-new-user | left,right          |
      | brand-new-user | 0                   |
      | brand-new-user | Finance (NP)        |
      | brand-new-user | Admin&Finance       |
      | brand-new-user | admin:Pokhara@Nepal |
      | brand-new-user | maint+eng           |
      | brand-new-user | $x<=>[y*z^2]!       |
      | brand-new-user | Mgmt\Middle         |
      | brand-new-user | 😁 😂               |


  Scenario: admin removes a user from a group with % and # in their names
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname           | comment                                 |
      | maintenance#123     | Hash sign                               |
      | 50%pass             | Percent sign (special escaping happens) |
      | 50%25=0             | %25 literal looks like an escaped "%"   |
      | 50%2Eagle           | %2E literal looks like an escaped "."   |
      | 50%2Fix             | %2F literal looks like an escaped slash |
      | staff?group         | Question mark                           |
    And the following users have been added to the following groups
      | username       | groupname           |
      | brand-new-user | maintenance#123     |
      | brand-new-user | 50%pass             |
      | brand-new-user | 50%25=0             |
      | brand-new-user | 50%2Eagle           |
      | brand-new-user | 50%2Fix             |
      | brand-new-user | staff?group         |
    When the administrator removes the following users from the following groups using the provisioning API
      | username       | groupname           |
      | brand-new-user | maintenance#123     |
      | brand-new-user | 50%pass             |
      | brand-new-user | 50%25=0             |
      | brand-new-user | 50%2Eagle           |
      | brand-new-user | 50%2Fix             |
      | brand-new-user | staff?group         |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should not belong to the following groups
      | username       | groupname           |
      | brand-new-user | maintenance#123     |
      | brand-new-user | 50%pass             |
      | brand-new-user | 50%25=0             |
      | brand-new-user | 50%2Eagle           |
      | brand-new-user | 50%2Fix             |
      | brand-new-user | staff?group         |

  @issue-31015 @skipOnOcV10
  Scenario: admin removes a user from a group that has a forward-slash in the group name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname        | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | priv/subadmins/1 | Subadmins mentioned not at the end |
    And the following users have been added to the following groups
      | username       | groupname        |
      | brand-new-user | Mgmt/Sydney      |
      | brand-new-user | Mgmt//NSW/Sydney |
      | brand-new-user | priv/subadmins/1 |
    When the administrator removes the following users from the following groups using the provisioning API
      | username       | groupname        |
      | brand-new-user | Mgmt/Sydney      |
      | brand-new-user | Mgmt//NSW/Sydney |
      | brand-new-user | priv/subadmins/1 |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should not belong to the following groups
      | username       | groupname        |
      | brand-new-user | Mgmt/Sydney      |
      | brand-new-user | Mgmt//NSW/Sydney |
      | brand-new-user | priv/subadmins/1 |


  Scenario Outline: remove a user from a group using mixes of upper and lower case in user and group names
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    And user "brand-new-user" has been added to group "<group_id1>"
    And user "brand-new-user" has been added to group "<group_id2>"
    And user "brand-new-user" has been added to group "<group_id3>"
    When the administrator removes user "<user_id>" from group "<group_id1>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "<group_id1>"
    But user "brand-new-user" should belong to group "<group_id2>"
    And user "brand-new-user" should belong to group "<group_id3>"
    Examples:
      | user_id        | group_id1   | group_id2   | group_id3   |
      | BRAND-NEW-USER | Mixed-Group | mixed-group | MIXED-GROUP |
      | Brand-New-User | mixed-group | MIXED-GROUP | Mixed-Group |
      | brand-new-user | MIXED-GROUP | Mixed-Group | mixed-group |


  Scenario: admin tries to remove a user from a group which does not exist
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "nonexistentgroup" has been deleted
    When the administrator removes user "brand-new-user" from group "nonexistentgroup" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And the API should not return any data

  @smokeTest
  Scenario: a subadmin can remove users from groups the subadmin is responsible for
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | brand-new-user |
      | subadmin       |
    And group "brand-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" removes user "brand-new-user" from group "brand-new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "brand-new-group"


  Scenario: a subadmin cannot remove users from groups the subadmin is not responsible for
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-subadmin |
    And group "brand-new-group" has been created
    And group "another-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    And user "another-subadmin" has been made a subadmin of group "another-new-group"
    When user "another-subadmin" removes user "brand-new-user" from group "brand-new-group" using the provisioning API
    Then the OCS status code should be "104"
    And the HTTP status code should be "200"
    And user "brand-new-user" should belong to group "brand-new-group"


  Scenario: normal user tries to remove a user in their group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-new-user |
    And group "brand-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    And user "another-new-user" has been added to group "brand-new-group"
    When user "brand-new-user" tries to remove user "another-new-user" from group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "another-new-user" should belong to group "brand-new-group"

  # merge this with scenario on line 62 once the issue is fixed
  @issue-31015 @skipOnOcV10
  Scenario Outline: admin removes a user from a group that has a forward-slash and dot in the group name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "<group_id>" has been created
    And user "brand-new-user" has been added to group "<group_id>"
    When the administrator removes user "brand-new-user" from group "<group_id>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "<group_id>"
    Examples:
      | group_id         | comment                            |
      | var/../etc       | using slash-dot-dot                |

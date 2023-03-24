@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: add users to group
  As a admin
  I want to be able to add users to a group
  So that I can give a user access to the resources of the group

  Background:
    Given using OCS API version "1"

  @smokeTest @skipOnLDAP
  Scenario: adding a user to a group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname   |
      | simplegroup |
      | España§àôœ€ |
      | नेपाली        |
    When the administrator adds the following users to the following groups using the provisioning API
      | username       | groupname   | comment                               |
      | brand-new-user | simplegroup | nothing special here                  |
      | brand-new-user | España§àôœ€ | special European and other characters |
      | brand-new-user | नेपाली        | Unicode group name                    |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"

  @skipOnLDAP
  Scenario: adding a user to a group with special character in its name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname           | comment                                 |
      | brand-new-group     | dash                                    |
      | the.group           | dot                                     |
      | left,right          | comma                                   |
      | 0                   | The "false" group                       |
      | Finance (NP)        | Space and brackets                      |
      | Admin&Finance       | Ampersand                               |
      | maint+eng           | Plus sign                               |
      | $x<=>[y*z^2]!       | Maths symbols                           |
      | 😁 😂               | emoji                                   |
      | admin:Pokhara@Nepal | Colon and @                             |
    When the administrator adds the following users to the following groups using the provisioning API
      | username       | groupname           |
      | brand-new-user | brand-new-group     |
      | brand-new-user | the.group           |
      | brand-new-user | left,right          |
      | brand-new-user | 0                   |
      | brand-new-user | Finance (NP)        |
      | brand-new-user | Admin&Finance       |
      | brand-new-user | maint+eng           |
      | brand-new-user | $x<=>[y*z^2]!       |
      | brand-new-user | 😁 😂               |
      | brand-new-user | admin:Pokhara@Nepal |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"

  # once the issue is fixed merge with scenario above
  @skipOnLDAP @issue-product-284
  Scenario: adding a user to a group with % and # in its name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname           | comment                                 |
      | maintenance#123     | Hash sign                               |
      | 50%pass             | Percent sign (special escaping happens) |
      | 50%25=0             | %25 literal looks like an escaped "%"   |
      | 50%2Eagle           | %2E literal looks like an escaped "."   |
      | 50%2Fix             | %2F literal looks like an escaped slash |
      | Mgmt\Middle         | Backslash                               |
      | staff?group         | Question mark                           |
    When the administrator adds the following users to the following groups using the provisioning API
      | username       | groupname           |
      | brand-new-user | maintenance#123     |
      | brand-new-user | 50%pass             |
      | brand-new-user | 50%25=0             |
      | brand-new-user | 50%2Eagle           |
      | brand-new-user | 50%2Fix             |
      | brand-new-user | Mgmt\Middle         |
      | brand-new-user | staff?group         |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"

  @issue-31015 @skipOnLDAP
  Scenario: adding a user to a group that has a forward-slash in the group name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    # After fixing issue-31015, change the following step to "has been created"
    And the administrator sends a group creation request for the following groups using the provisioning API
      | groupname        | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | priv/subadmins/1 | Subadmins mentioned not at the end |
    #And group "<group_id>" has been created
    When the administrator adds the following users to the following groups using the provisioning API
      | username       | groupname        |
      | brand-new-user | Mgmt/Sydney      |
      | brand-new-user | Mgmt//NSW/Sydney |
      | brand-new-user | priv/subadmins/1 |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    # The following step is needed so that the group does get cleaned up.
    # After fixing issue-31015, remove the following step:
    And the administrator deletes the following groups using the occ command
      | groupname        |
      | Mgmt/Sydney      |
      | Mgmt//NSW/Sydney |
      | priv/subadmins/1 |

  @skipOnLDAP
  Scenario: adding a user to a group using mixes of upper and lower case in user and group names
    Given user "mixed-case-user" has been created with default attributes and without skeleton files
    And these groups have been created:
      | groupname             |
      | Case-Sensitive-Group1 |
      | case-sensitive-group1 |
      | CASE-SENSITIVE-GROUP1 |
      | Case-Sensitive-Group2 |
      | case-sensitive-group2 |
      | CASE-SENSITIVE-GROUP2 |
      | Case-Sensitive-Group3 |
      | case-sensitive-group3 |
      | CASE-SENSITIVE-GROUP3 |
    When the administrator adds the following users to the following groups using the provisioning API
      | username        | groupname             |
      | Mixed-Case-USER | Case-Sensitive-Group1 |
      | mixed-case-user | case-sensitive-group2 |
      | MIXED-CASE-USER | CASE-SENSITIVE-GROUP3 |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should belong to the following groups
      | username        | groupname             |
      | Mixed-Case-USER | Case-Sensitive-Group1 |
      | Mixed-Case-User | case-sensitive-group2 |
      | mixed-case-user | CASE-SENSITIVE-GROUP3 |
    But the following users should not belong to the following groups
      | username        | groupname             |
      | Mixed-Case-USER | Case-Sensitive-Group2 |
      | mixed-case-user | case-sensitive-group1 |
      | MIXED-CASE-USER | CASE-SENSITIVE-GROUP1 |
      | Mixed-Case-USER | Case-Sensitive-Group3 |
      | mixed-case-user | case-sensitive-group3 |
      | MIXED-CASE-USER | CASE-SENSITIVE-GROUP2 |

  @skipOnLDAP
  Scenario: normal user tries to add himself to a group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When user "brand-new-user" tries to add himself to group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data

  @skipOnLDAP
  Scenario: admin tries to add user to a group which does not exist
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "nonexistentgroup" has been deleted
    When the administrator tries to add user "brand-new-user" to group "nonexistentgroup" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And the API should not return any data

  @skipOnLDAP
  Scenario: admin tries to add user to a group without sending the group
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator tries to add user "brand-new-user" to group "" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And the API should not return any data

  @skipOnLDAP
  Scenario: admin tries to add a user which does not exist to a group
    Given user "nonexistentuser" has been deleted
    And group "brand-new-group" has been created
    When the administrator tries to add user "nonexistentuser" to group "brand-new-group" using the provisioning API
    Then the OCS status code should be "103"
    And the HTTP status code should be "200"
    And the API should not return any data

  @skipOnLDAP
  Scenario: a subadmin cannot add users to groups the subadmin is responsible for
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | brand-new-user |
      | subadmin       |
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" tries to add user "brand-new-user" to group "brand-new-group" using the provisioning API
    Then the OCS status code should be "104"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "brand-new-group"

  @skipOnLDAP
  Scenario: a subadmin cannot add users to groups the subadmin is not responsible for
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-subadmin |
    And group "brand-new-group" has been created
    And group "another-new-group" has been created
    And user "another-subadmin" has been made a subadmin of group "another-new-group"
    When user "another-subadmin" tries to add user "brand-new-user" to group "brand-new-group" using the provisioning API
    Then the OCS status code should be "104"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not belong to group "brand-new-group"

  @skipOnLDAP
  Scenario: a subadmin can add users to other groups the subadmin is responsible for
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-subadmin |
    And group "brand-new-group" has been created
    And group "another-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    And user "another-subadmin" has been made a subadmin of group "brand-new-group"
    And user "another-subadmin" has been made a subadmin of group "another-new-group"
    When user "another-subadmin" tries to add user "brand-new-user" to group "another-new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should belong to group "brand-new-group"

  # merge this with scenario on line 62 once the issue is fixed
  @issue-31015 @skipOnLDAP @issue-product-284
  Scenario Outline: adding a user to a group that has a forward-slash and dot in the group name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And the administrator sends a group creation request for group "<group_id>" using the provisioning API
    When the administrator adds user "brand-new-user" to group "<group_id>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    Examples:
      | group_id         | comment                            |
      | var/../etc       | using slash-dot-dot                |

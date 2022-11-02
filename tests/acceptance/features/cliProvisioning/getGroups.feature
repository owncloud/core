@cli @skipOnLDAP
Feature: get groups
  As an admin
  I want to be able to get a list of groups
  So that I can see all the groups in my ownCloud

  @issue-user_ldap-500
  Scenario: admin gets all the groups
    Given group "0" has been created
    And group "brand-new-group" has been created
    And group "España" has been created
    When the administrator gets the groups in JSON format using the occ command
    Then the command should have been successful
    And the groups returned by the occ command should be
      | group           |
      | España          |
      | admin           |
      | brand-new-group |
      | 0               |

  @issue-user_ldap-499
  Scenario: admin gets all the groups, including groups with mixed case
    Given group "case-sensitive-group" has been created
    And group "Case-Sensitive-Group" has been created
    And group "CASE-SENSITIVE-GROUP" has been created
    When the administrator gets the groups in JSON format using the occ command
    Then the command should have been successful
    And the groups returned by the occ command should be
      | group                |
      | admin                |
      | case-sensitive-group |
      | Case-Sensitive-Group |
      | CASE-SENSITIVE-GROUP |


  Scenario Outline: admin gets all the groups containing some sub-string
    Given group "brand-new" has been created
    And group "brand-new-group" has been created
    And group "brand-new-thing" has been created
    And group "some-other-name" has been created
    When the administrator gets the groups containing "<group-to-list>" in the group name in JSON format using the occ command
    Then the command should have been successful
    And the groups returned by the occ command should be
      | group           |
      | brand-new       |
      | brand-new-group |
      | brand-new-thing |
    Examples:
      | group-to-list |
      | brand-new     |
      | brand         |
      | b             |
      | new           |

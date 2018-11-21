@cli @skipOnLDAP
Feature: get user groups
  As an admin
  I want to be able to get group membership information
  So that I can manage group membership

  Scenario: admin gets groups of an user
    Given user "brand-new-user" has been created with default attributes
    And group "unused-group" has been created
    And group "new-group" has been created
    And group "0" has been created
    And group "Admin & Finance (NP)" has been created
    And group "admin:Pokhara@Nepal" has been created
    And group "नेपाली" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "brand-new-user" has been added to group "0"
    And user "brand-new-user" has been added to group "Admin & Finance (NP)"
    And user "brand-new-user" has been added to group "admin:Pokhara@Nepal"
    And user "brand-new-user" has been added to group "नेपाली"
    When the administrator gets the groups of user "brand-new-user" in JSON format using the occ command
    Then the command should have been successful
    And the groups returned by the occ command should be
      | group                |
      | new-group            |
      | 0                    |
      | Admin & Finance (NP) |
      | admin:Pokhara@Nepal  |
      | नेपाली               |

  Scenario: admin gets groups of an user who is not in any groups
    Given user "brand-new-user" has been created with default attributes
    And group "unused-group" has been created
    When the administrator gets the groups of user "brand-new-user" in JSON format using the occ command
    Then the command should have been successful
    And the occ command JSON output should be empty
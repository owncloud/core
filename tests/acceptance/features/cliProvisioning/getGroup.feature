@cli @skipOnLDAP
Feature: get group
  As an admin
  I want to be able to get group details
  So that I can know which users are in a group

  Scenario: admin gets users in the group
    Given user "brand-new-user" has been created
    And the administrator has changed the display name of user "brand-new-user" to "Anne Brown"
    And user "123" has been created
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "123" has been added to group "new-group"
    When the administrator gets the users in group "new-group" in JSON format using the occ command
    Then the command should have been successful
    And the users returned by the occ command should be
      | uid            | display name |
      | brand-new-user | Anne Brown   |
      | 123            | 123          |

  Scenario: admin gets user in the group who is disabled
    Given user "brand-new-user" has been created
    And the administrator has changed the display name of user "brand-new-user" to "Anne Brown"
    And user "brand-new-user" has been disabled
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    When the administrator gets the users in group "new-group" in JSON format using the occ command
    Then the command should have been successful
    And the users returned by the occ command should be
      | uid            | display name |
      | brand-new-user | Anne Brown   |
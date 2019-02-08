@cli @skipOnLDAP
Feature: add group
  As an admin
  I want to be able to add groups
  So that I can more easily manage access to resources by groups rather than individual users

  Scenario Outline: admin creates a group
    When the administrator creates group "<group_id>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Created group "<group_id>"'
    And group "<group_id>" should exist
    Examples:
      | group_id    | comment                     |
      | simplegroup | nothing special here        |
      | España      | special European characters |
      | नेपाली      | Unicode group name          |

  Scenario: admin tries to create a group that already exists
    Given group "new-group" has been created
    When the administrator creates group "new-group" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'The group "new-group" already exists'
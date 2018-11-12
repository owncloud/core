@cli @skipOnLDAP @comments-app-required
Feature: disable an app
  As an admin
  I want to be able to disable an enabled app
  So that I can stop the app features being used

  Scenario: Admin disables an app
    Given the app "comments" has been enabled
    When the administrator disables the app "comments" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'comments disabled'
    And app "comments" should be disabled

  Scenario: Admin tries to disable an app which is not enabled
    Given the app "comments" has been disabled
    When the administrator disables the app "comments" using the occ command
    Then the command should have been successful
    And the command output should contain the text "No such app enabled: comments"
    And app "comments" should be disabled
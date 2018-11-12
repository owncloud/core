@cli @skipOnLDAP @comments-app-required
Feature: get app info
  As an admin
  I want to be able to get app info
  So that I can get the information of a specific application

  Scenario: admin gets app info of an enabled app
    Given the app "comments" has been enabled
    When the administrator gets the app info of app "comments"
    Then the command should have been successful
    And the app name returned by the occ command should be "comments"
    And the app enabled status of app "comments" should be "yes"

  Scenario: admin gets app info of a disabled app
    Given the app "comments" has been disabled
    When the administrator gets the app info of app "comments"
    Then the command should have been successful
    And the app name returned by the occ command should be "comments"
    And the app enabled status of app "comments" should be "no"
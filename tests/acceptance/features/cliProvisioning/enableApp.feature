@cli @skipOnLDAP
Feature: enable an app
  As an admin
  I want to be able to enable a disabled app
  So that I can use the app features again

  @comments-app-required
  Scenario: Admin enables an app
    Given the app "comments" has been disabled
    When the administrator enables app "comments" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'comments enabled'
    And app "comments" should be enabled

  @comments-app-required
  Scenario: Admin tries to enable an app which is already enabled
    Given the app "comments" has been enabled
    When the administrator enables app "comments" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'comments enabled'
    And app "comments" should be enabled

  Scenario: Admin tries to enable an app which is not installed in the ownCloud server
    When the administrator enables app "not-installed-app" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'not-installed-app not found'
    And the app "not-installed-app" should not be on the apps list
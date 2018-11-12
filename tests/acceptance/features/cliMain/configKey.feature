@cli
Feature: add and delete app configs using occ command

  As an administrator
  I want to be able to add and delete app configs via the command line
  So that I can configure apps via the command line, rather than having to use the webUI

  Scenario: admin adds and deletes a config for an app using the occ command
    When the administrator adds config key "con" with value "conkey" in app "core" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Config value con for app core set to conkey'
    And the config key "con" of app "core" should have value "conkey"
    When the administrator deletes config key "con" of app "core" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Config value con of app core deleted'
    And app "core" should not have config key "con"

  Scenario: admin adds and deletes a system config
    When the administrator adds system config key "con" with value "conkey" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'System config value con set to string conkey'
    And system config key "con" should have value "conkey"
    When the administrator deletes system config key "con" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'System config value con deleted'
    And system config key "con" should not exist

  Scenario: admin can list system config keys
    When the administrator lists the config keys
    Then the command should have been successful
    And the command output should contain the system configs

  Scenario: admin can list app config keys
    When the administrator lists the config keys
    Then the command should have been successful
    And the command output should contain the apps configs


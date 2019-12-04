@cli @skipWhenTestingRemoteSystems
Feature: list apps
  As an admin
  I want to be able to get a list of apps that are enabled and/or disabled
  So that I can manage the apps in my ownCloud

  Scenario: list all the apps
    Given app "testapp1" with version "2.3.4" has been put in dir "apps"
    And app "testapp1" has been enabled
    And app "testapp2" with version "5.6.7" has been put in dir "apps"
    And app "testapp2" has been disabled
    When the administrator lists the apps using the occ command
    Then the command should have been successful
    And app "testapp1" with version "2.3.4" should have been listed in the enabled apps section
    And app "testapp2" should have been listed in the disabled apps section

  Scenario: list all the apps by specifying both "enabled" and "disabled"
    Given app "testapp1" with version "2.3.4" has been put in dir "apps"
    And app "testapp1" has been enabled
    And app "testapp2" with version "5.6.7" has been put in dir "apps"
    And app "testapp2" has been enabled
    And app "testapp2" has been disabled
    When the administrator lists the enabled and disabled apps using the occ command
    Then the command should have been successful
    And app "testapp1" with version "2.3.4" should have been listed in the enabled apps section
    And app "testapp2" with version "5.6.7" should have been listed in the disabled apps section

  Scenario: the version of a disabled app is not displayed on a full list even if it has previously been enabled
    Given app "testapp1" with version "2.3.4" has been put in dir "apps"
    And app "testapp1" has been enabled
    And app "testapp1" has been disabled
    When the administrator lists the apps using the occ command
    Then the command should have been successful
    And app "testapp1" should have been listed in the disabled apps section

  Scenario: the version of a disabled app is displayed if disabled apps are specifically requested
    Given app "testapp1" with version "2.3.4" has been put in dir "apps"
    And app "testapp1" has been enabled
    And app "testapp1" has been disabled
    When the administrator lists the disabled apps using the occ command
    Then the command should have been successful
    And app "testapp1" with version "2.3.4" should have been listed in the disabled apps section

  Scenario: list only the enabled apps
    Given app "testapp1" with version "2.3.4" has been put in dir "apps"
    And app "testapp1" has been enabled
    When the administrator lists the enabled apps using the occ command
    Then the command should have been successful
    And app "testapp1" with version "2.3.4" should have been listed in the enabled apps section
    And the disabled apps section should not exist

  Scenario: list only the disabled apps
    Given app "testapp1" with version "2.3.4" has been put in dir "apps"
    And app "testapp1" has been enabled
    And app "testapp1" has been disabled
    When the administrator lists the disabled apps using the occ command
    Then the command should have been successful
    And app "testapp1" with version "2.3.4" should have been listed in the disabled apps section
    And the enabled apps section should not exist

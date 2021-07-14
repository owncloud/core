@cli @skipWhenTestingRemoteSystems @skipOnLDAP
Feature: App upgrade
  As an admin
  I want to be able to upgrade my app version
  So that the owncloud server can be uptodate to the latest release

  Background:
    Given the administrator sets the log level to "Debug" using the occ command

  Scenario: Update of minor version of an app
    Given app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.1.0" in dir "apps"
    And the administrator enables app "updatetest"
    And the administrator runs an upgrade using the occ command
    Then the installed version of "updatetest" should be "2.1.0"

  Scenario: Update of major version of an app
    Given app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "3.0.0" in dir "apps"
    And the administrator enables app "updatetest"
    And the administrator runs an upgrade using the occ command
    Then the installed version of "updatetest" should be "3.0.0"

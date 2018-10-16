@cli @skipOnLDAP
Feature: get apps
  As an admin
  I want to be able to get the list of apps on my ownCloud
  So that I can manage apps

Scenario: admin gets enabled apps
    When the administrator gets the list of apps using the occ command
    Then the command should have been successful
    And the apps returned by the occ command should include
      | comments             |
      | dav                  |
      | federatedfilesharing |
      | federation           |
      | files                |
      | files_sharing        |
      | files_trashbin       |
      | files_versions       |
      | provisioning_api     |
      | systemtags           |
      | updatenotification   |
      | files_external       |
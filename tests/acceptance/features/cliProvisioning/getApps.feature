@cli @skipOnLDAP
Feature: get apps
  As an admin
  I want to be able to get the list of apps on my ownCloud
  So that I can manage apps

  @comments-app-required @files_trashbin-app-required @files_versions-app-required @provisioning_api-app-required @systemtags-app-required
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

  Scenario: admin gets enabled apps - check for the minimal list of apps
    When the administrator gets the list of apps using the occ command
    Then the command should have been successful
    And the apps returned by the occ command should include
      | dav                  |
      | federatedfilesharing |
      | federation           |
      | files                |
      | files_sharing        |
      | updatenotification   |
      | files_external       |

  Scenario: admin checks the path of the given app
    When the administrator checks the location of the "testing" app using the occ command
    Then the command should have been successful
    And the path returned by the occ command should be inside one of the apps paths in the config for the "testing" app

  Scenario: admin checks the path for non-existing app
    When the administrator checks the location of the "not-existing-app" app using the occ command
    Then the command should have failed with exit code 1
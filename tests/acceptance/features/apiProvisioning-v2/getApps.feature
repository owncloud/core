@api @provisioning_api-app-required
Feature: get apps
  As an admin
  I want to be able to get the list of apps on my ownCloud
  So that I can manage apps

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets enabled apps
    When the administrator sends HTTP method "GET" to OCS API endpoint "/cloud/apps?filter=enabled"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the apps returned by the API should include
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
@api @provisioning_api-app-required @files_sharing-app-required @skipOnLDAP @notToImplementOnOCIS
Feature: get apps
  As an admin
  I want to be able to get the list of apps on my ownCloud
  So that I can manage apps

  Background:
    Given using OCS API version "1"

  @smokeTest @comments-app-required @files_trashbin-app-required @files_versions-app-required @systemtags-app-required
  Scenario: admin gets enabled apps
    When the administrator gets all enabled apps using the provisioning API
    Then the OCS status code should be "100"
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

  Scenario: admin gets enabled apps - check for the minimal list of apps
    When the administrator gets all enabled apps using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the apps returned by the API should include
      | dav                  |
      | federatedfilesharing |
      | federation           |
      | files                |
      | files_sharing        |
      | updatenotification   |
      | files_external       |

  @comments-app-required
  Scenario: admin gets enabled apps when some app is disabled
    Given app "comments" has been disabled
    When the administrator gets all enabled apps using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the apps returned by the API should include
      | dav                  |
      | federatedfilesharing |
      | federation           |
      | files                |
      | files_sharing        |
      | updatenotification   |
      | files_external       |
    And the apps returned by the API should not include
      | comments |

  @comments-app-required
  Scenario: admin gets disabled apps
    Given app "comments" has been disabled
    When the administrator gets all disabled apps using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the apps returned by the API should include
      | comments |
    And the apps returned by the API should not include
      | dav                  |
      | federatedfilesharing |
      | federation           |
      | files                |
      | files_sharing        |
      | updatenotification   |
      | files_external       |

  @comments-app-required
  Scenario: admin gets all apps
    Given app "comments" has been disabled
    When the administrator gets all apps using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the apps returned by the API should include
      | comments             |
      | dav                  |
      | federatedfilesharing |
      | federation           |
      | files                |
      | files_external       |
      | files_sharing        |
      | updatenotification   |

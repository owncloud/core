@api @skipOnLDAP @notToImplementOnOCIS
Feature: AppManagement

  Scenario: Update of patch version of an app
    Given these apps' path has been configured additionally with following attributes:
      | dir         | is_writable |
      | apps-custom | true        |
    And app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"

  Scenario: Update of patch version of an app in apps-external, previous version in apps folder
    Given these apps' path has been configured additionally with following attributes:
      | dir         | is_writable |
      | apps-custom | true        |
    And app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps-external"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"

  Scenario: Update of patch version of an app in apps-external
    Given these apps' path has been configured additionally with following attributes:
      | dir         | is_writable |
      | apps-custom | true        |
    And app "updatetest" with version "2.0.0" has been put in dir "apps-external"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps-external"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"

  Scenario: Update of patch version of an app but update is put in alternative folder
    Given these apps' path has been configured additionally with following attributes:
      | dir         | is_writable |
      | apps-custom | true        |
    And app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps-custom"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"

  Scenario: Update of patch version of an app previously in apps-external but update is put in alternative folder
    Given these apps' path has been configured additionally with following attributes:
      | dir         | is_writable |
      | apps-custom | true        |
    And app "updatetest" with version "2.0.0" has been put in dir "apps-external"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps-custom"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"

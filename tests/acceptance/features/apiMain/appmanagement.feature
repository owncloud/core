@api
Feature: AppManagement

  Scenario: Two apps_path exist by default. The first one is more recent
    Given app "multidirtest" with version "1.0.2" has been put in dir "apps"
    And app "multidirtest" with version "1.0.1" has been put in dir "apps-external"
    When the administrator gets the path for app "multidirtest" using the occ command
    Then the path to "multidirtest" should be "apps"

  Scenario: Two apps_path exist by default. The second one is more recent
    Given app "multidirtest" with version "1.0.2" has been put in dir "apps"
    And app "multidirtest" with version "1.0.10" has been put in dir "apps-external"
    When the administrator gets the path for app "multidirtest" using the occ command
    Then the path to "multidirtest" should be "apps-external"

  Scenario: Three app instances, including apps-external, exist. The first one is more recent
    Given these apps' path has been configured additionally with following attributes:
      | dir           | is_writable  |
      | apps-custom   | true         |
    And app "multidirtest" with version "1.0.2" has been put in dir "apps"
    And app "multidirtest" with version "1.0.1" has been put in dir "apps-external"
    And app "multidirtest" with version "1.0.0" has been put in dir "apps-custom"
    When the administrator gets the path for app "multidirtest" using the occ command
    Then the path to "multidirtest" should be "apps"

  Scenario: Three app instances, including apps-external, exist. The second one is more recent
    Given these apps' path has been configured additionally with following attributes:
      | dir           | is_writable  |
      | apps-custom   | true         |
    And app "multidirtest" with version "1.0.2" has been put in dir "apps"
    And app "multidirtest" with version "1.0.10" has been put in dir "apps-external"
    And app "multidirtest" with version "1.0.0" has been put in dir "apps-custom"
    When the administrator gets the path for app "multidirtest" using the occ command
    Then the path to "multidirtest" should be "apps-external"

  Scenario: Three app instances, including apps-external, exist. The third one is more recent
    Given these apps' path has been configured additionally with following attributes:
      | dir           | is_writable  |
      | apps-custom   | true         |
    And app "multidirtest" with version "1.0.2" has been put in dir "apps"
    And app "multidirtest" with version "1.0.1" has been put in dir "apps-external"
    And app "multidirtest" with version "1.0.10" has been put in dir "apps-custom"
    When the administrator gets the path for app "multidirtest" using the occ command
    Then the path to "multidirtest" should be "apps-custom"

  Scenario: Update of patch version of an app
    Given these apps' path has been configured additionally with following attributes:
      | dir           | is_writable  |
      | apps-custom   | true         |
    And app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"

  Scenario: Update of patch version of an app in apps-external, previous version in apps folder
    Given these apps' path has been configured additionally with following attributes:
      | dir           | is_writable  |
      | apps-custom   | true         |
    And app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps-external"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"

  Scenario: Update of patch version of an app in apps-external
    Given these apps' path has been configured additionally with following attributes:
      | dir           | is_writable  |
      | apps-custom   | true         |
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
      | dir           | is_writable  |
      | apps-custom   | true         |
    And app "updatetest" with version "2.0.0" has been put in dir "apps-external"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps-custom"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"
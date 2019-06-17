@api
Feature: AppManagement

  Background:
    Given apps have been put in two directories "apps" and "apps2"

  Scenario: Two app instances exist the first is more recent
    Given app "multidirtest" with version "1.0.1" has been put in dir "apps"
    And app "multidirtest" with version "1.0.0" has been put in dir "apps2"
    When the administrator gets the path for app "multidirtest" using the occ command
    Then the path to "multidirtest" should be "apps"

  Scenario: Two app instances exist the second is more recent
    Given app "multidirtest" with version "1.0.0" has been put in dir "apps"
    And app "multidirtest" with version "1.0.5" has been put in dir "apps2"
    When the administrator gets the path for app "multidirtest" using the occ command
    Then the path to "multidirtest" should be "apps2"

  Scenario: Update of patch version of an app
    Given app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"

  Scenario: Update of patch version of an app but update is put in alternative folder
    Given app "updatetest" with version "2.0.0" has been put in dir "apps"
    And app "updatetest" has been enabled
    And app "updatetest" has been disabled
    When the administrator puts app "updatetest" with version "2.0.1" in dir "apps2"
    And the administrator enables app "updatetest"
    Then the installed version of "updatetest" should be "2.0.1"
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

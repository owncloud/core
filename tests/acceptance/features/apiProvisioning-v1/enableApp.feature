@api @provisioning_api-app-required @comments-app-required
Feature: enable an app
  As an admin
  I want to be able to enable a disabled app
  So that I can use the app features again

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: Admin enables an app
    Given app "comments" has been disabled
    When the administrator enables app "comments"
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And app "comments" should be enabled
    And the information for app "comments" should have a valid version

  Scenario: subadmin tries to enable an app
    Given user "subadmin" has been created
    And group "newgroup" has been created
    And user "subadmin" has been made a subadmin of group "newgroup"
    And app "comments" has been disabled
    When user "subadmin" enables app "comments"
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And app "comments" should be disabled

  Scenario: normal user tries to enable an app
    Given user "newuser" has been created
    And app "comments" has been disabled
    When user "newuser" enables app "comments"
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And app "comments" should be disabled
@api @provisioning_api-app-required @comments-app-required
Feature: disable an app
  As an admin
  I want to be able to disable an enabled app
  So that I can stop the app features being used

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: Admin disables an app
    Given app "comments" has been enabled
    When the administrator disables app "comments"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And app "comments" should be disabled

  @issue-31276
  Scenario: subadmin tries to disable an app
    Given user "subadmin" has been created with default attributes
    And group "newgroup" has been created
    And user "subadmin" has been made a subadmin of group "newgroup"
    And app "comments" has been enabled
    When user "subadmin" disables app "comments"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And app "comments" should be enabled

  @issue-31276
  Scenario: normal user tries to disable an app
    Given user "newuser" has been created with default attributes
    And app "comments" has been enabled
    When user "newuser" disables app "comments"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And app "comments" should be enabled

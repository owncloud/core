@api @provisioning_api-app-required @comments-app-required @skipOnLDAP @skipOnGraph
Feature: disable an app
  As an admin
  I want to be able to disable an enabled app
  So that I can stop the app features being used

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: Admin disables an app
    Given app "comments" has been enabled
    When the administrator disables app "comments"
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And app "comments" should be disabled


  Scenario: subadmin tries to disable an app
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And app "comments" has been enabled
    When user "subadmin" disables app "comments"
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And app "comments" should be enabled


  Scenario: normal user tries to disable an app
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And app "comments" has been enabled
    When user "brand-new-user" disables app "comments"
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And app "comments" should be enabled

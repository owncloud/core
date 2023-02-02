@api @provisioning_api-app-required @comments-app-required @skipOnLDAP @skipOnGraph
Feature: enable an app
  As an admin
  I want to be able to enable a disabled app
  So that I can use the app features again

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: Admin enables an app
    Given app "comments" has been disabled
    When the administrator enables app "comments"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And app "comments" should be enabled

  @issue-31276 @skipOnOcV10
  Scenario: subadmin tries to enable an app
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And app "comments" has been disabled
    When user "subadmin" enables app "comments"
    Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And app "comments" should be disabled

  @issue-31276 @skipOnOcV10
  Scenario: normal user tries to enable an app
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And app "comments" has been disabled
    When user "brand-new-user" enables app "comments"
    Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And app "comments" should be disabled

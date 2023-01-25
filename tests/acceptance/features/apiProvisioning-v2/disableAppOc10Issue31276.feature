@api @provisioning_api-app-required @comments-app-required @skipOnLDAP @skipOnGraph
Feature: current oC10 behavior for issue-31276
  As an admin
  I want to be able to disable an enabled app
  So that I can stop the app features being used

  Background:
    Given using OCS API version "2"

  @issue-31276
  Scenario: subadmin tries to disable an app
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And app "comments" has been enabled
    When user "subadmin" disables app "comments"
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And app "comments" should be enabled

  @issue-31276
  Scenario: normal user tries to disable an app
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And app "comments" has been enabled
    When user "brand-new-user" disables app "comments"
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And app "comments" should be enabled

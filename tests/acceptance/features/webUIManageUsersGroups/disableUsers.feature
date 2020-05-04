@webUI @insulated @disablePreviews
Feature: disable users
  As an admin
  I want to disable users
  So that I can remove access to unnecessary users

  Background:
    Given these users have been created with default attributes and skeleton files but not initialized:
      | username |
      | Alice    |
      | Brian    |

  Scenario: disable a user
    Given the administrator has logged in using the webUI
    And the administrator has browsed to the users page
    When the administrator disables user "Alice" using the webUI
    Then user "Alice" should be disabled
    When the disabled user "Alice" tries to login using the password "%password%" from the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user has browsed to the login page
    And user "Brian" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario: subadmin disables a user
    Given group "grp1" has been created
    And user "subadmin" has been created with default attributes and skeleton files
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "subadmin" has been made a subadmin of group "grp1"
    And user "subadmin" has logged in using the webUI
    And the user has browsed to the users page
    When the user disables user "Alice" using the webUI
    Then user "Alice" should be disabled
    When the disabled user "Alice" tries to login using the password "%password%" from the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user has browsed to the login page
    And user "Brian" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

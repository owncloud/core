@webUI @insulated @disablePreviews
Feature: disable users
  As an admin
  I want to disable users
  So that I can remove access to unnecessary users

  Background:
    Given these users have been created with default attributes but not initialized:
      | username |
      | user1    |
      | user2    |

  Scenario: disable a user
    Given the administrator has logged in using the webUI
    And the administrator has browsed to the users page
    When the administrator disables user "user1" using the webUI
    Then user "user1" should be disabled
    When the disabled user "user1" tries to login using the password "%alt1%" from the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user has browsed to the login page
    And user "user2" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario: subadmin disables a user
    Given group "grp1" has been created
    And user "subadmin" has been created with default attributes
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "subadmin" has been made a subadmin of group "grp1"
    And user "subadmin" has logged in using the webUI
    And the user has browsed to the users page
    When the user disables user "user1" using the webUI
    Then user "user1" should be disabled
    When the disabled user "user1" tries to login using the password "%alt1%" from the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user has browsed to the login page
    And user "user2" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

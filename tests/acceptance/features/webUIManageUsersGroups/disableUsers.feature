@webUI @insulated @disablePreviews
Feature: disable users
  As an admin
  I want to disable users
  So that I can remove access to unnecessary users

  Background:
    Given these users have been created but not initialized:
      | username | password      | displayname | email        |
      | user1    | %regular%     | User One    | u1@oc.com.np |
      | user2    | %regular%     | User Two    | u2@oc.com.np |

  Scenario: disable a user
    Given the administrator has logged in using the webUI
    And the administrator has browsed to the users page
    When the administrator disables the user "user1" using the webUI
    And the disabled user "user1" tries to login using the password "%regular%" from the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user has browsed to the login page
    And user "user2" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario: subadmin disables a user
    Given group "grp1" has been created
    And user "subadmin" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "subadmin" has been made a subadmin of group "grp1"
    And user "subadmin" has logged in using the webUI
    And the user has browsed to the users page
    When the user disables the user "user1" using the webUI
    And the disabled user "user1" tries to login using the password "%regular%" from the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user has browsed to the login page
    And user "user2" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

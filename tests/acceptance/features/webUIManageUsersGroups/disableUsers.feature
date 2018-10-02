@webUI @insulated @disablePreviews
Feature: disable users
  As an admin
  I want to disable users
  So that I can remove access to unnecessary users

  Background:
    Given these users have been created but not initialized:
      | username | password | displayname | email        |
      | user1    | %regular%     | User One    | u1@oc.com.np |
      | user2    | %regular%     | User Two    | u2@oc.com.np |
    And the administrator has logged in using the webUI
    And the administrator has browsed to the users page

  Scenario: disable a user
    When the administrator disables the user "user1" using the webUI
    And the disabled user "user1" tries to login using the password "%regular%" from the webUI
    Then the user should be redirected to a webUI page with the title "ownCloud"
    When the user has browsed to the login page
    And the user logs in with username "user2" and password "%regular%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - ownCloud"

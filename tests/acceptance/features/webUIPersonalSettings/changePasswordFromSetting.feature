@webUI @insulated
Feature: Change Login Password
  As a user
  I would like to change my login password
  So that I can login with my new password

  Background:
    Given these users have been created:
      | username | password  | displayname | email        |
      | user1    | %regular% | User One    | u1@oc.com.np |
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%regular%" using the webUI
    And the user has browsed to the personal general settings page

  @smokeTest
  Scenario: Change password
    When the user changes the password to "%alt1%" using the webUI
    And the user re-logs in with username "user1" and password "%alt1%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - ownCloud"

  Scenario: Password change with wrong current password
    When the user changes the password to "%alt1%" entering the wrong current password "%alt2%" using the webUI
    Then a password error message should be displayed on the webUI with the text "Wrong current password"

  Scenario: New password is same as current password
    When the user changes the password to "%regular%" using the webUI
    Then a password error message should be displayed on the webUI with the text "The new password cannot be the same as the previous one"
@webUI @insulated @disablePreviews
Feature: Change Login Password
  As a user
  I would like to change my login password
  So that I can login with my new password

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the personal general settings page

  @smokeTest
  Scenario: Change password
    When the user changes the password to "%alt3%" using the webUI
    And the user re-logs in with username "user1" and password "%alt3%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario: Password change with wrong current password
    When the user changes the password to "%alt3%" entering the wrong current password "%alt2%" using the webUI
    Then a password error message should be displayed on the webUI with the text "Wrong current password"

  Scenario: New password is same as current password
    When the user changes the password to "%alt1%" using the webUI
    Then a password error message should be displayed on the webUI with the text "The new password cannot be the same as the previous one"
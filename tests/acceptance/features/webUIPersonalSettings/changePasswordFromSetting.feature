@webUI @insulated @disablePreviews
Feature: Change Login Password
  As a user
  I would like to change my login password
  So that I can login with my new password

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has logged in using the webUI
    And the user has browsed to the personal general settings page

  @smokeTest @skipOnLDAP
  Scenario: Change password
    When the user changes the password to "%alt3%" using the webUI
    And the user re-logs in with username "Alice" and password "%alt3%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"


  Scenario Outline: Change password to some unusual values
    When the user changes the password to "<new_password>" using the webUI
    And the user re-logs in with username "Alice" and password "<new_password>" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"
    Examples:
      | new_password                 | comment                               |
      | !@#$%^&*()-_+=[]{}:;,.<>?~/\ | special characters                    |
      | España§àôœ€                  | special European and other characters |
      | नेपाली                       | Unicode                               |


  Scenario: Password change with wrong current password
    When the user changes the password to "%alt3%" entering the wrong current password "%alt2%" using the webUI
    Then a password error message should be displayed on the webUI with the text "Wrong current password"


  Scenario: New password is same as current password
    When the user changes the password to the current password using the webUI
    Then a password error message should be displayed on the webUI with the text "The new password cannot be the same as the previous one"


  Scenario Outline: Password change with invalid or no new password
    When the user changes the password to "<new_password>" using the webUI
    Then a password error message should be displayed on the webUI with the text "<message>"
    Examples:
      | new_password | message                        |
      | 0            | Password cannot be empty       |
      |              | Unable to change your password |

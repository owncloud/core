@webUI @insulated @disablePreviews @mailhog

Feature: reset the password
  As a user
  I want to reset my password
  So that I can login to my account again after forgetting the password

  Background:
    Given these users have been created with default attributes but not initialized:
      | username |
      | user1    |
    And the user has browsed to the login page
    And the user logs in with username "user1" and invalid password "%alt2%" using the webUI

  @smokeTest
  Scenario: send password reset email
    When the user requests the password reset link using the webUI
    Then a message with this text should be displayed on the webUI:
      """
      The link to reset your password has been sent to your email. If you do not receive it within a reasonable amount of time, check your spam/junk folders. If it is not there ask your local administrator.
      """
    And the email address "user1@example.org" should have received an email with the body containing
      """
      Use the following link to reset your password: <a href=
      """

  @skipOnEncryption @skipOnOcV10.0 @skipOnOcV10.1
  @smokeTest
  Scenario: reset password for the ordinary (no encryption) case
    When the user requests the password reset link using the webUI
    And the user follows the password reset link from email address "user1@example.org"
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user resets the password to "%alt3%" and confirms with the same password using the webUI
    Then the email address "user1@example.org" should have received an email with the body containing
      """
      Password changed successfully
      """
    When the user logs in with username "user1" and password "%alt3%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  @skipOnEncryption
  Scenario: check if the sender email address is valid
    When the user requests the password reset link using the webUI
    And the user follows the password reset link from email address "user1@example.org"
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user resets the password to "%alt3%" and confirms with the same password using the webUI
    Then the email address "user1@example.org" should have received an email with the body containing
      """
      Password changed successfully
      """
    And the reset email to "user1@example.org" should be from "owncloud@foobar.com"

  @skipOnEncryption
  Scenario: using the password reset token plus invalid username does not work
    When the user requests the password reset link using the webUI
    And the user follows the password reset link from email address "user1@example.org" but supplying invalid user name "qwerty"
    Then the user should be redirected to a webUI page with the title "%productname%"
    And a lost password reset error message with this text should be displayed on the webUI:
      """
      Could not reset password because the token is invalid
      """

  @skipOnEncryption
  Scenario: using an invalid password reset token with valid username does not work
    When the user requests the password reset link using the webUI
    And the user follows the password reset link from email address "user1@example.org" but supplying an invalid token
    Then the user should be redirected to a webUI page with the title "%productname%"
    And a lost password reset error message with this text should be displayed on the webUI:
      """
      Could not reset password because the token does not match
      """

  @skipOnEncryption
  Scenario: When new password and confirmation password are different does not reset user password
    When the user requests the password reset link using the webUI
    And the user follows the password reset link from email address "user1@example.org"
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user resets the password to "%alt3%" and confirms with "foo" using the webUI
    Then the user should see a password mismatch message displayed on the webUI
    """
    Passwords do not match
    """

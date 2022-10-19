@webUI @insulated @disablePreviews @email
Feature: reset the password using an email address
  As a user
  I want to reset my password using an email address
  So that I can login to my account again after forgetting the password

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And the user has browsed to the login page
    And user "Alice" logs in with email and invalid password "%alt2%" using the webUI

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: send password reset email
    When the user requests the password reset link using the webUI
    Then a message with this text should be displayed on the webUI:
      """
      The link to reset your password has been sent to your email. If you do not receive it within a reasonable amount of time, check your spam/junk folders. If it is not there ask your local administrator.
      """
    And the email address of user "Alice" should have received an email with the body containing
      """
      Use the following link to reset your password: <a href=
      """

  @skipOnEncryption @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: reset password for the ordinary (no encryption) case
    When the user requests the password reset link using the webUI
    And the user follows the password reset link from the email address of user "Alice"
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user resets the password to "%alt3%" and confirms with the same password using the webUI
    Then the user should be redirected to the login page
    And the email address of user "Alice" should have received an email with the body containing
      """
      Password changed successfully
      """
    When the user logs in with username "Alice" and password "%alt3%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

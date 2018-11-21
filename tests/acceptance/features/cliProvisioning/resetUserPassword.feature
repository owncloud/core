@cli @skipOnLDAP @mailhog
Feature: reset user password
  As an admin
  I want to be able to reset a user's password
  So that I can secure individual access to resources on the ownCloud server

  Scenario: reset user password
    Given these users have been created:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    When the administrator resets the password of user "brand-new-user" to "%alt1%" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Successfully reset password for brand-new-user"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "%alt1%" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "%regular%" should not be able to download file "textfile0.txt"

  Scenario: user should get email when admin resets their password and sends email
    Given these users have been created:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    When the administrator invokes password reset for user "brand-new-user" using the occ command
    Then the command should have been successful
    And the command output should contain the text "The password reset link is:"
    And the email address "brand.new.user@oc.com.np" should have received an email with the body containing
      """
      Use the following link to reset your password: <a href=
      """

  Scenario: administrator gets error message while trying to reset user password with send email when the email address of the user is not setup
    Given these users have been created:
      | username       | password  | displayname |
      | brand-new-user | %regular% | New user    |
    When the administrator invokes password reset for user "brand-new-user" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text "Email address is not set for the user brand-new-user"

  Scenario: user should not get an email when the smtpmode value points to an invalid or missing mail program
    Given these users have been created:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    And the administrator has set the mail smtpmode to "sendmail"
    When the administrator invokes password reset for user "brand-new-user" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text "Can't send new user mail to brand.new.user@oc.com.np: Couldn't send reset email."
    And the email address "brand.new.user@oc.com.np" should not have received an email

  Scenario: admin tries to reset the password of a user that does not exist
    Given user "not-a-user" has been deleted
    When the administrator resets the password of user "not-a-user" to "%alt1%" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'User does not exist'

  Scenario: admin should be able to reset their own password
    Given these users have been created with default attributes:
      | username       | displayname    |
      | brand-new-user | Brand New User |
    When the administrator resets their own password to "%alt1%" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Successfully reset password for admin"
    When the administrator retrieves the information of user "brand-new-user" using the provisioning API
    Then the display name returned by the API should be "Brand New User"

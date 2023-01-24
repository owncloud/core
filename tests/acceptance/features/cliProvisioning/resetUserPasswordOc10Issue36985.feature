@cli @email @skipOnLDAP
Feature: reset user password
  As an admin
  I want to be able to reset a user's password
  So that I can secure individual access to resources on the ownCloud server

  @skipOnEncryption @issue-36985
  Scenario: user should get email when the administrator changes their password and specifies to also send email
    Given these users have been created without skeleton files:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    And user "brand-new-user" has uploaded file with content "ownCloud test text file 0\n" to "textfile0.txt"
    When the administrator resets the password of user "brand-new-user" to "%alt1%" sending email using the occ command
    Then the command should have been successful
    And the command output should contain the text "Successfully reset password for %username%" about user "brand-new-user"
    And the email address "brand.new.user@oc.com.np" should have received an email with the body containing
      """
      Password changed successfully
      """
    And the content of file "textfile0.txt" for user "brand-new-user" using password "%alt1%" should be "ownCloud test text file 0\n"
    But user "brand-new-user" using password "%regular%" should not be able to download file "textfile0.txt"

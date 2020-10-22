@cli @mailhog @skipOnLDAP @notToImplementOnOCIS
Feature: reset user password
  As an admin
  I want to be able to reset a user's password
  So that I can secure individual access to resources on the ownCloud server

  @issue-36985
  Scenario: user should get email when the administrator changes their password and specifies to also send email
    Given these users have been created with skeleton files:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    When the administrator resets the password of user "brand-new-user" to "%alt1%" sending email using the occ command
    Then the command should have failed with exit code 1

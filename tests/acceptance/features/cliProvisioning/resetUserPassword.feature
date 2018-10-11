@cli @skipOnLDAP
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

  Scenario: admin tries to reset the password of a user that does not exist
    Given user "not-a-user" has been deleted
    When the administrator resets the password of user "not-a-user" to "%alt1%" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'User does not exist'

  Scenario: admin should be able to reset their own password
    Given user "brand-new-user" has been created
    When the administrator resets the password of user "%admin%" to "%alt1%" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Successfully reset password for admin"
    When user "%admin%" retrieves the information of user "brand-new-user" using the provisioning API
    Then the display name returned by the API should be "brand-new-user"

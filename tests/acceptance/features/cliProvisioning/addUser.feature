@cli @skipOnLDAP
Feature: add a user using the using the occ command

  As an administrator
  I want to be able to add users via the command line
  So that I can give people controlled individual access to resources on the ownCloud server and
  So that I can write scripts to add users

  Scenario: admin creates an ordinary user using the occ command
    When the administrator creates this user using the occ command:
      | username  |
      | justauser |
    Then the command should have been successful
    And the command output should contain the text 'The user "justauser" was created successfully'
    And user "justauser" should exist
    And user "justauser" should be able to access a skeleton file

  Scenario: admin creates an ordinary user specifying attributes using the occ command
    When the administrator creates this user using the occ command:
      | username  | displayname | email                 |
      | justauser | Just A User | justauser@example.com |
    Then the command should have been successful
    And the command output should contain the text 'The user "justauser" was created successfully'
    And the command output should contain the text 'Display name set to "Just A User"'
    And the command output should contain the text 'Email address set to "justauser@example.com"'
    And user "justauser" should exist
    And user "justauser" should be able to access a skeleton file
    When the administrator retrieves the information of user "justauser" using the provisioning API
    Then the user attributes returned by the API should include
      | displayname | Just A User           |
      | email       | justauser@example.com |

  Scenario: admin tries to create an existing user
    Given user "brand-new-user" has been created
    When the administrator tries to create a user "brand-new-user" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'The user "brand-new-user" already exists.'

  Scenario: admin tries to create an existing disabled user
    Given user "brand-new-user" has been created
    And user "brand-new-user" has been disabled
    When the administrator tries to create a user "brand-new-user" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'The user "brand-new-user" already exists.'

  Scenario: Admin creates a new user and adds them directly to a group
    Given group "newgroup" has been created
    When the administrator creates user "justauser" password "%alt1%" group "newgroup" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The user "justauser" was created successfully'
    And user "justauser" should belong to group "newgroup"

  Scenario Outline: Admin creates users having password with special characters
    Given user "brand-new-user" has been deleted
    When the administrator creates user "brand-new-user" password "<password>" group "brand-new-group" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The user "brand-new-user" was created successfully'
    And user "brand-new-user" should exist
    And user "brand-new-user" should be able to access a skeleton file
    Examples:
      | password                     | comment                     |
      | !@#$%^&*()-_+=[]{}:;,.<>?~/\ | special characters          |
      | España                       | special European characters |
      | नेपाली                                                  | Unicode                     |
      | password with spaces         | password with spaces        |

  Scenario: admin creates a user and specifies an invalid password, containing just space
    Given user "brand-new-user" has been deleted
    When the administrator creates user "brand-new-user" password " " group "brand-new-group" using the occ command
    Then the command should have failed with exit code 1
    And user "brand-new-user" should not exist

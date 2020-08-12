@cli @skipOnLDAP
Feature: add a user using the using the occ command

  As an administrator
  I want to be able to add users via the command line
  So that I can give people controlled individual access to resources on the ownCloud server and
  So that I can write scripts to add users

  Scenario Outline: admin creates an ordinary user using the occ command
    When the administrator creates this user using the occ command:
      | username   |
      | <username> |
    Then the command should have been successful
    And the command output should contain the text 'The user "%username%" was created successfully' about user "<username>"
    And user "<username>" should exist
    And user "<username>" should be able to access a skeleton file
    Examples:
      | username       |
      | brand-new-user |
      | a@-+_.b        |

  Scenario: admin creates an ordinary user specifying attributes using the occ command
    When the administrator creates this user using the occ command:
      | username       | displayname    | email                      |
      | brand-new-user | Brand New User | brand-new-user@example.com |
    Then the command should have been successful
    And the command output should contain the text 'The user "%username%" was created successfully' about user "brand-new-user"
    And the command output should contain the text 'Display name set to "Brand New User"'
    And the command output should contain the text 'Email address set to "brand-new-user@example.com"'
    And user "brand-new-user" should exist
    And user "brand-new-user" should be able to access a skeleton file
    When the administrator retrieves the information of user "brand-new-user" using the provisioning API
    Then the user attributes returned by the API should include
      | displayname | Brand New User             |
      | email       | brand-new-user@example.com |

  Scenario: admin tries to create an existing user
    Given user "brand-new-user" has been created with default attributes and skeleton files
    When the administrator tries to create a user "brand-new-user" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'The user "%username%" already exists.' about user "brand-new-user"

  Scenario: admin tries to create an existing disabled user
    Given user "brand-new-user" has been created with default attributes and skeleton files
    And user "brand-new-user" has been disabled
    When the administrator tries to create a user "brand-new-user" using the occ command
    Then the command should have failed with exit code 1
    And the command output should contain the text 'The user "%username%" already exists.' about user "brand-new-user"

  Scenario: Admin creates a new user and adds them directly to a group
    Given group "brand-new-group" has been created
    When the administrator creates user "brand-new-user" password "%alt1%" group "brand-new-group" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The user "%username%" was created successfully' about user "brand-new-user"
    And user "brand-new-user" should belong to group "brand-new-group"

  Scenario Outline: Admin creates users having password with special characters
    Given user "brand-new-user" has been deleted
    When the administrator creates user "brand-new-user" password "<password>" group "brand-new-group" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The user "%username%" was created successfully' about user "brand-new-user"
    And user "brand-new-user" should exist
    And user "brand-new-user" should be able to access a skeleton file
    Examples:
      | password                     | comment                               |
      | !@#$%^&*()-_+=[]{}:;,.<>?~/\ | special characters                    |
      | España§àôœ€                  | special European and other characters |
      | नेपाली                       | Unicode                               |
      | password with spaces         | password with spaces                  |

  Scenario: admin creates a user and specifies an invalid password, containing just space
    Given user "brand-new-user" has been deleted
    When the administrator creates user "brand-new-user" password " " group "brand-new-group" using the occ command
    Then the command should have failed with exit code 1
    And user "brand-new-user" should not exist

  Scenario: admin creates a user with username that contains capital letters
    When the administrator creates this user using the occ command:
      | username       |
      | Brand-New-User |
    Then the command should have been successful
    And the command output should contain the text 'The user "%username%" was created successfully' about user "Brand-New-User"
    And user "Brand-New-User" should exist
    And user "brand-new-user" should exist
    And user "Brand-New-User" should be able to access a skeleton file
    And the display name of user "brand-new-user" should be "Brand-New-User"

  Scenario: admin tries to create an existing user but with username containing capital letters
    Given user "brand-new-user" has been created with default attributes and skeleton files
    When the administrator creates this user using the occ command:
      | username       |
      | Brand-New-User |
    Then the command should have failed with exit code 1
    And the command output should contain the text 'The user "%username%" already exists' about user "Brand-New-User"

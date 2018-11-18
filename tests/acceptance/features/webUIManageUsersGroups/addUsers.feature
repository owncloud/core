@webUI @insulated @disablePreviews @mailhog
Feature: add users
  As an admin
  I want to add users
  So that unauthorised access is impossible

  Background:
    Given the administrator has logged in using the webUI
    And the administrator has browsed to the users page

  Scenario: use the webUI to create a simple user
    When the administrator creates a user with the name "guiusr1" and the password "%regular%" using the webUI
    And the administrator logs out of the webUI
    And user "guiusr1" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario: use the webUI to create a user with special valid characters
    When the administrator creates a user with the name "@-_.'" and the password "pwd" using the webUI
    And the administrator logs out of the webUI
    And the user logs in with username "@-_.'" and password "pwd" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario Outline: use the webUI to create a user with special invalid characters
    When the administrator attempts to create a user with the name <user> and the password <password> using the webUI
    Then notifications should be displayed on the webUI with the text
      | Error creating user: Only the following characters are allowed in a username: "a-z", "A-Z", "0-9", and "_.@-'" |
    And the user should be redirected to a webUI page with the title "Users - %productname%"
    Examples:
      | user   | password    |
      | "a#%"  | "%regular%" |
      | "a+^"  | "%alt1%"    |
      | "a)~"  | "%alt2%"    |
      | "a(="  | "%alt3%"    |
      | "a`*^" | "%regular%" |

  Scenario: use the webUI to create a user with empty password
    When the administrator attempts to create a user with the name "bijay" and the password "" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Error creating user: A valid password must be provided |
    And the user should be redirected to a webUI page with the title "Users - %productname%"

  Scenario Outline: use the webUI to create a user with less than 3 characters
    When the administrator attempts to create a user with the name <user> and the password <password> using the webUI
    Then notifications should be displayed on the webUI with the text
      | Error creating user: The username must be at least 3 characters long |
    Examples:
      | user | password    |
      | "a"  | "%regular%" |
      | "a1" | "%alt1%"    |

  @smokeTest
  Scenario: use the webUI to create a simple user with an Email address but without a password
    When the administrator creates a user with the name "guiusr1" and the email "guiusr1@owncloud" without a password using the webUI
    Then the email address "guiusr1@owncloud" should have received an email with the body containing
      """
      just letting you know that you now have an %productname% account.
      
      Your username: guiusr1
      Access it:
      """

  @smokeTest
  Scenario Outline: user sets his own password after being created with an Email address only
    When the administrator creates a user with the name "<username>" and the email "guiusr1@owncloud" without a password using the webUI
    And the administrator logs out of the webUI
    And the user follows the password set link received by "guiusr1@owncloud" using the webUI
    And the user sets the password to "%regular%" using the webUI
    Then the email address "guiusr1@owncloud" should have received an email with the body containing
      """
      Password changed successfully
      """
    When the user logs in with username "<username>" and password "%regular%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"
    Examples:
      | username | comment               |
      | guiusr1  | simple user-name      |
      | a@-_.'b  | complicated user-name |

  Scenario Outline: webUI refuses to create users with invalid Email addresses
    When the administrator creates a user with the name "guiusr1" and the email "<email>" without a password using the webUI
    Then notifications should be displayed on the webUI with the text
      | Error creating user: Invalid mail address |
    Examples:
      | email  | comment        |
      | string | no @ sign      |
      | a@     | no domain name |
      #there would be much more to test here, but its complicated and would be slow
      #see http://codefool.tumblr.com/post/15288874550/list-of-valid-and-invalid-email-addresses
      #email address validation would better go into an unit test

  Scenario: webUI refuses to create a user with an empty Email address
    When the administrator creates a user with the name "guiusr1" and the email "" without a password using the webUI
    Then notifications should be displayed on the webUI with the text
      | Error creating user: A valid email must be provided |

  Scenario: changing the user password as an admin invalidates the user sets-password-token
    When the administrator creates a user with the name "guiusr1" and the email "guiusr1@owncloud" without a password using the webUI
    And the administrator changes the password of user "guiusr1" to "123" using the provisioning API
    And the administrator logs out of the webUI
    And the user follows the password set link received by "guiusr1@owncloud" using the webUI
    Then the user should be redirected to the general error webUI page with the title "%productname%"
    And an error should be displayed on the general error webUI page saying "The token provided is invalid."

  Scenario: sets-password-token cannot be used twice
    When the administrator creates a user with the name "guiusr1" and the email "guiusr1@owncloud" without a password using the webUI
    And the administrator logs out of the webUI
    And the user follows the password set link received by "guiusr1@owncloud" using the webUI
    And the user sets the password to "%regular%" using the webUI
    And the user follows the password set link received by "guiusr1@owncloud" in Email number 2 using the webUI
    Then the user should be redirected to the general error webUI page with the title "%productname%"
    And an error should be displayed on the general error webUI page saying "The token provided is invalid."

  Scenario: recreating a user with same name after deletion sends a new token to new address
    When the administrator creates a user with the name "guiusr1" and the email "mistake@owncloud" without a password using the webUI
    And the administrator deletes user "guiusr1" using the webUI
    And the administrator creates a user with the name "guiusr1" and the email "correct@owncloud" without a password using the webUI
    And the administrator logs out of the webUI
    And the user follows the password set link received by "correct@owncloud" using the webUI
    And the user sets the password to "%regular%" using the webUI
    And the user logs in with username "guiusr1" and password "%regular%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario: recreating a user with same name after deletion makes the first token invalid
    When the administrator creates a user with the name "guiusr1" and the email "mistake@owncloud" without a password using the webUI
    And the administrator deletes user "guiusr1" using the webUI
    And the administrator creates a user with the name "guiusr1" and the email "correct@owncloud" without a password using the webUI
    And the administrator logs out of the webUI
    And the user follows the password set link received by "mistake@owncloud" using the webUI
    Then the user should be redirected to the general error webUI page with the title "%productname%"
    And an error should be displayed on the general error webUI page saying "The token provided is invalid."

  Scenario: when recreating a user with same second token can be used even if someone tried to use the first one
    When the administrator creates a user with the name "guiusr1" and the email "mistake@owncloud" without a password using the webUI
    And the administrator deletes user "guiusr1" using the webUI
    And the administrator creates a user with the name "guiusr1" and the email "correct@owncloud" without a password using the webUI
    And the administrator logs out of the webUI
    And the user follows the password set link received by "mistake@owncloud" using the webUI
    And the user follows the password set link received by "correct@owncloud" using the webUI
    And the user sets the password to "%regular%" using the webUI
    And the user logs in with username "guiusr1" and password "%regular%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario: check if the sender email address is valid
    When the administrator creates a user with the name "user1" and the email "guiusr1@owncloud" without a password using the webUI
    And the administrator logs out of the webUI
    And the user follows the password set link received by "guiusr1@owncloud" using the webUI
    And the user sets the password to "%regular%" using the webUI
    Then the email address "guiusr1@owncloud" should have received an email with the body containing
      """
      Password changed successfully
      """
    And the reset email to "guiusr1@owncloud" should be from "owncloud@foobar.com"

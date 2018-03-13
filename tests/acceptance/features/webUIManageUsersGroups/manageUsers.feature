@webUI @insulated @disablePreviews
Feature: manage users
  As an admin
  I want to manage users
  So that unauthorised access is impossible

  Background:
    Given user admin has logged in using the webUI
    And the administrator has browsed to the users page

  Scenario: use the webUI to create a simple user
    When the administrator creates a user with the name "guiusr1" and the password "pwd" using the webUI
    And the administrator logs out of the webUI
    And the user logs in with username "guiusr1" and password "pwd" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - ownCloud"

  Scenario: use the webUI to create a user with special valid characters
    When the administrator creates a user with the name "@-_.'" and the password "pwd" using the webUI
    And the administrator logs out of the webUI
    And the user logs in with username "@-_.'" and password "pwd" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - ownCloud"

  Scenario Outline: use the webUI to create a user with special invalid characters
    When the administrator attempts to create a user with the name <user> and the password <pwd> using the webUI
    Then notifications should be displayed on the webUI with the text
      |Error creating user: Only the following characters are allowed in a username: "a-z", "A-Z", "0-9", and "_.@-'"|
    And the user should be redirected to a webUI page with the title "Users - ownCloud"
    Examples:
      | user | pwd |
      |"a#%"|"pwd1"|
      |"a+^"|"pwd2"|
      |"a)~"|"pwd2"|
      |"a(="|"pwd2"|
      |"a`*^"|"pwd2"|

  Scenario: use the webUI to create a user with empty password
    When the administrator attempts to create a user with the name "bijay" and the password "" using the webUI
    Then notifications should be displayed on the webUI with the text
      |Error creating user: A valid password must be provided|
    And the user should be redirected to a webUI page with the title "Users - ownCloud"

  Scenario Outline: use the webUI to create a user with less than 3 characters
    When the administrator attempts to create a user with the name <user> and the password <pwd> using the webUI
    Then notifications should be displayed on the webUI with the text
      |Error creating user: The username must be at least 3 characters long|
    Examples:
      |user|  pwd |
      |"a" | "abc"|
      |"a1"|"abcd"|

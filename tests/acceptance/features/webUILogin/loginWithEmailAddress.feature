@webUI @insulated @disablePreviews
Feature: login users
  As a user
  I want to be able to log into my account using my email address
  So that I have access to my files

  As an admin
  I want only authorised users to log in
  So that unauthorised access is impossible

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And the user has browsed to the login page


  Scenario: user login with email address
    When user "Alice" logs in with their email address using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"


  Scenario: user login with email address but invalid password should fail
    When user "Alice" logs in with email and invalid password "%alt2%" using the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"


  Scenario: user login with email address should fail when strict_login_enforced is set
    Given the administrator has added system config key "strict_login_enforced" with value "true" and type "boolean"
    When user "Alice" logs in with their email address using the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"

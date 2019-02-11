@webUI @insulated @disablePreviews
Feature: login users
  As a user
  I want to be able to log into my account
  So that I have access to my files

  As an admin
  I want only authorised users to log in
  So that unauthorised access is impossible

  @TestAlsoOnExternalUserBackend
  Scenario: simple user login
    Given these users have been created with default attributes but not initialized:
      | username |
      | user1    |
    When user "user1" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  @smokeTest
  Scenario: admin login
    When the administrator logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  @smokeTest
  Scenario: admin login with invalid password
    Given the user has browsed to the login page
    When the administrator tries to login with an invalid password "%regular%" using the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"

  Scenario: access the personal general settings page when not logged in
    When the user attempts to browse to the personal general settings page
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the administrator logs in using the webUI after a redirect from the "personal general settings" page
    Then the user should be redirected to a webUI page with the title "Settings - %productname%"

  Scenario: access the personal general settings page when not logged in using incorrect then correct password
    When the user attempts to browse to the personal general settings page
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the administrator tries to login with an invalid password "%regular%" using the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the administrator logs in using the webUI after a redirect from the "personal general settings" page
    Then the user should be redirected to a webUI page with the title "Settings - %productname%"
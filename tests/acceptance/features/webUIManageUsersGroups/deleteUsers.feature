@webUI @insulated @disablePreviews
Feature: delete users
  As an admin
  I want to delete users
  So that I can remove users

  Background:
    Given these users have been created with default attributes and skeleton files but not initialized:
      | username |
      | user1    |
      | user2    |
    And the administrator has logged in using the webUI
    And the administrator has browsed to the users page

  Scenario: use the webUI to delete a simple user
    When the administrator deletes user "user1" using the webUI and confirms the deletion using the webUI
    And the deleted user "user1" tries to login using the password "%alt1%" using the webUI
    Then the user should be redirected to a webUI page with the title "%productname%"
    When the user has browsed to the login page
    And user "user2" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  Scenario: use the webUI to cancel deletion of user
    When the administrator deletes user "user1" using the webUI and cancels the deletion using the webUI
    Then user "user1" should exist
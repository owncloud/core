@webUI @insulated @disablePreviews @app-required @notifications-app-required
Feature: Display notifications when receiving a share and follow embedded links
  As a user
  I want to use the notification header as a link
  So that I will be redirected to the most appropriate screen

  Background:
    Given app "notifications" has been enabled
    And these users have been created with default attributes:
      | username |
      | user1    |
      | user2    |
    And user "user2" has logged in using the webUI

  @smokeTest
  Scenario: notification link redirection in case a share is pending
    Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
    And user "user1" has shared folder "/simple-folder" with user "user2"
    When the user follows the link of the first notification on the webUI
    Then the user should be redirected to a webUI page with the title "Shared with you - %productname%"
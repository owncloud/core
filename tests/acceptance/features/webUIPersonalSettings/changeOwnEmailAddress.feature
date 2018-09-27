@webUI @insulated @mailhog
Feature: Change own email address on the personal settings page
  As a user
  I would like to change my own email address
  So that I can be reached by the owncloud server

  Background:
    Given these users have been created:
      | username | password  | displayname | email        |
      | user1    | %regular% | User One    | u1@oc.com.np |
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%regular%" using the webUI
    And the user has browsed to the personal general settings page

  @skip @issue-32385
  @smokeTest
  Scenario: Change email address
    When the user changes the email address to "new-address@owncloud.com" using the webUI
    And the user follows the email change confirmation link received by "new-address@owncloud.com" using the webUI
    Then the attributes of user "user1" returned by the API should include
      | email | new-address@owncloud.com |
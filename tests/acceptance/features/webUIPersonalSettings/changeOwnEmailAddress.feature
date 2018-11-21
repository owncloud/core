@webUI @insulated @mailhog
Feature: Change own email address on the personal settings page
  As a user
  I would like to change my own email address
  So that I can be reached by the owncloud server

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the personal general settings page

  @skip @issue-32385
  @smokeTest
  Scenario: Change email address
    When the user changes the email address to "new-address@owncloud.com" using the webUI
    And the user follows the email change confirmation link received by "new-address@owncloud.com" using the webUI
    Then the attributes of user "user1" returned by the API should include
      | email | new-address@owncloud.com |
@webUI @insulated @disablePreviews
Feature: Change own full name on the personal settings page
  As a user
  I would like to change my own full name
  So that other users can recognize me by it

  Background:
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user1" has logged in using the webUI
    And the user has browsed to the personal general settings page

  @smokeTest
  Scenario: Change full name
    When the user changes the full name to "my#very&weird?नेपालि%name" using the webUI
    And the user reloads the current page of the webUI
    Then "my#very&weird?नेपालि%name" should be shown as the name of the current user on the WebUI
    And the attributes of user "user1" returned by the API should include
      | displayname | my#very&weird?नेपालि%name |

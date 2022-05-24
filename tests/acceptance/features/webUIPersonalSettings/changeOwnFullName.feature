@webUI @insulated @disablePreviews
Feature: Change own full name on the personal settings page
  As a user
  I would like to change my own full name
  So that other users can recognize me by it

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has logged in using the webUI
    And the user has browsed to the personal general settings page

  @smokeTest @skipOnLDAP
  Scenario: Change full name
    When the user changes the full name to "my#very&weird?नेपालि%name" using the webUI
    And the user reloads the current page of the webUI
    Then "my#very&weird?नेपालि%name" should be shown as the name of the current user on the webUI
    And the attributes of user "Alice" returned by the API should include
      | displayname | my#very&weird?नेपालि%name |

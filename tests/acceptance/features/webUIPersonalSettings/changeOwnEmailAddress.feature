@webUI @insulated @disablePreviews @email
Feature: Change own email address on the personal settings page
  As a user
  I would like to change my own email address
  So that I can be reached by the owncloud server

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has logged in using the webUI
    And the user has browsed to the personal general settings page

  @smokeTest @skipOnLDAP @skipOnFIREFOX
  Scenario: Change email address
    When the user changes the email address to "new-address@owncloud.com" using the webUI
    And the user follows the email change confirmation link received by "new-address@owncloud.com" using the webUI
    Then the attributes of user "Alice" returned by the API should include
      | email | new-address@owncloud.com |

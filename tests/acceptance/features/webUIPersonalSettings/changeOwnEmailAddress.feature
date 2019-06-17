@webUI @insulated @disablePreviews @mailhog
Feature: Change own email address on the personal settings page
  As a user
  I would like to change my own email address
  So that I can be reached by the owncloud server

  Background:
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user1" has logged in using the webUI
    And the user has browsed to the personal general settings page

  @issue-32385
  @smokeTest
  @skipOnFIREFOX
  Scenario: Change email address
    When the user changes the email address to "new-address@owncloud.com" using the webUI
    # When the issue is fixed, remove the following step and replace with the commented-out step
    Then the email address "new-address@owncloud.com" should not have received an email
    #And the user follows the email change confirmation link received by "new-address@owncloud.com" using the webUI
    Then the attributes of user "user1" returned by the API should include
      | email | new-address@owncloud.com |

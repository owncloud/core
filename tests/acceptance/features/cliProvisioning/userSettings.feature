@cli @skipOnLDAP
Feature: user settings
  As an admin
  I want to be able set user settings
  So that I can set specific settings for a specific user

  Scenario: admin changes user language
    Given user "brand-new-user" has been created with default attributes
    When the administrator changes the language of user "brand-new-user" to "fr" using the occ command
    Then the command should have been successful
    And the language of user "brand-new-user" returned by the occ command should be "fr"
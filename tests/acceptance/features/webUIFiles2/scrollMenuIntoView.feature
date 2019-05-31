@webUI @insulated @disablePreviews
Feature: scroll menu of actions that can be done on a file into view
  As a user
  I want to see the whole menu of actions that can be done on a file
  So that I can manage and work with my files

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  @skipOnINTERNETEXPLORER
  Scenario: scroll the file actions menu into view
    When the user creates so many files/folders that they do not fit in one browser page
    Then the files action menu should be completely visible after opening it using the webUI

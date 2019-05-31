@webUI @insulated @disablePreviews
Feature: Hide file/folders

  As a user
  I would like to display hidden files/folders
  So that I can choose to see the files that I want.

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  @smokeTest
  Scenario: create a hidden folder
    When the user creates a folder with the name ".xyz" using the webUI
    Then folder ".xyz" should not be listed on the webUI
    When the user enables the setting to view hidden folders on the webUI
    Then folder ".xyz" should be listed on the webUI

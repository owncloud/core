@webUI @insulated @disablePreviews
Feature: Personal General Settings
  As a user
  I want to change the ownCloud User Interface to my preferred settings
  So that I can personalise the User Interface

  Note: This feature uses uses CLI commands to change the settings and webUI to check the settings are changed

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has logged in using the webUI
    And the user has browsed to the personal general settings page
    And the user has created folder "simple-folder"


  Scenario: change language using the occ command and check that file actions menu have been translated
    When the administrator changes the language of user "Alice" to "fr" using the occ command
    Then the command should have been successful
    When the user browses to the files page
    And the user opens the file action menu of folder "simple-folder" on the webUI
    Then the user should see "Details" file action translated to "Détails" on the webUI
    And the user should see "Delete" file action translated to "Supprimer" on the webUI


  Scenario: change language to invalid language using the occ command and check that the language defaults back to english
    When the administrator changes the language of user "Alice" to "not-valid-lan" using the occ command
    Then the command should have been successful
    When the user browses to the files page
    And the user opens the file action menu of folder "simple-folder" on the webUI
    Then the user should see "Details" file action translated to "Details" on the webUI
    And the user should see "Delete" file action translated to "Delete" on the webUI

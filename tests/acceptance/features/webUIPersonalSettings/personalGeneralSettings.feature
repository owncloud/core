@webUI @insulated @disablePreviews
Feature: personal general settings
  As a user
  I want to change the ownCloud User Interface to my preferred settings
  So that I can personalise the User Interface

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the personal general settings page

  @smokeTest
  Scenario: change language
    When the user changes the language to "Русский" using the webUI
    Then the user should be redirected to a webUI page with the title "Настройки - %productname%"

  Scenario: change language and check that file actions menu have been translated
    When the user changes the language to "हिन्दी" using the webUI
    And the user browses to the files page
    And the user opens the file action menu of folder "simple-folder" in the webUI
    Then the user should see "Details" file action translated to "विवरण" in the webUI
    And the user should see "Delete" file action translated to "हटाना" in the webUI

  Scenario: change language using the occ command and check that file actions menu have been translated
    When the administrator changes the language of user "user1" to "fr" using the occ command
    And the user browses to the files page
    And the user opens the file action menu of folder "simple-folder" in the webUI
    Then the user should see "Details" file action translated to "Détails" in the webUI
    And the user should see "Delete" file action translated to "Supprimer" in the webUI

  Scenario: change language to invalid language using the occ command and check that the language defaults back to english
    When the administrator changes the language of user "user1" to "not-valid-lan" using the occ command
    And the user browses to the files page
    And the user opens the file action menu of folder "simple-folder" in the webUI
    Then the user should see "Details" file action translated to "Details" in the webUI
    And the user should see "Delete" file action translated to "Delete" in the webUI

  Scenario: user sees displayed version number, groupnames and federated cloud ID on the personal general settings page
    Given group "new-group" has been created
    And group "another-group" has been created
    And user "user1" has been added to group "new-group"
    And user "user1" has been added to group "another-group"
    And the user has reloaded the current page of the webUI
    Then the owncloud version should be displayed on the personal general settings page in the webUI
    And the federated cloud id for user "user1" should be displayed on the personal general settings page in the webUI
    And group "new-group" should be displayed on the personal general settings page in the webUI
    And group "another-group" should be displayed on the personal general settings page in the webUI
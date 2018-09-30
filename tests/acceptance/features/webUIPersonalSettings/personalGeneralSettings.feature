@webUI @insulated @disablePreviews
Feature: personal general settings
  As a user
  I want to change the ownCloud User Interface to my preferred settings
  So that I can personalise the User Interface

  Background:
    Given user "user1" has been created
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%alt1%" using the webUI
    And the user has browsed to the personal general settings page

  @smokeTest
  Scenario: change language
    When the user changes the language to "Русский" using the webUI
    Then the user should be redirected to a webUI page with the title "Настройки - ownCloud"

  Scenario: change language and check that file actions menu have been translated
    When the user changes the language to "हिन्दी" using the webUI
    And the user browses to the files page
    And the user opens the file action menu of the folder "simple-folder" in the webUI
    Then the user should see "Details" file action translated to "विवरण" in the webUI
    And the user should see "Delete" file action translated to "हटाना" in the webUI
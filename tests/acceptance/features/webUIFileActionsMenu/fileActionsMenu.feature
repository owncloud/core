@webUI @insulated @disablePreviews @app-required @richdocuments-app-required @files_texteditor-app-required
Feature: File actions menu

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page


  Scenario: show the file actions application select menu with both Collabora and the Files Texteditor
    When the user clicks on the file "lorem.txt"
    Then the file actions application select menu should be displayed with these items on the webUI
      | Open in Text Editor | Open in Collabora |


  Scenario: show the actions for Collabora and the Files Texteditor in the file action menu
    And the user opens the file action menu of file "lorem.txt" on the webUI
    Then the file actions menu should be displayed with these items on the webUI
      | Open in Text Editor | Open in Collabora |

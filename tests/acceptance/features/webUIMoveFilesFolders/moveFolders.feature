@webUI @insulated @disablePreviews
Feature: move folders
  As a user
  I want to move folders
  So that I can organise my data structure

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  Scenario: An attempt to move a folder into a sub-folder using rename is not allowed
    When the user renames folder "simple-empty-folder" to "simple-folder/simple-empty-folder" using the webUI
    Then near folder "simple-empty-folder" a tooltip with the text 'File name cannot contain "/".' should be displayed on the webUI

  @skipOnFIREFOX
  Scenario: move a folder into another folder
    When the user moves folder "simple-folder" into folder "simple-empty-folder" using the webUI
    Then folder "simple-folder" should not be listed on the webUI
    But folder "simple-folder" should be listed in folder "simple-empty-folder" on the webUI
    When the user browses to the files page
    And the user moves folder "strängé नेपाली folder" into folder "strängé नेपाली folder empty" using the webUI
    Then folder "strängé नेपाली folder" should not be listed on the webUI
    But folder "strängé नेपाली folder" should be listed in folder "strängé नेपाली folder empty" on the webUI

  @skipOnFIREFOX
  Scenario: move a folder into another folder where a folder with the same name already exists
    When the user moves folder "simple-empty-folder" into folder "simple-folder" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not move "simple-empty-folder", target exists |
    And folder "simple-empty-folder" should be listed on the webUI

  @skipOnFIREFOX
  Scenario: Move multiple folders at once
    When the user batch moves these folders into folder "simple-empty-folder" using the webUI
      | name                  |
      | simple-folder         |
      | strängé नेपाली folder |
    Then the moved elements should not be listed on the webUI
    And the moved elements should not be listed on the webUI after a page reload
    But the moved elements should be listed in folder "simple-empty-folder" on the webUI

  @skipOnFIREFOX
  Scenario: move a folder into another folder (problematic characters)
    When the user renames the following folder using the webUI
      | from-name-parts | to-name-parts   |
      | simple-folder   | 'single'        |
      |                 | "double" quotes |
      |                 | question?       |
      |                 | &and#hash       |
    And the user renames the following folder using the webUI
      | from-name-parts     | to-name-parts       |
      | simple-empty-folder | folder-with'single' |
      |                     | "double" quotes     |
      |                     | question?           |
      |                     | &and#hash           |
    And the user moves the following folder using the webUI
      | item-to-move-name-parts | destination-name-parts |
      | 'single'                | folder-with'single'    |
      | "double" quotes         | "double" quotes        |
      | question?               | question?              |
      | &and#hash               | &and#hash              |
    Then the following item should be listed in the following folder on the webUI
      | item-name-parts | folder-name-parts   |
      | 'single'        | folder-with'single' |
      | "double" quotes | "double" quotes     |
      | question?       | question?           |
      | &and#hash       | &and#hash           |
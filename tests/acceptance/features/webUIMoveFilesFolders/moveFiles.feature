@webUI @insulated @disablePreviews
Feature: move files
  As a user
  I want to move files
  So that I can organise my data structure

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has uploaded file "filesForUpload/data.zip" to "data.zip"


  Scenario: An attempt to move a file into a sub-folder using rename is not allowed
    Given user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user renames file "data.zip" to "simple-folder/data.zip" using the webUI
    Then near file "data.zip" a tooltip with the text 'File name cannot contain "/".' should be displayed on the webUI

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: move a file into a folder
    Given user "Alice" has created folder "simple-empty-folder"
    And user "Alice" has created folder "strängé नेपाली folder empty"
    And user "Alice" has uploaded file "filesForUpload/data.tar.gz" to "data.tar.gz"
    And user "Alice" has uploaded file "filesForUpload/strängé filename (duplicate #2 &).txt" to "strängé filename (duplicate #2 &).txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user moves file "data.zip" into folder "simple-empty-folder" using the webUI
    Then file "data.zip" should not be listed on the webUI
    But file "data.zip" should be listed in folder "simple-empty-folder" on the webUI
    When the user browses to the files page
    And the user moves file "data.tar.gz" into folder "strängé नेपाली folder empty" using the webUI
    Then file "data.tar.gz" should not be listed on the webUI
    But file "data.tar.gz" should be listed in folder "strängé नेपाली folder empty" on the webUI
    When the user browses to the files page
    And the user moves file "strängé filename (duplicate #2 &).txt" into folder "strängé नेपाली folder empty" using the webUI
    Then file "strängé filename (duplicate #2 &).txt" should not be listed on the webUI
    But file "strängé filename (duplicate #2 &).txt" should be listed in folder "strängé नेपाली folder empty" on the webUI


  Scenario: move a file into a folder where a file with the same name already exists
    Given user "Alice" has created folder "strängé नेपाली folder"
    And user "Alice" has uploaded file "filesForUpload/data.zip" to "simple-folder/data.zip"
    And user "Alice" has uploaded file "filesForUpload/data.zip" to "strängé नेपाली folder/data.zip"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user moves file "data.zip" into folder "simple-folder" using the webUI
    And the user moves file "data.zip" into folder "strängé नेपाली folder" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not move "data.zip", target exists |
      | Could not move "data.zip", target exists |
    And file "data.zip" should be listed on the webUI

  @skipOnFIREFOX
  Scenario: move a file into a folder where a file with the same name already exists and the filename contains special characters
    Given user "Alice" has created folder "strängé नेपाली folder"
    And user "Alice" has uploaded file "filesForUpload/strängé filename (duplicate #2 &).txt" to "strängé filename (duplicate #2 &).txt"
    And user "Alice" has uploaded file "filesForUpload/strängé filename (duplicate #2 &).txt" to "strängé नेपाली folder/strängé filename (duplicate #2 &).txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user moves file "strängé filename (duplicate #2 &).txt" into folder "strängé नेपाली folder" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not move "strängé filename (duplicate #2 &).txt", target exists |
    And file "strängé filename (duplicate #2 &).txt" should be listed on the webUI

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: Move multiple files at once
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user batch moves these files into folder "simple-folder" using the webUI
      | name      |
      | data.zip  |
      | lorem.txt |
      | data.zip  |
    Then the moved elements should not be listed on the webUI
    And the moved elements should not be listed on the webUI after a page reload
    But the moved elements should be listed in folder "simple-folder" on the webUI

  @skipOnFIREFOX
  Scenario: move a file into a folder (problematic characters)
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user renames the following file using the webUI
      | from-name-parts | to-name-parts   |
      | lorem.txt       | 'single'        |
      |                 | "double" quotes |
      |                 | question?       |
      |                 | &and#hash       |
    And the user renames the following folder using the webUI
      | from-name-parts | to-name-parts       |
      | simple-folder   | folder-with'single' |
      |                 | "double" quotes     |
      |                 | question?           |
      |                 | &and#hash           |
    And the user moves the following file using the webUI
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

  @files_sharing-app-required
  Scenario: move files on a public share
    Given user "Alice" has created folder "simple-folder/simple-empty-folder"
    And user "Alice" has uploaded file "filesForUpload/data.zip" to "simple-folder/data.zip"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,create,change |
    And the public has accessed the last created public link using the webUI
    When the user moves file "data.zip" into folder "simple-empty-folder" using the webUI
    Then file "data.zip" should not be listed on the webUI
    When the user reloads the current page of the webUI
    Then file "data.zip" should not be listed on the webUI
    And as "Alice" file "simple-folder/simple-empty-folder/data.zip" should exist
    But as "Alice" file "simple-folder/data.zip" should not exist

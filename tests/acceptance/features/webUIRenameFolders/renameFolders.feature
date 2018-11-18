@webUI @insulated @disablePreviews
Feature: rename folders
  As a user
  I want to rename folders
  So that I can organise my data structure

  Background:
    Given user "user1" has been created
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  Scenario Outline: Rename a folder using special characters
    When the user renames folder "simple-folder" to <to_folder_name> using the webUI
    Then folder <to_folder_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then folder <to_folder_name> should be listed on the webUI
    Examples:
      | to_folder_name          |
      | 'सिमप्ले फोल्देर$%#?&@' |
      | '"quotes1"'             |
      | "'quotes2'"             |

  Scenario Outline: Rename a folder that has special characters in its name
    When the user renames folder <from_name> to <to_name> using the webUI
    Then folder <to_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then folder <to_name> should be listed on the webUI
    Examples:
      | from_name               | to_name                     |
      | "strängé नेपाली folder" | "strängé नेपाली folder-#?2" |
      | "'single'quotes"        | "single-quotes"             |

  Scenario: Rename a folder using special characters and check its existence after page reload
    When the user renames folder "simple-folder" to "लोरेम।तयक्स्त $%&" using the webUI
    And the user reloads the current page of the webUI
    Then folder "लोरेम।तयक्स्त $%&" should be listed on the webUI
    When the user renames folder "लोरेम।तयक्स्त $%&" to '"double"quotes' using the webUI
    And the user reloads the current page of the webUI
    Then folder '"double"quotes' should be listed on the webUI
    When the user renames folder '"double"quotes' to "no-double-quotes" using the webUI
    And the user reloads the current page of the webUI
    Then folder "no-double-quotes" should be listed on the webUI
    When the user renames folder 'no-double-quotes' to "hash#And&QuestionMark?At@FolderName" using the webUI
    And the user reloads the current page of the webUI
    Then folder "hash#And&QuestionMark?At@FolderName" should be listed on the webUI

  Scenario: Rename a folder using spaces at front and/or back of the name
    When the user renames folder "simple-folder" to " space at start" using the webUI
    And the user reloads the current page of the webUI
    Then folder " space at start" should be listed on the webUI
    When the user renames folder " space at start" to "space at end " using the webUI
    And the user reloads the current page of the webUI
    Then folder "space at end " should be listed on the webUI
    When the user renames folder "space at end " to "  multiple   spaces    all     over   " using the webUI
    And the user reloads the current page of the webUI
    Then folder "  multiple   spaces    all     over   " should be listed on the webUI

  Scenario: Rename a folder using both double and single quotes
    When the user renames the following folder using the webUI
      | from-name-parts | to-name-parts         |
      | simple-folder   | First 'single' quotes |
      |                 | -then "double"        |
    And the user reloads the current page of the webUI
    Then the following folder should be listed on the webUI
      | name-parts            |
      | First 'single' quotes |
      | -then "double"        |
    When the user renames the following folder using the webUI
      | from-name-parts       | to-name-parts   |
      | First 'single' quotes | a normal folder |
      | -then "double"        |                 |
    And the user reloads the current page of the webUI
    Then folder "a normal folder" should be listed on the webUI

  Scenario: Rename a folder using forbidden characters
    When the user renames folder "simple-folder" to one of these names using the webUI
      | simple\folder   |
      | \\simple-folder |
      | .htaccess       |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "simple-folder" |
      | Could not rename "simple-folder" |
      | Could not rename "simple-folder" |
    And folder "simple-folder" should be listed on the webUI

  Scenario: Rename a folder putting a name of a file which already exists
    When the user renames folder "simple-folder" to "lorem.txt" using the webUI
    Then near folder "simple-folder" a tooltip with the text 'lorem.txt already exists' should be displayed on the webUI

  Scenario: Rename a folder to ..
    When the user renames folder "simple-folder" to ".." using the webUI
    Then near folder "simple-folder" a tooltip with the text '".." is an invalid file name.' should be displayed on the webUI

  Scenario: Rename a folder to .
    When the user renames folder "simple-folder" to "." using the webUI
    Then near folder "simple-folder" a tooltip with the text '"." is an invalid file name.' should be displayed on the webUI

  Scenario: Rename a folder to .part
    When the user renames folder "simple-folder" to "simple.part" using the webUI
    Then near folder "simple-folder" a tooltip with the text '"simple.part" has a forbidden file type/extension.' should be displayed on the webUI

@webUI @insulated @disablePreviews @skipOnFIREFOX
Feature: rename files
  As a user
  I want to rename files
  So that I can organise my data structure

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  @smokeTest
  Scenario Outline: Rename a file using special characters
    When the user renames file "lorem.txt" to <to_file_name> using the webUI
    Then file <to_file_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then file <to_file_name> should be listed on the webUI
    Examples:
      | to_file_name           |
      | 'लोरेम।तयक्स्त? $%#&@' |
      | '"quotes1"'            |
      | "'quotes2'"            |

  Scenario Outline: Rename a file that has special characters in its name
    When the user renames file <from_name> to <to_name> using the webUI
    Then file <to_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then file <to_name> should be listed on the webUI
    Examples:
      | from_name                               | to_name                               |
      | "strängé filename (duplicate #2 &).txt" | "strängé filename (duplicate #3).txt" |
      | "'single'quotes.txt"                    | "single-quotes.txt"                   |

  @smokeTest
  Scenario: Rename a file using special characters and check its existence after page reload
    When the user renames file "lorem.txt" to "लोरेम।तयक्स्त $%&" using the webUI
    And the user reloads the current page of the webUI
    Then file "लोरेम।तयक्स्त $%&" should be listed on the webUI
    When the user renames file "लोरेम।तयक्स्त $%&" to '"double"quotes.txt' using the webUI
    And the user reloads the current page of the webUI
    Then file '"double"quotes.txt' should be listed on the webUI
    When the user renames file '"double"quotes.txt' to "no-double-quotes.txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "no-double-quotes.txt" should be listed on the webUI
    When the user renames file 'no-double-quotes.txt' to "hash#And&QuestionMark?At@Filename.txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "hash#And&QuestionMark?At@Filename.txt" should be listed on the webUI
    When the user renames file 'zzzz-must-be-last-file-in-folder.txt' to "aaaaaa.txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "aaaaaa.txt" should be listed on the webUI

  Scenario: Rename a file using spaces at front and/or back of file name and type
    When the user renames file "lorem.txt" to " space at start" using the webUI
    And the user reloads the current page of the webUI
    Then file " space at start" should be listed on the webUI
    When the user renames file " space at start" to "space at end " using the webUI
    And the user reloads the current page of the webUI
    Then file "space at end " should be listed on the webUI
    When the user renames file "space at end " to "space at end .txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "space at end .txt" should be listed on the webUI
    When the user renames file "space at end .txt" to "space at end. lis" using the webUI
    And the user reloads the current page of the webUI
    Then file "space at end. lis" should be listed on the webUI
    When the user renames file "space at end. lis" to "space at end.log " using the webUI
    And the user reloads the current page of the webUI
    Then file "space at end.log " should be listed on the webUI
    When the user renames file "space at end.log " to "  multiple   space    all     over   .  dat  " using the webUI
    And the user reloads the current page of the webUI
    Then file "  multiple   space    all     over   .  dat  " should be listed on the webUI

  Scenario: Rename a file using both double and single quotes
    When the user renames the following file using the webUI
      | from-name-parts | to-name-parts         |
      | lorem.txt       | First 'single' quotes |
      |                 | -then "double".txt    |
    And the user reloads the current page of the webUI
    Then the following file should be listed on the webUI
      | name-parts            |
      | First 'single' quotes |
      | -then "double".txt    |
    When the user renames the following file using the webUI
      | from-name-parts       | to-name-parts |
      | First 'single' quotes | loremz.dat    |
      | -then "double".txt    |               |
    And the user reloads the current page of the webUI
    Then file "loremz.dat" should be listed on the webUI

  Scenario: Rename a file using forbidden characters
    When the user renames file "data.zip" to one of these names using the webUI
      | lorem\txt |
      | \\.txt    |
      | .htaccess |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "data.zip" |
      | Could not rename "data.zip" |
      | Could not rename "data.zip" |
    And file "data.zip" should be listed on the webUI

  Scenario: Rename the last file in a folder
    When the user renames file "zzzz-must-be-last-file-in-folder.txt" to "a-file.txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "a-file.txt" should be listed on the webUI

  Scenario: Rename a file to become the last file in a folder
    When the user renames file "lorem.txt" to "zzzz-z-this-is-now-the-last-file.txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "zzzz-z-this-is-now-the-last-file.txt" should be listed on the webUI

  Scenario: Rename a file putting a name of a file which already exists
    When the user renames file "data.zip" to "lorem.txt" using the webUI
    Then near file "data.zip" a tooltip with the text 'lorem.txt already exists' should be displayed on the webUI

  Scenario: Rename a file to ..
    When the user renames file "data.zip" to ".." using the webUI
    Then near file "data.zip" a tooltip with the text '".." is an invalid file name.' should be displayed on the webUI

  Scenario: Rename a file to .
    When the user renames file "data.zip" to "." using the webUI
    Then near file "data.zip" a tooltip with the text '"." is an invalid file name.' should be displayed on the webUI

  Scenario: Rename a file to .part
    When the user renames file "data.zip" to "data.part" using the webUI
    Then near file "data.zip" a tooltip with the text '"data.part" has a forbidden file type/extension.' should be displayed on the webUI

  Scenario: rename a file on a public share
    Given the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    When the public accesses the last created public link using the webUI
    And the user renames file "lorem.txt" to "a-renamed-file.txt" using the webUI
    Then file "a-renamed-file.txt" should be listed on the webUI
    But file "lorem.txt" should not be listed on the webUI
    When the user reloads the current page of the webUI
    Then file "a-renamed-file.txt" should be listed on the webUI
    But file "lorem.txt" should not be listed on the webUI
    And as "user1" file "simple-folder/a-renamed-file.txt" should exist
    And as "user1" file "simple-folder/lorem.txt" should not exist

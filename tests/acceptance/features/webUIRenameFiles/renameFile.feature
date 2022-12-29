@webUI @insulated @disablePreviews @skipOnFIREFOX
Feature: rename files
  As a user
  I want to rename files
  So that I can organise my data structure

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario Outline: Rename a file using special characters
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to <to_file_name> using the webUI
    Then file <to_file_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then file <to_file_name> should be listed on the webUI
    Examples:
      | to_file_name           |
      | 'लोरेम।तयक्स्त? $%#&@' |
      | '"quotes1"'            |
      | "'quotes2'"            |
      | "?quot=OC&OC2 #OC%  3" |


  Scenario Outline: user with unusual username renames a file using special characters
    Given user "<username>" has been created with default attributes and without skeleton files
    And user "<username>" has uploaded file with content "some content" to "/randomfile.txt"
    And user "<username>" has logged in using the webUI
    When the user renames file "randomfile.txt" to "लोरेम।तयक्स्त? $%#&@" using the webUI
    Then file "लोरेम।तयक्स्त? $%#&@" should be listed on the webUI
    When the user reloads the current page of the webUI
    Then file "लोरेम।तयक्स्त? $%#&@" should be listed on the webUI
    Examples:
      | username |
      | user-1   |
      | null     |
      | nil      |
      | 123      |
      | -123     |
      | 0.0      |


  Scenario Outline: Rename a file that has special characters in its name
    Given user "Alice" has uploaded file with content "some content" to <from_name>
    And user "Alice" has logged in using the webUI
    When the user renames file <from_name> to <to_name> using the webUI
    Then file <to_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then file <to_name> should be listed on the webUI
    And the content of file <to_name> for user "Alice" should be "some content"
    Examples:
      | from_name                               | to_name                               |
      | "strängé filename (duplicate #2 &).txt" | "strängé filename (duplicate #3).txt" |
      | "'single'quotes.txt"                    | "single-quotes.txt"                   |
      | "?quot=OC&OC2 #OC%  3   "               | "sin#gle-qu&%%%%otes=.txt"            |
      | "s,a,m,p,l,e.txt"                       | "sample,1.txt"                        |

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: Rename a file using special characters and check its existence after page reload
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "more content" to "/zzzz-must-be-last-file-in-folder.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to "लोरेम।तयक्स्त $%&" using the webUI
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
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to " space at start" using the webUI
    And the user reloads the current page of the webUI
    Then file "space at start" should be listed on the webUI
    When the user renames file "space at start" to "space at end " using the webUI
    And the user reloads the current page of the webUI
    Then file "space at end" should be listed on the webUI
    When the user renames file "space at end" to "space at end .txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "space at end .txt" should be listed on the webUI
    When the user renames file "space at end .txt" to "space at end. lis" using the webUI
    And the user reloads the current page of the webUI
    Then file "space at end. lis" should be listed on the webUI
    When the user renames file "space at end. lis" to "space at end.log " using the webUI
    And the user reloads the current page of the webUI
    Then file "space at end.log" should be listed on the webUI
    When the user renames file "space at end.log" to "  multiple   space    all     over   .  dat  " using the webUI
    And the user reloads the current page of the webUI
    Then file "multiple   space    all     over   .  dat" should be listed on the webUI


  Scenario: Rename a file using both double and single quotes
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames the following file using the webUI
      | from-name-parts | to-name-parts         |
      | randomfile.txt  | First 'single' quotes |
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
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the administrator has updated system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to one of these names using the webUI
      | lorem\txt            |
      | \\.txt               |
      | .htaccess            |
      | blacklisted-file.txt |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "randomfile.txt" |
      | Could not rename "randomfile.txt" |
      | Could not rename "randomfile.txt" |
      | Could not rename "randomfile.txt" |
    And file "randomfile.txt" should be listed on the webUI


  Scenario: Rename a file to a filename that matches (or not) blacklisted_files_regex
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    And the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to one of these names using the webUI
      | filename.ext                  |
      | bannedfilename.txt            |
      | this-ContainsBannedString.txt |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "randomfile.txt" |
      | Could not rename "randomfile.txt" |
      | Could not rename "randomfile.txt" |
    And file "randomfile.txt" should be listed on the webUI


  Scenario: Rename a file to an excluded folder name
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the administrator has updated system config key "excluded_directories" with value '[".github"]' and type "json"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to one of these names using the webUI
      | .github |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "randomfile.txt" |
    And file "randomfile.txt" should be listed on the webUI


  Scenario: Rename a file to an excluded folder name inside a parent folder
    Given user "Alice" has created folder "top-folder"
    And user "Alice" has uploaded file with content "some content" to "/top-folder/randomfile.txt"
    And the administrator has updated system config key "excluded_directories" with value '[".github"]' and type "json"
    And user "Alice" has logged in using the webUI
    And the user has opened folder "top-folder" using the webUI
    When the user renames file "randomfile.txt" to one of these names using the webUI
      | .github |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "randomfile.txt" |
    And file "randomfile.txt" should be listed on the webUI


  Scenario: Rename a file to a filename that matches (or not) excluded_directories_regex
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    And the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to one of these names using the webUI
      | thisendswith.bad                |
      | .github                         |
      | this-containsvirusinthename.txt |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "randomfile.txt" |
      | Could not rename "randomfile.txt" |
      | Could not rename "randomfile.txt" |
    And file "randomfile.txt" should be listed on the webUI


  Scenario: Rename the last file in a folder
    Given user "Alice" has uploaded file with content "some content" to "/firstfile.txt"
    And user "Alice" has uploaded file with content "more content" to "/zzzz-must-be-last-file-in-folder.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "zzzz-must-be-last-file-in-folder.txt" to "a-file.txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "a-file.txt" should be listed on the webUI


  Scenario: Rename a file to become the last file in a folder
    Given user "Alice" has uploaded file with content "some content" to "/firstfile.txt"
    And user "Alice" has uploaded file with content "more content" to "/lastfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "firstfile.txt" to "zzzz-z-this-is-now-the-last-file.txt" using the webUI
    And the user reloads the current page of the webUI
    Then file "zzzz-z-this-is-now-the-last-file.txt" should be listed on the webUI


  Scenario: Rename a file putting a name of a file which already exists
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "another content" to "/anotherfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "anotherfile.txt" to "randomfile.txt" using the webUI
    Then near file "anotherfile.txt" a tooltip with the text 'randomfile.txt already exists' should be displayed on the webUI


  Scenario: Rename a file to ..
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to ".." using the webUI
    Then near file "randomfile.txt" a tooltip with the text '".." is an invalid file name.' should be displayed on the webUI


  Scenario: Rename a file to .
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to "." using the webUI
    Then near file "randomfile.txt" a tooltip with the text '"." is an invalid file name.' should be displayed on the webUI


  Scenario: Rename a file to .part
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "randomfile.txt" to "randomfile.part" using the webUI
    Then near file "randomfile.txt" a tooltip with the text '"randomfile.part" has a forbidden file type/extension.' should be displayed on the webUI

  @files_sharing-app-required
  Scenario: rename a file on a public share
    Given user "Alice" has created folder "/FOLDER_TO_SHARE"
    And user "Alice" has uploaded file with content "some content" to "/FOLDER_TO_SHARE/randomfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has created a new public link for folder "FOLDER_TO_SHARE" using the webUI with
      | permission | read-write-folder |
    When the public accesses the last created public link using the webUI
    And the user renames file "randomfile.txt" to "a-renamed-file.txt" using the webUI
    Then file "a-renamed-file.txt" should be listed on the webUI
    But file "randomfile.txt" should not be listed on the webUI
    When the user reloads the current page of the webUI
    Then file "a-renamed-file.txt" should be listed on the webUI
    But file "randomfile.txt" should not be listed on the webUI
    And as "Alice" file "FOLDER_TO_SHARE/a-renamed-file.txt" should exist
    And as "Alice" file "FOLDER_TO_SHARE/randomfile.txt" should not exist


  Scenario: Rename a file with an emoji in the name
    Given user "Alice" has uploaded file with content "share photo with all" to "/skiing photos list.txt"
    And user "Alice" has logged in using the webUI
    When the user renames file "skiing photos list.txt" to "skiing ⛷ photos list.txt" using the webUI
    Then file "skiing ⛷ photos list.txt" should be listed on the webUI
    When the user reloads the current page of the webUI
    Then file "skiing ⛷ photos list.txt" should be listed on the webUI


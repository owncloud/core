@webUI @insulated @disablePreviews
Feature: rename folders
  As a user
  I want to rename folders
  So that I can organise my data structure

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: Rename a folder using special characters
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to <to_folder_name> using the webUI
    Then folder <to_folder_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then folder <to_folder_name> should be listed on the webUI
    Examples:
      | to_folder_name          |
      | 'सिमप्ले फोल्देर$%#?&@' |
      | '"quotes1"'             |
      | "'quotes2'"             |


  Scenario Outline: Rename a folder that has special characters in its name
    Given user "Alice" has created folder <from_name>
    And user "Alice" has logged in using the webUI
    When the user renames folder <from_name> to <to_name> using the webUI
    Then folder <to_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then folder <to_name> should be listed on the webUI
    Examples:
      | from_name               | to_name                     |
      | "strängé नेपाली folder" | "strängé नेपाली folder-#?2" |
      | "'single'quotes"        | "single-quotes"             |


  Scenario: Rename a folder using special characters and check its existence after page reload
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to "लोरेम।तयक्स्त $%&" using the webUI
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
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to " space at start" using the webUI
    And the user reloads the current page of the webUI
    Then folder "space at start" should be listed on the webUI
    When the user renames folder "space at start" to "space at end " using the webUI
    And the user reloads the current page of the webUI
    Then folder "space at end" should be listed on the webUI
    When the user renames folder "space at end" to "   multiple   spaces    all     over   " using the webUI
    And the user reloads the current page of the webUI
    Then folder "multiple   spaces    all     over" should be listed on the webUI


  Scenario: Rename a folder using both double and single quotes
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has logged in using the webUI
    When the user renames the following folder using the webUI
      | from-name-parts | to-name-parts         |
      | a-folder        | First 'single' quotes |
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
    Given user "Alice" has created folder "a-folder"
    And the administrator has updated system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to one of these names using the webUI
      | simple\folder        |
      | \\simple-folder      |
      | .htaccess            |
      | blacklisted-file.txt |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "a-folder" |
      | Could not rename "a-folder" |
      | Could not rename "a-folder" |
      | Could not rename "a-folder" |
    And folder "a-folder" should be listed on the webUI


  Scenario: Rename a folder putting a name of a file which already exists
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to "randomfile.txt" using the webUI
    Then near folder "a-folder" a tooltip with the text 'randomfile.txt already exists' should be displayed on the webUI


  Scenario: Rename a folder to ..
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to ".." using the webUI
    Then near folder "a-folder" a tooltip with the text '".." is an invalid file name.' should be displayed on the webUI


  Scenario: Rename a folder to .
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to "." using the webUI
    Then near folder "a-folder" a tooltip with the text '"." is an invalid file name.' should be displayed on the webUI


  Scenario: Rename a folder to .part
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to "a.part" using the webUI
    Then near folder "a-folder" a tooltip with the text '"a.part" has a forbidden file type/extension.' should be displayed on the webUI


  Scenario: Rename a folder which is received as a share (without change permission)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "RandomFolder"
    And user "Brian" has uploaded file with content "thisIsFileInsideFolder" to "/RandomFolder/newFile"
    And user "Brian" has shared folder "RandomFolder" with user "Alice" with permissions "read, share"
    And user "Alice" has logged in using the webUI
    When the user renames folder "RandomFolder" to "renamedFolder" using the webUI
    Then folder "renamedFolder" should be listed on the webUI
    When the user opens folder "/renamedFolder" using the webUI
    Then the option to rename file "newFile" should not be available on the webUI


  Scenario: Rename a folder which is received as a share (with change permission)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "RandomFolder"
    And user "Brian" has uploaded file with content "thisIsFileInsideFolder" to "/RandomFolder/newFile"
    And user "Brian" has shared folder "RandomFolder" with user "Alice" with permissions "read, share, change"
    And user "Alice" has logged in using the webUI
    When the user renames folder "RandomFolder" to "renamedFolder" using the webUI
    Then folder "renamedFolder" should be listed on the webUI
    But folder "RandomFolder" should not be listed on the webUI
    When the user opens folder "/renamedFolder" using the webUI
    Then the option to rename file "newFile" should be available on the webUI
    When the user renames file "newFile" to "renamedFile" using the webUI
    Then file "renamedFile" should be listed on the webUI
    But file "newFile" should not be listed on the webUI


  Scenario: Rename a folder with an emoji in the name
    Given user "Alice" has created the following folders
      | path           |
      | game day video |
      | skiing photos  |
    And user "Alice" has logged in using the webUI
    When the user renames folder "game day video" to "⛹ game day video" using the webUI
    And the user renames folder "skiing photos" to "skiing photos ⛷" using the webUI
    And the user reloads the current page of the webUI
    Then folder "⛹ game day video" should be listed on the webUI
    And folder "skiing photos ⛷" should be listed on the webUI



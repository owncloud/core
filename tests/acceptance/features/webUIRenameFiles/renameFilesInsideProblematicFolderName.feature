@webUI @insulated @disablePreviews
Feature: Renaming files inside a folder with problematic name
  As a user
  I want to rename a file
  So that I can recognize my file easily

  Background:
    Given user "user1" has been created
    And user "user1" has logged in using the webUI

  Scenario Outline: Rename the existing file inside a problematic folder
    When the user opens folder <folder> using the webUI
    And the user renames file "lorem.txt" to "???.txt" using the webUI
    Then file "???.txt" should be listed on the webUI
    When the user reloads the current page of the webUI
    Then file "???.txt" should be listed on the webUI
    Examples:
      | folder                  |
      | "0"                     |
      | "'single'quotes"        |
      | "strängé नेपाली folder" |
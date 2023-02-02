@webUI @insulated @disablePreviews @skipOnFIREFOX
Feature: users cannot rename a file to or into an excluded directory
  As an administrator
  I want to be able to exclude directories (folders) from being processed. Any attempt to rename a file to one of those names should be refused.
  So that I can have directories on my cloud server storage that are not available for syncing.

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


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

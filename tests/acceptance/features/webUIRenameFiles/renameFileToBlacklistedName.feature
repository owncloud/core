@webUI @insulated @disablePreviews @skipOnFIREFOX
Feature: users cannot rename a file to a blacklisted name
  As an administrator
  I want to be able to prevent users from renaming files to specified file names
  So that I can prevent unwanted file names existing in the cloud storage

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


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

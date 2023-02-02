@webUI @insulated @disablePreviews
Feature: users cannot rename a folder to a blacklisted name
  As an administrator
  I want to be able to prevent users from renaming folders to specified names
  So that I can prevent unwanted file names existing in the cloud storage

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario: Rename a folder to a foldername that matches (or not) blacklisted_files_regex
    Given user "Alice" has created folder "a-folder"
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    And the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    And user "Alice" has logged in using the webUI
    When the user renames folder "a-folder" to one of these names using the webUI
      | filename.ext                  |
      | bannedfilename.txt            |
      | this-ContainsBannedString.txt |
    Then notifications should be displayed on the webUI with the text
      | Could not rename "a-folder" |
      | Could not rename "a-folder" |
      | Could not rename "a-folder" |
    And folder "a-folder" should be listed on the webUI

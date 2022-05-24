@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Autocompletion of share-with names
  As a user
  I want to share files, with minimal typing, to the right people or groups
  So that I can efficiently share my files with other users or groups

  Background:
    Given these users have been created without skeleton files:
      | username               | password  | displayname     | email          |
      | autocomplete-test-user | %regular% | Thomas Krause   | ur@oc.net.np   |
      | jb1                    | %regular% | James Baker     | jb@oc.com.np   |
      | u444                   | %regular% | Four            | u4@oc.com.np   |
      | five                   | %regular% | User Five       | five@oc.net.np |
      | usersmith              | %regular% | John Finn Smith | js@oc.com.de   |
      | anne-smith             | %regular% | Anne Smith      | as@oc.com.au   |
    And user "autocomplete-test-user" has created folder "simple-folder"
    And these groups have been created:
      | groupname     |
      | finance1      |
      | finance2      |
      | finance3      |
      | users-finance |
      | other         |
    And the administrator has added system config key "user_ldap.enable_medial_search" with value "true" and type "boolean"

  Scenario: autocompletion of a pattern that matches regular existing users but also a user with whom the item is already shared (folder)
    Given user "autocomplete-test-user" has shared folder "simple-folder" with user "usersmith"
    And user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "user" in the share-with-field
    Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list on the webUI except user "John Finn Smith"
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "Four" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern that matches regular existing users but also a user with whom the item is already shared (file)
    Given user "autocomplete-test-user" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    And user "autocomplete-test-user" has shared file "data.zip" with user "usersmith"
    And user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "data.zip"
    When the user types "user" in the share-with-field
    Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list on the webUI except user "John Finn Smith"
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "Four" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern that matches regular existing groups but also a group with whom the item is already shared (folder)
    Given user "autocomplete-test-user" has shared folder "simple-folder" with group "finance1"
    And user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "fi" in the share-with-field
    Then all users and groups that contain the string "fi" in their name should be listed in the autocomplete list on the webUI except group "finance1"
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "Four" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern that matches regular existing groups but also a group with whom the item is already shared (file)
    Given user "autocomplete-test-user" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    And user "autocomplete-test-user" has shared file "data.zip" with group "finance1"
    And user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for file "data.zip"
    When the user types "fi" in the share-with-field
    Then all users and groups that contain the string "fi" in their name should be listed in the autocomplete list on the webUI except group "finance1"
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "Four" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the name of existing users contains the pattern somewhere in the middle
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "se" in the share-with-field
    Then all users and groups that contain the string "se" in their name should be listed in the autocomplete list on the webUI
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "Four" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the name of existing users contain the pattern at the end
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "ith" in the share-with-field
    Then all users and groups that contain the string "ith" in their name should be listed in the autocomplete list on the webUI
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "User Five" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the username of existing user contains the pattern somewhere in the middle
    Given user "ivan" has been created with default attributes and without skeleton files
    And user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "iv" in the share-with-field
    Then all users and groups that contain the string "iv" in their name should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the name of existing group contains the pattern somewhere in the middle
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "anc" in the share-with-field
    Then all users and groups that contain the string "finance" in their name should be listed in the autocomplete list on the webUI
    But group "other" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the username of the existing user contains the pattern somewhere in the end
    And user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "user" in the share-with-field
    Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the name of existing group contains the pattern at the end
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "ce2" in the share-with-field
    Then all users and groups that contain the string "ce2" in their name should be listed in the autocomplete list on the webUI
    But group "finance1" should not be listed in the autocomplete list on the webUI
    And group "finance3" should not be listed in the autocomplete list on the webUI
    And group "users-finance" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the name of existing user contains the pattern somewhere in the middle
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "finn" in the share-with-field
    Then only user "John Finn Smith" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the name of existing user contains the pattern somewhere at the end
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "baker" in the share-with-field
    Then only user "James Baker" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the email of the existing user contains the pattern somewhere at the beginning
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "ur" in the share-with-field
    Then only user "Four" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the email of the existing user contains the pattern somewhere at the middle
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "net" in the share-with-field
    Then only user "User Five" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the email of the existing user contains the pattern somewhere at the end
    Given user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "de" in the share-with-field
    Then only user "John Finn Smith" should be listed in the autocomplete list on the webUI

  @skipOnLDAP
  Scenario: autocompletion of a pattern where the name of existing group contains the pattern somewhere in the middle but group medial search is disabled
    Given these groups have been created:
      | groupname |
      | nanumber  |
    And user "autocomplete-test-user" has logged in using the webUI
    And the administrator has added system config key "groups.enable_medial_search" with value "false" and type "boolean"
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "nan" in the share-with-field
    Then all users and groups that contain the string "nanumber" in their name should be listed in the autocomplete list on the webUI
    But group "finance1" should not be listed in the autocomplete list on the webUI
    And group "finance2" should not be listed in the autocomplete list on the webUI
    And group "users-finance" should not be listed in the autocomplete list on the webUI

  @skipOnLDAP
  Scenario: autocompletion of a pattern where the name of existing group contains the pattern somewhere in the end but group medial search is disabled
    Given these groups have been created:
      | groupname         |
      | ncell-customers   |
      | customers-finance |
    And user "autocomplete-test-user" has logged in using the webUI
    And the administrator has added system config key "groups.enable_medial_search" with value "false" and type "boolean"
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "customers" in the share-with-field
    Then all users and groups that contain the string "customers-finance" in their name should be listed in the autocomplete list on the webUI
    And group "ncell-customers" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the user name contains the pattern somewhere in the middle but accounts medial search is disabled
    Given these users have been created without skeleton files and not initialized:
      | username | displayname |
      | ivan     | Ivan        |
    And user "autocomplete-test-user" has logged in using the webUI
    And the administrator has added system config key "accounts.enable_medial_search" with value "false" and type "boolean"
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "iv" in the share-with-field
    Then only user "Ivan" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the user name contains the pattern somewhere in the end but accounts medial search is disabled
    Given these users have been created without skeleton files and not initialized:
      | username              | displayname |
      | autocomplete-test-jb1 | Guest User  |
    And user "autocomplete-test-user" has logged in using the webUI
    And the administrator has added system config key "accounts.enable_medial_search" with value "false" and type "boolean"
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "jb1" in the share-with-field
    Then only user "James Baker" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the name of existing user contains the pattern somewhere in the middle but accounts medial search is disabled
    Given these users have been created without skeleton files and not initialized:
      | username | displayname   |
      | someone  | finnance typo |
    And user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the administrator has added system config key "accounts.enable_medial_search" with value "false" and type "boolean"
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "finn" in the share-with-field
    Then only user "finnance typo" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the display name of existing user contains the pattern somewhere in the end but accounts medial search is disabled
    Given these users have been created without skeleton files and not initialized:
      | username | displayname |
      | someone  | Smith User  |
    And user "autocomplete-test-user" has logged in using the webUI
    And the administrator has added system config key "accounts.enable_medial_search" with value "false" and type "boolean"
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "smith" in the share-with-field
    Then only user "Smith User" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the email of the existing user contains the pattern somewhere at the beginning but accounts medial search is disabled
    Given these users have been created without skeleton files and not initialized:
      | username | displayname | email              |
      | someone  | Some One    | hello2js@oc.com.np |
    And user "autocomplete-test-user" has logged in using the webUI
    And the administrator has added system config key "accounts.enable_medial_search" with value "false" and type "boolean"
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "js" in the share-with-field
    Then only user "John Finn Smith" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the email of the existing user contains the pattern somewhere at the middle but accounts medial search is disabled
    Given these users have been created without skeleton files and not initialized:
      | username | displayname | email         |
      | someone  | Some One    | net@oc.com.np |
    And user "autocomplete-test-user" has logged in using the webUI
    And the administrator has added system config key "accounts.enable_medial_search" with value "false" and type "boolean"
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "net" in the share-with-field
    Then only user "Some One" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern where the email of the existing user contains the pattern somewhere at the end but accounts medial search is disabled
    Given these users have been created without skeleton files and not initialized:
      | username | displayname | email        |
      | someone  | Some One    | de@oc.com.np |
    And user "autocomplete-test-user" has logged in using the webUI
    And the administrator has added system config key "accounts.enable_medial_search" with value "false" and type "boolean"
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "de" in the share-with-field
    Then only user "Some One" should be listed in the autocomplete list on the webUI

  Scenario: autocompletion of a pattern when admin disables username autocompletion in share dialog
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    And user "autocomplete-test-user" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "user" in the share-with-field
    Then a tooltip with the text "No users or groups found for user" should be shown near the share-with-field on the webUI
    And the autocomplete list should not be displayed on the webUI

  Scenario: autocompletion of pattern when user disables and then enables autocompletion in sharing dialog
    Given user "anne-smith" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    When the user disables allow finding you via autocomplete in share dialog
    And the user enables allow finding you via autocomplete in share dialog
    And the user re-logs in as "autocomplete-test-user" using the webUI
    And the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user types "anne" in the share-with-field
    Then user "Anne Smith" should be listed in the autocomplete list on the webUI

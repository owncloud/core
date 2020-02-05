@webUI @insulated @disablePreviews @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: Autocompletion of share-with names
  As a user
  I want to share files, with minimal typing, to the right people or groups
  So that I can efficiently share my files with other users or groups

  Background:
    # Users that are in the special known users already
    Given these users have been created with default attributes and skeleton files but not initialized:
      | username    |
      | user1       |
      | regularuser |
    # Users that are in the special known users already without skeleton files
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user3    |
      | usergrp  |
    # Some extra users without skeleton files to make the share autocompletion interesting
    And these users have been created without skeleton files:
      | username  | password  | displayname     | email          |
      | two       | %regular% | User Two        | u2@oc.com.np   |
      | u444      | %regular% | Four            | u3@oc.com.np   |
      | five      | %regular% | User Group      | five@oc.net.np |
      | usersmith | %regular% | John Finn Smith | js@oc.com.de   |
    And these groups have been created:
      | groupname     |
      | finance1      |
      | finance2      |
      | finance3      |
      | users-finance |
      | other         |
    And the administrator has added system config key "user_ldap.enable_medial_search" with value "true" and type "boolean"

  @smokeTest
  Scenario: autocompletion of regular existing users
    Given user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "us" in the share-with-field
    Then all users and groups that contain the string "us" in their name should be listed in the autocomplete list on the webUI
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "Four" should not be listed in the autocomplete list on the webUI

  @smokeTest
  Scenario: autocompletion of regular existing groups
    Given user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "fi" in the share-with-field
    Then all users and groups that contain the string "fi" in their name should be listed in the autocomplete list on the webUI
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "other" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion for a pattern that does not match any user or group
    Given user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "doesnotexist" in the share-with-field
    Then a tooltip with the text "No users or groups found for doesnotexist" should be shown near the share-with-field on the webUI
    And the autocomplete list should not be displayed on the webUI

  Scenario: autocomplete short user/display names when completely typed
    Given the administrator has set the minimum characters for sharing autocomplete to "4"
    And user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And these users have been created with skeleton files but not initialized:
      | username | password | displayname | email        |
      | use      | %alt1%   | Use         | uz@oc.com.np |
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "Use" in the share-with-field
    Then only user "Use" should be listed in the autocomplete list on the webUI
    And user "User Two" should not be listed in the autocomplete list on the webUI

  Scenario: autocomplete short group names when completely typed
    Given the administrator has set the minimum characters for sharing autocomplete to "3"
    And these groups have been created:
      | groupname |
      | fi        |
    And user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "fi" in the share-with-field
    Then only group "fi" should be listed in the autocomplete list on the webUI
    And user "finance1" should not be listed in the autocomplete list on the webUI

  Scenario: autocompletion when minimum characters is the default (2) and not enough characters are typed
    Given user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "u" in the share-with-field
    Then a tooltip with the text "No users or groups found for u. Please enter at least 2 characters for suggestions" should be shown near the share-with-field on the webUI
    And the autocomplete list should not be displayed on the webUI

  Scenario: autocompletion when minimum characters is increased and not enough characters are typed
    Given the administrator has set the minimum characters for sharing autocomplete to "4"
    And user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "use" in the share-with-field
    Then a tooltip with the text "No users or groups found for use. Please enter at least 4 characters for suggestions" should be shown near the share-with-field on the webUI
    And the autocomplete list should not be displayed on the webUI

  Scenario: autocompletion when increasing the minimum characters for sharing autocomplete
    Given the administrator has set the minimum characters for sharing autocomplete to "3"
    And user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "use" in the share-with-field
    Then all users and groups that contain the string "use" in their name should be listed in the autocomplete list on the webUI
    And the users own name should not be listed in the autocomplete list on the webUI
    And user "Four" should not be listed in the autocomplete list on the webUI

  Scenario: allow user to disable autocomplete in sharing dialog
    Given user "regularuser" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    When the user disables allow finding you via autocomplete in share dialog
    And the user re-logs in as "user1" using the webUI
    And the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user types "reg" in the share-with-field
    Then user "Regular User" should not be listed in the autocomplete list on the webUI

  Scenario: user disables autocomplete in sharing dialog but the sharer types full username
    Given user "regularuser" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    When the user disables allow finding you via autocomplete in share dialog
    And the user re-logs in as "user1" using the webUI
    And the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user types "regularuser" in the share-with-field
    Then user "Regular User" should be listed in the autocomplete list on the webUI

  Scenario: user disables autocomplete in sharing dialog but the sharer types full display name
    Given user "regularuser" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    When the user disables allow finding you via autocomplete in share dialog
    And the user re-logs in as "user1" using the webUI
    And the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user types "Regular User" in the share-with-field
    Then user "Regular User" should be listed in the autocomplete list on the webUI

  Scenario: allow user to enable autocomplete in sharing dialog
    Given user "regularuser" has logged in using the webUI
    And the user has browsed to the personal sharing settings page
    When the user enables allow finding you via autocomplete in share dialog
    And the user re-logs in as "user1" using the webUI
    And the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user types "reg" in the share-with-field
    Then user "Regular User" should be listed in the autocomplete list on the webUI
    And the users own name should not be listed in the autocomplete list on the webUI

  Scenario: admin disables share dialog user enumeration
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    And user "regularuser" has logged in using the webUI
    When the user browses to the personal sharing settings page
    Then allow finding you via autocomplete checkbox should not be displayed on the personal sharing settings page

  Scenario: admin disables share dialog user enumeration and types full user name of user in sharing dialog
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    And user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "user1" in the share-with-field
    Then user "User One" should be listed in the autocomplete list on the webUI

  Scenario: admin disables share dialog user enumeration and types full display name of user in sharing dialog
    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
    And user "regularuser" has logged in using the webUI
    And the user has browsed to the files page
    And the user has opened the share dialog for folder "simple-folder"
    When the user types "User One" in the share-with-field
    Then user "User One" should be listed in the autocomplete list on the webUI

@webUI @insulated @disablePreviews @systemtags-app-required
Feature: Removal of already existing tags from files and folders
  As a user
  I want to remove tags from files and folders
  So that I can properly organize my filing system

  Background:
    Given these users have been created with default attributes:
      | username |
      | user1    |
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%alt1%" using the webUI

  Scenario: Remove a tag that already exists for a file in a folder
    Given the user has browsed directly to display the details of file "lorem.txt" in folder "simple-folder"
    And the user has added a tag "lorem" to the file using the webUI
    When the user browses directly to display the details of file "lorem.txt" in folder "simple-folder"
    And the user toggles a tag "lorem" on the file using the webUI
    Then file "simple-folder/lorem.txt" should have no tags for user "user1"



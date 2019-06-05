@webUI @insulated @disablePreviews @systemtags-app-required
Feature: Edit tags for files and folders
  As a user
  I want to edit tags for files/folders
  So that I can find them easily

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%alt1%" using the webUI

  Scenario: Change the name of a tag that already exists for a file
    Given the user has created a "normal" tag with name "lorem"
    And the user has added tag "lorem" to file "lorem.txt"
    When the user browses directly to display the details of file "lorem.txt" in folder "/"
    And the user edits the tag with name "lorem" and sets its name to "lorem-big" using the webUI
    Then file "lorem.txt" should have the following tags for user "user1"
      | lorem-big  | normal |
    And tag "lorem" should not exist for the user

  Scenario: Change the name of multiple tags that exist for a file
    Given the user has created a "normal" tag with name "lorem"
    And the user has created a "normal" tag with name "some-tag"
    And the user has added tag "lorem" to file "lorem.txt"
    And the user has added tag "some-tag" to file "lorem.txt"
    When the user browses directly to display the details of file "lorem.txt" in folder "/"
    And the user edits the tag with name "lorem" and sets its name to "lorem-big" using the webUI
    And the user edits the tag with name "some-tag" and sets its name to "another-tag" using the webUI
    Then file "lorem.txt" should have the following tags for user "user1"
      |  lorem-big  | normal |
      | another-tag | normal |
    And tag "lorem" should not exist for the user
    And tag "some-tag" should not exist for the user
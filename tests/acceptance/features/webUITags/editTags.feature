@webUI @insulated @disablePreviews @systemtags-app-required
Feature: Edit tags for files and folders
  As a user
  I want to edit tags for files/folders
  So that I can find them easily

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has logged in using the webUI

  @files_sharing-app-required
  Scenario: Change the name of a tag that already exists for a file
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user edits the tag with name "random" and sets its name to "random-big" using the webUI
    Then file "randomfile.txt" should have the following tags for user "Alice"
      | name       | type   |
      | random-big | normal |
    And tag "random" should not exist for the user

  @files_sharing-app-required
  Scenario: Change the name of multiple tags that exist for a file
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "some-tag"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "some-tag" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user edits the tag with name "random" and sets its name to "random-big" using the webUI
    And the user edits the tag with name "some-tag" and sets its name to "another-tag" using the webUI
    Then file "randomfile.txt" should have the following tags for user "Alice"
      | name        | type   |
      | random-big  | normal |
      | another-tag | normal |
    And tag "random" should not exist for the user
    And tag "some-tag" should not exist for the user

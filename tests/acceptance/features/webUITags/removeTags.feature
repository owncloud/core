@webUI @insulated @disablePreviews @systemtags-app-required
Feature: Removal of already existing tags from files and folders
  As a user
  I want to remove tags from files and folders
  So that I can properly organize my filing system

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And user "Alice" has logged in using the webUI


  Scenario: Remove a tag that already exists for a file in a folder
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has uploaded file with content "some content" to "/a-folder/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "a-folder/randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "a-folder"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user toggles a tag "random" on the file using the webUI
    Then file "a-folder/randomfile.txt" should have no tags for user "Alice"


  Scenario: Remove a tag that already exists for a file in the root
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user toggles a tag "random" on the file using the webUI
    Then file "randomfile.txt" should have no tags for user "Alice"


  Scenario: Remove all tags that already exist for a file
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "Confidential"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "Confidential" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user toggles a tag "random" on the file using the webUI
    And the user toggles a tag "Confidential" on the file using the webUI
    Then file "randomfile.txt" should have no tags for user "Alice"

  @files_sharing-app-required
  Scenario: Shared user removes a tag in shared file
    Given user "Brian" has been created with default attributes and without skeleton files
    And the user has created a "normal" tag with name "tag1"
    And user "Alice" has uploaded file with content "does-not-matter" to "/coolnewfile.txt"
    And the user has added tag "tag1" to file "coolnewfile.txt"
    And the user has shared file "coolnewfile.txt" with user "Brian"
    When the user re-logs in as "Brian" using the webUI
    Then file "coolnewfile.txt" should have the following tags for user "Brian"
      | name | type   |
      | tag1 | normal |
    When the user browses directly to display the details of file "coolnewfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user toggles a tag "tag1" on the file using the webUI
    Then file "coolnewfile.txt" should have no tags for user "Brian"
    And file "coolnewfile.txt" should have no tags for user "Alice"

  @files_sharing-app-required
  Scenario: Sharer removes a tag in shared file
    Given user "Brian" has been created with default attributes and without skeleton files
    And the user has created a "normal" tag with name "tag1"
    And user "Alice" has uploaded file with content "does-not-matter" to "/coolnewfile.txt"
    And the user has added tag "tag1" to file "coolnewfile.txt"
    And the user has shared file "coolnewfile.txt" with user "Brian"
    When the user re-logs in as "Brian" using the webUI
    Then file "coolnewfile.txt" should have the following tags for user "Brian"
      | name | type   |
      | tag1 | normal |
    When the user re-logs in with username "Alice" using the webUI
    And the user browses directly to display the details of file "coolnewfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user toggles a tag "tag1" on the file using the webUI
    Then file "coolnewfile.txt" should have no tags for user "Brian"
    And file "coolnewfile.txt" should have no tags for user "Alice"


  Scenario: Remove multiple tags that exist for a file
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "Confidential"
    And the user has created a "normal" tag with name "some-tag"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "Confidential" to file "randomfile.txt"
    And the user has added tag "some-tag" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user toggles a tag "random" on the file using the webUI
    And the user toggles a tag "Confidential" on the file using the webUI
    Then file "randomfile.txt" should have the following tags for user "Alice"
      | name     | type   |
      | some-tag | normal |


  Scenario: Remove a tag from a file and assign another tag
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user toggles a tag "random" on the file using the webUI
    And the user adds a tag "some-tag" to the file using the webUI
    Then file "randomfile.txt" should have the following tags for user "Alice"
      | name     | type   |
      | some-tag | normal |

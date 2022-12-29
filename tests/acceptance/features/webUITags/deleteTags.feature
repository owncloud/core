@webUI @insulated @disablePreviews @systemtags-app-required
Feature: Deletion of existing tags from files and folders
  As a user
  I want to delete tags from files and folders
  So that I can keep my filing system clean and tidy

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And user "Alice" has logged in using the webUI

  @skipOnFIREFOX @files_sharing-app-required
  Scenario: Delete a tag in a shared file
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user browses directly to display the details of file "randomfile.txt" in folder ""
    And the user has switched to the "tags" tab in the details panel using the webUI
    When the user adds a tag "tag1" to the file using the webUI
    And the user shares file "randomfile.txt" with user "Brian" using the webUI
    And the user re-logs in with username "Brian" using the webUI
    Then file "randomfile.txt" should have the following tags for user "Brian"
      | name | type   |
      | tag1 | normal |
    When the user browses directly to display the details of file "randomfile.txt" in folder ""
    And the user switches to the "tags" tab in the details panel using the webUI
    And the user deletes tag with name "tag1" using the webUI
    Then tag "tag1" should not exist for user "Alice"
    And tag "tag1" should not exist for user "Brian"


  Scenario: Delete a tag that already exists for a file in the root
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user switches to the "tags" tab in the details panel using the webUI
    Then file "randomfile.txt" should have the following tags for user "Alice"
      | name   | type   |
      | random | normal |
    When the user deletes tag with name "random" using the webUI
    Then tag "random" should not exist for user "Alice"


  Scenario: Delete a tag that already exists for a file in a folder
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has uploaded file with content "some content" to "/a-folder/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "a-folder/randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "a-folder"
    And the user switches to the "tags" tab in the details panel using the webUI
    Then file "a-folder/randomfile.txt" should have the following tags for user "Alice"
      | name   | type   |
      | random | normal |
    When the user deletes tag with name "random" using the webUI
    Then tag "random" should not exist for user "Alice"


  Scenario: Delete a tag that exists for multiple file
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has created folder "a-folder"
    And user "Alice" has uploaded file with content "another content" to "/a-folder/randomfile.txt"
    And user "Alice" has uploaded file with content "more content" to "/randomfile-big.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "random" to file "randomfile-big.txt"
    And the user has browsed directly to display the details of file "randomfile.txt" in folder "a-folder"
    And the user has switched to the "tags" tab in the details panel using the webUI
    When the user deletes tag with name "random" using the webUI
    Then tag "random" should not exist for user "Alice"


  Scenario: Delete all tags that exist for a file
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "Confidential"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "Confidential" to file "randomfile.txt"
    And the user has browsed directly to display the details of file "randomfile.txt" in folder "/"
    And the user has switched to the "tags" tab in the details panel using the webUI
    When the user deletes tag with name "random" using the webUI
    And the user deletes tag with name "Confidential" using the webUI
    Then file "randomfile.txt" should have no tags for user "Alice"


  Scenario: Delete multiple tags that exist for a file
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "Confidential"
    And the user has created a "normal" tag with name "some-tag"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "Confidential" to file "randomfile.txt"
    And the user has added tag "some-tag" to file "randomfile.txt"
    And the user has browsed directly to display the details of file "randomfile.txt" in folder "/"
    And the user has switched to the "tags" tab in the details panel using the webUI
    When the user deletes tag with name "random" using the webUI
    And the user deletes tag with name "Confidential" using the webUI
    Then tag "random" should not exist for user "Alice"
    And tag "Confidential" should not exist for user "Alice"
    And file "/randomfile.txt" should have the following tags for user "Alice"
      | name     | type   |
      | some-tag | normal |

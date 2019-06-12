@webUI @insulated @disablePreviews @systemtags-app-required
Feature: Deletion of existing tags from files and folders
  As a user
  I want to delete tags from files and folders
  So that I can keep my filing system clean and tidy

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%alt1%" using the webUI

@skipOnFIREFOX
  Scenario: Delete a tag in a shared file
    Given user "user2" has been created with default attributes and without skeleton files
    And user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And the user browses directly to display the details of file "randomfile.txt" in folder ""
    When the user adds a tag "tag1" to the file using the webUI
    And the user shares file "randomfile.txt" with user "User Two" using the webUI
    And the user re-logs in with username "user2" and password "%alt2%" using the webUI
    Then file "randomfile.txt" should have the following tags for user "user2"
    | tag1 | normal |
    When the user browses directly to display the details of file "randomfile.txt" in folder ""
    And the user deletes tag with name "tag1" using the webUI
    Then tag "tag1" should not exist for user "user1"
    And tag "tag1" should not exist for user "user2"

  Scenario: Delete a tag that already exists for a file in the root
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    Then file "randomfile.txt" should have the following tags for user "user1"
      | random | normal |
    When the user deletes tag with name "random" using the webUI
    Then tag "random" should not exist for user "user1"

  Scenario: Delete a tag that already exists for a file in a folder
    Given user "user1" has created folder "a-folder"
    And user "user1" has uploaded file with content "some content" to "/a-folder/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "a-folder/randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "a-folder"
    Then file "a-folder/randomfile.txt" should have the following tags for user "user1"
      | random | normal |
    When the user deletes tag with name "random" using the webUI
    Then tag "random" should not exist for user "user1"

  Scenario: Delete a tag that exists for multiple file
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And user "user1" has created folder "a-folder"
    And user "user1" has uploaded file with content "another content" to "/a-folder/randomfile.txt"
    And user "user1" has uploaded file with content "more content" to "/randomfile-big.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "random" to file "randomfile-big.txt"
    And the user has browsed directly to display the details of file "randomfile.txt" in folder "a-folder"
    When the user deletes tag with name "random" using the webUI
    Then tag "random" should not exist for user "user1"

  Scenario: Delete all tags that exist for a file
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "Confidential"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "Confidential" to file "randomfile.txt"
    And the user has browsed directly to display the details of file "randomfile.txt" in folder "/"
    When the user deletes tag with name "random" using the webUI
    And the user deletes tag with name "Confidential" using the webUI
    Then file "randomfile.txt" should have no tags for user "user1"

  Scenario: Delete multiple tags that exist for a file
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "Confidential"
    And the user has created a "normal" tag with name "some-tag"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "Confidential" to file "randomfile.txt"
    And the user has added tag "some-tag" to file "randomfile.txt"
    And the user has browsed directly to display the details of file "randomfile.txt" in folder "/"
    When the user deletes tag with name "random" using the webUI
    And the user deletes tag with name "Confidential" using the webUI
    Then tag "random" should not exist for user "user1"
    And tag "Confidential" should not exist for user "user1"
    And file "/randomfile.txt" should have the following tags for user "user1"
      | some-tag | normal |


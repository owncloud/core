@webUI @insulated @disablePreviews @systemtags-app-required
Feature: Removal of already existing tags from files and folders
  As a user
  I want to remove tags from files and folders
  So that I can properly organize my filing system

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%alt1%" using the webUI

  Scenario: Remove a tag that already exists for a file in a folder
    Given user "user1" has created folder "a-folder"
    And user "user1" has uploaded file with content "some content" to "/a-folder/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "a-folder/randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "a-folder"
    And the user toggles a tag "random" on the file using the webUI
    Then file "a-folder/randomfile.txt" should have no tags for user "user1"

  Scenario: Remove a tag that already exists for a file in the root
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user toggles a tag "random" on the file using the webUI
    Then file "randomfile.txt" should have no tags for user "user1"

  Scenario: Remove all tags that already exist for a file
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "Confidential"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "Confidential" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user toggles a tag "random" on the file using the webUI
    And the user toggles a tag "Confidential" on the file using the webUI
    Then file "randomfile.txt" should have no tags for user "user1"

  Scenario: Shared user removes a tag in shared file
    Given user "user2" has been created with default attributes and without skeleton files
    And the user has created a "normal" tag with name "tag1"
    And user "user1" has uploaded file with content "does-not-matter" to "/coolnewfile.txt"
    And the user has added tag "tag1" to file "coolnewfile.txt"
    And the user has shared file "coolnewfile.txt" with user "user2"
    When the user re-logs in as "user2" using the webUI
    Then file "coolnewfile.txt" should have the following tags for user "user2"
      | tag1 | normal |
    When the user browses directly to display the details of file "coolnewfile.txt" in folder "/"
    And the user toggles a tag "tag1" on the file using the webUI
    Then file "coolnewfile.txt" should have no tags for user "user2"
    And file "coolnewfile.txt" should have no tags for user "user1"

  Scenario: Sharer removes a tag in shared file
    Given user "user2" has been created with default attributes and without skeleton files
    And the user has created a "normal" tag with name "tag1"
    And user "user1" has uploaded file with content "does-not-matter" to "/coolnewfile.txt"
    And the user has added tag "tag1" to file "coolnewfile.txt"
    And the user has shared file "coolnewfile.txt" with user "user2"
    When the user re-logs in as "user2" using the webUI
    Then file "coolnewfile.txt" should have the following tags for user "user2"
      | tag1 | normal |
    When the user re-logs in with username "user1" and password "%alt1%" using the webUI
    And the user browses directly to display the details of file "coolnewfile.txt" in folder "/"
    And the user toggles a tag "tag1" on the file using the webUI
    Then file "coolnewfile.txt" should have no tags for user "user2"
    And file "coolnewfile.txt" should have no tags for user "user1"

  Scenario: Remove multiple tags that exist for a file
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has created a "normal" tag with name "Confidential"
    And the user has created a "normal" tag with name "some-tag"
    And the user has added tag "random" to file "randomfile.txt"
    And the user has added tag "Confidential" to file "randomfile.txt"
    And the user has added tag "some-tag" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user toggles a tag "random" on the file using the webUI
    And the user toggles a tag "Confidential" on the file using the webUI
    Then file "randomfile.txt" should have the following tags for user "user1"
      | some-tag | normal |

  Scenario: Remove a tag from a file and assign another tag
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And the user has created a "normal" tag with name "random"
    And the user has added tag "random" to file "randomfile.txt"
    When the user browses directly to display the details of file "randomfile.txt" in folder "/"
    And the user toggles a tag "random" on the file using the webUI
    And the user adds a tag "some-tag" to the file using the webUI
    Then file "randomfile.txt" should have the following tags for user "user1"
      | some-tag | normal |
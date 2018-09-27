@webUI @insulated @systemtags-app-required
Feature: Creation of tags for the files and folders
  As a user
  I want to create tags for the files/folders
  So that I can find them easily

  Background:
    Given these users have been created:
      | username |
      | user1    |
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%alt1%" using the webUI

  Scenario: Create a new tag that does not exist for a file in the root
    When the user browses directly to display the details of file "lorem.txt" in folder "/"
    And the user adds a tag "Top Secret" to the file using the webUI
    And the user adds a tag "Confidential" to the file using the webUI
    Then file "/lorem.txt" should have the following tags for user "user1"
      | Top Secret   | normal |
      | Confidential | normal |

  Scenario: Create a new tag that does not exist for a file in a folder
    When the user browses directly to display the details of file "lorem.txt" in folder "simple-folder"
    And the user adds a tag "Top Secret" to the file using the webUI
    And the user adds a tag "Top" to the file using the webUI
    Then file "simple-folder/lorem.txt" should have the following tags for user "user1"
      | Top Secret | normal |
      | Top        | normal |

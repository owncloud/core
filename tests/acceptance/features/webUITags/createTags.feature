@webUI @insulated @systemtags-app-required
Feature: Creation of tags for the files and folders
  As a user
  I want to create tags for the files/folders
  So that I can find them easily

  Background:
    Given these users have been created with default attributes:
      | username |
      | user1    |
      | user2    |
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

  Scenario: Add a new tag that already exists for a file in a folder
    Given the user has browsed directly to display the details of file "lorem.txt" in folder "simple-folder"
    And the user has added a tag "lorem" to the file using the webUI
    When the user browses directly to display the details of file "lorem-big.txt" in folder "simple-folder"
    And the user adds a tag "lorem" to the file using the webUI
    Then file "simple-folder/lorem.txt" should have the following tags for user "user1"
      | lorem | normal |
    And file "simple-folder/lorem-big.txt" should have the following tags for user "user1"
      | lorem | normal |

  Scenario: Remove a tag that already exists for a file in a folder
    Given the user has browsed directly to display the details of file "lorem.txt" in folder "simple-folder"
    And the user has added a tag "lorem" to the file using the webUI
    When the user browses directly to display the details of file "lorem.txt" in folder "simple-folder"
    And the user toggles a tag "lorem" on the file using the webUI
    Then file "simple-folder/lorem.txt" should have no tags for user "user1"

  @skipOnFIREFOX
  Scenario: Create and add tag on a shared file
    When the user renames file "lorem.txt" to "coolnewfile.txt" using the webUI
    And the user browses directly to display the details of file "coolnewfile.txt" in folder ""
    And the user adds a tag "tag1" to the file using the webUI
    And the user shares file "coolnewfile.txt" with user "User Two" using the webUI
    And the user re-logs in with username "user2" and password "%alt2%" using the webUI
    And the user browses directly to display the details of file "coolnewfile.txt" in folder ""
    And the user adds a tag "tag2" to the file using the webUI
    Then file "coolnewfile.txt" should have the following tags for user "user1"
      | tag1 | normal |
      | tag2 | normal |
    And file "coolnewfile.txt" should have the following tags for user "user2"
      | tag1 | normal |
      | tag2 | normal |

  @skipOnFIREFOX
  Scenario: Delete a tag in a shared file
    When the user renames file "lorem.txt" to "coolnewfile.txt" using the webUI
    And the user browses directly to display the details of file "coolnewfile.txt" in folder ""
    And the user adds a tag "tag1" to the file using the webUI
    And the user shares file "coolnewfile.txt" with user "User Two" using the webUI
    And the user re-logs in with username "user2" and password "%alt2%" using the webUI
    Then file "coolnewfile.txt" should have the following tags for user "user2"
      | tag1 | normal |
    When the user browses directly to display the details of file "coolnewfile.txt" in folder ""
    And the user deletes tag with name "tag1" using the webUI
    Then tag "tag1" should not exist for user "user1"
    And tag "tag1" should not exist for user "user2"

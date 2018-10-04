@webUI @insulated @disablePreviews
Feature: deleting files and folders
  As a user
  I want to delete files and folders
  So that I can keep my filing system clean and tidy

  Background:
    Given these users have been created:
      | username |
      | user1    |
      | user2    |
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  @smokeTest
  Scenario: Delete files & folders one by one and check its existence after page reload
    When the user deletes the following elements using the webUI
      | name                                  |
      | simple-folder                         |
      | lorem.txt                             |
      | strängé नेपाली folder                 |
      | strängé filename (duplicate #2 &).txt |
    Then the deleted elements should not be listed on the webUI
    And the deleted elements should not be listed on the webUI after a page reload

  Scenario: Delete a file with problematic characters
    When the user renames the following file using the webUI
      | from-name-parts | to-name-parts   |
      | lorem.txt       | 'single'        |
      |                 | "double" quotes |
      |                 | question?       |
      |                 | &and#hash       |
    And the user reloads the current page of the webUI
    Then the following file should be listed on the webUI
      | name-parts      |
      | 'single'        |
      | "double" quotes |
      | question?       |
      | &and#hash       |
    And the user deletes the following file using the webUI
      | name-parts      |
      | 'single'        |
      | "double" quotes |
      | question?       |
      | &and#hash       |
    Then the following file should not be listed on the webUI
      | name-parts      |
      | 'single'        |
      | "double" quotes |
      | question?       |
      | &and#hash       |
    When the user reloads the current page of the webUI
    Then the following file should not be listed on the webUI
      | name-parts      |
      | 'single'        |
      | "double" quotes |
      | question?       |
      | &and#hash       |

  @smokeTest
  Scenario: Delete multiple files at once
    When the user batch deletes these files using the webUI
      | name          |
      | data.zip      |
      | lorem.txt     |
      | simple-folder |
    Then the deleted elements should not be listed on the webUI
    And the deleted elements should not be listed on the webUI after a page reload

  Scenario: Delete all files at once
    When the user marks all files for batch action using the webUI
    And the user batch deletes the marked files using the webUI
    Then the folder should be empty on the webUI
    And the folder should be empty on the webUI after a page reload

  Scenario: Delete all except for a few files at once
    When the user marks all files for batch action using the webUI
    And the user unmarks these files for batch action using the webUI
      | name          |
      | lorem.txt     |
      | simple-folder |
    And the user batch deletes the marked files using the webUI
    Then the folder "simple-folder" should be listed on the webUI
    And the file "lorem.txt" should be listed on the webUI
		# Check just an example of a file that should not exist any more
    But the file "data.zip" should not be listed on the webUI

  Scenario: Delete an empty folder
    When the user creates a folder with the name "my-empty-folder" using the webUI
    And the user creates a folder with the name "my-other-empty-folder" using the webUI
    And the user deletes the folder "my-empty-folder" using the webUI
    Then the folder "my-other-empty-folder" should be listed on the webUI
    But the folder "my-empty-folder" should not be listed on the webUI

  Scenario: Delete the last file in a folder
    When the user deletes the file "zzzz-must-be-last-file-in-folder.txt" using the webUI
    Then the file "zzzz-must-be-last-file-in-folder.txt" should not be listed on the webUI

  Scenario: delete files from shared with others page
    Given the user has shared the file "lorem.txt" with the user "User Two" using the webUI
    And the user has shared the folder "simple-folder" with the user "User Two" using the webUI
    And the user has browsed to the shared-with-others page
    When the user deletes the file "lorem.txt" using the webUI
    And the user deletes the folder "simple-folder" using the webUI
    Then the file "lorem.txt" should not be listed on the webUI
    And the folder "simple-folder" should not be listed on the webUI
    When the user browses to the files page
    Then the file "lorem.txt" should not be listed on the webUI
    And the folder "simple-folder" should not be listed on the webUI

  Scenario: delete files from shared by link page
    Given the user has created a new public link for the file "lorem.txt" using the webUI
    And the user has browsed to the shared-by-link page
    Then the file "lorem.txt" should be listed on the webUI
    When the user deletes the file "lorem.txt" using the webUI
    Then the file "lorem.txt" should not be listed on the webUI
    When the user browses to the files page
    Then the file "lorem.txt" should not be listed on the webUI

  @systemtags-app-required
  Scenario: delete files from tags page
    Given user "user1" has created a "normal" tag with name "lorem"
    And user "user1" has added the tag "lorem" to "/lorem.txt"
    When the user browses to the tags page
    And the user searches for tag "lorem" using the webUI
    Then the file "lorem.txt" should be listed on the webUI
    When the user deletes the file "lorem.txt" using the webUI
    Then the file "lorem.txt" should not be listed on the webUI
    When the user browses to the files page
    Then the file "lorem.txt" should not be listed on the webUI
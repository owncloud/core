@insulated
Feature: files and folders exist in the trashbin after being deleted
  As a user
  I want deleted files and folders to be available in the trashbin
  So that I can recover data easily

  Background:
    Given a regular user exists
    And I am logged in as a regular user
    And I am on the files page

  Scenario: Delete files & folders one by one and check that they are all in the trashbin
    When I delete the elements
      | name                                |
      | simple-folder                       |
      | lorem.txt                           |
      | strängé नेपाली folder                  |
      | strängé filename (duplicate #2 &).txt |
    Then the deleted elements should be listed in the trashbin
    And the file "lorem.txt" should be listed in the trashbin folder "simple-folder"

  Scenario: Delete a file with problematic characters and check it is in the trashbin
    When I rename the following file to
      | from-name-parts | to-name-parts   |
      | lorem.txt       | 'single'        |
      |                 | "double" quotes |
      |                 | question?       |
      |                 | &and#hash       |
    And I delete the following file
      | name-parts      |
      | 'single'        |
      | "double" quotes |
      | question?       |
      | &and#hash       |
    Then the following file should be listed in the trashbin
      | name-parts      |
      | 'single'        |
      | "double" quotes |
      | question?       |
      | &and#hash       |

  Scenario: Delete multiple files at once and check that they are all in the trashbin
    When I batch delete these files
      | name          |
      | data.zip      |
      | lorem.txt     |
      | simple-folder |
    Then the deleted elements should be listed in the trashbin
    And the file "lorem.txt" should be listed in the trashbin folder "simple-folder"

  Scenario: Delete an empty folder and check it is in the trashbin
    When I create a folder with the name "my-empty-folder"
    And I create a folder with the name "my-other-empty-folder"
    And I delete the folder "my-empty-folder"
    Then the folder "my-empty-folder" should be listed in the trashbin
    But the folder "my-other-empty-folder" should not be listed in the trashbin
    When I open the trashbin folder "my-empty-folder"
    Then there are no files/folders listed

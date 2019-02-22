@webUI @insulated @disablePreviews @files_trashbin-app-required
Feature: files and folders exist in the trashbin after being deleted
  As a user
  I want deleted files and folders to be available in the trashbin
  So that I can recover data easily

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  @smokeTest
  Scenario: Delete files & folders one by one and check that they are all in the trashbin
    When the user deletes the following elements using the webUI
      | name                                  |
      | simple-folder                         |
      | lorem.txt                             |
      | strängé नेपाली folder                 |
      | strängé filename (duplicate #2 &).txt |
    Then as "user1" folder "simple-folder" should exist in trash
    And as "user1" file "lorem.txt" should exist in trash
    And as "user1" folder "strängé नेपाली folder" should exist in trash
    And as "user1" file "strängé filename (duplicate #2 &).txt" should exist in trash
    And the deleted elements should be listed in the trashbin on the webUI
    And file "lorem.txt" should be listed in the trashbin folder "simple-folder" on the webUI

  @skipOnFIREFOX
  Scenario: Delete a file with problematic characters and check it is in the trashbin
    When the user renames the following file using the webUI
      | from-name-parts | to-name-parts   |
      | lorem.txt       | 'single'        |
      |                 | "double" quotes |
      |                 | question?       |
      |                 | &and#hash       |
    And the user deletes the following file using the webUI
      | name-parts      |
      | 'single'        |
      | "double" quotes |
      | question?       |
      | &and#hash       |
    Then the following file should be listed in the trashbin on the webUI
      | name-parts      |
      | 'single'        |
      | "double" quotes |
      | question?       |
      | &and#hash       |

  @skipOnEncryption @encryption-issue-74
  Scenario: Delete multiple files at once and check that they are all in the trashbin
    When the user batch deletes these files using the webUI
      | name          |
      | data.zip      |
      | lorem.txt     |
      | simple-folder |
    Then as "user1" file "data.zip" should exist in trash
    And as "user1" file "lorem.txt" should exist in trash
    And as "user1" folder "simple-folder" should exist in trash
    And as "user1" file "simple-folder/lorem.txt" should exist in trash
    And the deleted elements should be listed in the trashbin on the webUI
    And file "lorem.txt" should be listed in the trashbin folder "simple-folder" on the webUI

  Scenario: Delete an empty folder and check it is in the trashbin
    When the user creates a folder with the name "my-empty-folder" using the webUI
    And the user creates a folder with the name "my-other-empty-folder" using the webUI
    And the user deletes folder "my-empty-folder" using the webUI
    Then as "user1" folder "my-empty-folder" should exist in trash
    But as "user1" the folder with original path "my-other-empty-folder" should not exist in trash
    And folder "my-empty-folder" should be listed in the trashbin on the webUI
    But folder "my-other-empty-folder" should not be listed in the trashbin on the webUI
    When the user opens trashbin folder "my-empty-folder" using the webUI
    Then there should be no files/folders listed on the webUI

  Scenario: Delete multiple file with same filename and check they are in the trashbin
    When the user deletes the following elements using the webUI
      | name      |
      | lorem.txt |
    And the user opens folder "simple-folder" using the webUI
    And the user deletes the following elements using the webUI
      | name      |
      | lorem.txt |
    And the user browses to the files page
    And the user opens folder "strängé नेपाली folder" using the webUI
    And the user deletes the following elements using the webUI
      | name      |
      | lorem.txt |
    Then as "user1" the file with original path "lorem.txt" should exist in trash
    And as "user1" the file with original path "simple-folder/lorem.txt" should exist in trash
    And as "user1" the file with original path "strängé नेपाली folder/lorem.txt" should exist in trash
    Then the deleted elements should be listed in the trashbin on the webUI
    And file "lorem.txt" with path "./lorem.txt" should be listed in the trashbin on the webUI
    And file "lorem.txt" with path "simple-folder/lorem.txt" should be listed in the trashbin on the webUI
    And file "lorem.txt" with path "strängé नेपाली folder/lorem.txt" should be listed in the trashbin on the webUI

@webUI @insulated @disablePreviews @files_trashbin-app-required
Feature: files and folders exist in the trashbin after being deleted
  As a user
  I want deleted files and folders to be available in the trashbin
  So that I can recover data easily

  Background:
    Given user "Alice" has been created with default attributes and large skeleton files
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: Delete files & folders one by one and check that they are all in the trashbin
    When the user deletes the following elements using the webUI
      | name                                  |
      | simple-folder                         |
      | lorem.txt                             |
      | strängé नेपाली folder                 |
      | strängé filename (duplicate #2 &).txt |
    Then as "Alice" folder "simple-folder" should exist in the trashbin
    And as "Alice" file "lorem.txt" should exist in the trashbin
    And as "Alice" folder "strängé नेपाली folder" should exist in the trashbin
    And as "Alice" file "strängé filename (duplicate #2 &).txt" should exist in the trashbin
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
    Then as "Alice" file "data.zip" should exist in the trashbin
    And as "Alice" file "lorem.txt" should exist in the trashbin
    And as "Alice" folder "simple-folder" should exist in the trashbin
    And as "Alice" file "simple-folder/lorem.txt" should exist in the trashbin
    And the deleted elements should be listed in the trashbin on the webUI
    And file "lorem.txt" should be listed in the trashbin folder "simple-folder" on the webUI


  Scenario: Delete an empty folder and check it is in the trashbin
    When the user creates a folder with the name "my-empty-folder" using the webUI
    And the user creates a folder with the name "my-other-empty-folder" using the webUI
    And the user deletes folder "my-empty-folder" using the webUI
    Then as "Alice" folder "my-empty-folder" should exist in the trashbin
    But as "Alice" the folder with original path "my-other-empty-folder" should not exist in the trashbin
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
    Then as "Alice" the file with original path "lorem.txt" should exist in the trashbin
    And as "Alice" the file with original path "simple-folder/lorem.txt" should exist in the trashbin
    And as "Alice" the file with original path "strängé नेपाली folder/lorem.txt" should exist in the trashbin
    And the deleted elements should be listed in the trashbin on the webUI
    And file "lorem.txt" with path "./lorem.txt" should be listed in the trashbin on the webUI
    And file "lorem.txt" with path "simple-folder/lorem.txt" should be listed in the trashbin on the webUI
    And file "lorem.txt" with path "strängé नेपाली folder/lorem.txt" should be listed in the trashbin on the webUI

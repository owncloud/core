@webUI @insulated @disablePreviews @files_trashbin-app-required
Feature: files and folders can be deleted from the trashbin
  As a user
  I want to delete files and folders from the trashbin
  So that I can control my trashbin space and which files are kept in that space

  Background:
    Given user "user1" has been created
    And user "user1" has logged in using the webUI
    And the following files have been deleted
      | name          |
      | data.zip      |
      | lorem.txt     |
      | lorem-big.txt |
      | simple-folder |
    And the user has browsed to the trashbin page

  @smokeTest
  Scenario: Delete files and check that they are gone
    When the user deletes file "lorem.txt" using the webUI
    And the user opens folder "simple-folder" using the webUI
    And the user deletes file "lorem-big.txt" using the webUI
    Then file "lorem.txt" should not be listed in the trashbin on the webUI
    But file "lorem.txt" should be listed in the trashbin folder "simple-folder" on the webUI
    And file "lorem-big.txt" should not be listed in the trashbin folder "simple-folder" on the webUI
    But file "lorem-big.txt" should be listed in the trashbin on the webUI

  Scenario: Delete folders and check that they are gone
    When the user deletes folder "simple-folder" using the webUI
    Then folder "simple-folder" should not be listed in the trashbin on the webUI

  Scenario: Select some files and delete from trashbin in a batch
    When the user batch deletes these files using the webUI
      | name          |
      | lorem.txt     |
      | lorem-big.txt |
    Then the deleted elements should not be listed on the webUI
    And the deleted elements should not be listed on the webUI after a page reload
    But file "data.zip" should be listed on the webUI
    And folder "simple-folder" should be listed on the webUI
    # make sure the delete button is not accidentally doing restore
    And file "lorem.txt" should not be listed in the files page on the webUI
    And file "lorem-big.txt" should not be listed in the files page on the webUI

  Scenario: Select all except for some files and delete from trashbin in a batch
    When the user marks all files for batch action using the webUI
    And the user unmarks these files for batch action using the webUI
      | name          |
      | lorem.txt     |
      | lorem-big.txt |
    And the user batch deletes the marked files using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem-big.txt" should be listed on the webUI
    But file "data.zip" should not be listed on the webUI
    And folder "simple-folder" should not be listed on the webUI

  Scenario: Select all files and delete from trashbin in a batch
    When the user marks all files for batch action using the webUI
    And the user batch deletes the marked files using the webUI
    Then the folder should be empty on the webUI

  Scenario: Select all files and delete from trashbin in a batch
    When the user marks all files for batch action using the webUI
    And the user batch deletes the marked files using the webUI
    Then the folder should be empty on the webUI

@webUI @insulated @disablePreviews
Feature: files and folders can be deleted from the trashbin
  As a user
  I want to delete files and folders from the trashbin
  So that I can control my trashbin space and which files are kept in that space

  Background:
    Given these users have been created:
      |username|password|displayname|email       |
      |user1   |1234    |User One   |u1@oc.com.np|
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "1234" using the webUI
    And the following files have been deleted
      | name          |
      | data.zip      |
      | lorem.txt     |
      | lorem-big.txt |
      | simple-folder |
    And the user has browsed to the trashbin page

  Scenario: Delete files and check that they are gone
    When the user deletes the file "lorem.txt" using the webUI
    And the user opens the folder "simple-folder" using the webUI
    And the user deletes the file "lorem-big.txt" using the webUI
    Then the file "lorem.txt" should not be listed in the trashbin on the webUI
    But the file "lorem.txt" should be listed in the trashbin folder "simple-folder" on the webUI
    And the file "lorem-big.txt" should not be listed in the trashbin folder "simple-folder" on the webUI
    But the file "lorem-big.txt" should be listed in the trashbin on the webUI

  Scenario: Delete folders and check that they are gone
    When the user deletes the folder "simple-folder" using the webUI
    Then the folder "simple-folder" should not be listed in the trashbin on the webUI

  Scenario: Select some files and delete from trashbin in a batch
    When the user batch deletes these files using the webUI
      | name          |
      | lorem.txt     |
      | lorem-big.txt |
    Then the deleted elements should not be listed on the webUI
    And the deleted elements should not be listed on the webUI after a page reload
    But the file "data.zip" should be listed on the webUI
    And the folder "simple-folder" should be listed on the webUI
    # make sure the delete button is not accidentally doing restore
    And the file "lorem.txt" should not be listed in the files page on the webUI
    And the file "lorem-big.txt" should not be listed in the files page on the webUI

  Scenario: Select all except for some files and delete from trashbin in a batch
    When the user marks all files for batch action using the webUI
    And the user unmarks these files for batch action using the webUI
      | name          |
      | lorem.txt     |
      | lorem-big.txt |
    And the user batch deletes the marked files using the webUI
    Then the file "lorem.txt" should be listed on the webUI
    And the file "lorem-big.txt" should be listed on the webUI
    But the file "data.zip" should not be listed on the webUI
    And the folder "simple-folder" should not be listed on the webUI

  Scenario: Select all files and delete from trashbin in a batch
    When the user marks all files for batch action using the webUI
    And the user batch deletes the marked files using the webUI
    Then the folder should be empty on the webUI

  Scenario: Select all files and delete from trashbin in a batch
    When the user marks all files for batch action using the webUI
    And the user batch deletes the marked files using the webUI
    Then the folder should be empty on the webUI

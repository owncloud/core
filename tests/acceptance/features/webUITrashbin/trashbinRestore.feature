@webUI @insulated @disablePreviews @files_trashbin-app-required
Feature: Restore deleted files/folders
  As a user
  I would like to restore files/folders
  So that I can recover accidentally deleted files/folders in ownCloud

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem-big.txt" to "/lorem-big.txt"
    And user "Alice" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: Restore files
    When the user deletes file "data.zip" using the webUI
    Then file "data.zip" should be listed in the trashbin on the webUI
    When the user restores file "data.zip" from the trashbin using the webUI
    Then file "data.zip" should not be listed on the webUI
    When the user browses to the files page
    Then file "data.zip" should be listed on the webUI


  Scenario: Restore folder
    When the user deletes folder "simple-folder" using the webUI
    Then folder "simple-folder" should be listed in the trashbin on the webUI
    When the user restores folder "simple-folder" from the trashbin using the webUI
    Then file "simple-folder" should not be listed on the webUI
    When the user browses to the files page
    Then folder "simple-folder" should be listed on the webUI

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: Select some trashbin files and restore them in a batch
    Given user "Alice" has deleted the following files
      | path          |
      | data.zip      |
      | lorem.txt     |
      | lorem-big.txt |
      | simple-folder |
    And the user has browsed to the trashbin page
    When the user marks these files for batch action using the webUI
      | name          |
      | lorem.txt     |
      | lorem-big.txt |
    And the user batch restores the marked files using the webUI
    Then file "data.zip" should be listed on the webUI
    And folder "simple-folder" should be listed on the webUI
    But file "lorem.txt" should not be listed on the webUI
    And file "lorem-big.txt" should not be listed on the webUI
    And file "lorem.txt" should be listed in the files page on the webUI
    And file "lorem-big.txt" should be listed in the files page on the webUI
    But file "data.zip" should not be listed in the files page on the webUI
    And folder "simple-folder" should not be listed in the files page on the webUI


  Scenario: Select all except for some trashbin files and restore them in a batch
    Given user "Alice" has deleted the following files
      | path          |
      | data.zip      |
      | lorem.txt     |
      | lorem-big.txt |
      | simple-folder |
    And the user has browsed to the trashbin page
    When the user marks all files for batch action using the webUI
    And the user unmarks these files for batch action using the webUI
      | name          |
      | lorem.txt     |
      | lorem-big.txt |
    And the user batch restores the marked files using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem-big.txt" should be listed on the webUI
    But file "data.zip" should not be listed on the webUI
    And folder "simple-folder" should not be listed on the webUI
    And file "data.zip" should be listed in the files page on the webUI
    And folder "simple-folder" should be listed in the files page on the webUI
    But file "lorem.txt" should not be listed in the files page on the webUI
    And file "lorem-big.txt" should not be listed in the files page on the webUI


  Scenario: Select all trashbin files and restore them in a batch
    Given user "Alice" has deleted the following files
      | path          |
      | data.zip      |
      | lorem.txt     |
      | lorem-big.txt |
      | simple-folder |
    And the user has browsed to the trashbin page
    And the user marks all files for batch action using the webUI
    And the user batch restores the marked files using the webUI
    Then the folder should be empty on the webUI
    When the user browses to the files page
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem-big.txt" should be listed on the webUI
    And file "data.zip" should be listed on the webUI
    And folder "simple-folder" should be listed on the webUI


  Scenario: Delete a file and then restore it when a file with the same name already exists
    Given the user has deleted file "lorem.txt"
    And user "Alice" has uploaded file with content "some content" to "/textfile0.txt"
    And user "Alice" has moved file "textfile0.txt" to "lorem.txt"
    And the user has browsed to the trashbin page
    Then folder "lorem.txt" should be listed in the trashbin on the webUI
    When the user restores file "lorem.txt" from the trashbin using the webUI
    Then file "lorem.txt" should not be listed on the webUI
    When the user browses to the files page
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem (restored).txt" should be listed on the webUI
    And the content of file "lorem.txt" for user "Alice" should be "some content"
    And the content of "lorem (restored).txt" should be the same as the local "lorem.txt"


  Scenario: delete a file inside a folder and then restore the file after the folder has been deleted
    Given user "Alice" has created folder "folder-to-delete"
    And user "Alice" has moved file "lorem.txt" to "folder-to-delete/file-to-delete.txt"
    And the user has deleted file "folder-to-delete/file-to-delete.txt"
    And the user has deleted folder "folder-to-delete"
    And the user has browsed to the trashbin page
    When the user restores file "file-to-delete.txt" from the trashbin using the webUI
    Then file "file-to-delete.txt" should not be listed on the webUI
    When the user browses to the files page
    Then file "file-to-delete.txt" should be listed on the webUI
    And folder "folder-to-delete" should not be listed on the webUI

@api
Feature: delete folder contents
  As a user
  I want to be able to delete all files and folders in a folder
  So that I can quickly remove unwanted data

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: Removing everything of a folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/PARENT/"
    And user "Alice" has created folder "/FOLDER/"
    And user "Alice" has created folder "/FOLDER/SUBFOLDER"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/textfile0.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/textfile1.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/FOLDER/fileToDelete.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/FOLDER/SUBFOLDER/textfile0.txt"
    When user "Alice" deletes everything from folder "/FOLDER/" using the WebDAV API
    Then the HTTP status code should be "204"
    And user "Alice" should see the following elements
      | /FOLDER/       |
      | /PARENT/       |
      | /textfile0.txt |
      | /textfile1.txt |
    And user "Alice" should not see the following elements
      | /FOLDER/SUBFOLDER/              |
      | /FOLDER/fileToDelete.txt        |
      | /FOLDER/SUBFOLDER/testfile0.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

@api @TestAlsoOnExternalUserBackend
Feature: delete folder contents
  As a user
  I want to be able to delete all files and folders in a folder
  So that I can quickly remove unwanted data

  Background:
    Given user "user0" has been created with default attributes and without skeleton files

  Scenario Outline: Removing everything of a folder
    Given using <dav_version> DAV path
    And user "user0" has created folder "/PARENT/"
    And user "user0" has created folder "/FOLDER/"
    And user "user0" has created folder "/FOLDER/SUBFOLDER"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/textfile0.txt"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/textfile1.txt"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/FOLDER/welcome.txt"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/FOLDER/SUBFOLDER/textfile0.txt"
    When user "user0" deletes everything from folder "/FOLDER/" using the WebDAV API
    Then user "user0" should see the following elements
      | /FOLDER/           |
      | /PARENT/           |
      | /textfile0.txt     |
      | /textfile1.txt     |
    And user "user0" should not see the following elements
      | /FOLDER/SUBFOLDER/              |
      | /FOLDER/welcome.txt             |
      | /FOLDER/SUBFOLDER/testfile0.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

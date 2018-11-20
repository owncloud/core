@api @TestAlsoOnExternalUserBackend
Feature: delete folder contents
  As a user
  I want to be able to delete all files and folders in a folder
  So that I can quickly remove unwanted data

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes

  Scenario Outline: Removing everything of a folder
    Given using <dav_version> DAV path
    And user "user0" has moved file "/welcome.txt" to "/FOLDER/welcome.txt"
    And user "user0" has created a folder "/FOLDER/SUBFOLDER"
    And user "user0" has copied file "/textfile0.txt" to "/FOLDER/SUBFOLDER/testfile0.txt"
    When user "user0" deletes everything from folder "/FOLDER/" using the WebDAV API
    Then user "user0" should see the following elements
      | /FOLDER/           |
      | /PARENT/           |
      | /PARENT/parent.txt |
      | /textfile0.txt     |
      | /textfile1.txt     |
      | /textfile2.txt     |
      | /textfile3.txt     |
      | /textfile4.txt     |
    And user "user0" should not see the following elements
      | /FOLDER/SUBFOLDER/              |
      | /FOLDER/welcome.txt             |
      | /FOLDER/SUBFOLDER/testfile0.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

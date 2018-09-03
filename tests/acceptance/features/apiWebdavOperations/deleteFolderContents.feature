@api @TestAlsoOnExternalUserBackend
Feature: delete folder contents
  As a user
  I want to be able to delete all files and folders in a folder
  So that I can quickly remove unwanted data

  Background:
    Given using OCS API version "1"
    And user "meta" has been created

  Scenario Outline: Removing everything of a folder
    Given using <dav_version> DAV path
    And user "meta" has moved file "/welcome.txt" to "/FOLDER/welcome.txt"
    And user "meta" has created a folder "/FOLDER/SUBFOLDER"
    And user "meta" has copied file "/textfile0.txt" to "/FOLDER/SUBFOLDER/testfile0.txt"
    When user "meta" deletes everything from folder "/FOLDER/" using the WebDAV API
    Then user "meta" should see the following elements
      | /FOLDER/           |
      | /PARENT/           |
      | /PARENT/parent.txt |
      | /textfile0.txt     |
      | /textfile1.txt     |
      | /textfile2.txt     |
      | /textfile3.txt     |
      | /textfile4.txt     |
    And user "meta" should not see the following elements
      | /FOLDER/SUBFOLDER/              |
      | /FOLDER/welcome.txt             |
      | /FOLDER/SUBFOLDER/testfile0.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

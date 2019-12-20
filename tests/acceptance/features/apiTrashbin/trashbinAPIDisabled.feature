@api @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: the trashbin API is not available when the tech preview setting is disabled
  As an administrator
  I want to be able to disable the tech preview of the trashbin API
  So that I can control the availability of APIs that are tech previews

  Background:
    Given the administrator has disabled DAV tech_preview

  @smokeTest
  Scenario: Attempting to empty the whole trashbin fails
    Given user "user0" has been created with default attributes and skeleton files
    And user "user0" has deleted file "/textfile0.txt"
    And user "user0" has deleted file "/textfile1.txt"
    When user "user0" empties the trashbin using the trashbin API
    Then the HTTP status code should be "404"
    And as "user0" the file with original path "/textfile0.txt" should exist in trash
    And as "user0" the file with original path "/textfile1.txt" should exist in trash

  Scenario: Attempting to delete a single file from the trashbin should fail
    Given user "user0" has been created with default attributes and skeleton files
    And user "user0" has deleted file "/textfile0.txt"
    And user "user0" has deleted file "/textfile1.txt"
    When user "user0" tries to delete the file with original path "textfile1.txt" from the trashbin using the trashbin API
    Then as "user0" the file with original path "/textfile0.txt" should exist in trash
    And as "user0" the file with original path "/textfile1.txt" should exist in trash

  Scenario: Attempting to restore a deleted file from the trashbin should fail
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has deleted file "/textfile0.txt"
    And as "user0" file "/textfile0.txt" should exist in trash
    When user "user0" tries to restore the file with original path "/textfile0.txt" using the trashbin API
    Then as "user0" the folder with original path "/textfile0.txt" should exist in trash
    And user "user0" should see the following elements
      | /FOLDER/           |
      | /PARENT/           |
      | /PARENT/parent.txt |
      | /textfile1.txt     |
      | /textfile2.txt     |
      | /textfile3.txt     |
      | /textfile4.txt     |
    But user "user0" should not see the following elements
      | /textfile0.txt |

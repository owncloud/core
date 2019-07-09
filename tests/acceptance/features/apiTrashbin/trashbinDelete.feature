@api @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: files and folders can be deleted from the trashbin
  As a user
  I want to delete files and folders from the trashbin
  So that I can control my trashbin space and which files are kept in that space

  Background:
    Given using OCS API version "1"
    And as the administrator

  @smokeTest
  Scenario Outline: Trashbin can be emptied
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And a new browser session for "user0" has been started
    And user "user0" has deleted file "/textfile0.txt"
    And user "user0" has deleted file "/textfile1.txt"
    And as "user0" file "/textfile0.txt" should exist in trash
    And as "user0" file "/textfile1.txt" should exist in trash
    When user "user0" empties the trashbin using the trashbin API
    Then as "user0" the file with original path "/textfile0.txt" should not exist in trash
    And as "user0" the file with original path "/textfile1.txt" should not exist in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

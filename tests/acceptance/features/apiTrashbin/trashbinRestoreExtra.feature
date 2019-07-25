@api @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: Restore deleted files/folders
  As a user
  I would like to restore files/folders
  So that I can recover accidentally deleted files/folders in ownCloud

  Background:
    Given using OCS API version "1"
    And as the administrator

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has uploaded file with content "file to delete" to "/textfile0.txt"
    And user "user0" has uploaded file with content "PARENT textfile0 content" to "/PARENT/textfile0.txt"
    And user "user0" has deleted file "/textfile0.txt"
    When user "user0" restores the file with original path "/textfile0.txt" to "/PARENT/textfile0.txt" using the trashbin API
    Then the HTTP status code should be "204"
    # Sometimes "/PARENT/textfile0.txt" is found in the trashbin. That is surprising.
    #And as "user0" the file with original path "/PARENT/textfile0.txt" should not exist in trash
    And as "user0" file "/PARENT/textfile0.txt" should exist
    # sometimes the restore does overwrite the existing file, but sometimes it does not. That is also surprising.
    And the content of file "/PARENT/textfile0.txt" for user "user0" if the file is also in the trashbin should be "file to delete" otherwise "PARENT textfile0 content"
    #And the content of file "/PARENT/textfile0.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | old      |
      | old      |
      | old      |
      | old      |
      | old      |
      | old      |
      | old      |
      | old      |
      | old      |
      | new      |
      | new      |
      | new      |
      | new      |
      | new      |
      | new      |
      | new      |
      | new      |
      | new      |
      | new      |

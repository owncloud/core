@api @files_trashbin-app-required @issue-ocis-reva-52
Feature: files and folders exist in the trashbin after being deleted
  As a user
  I want deleted files and folders to be available in the trashbin
  So that I can recover data easily

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "to delete" to "/textfile0.txt"

  # This scenario deletes many files as close together in time as the test can run.
  # On a very slow system, the file deletes might all happen in different seconds.
  # But on "reasonable" systems, some of the files will be deleted in the same second,
  # thus testing the required behavior.
  # Note: skipOnDbOracle because Oracle is slow and so "close together in time" does not really happen
  @issue-23151 @skipOnDbOracle
  Scenario Outline: trashbin can store two files with the same name but different origins when the files are deleted close together in time
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/folderA"
    And user "Alice" has created folder "/folderB"
    And user "Alice" has created folder "/folderC"
    And user "Alice" has created folder "/folderD"
    And user "Alice" has copied file "/textfile0.txt" to "/folderA/textfile0.txt"
    And user "Alice" has copied file "/textfile0.txt" to "/folderB/textfile0.txt"
    And user "Alice" has copied file "/textfile0.txt" to "/folderC/textfile0.txt"
    And user "Alice" has copied file "/textfile0.txt" to "/folderD/textfile0.txt"
    When user "Alice" deletes these files without delays using the WebDAV API
      | /textfile0.txt         |
      | /folderA/textfile0.txt |
      | /folderB/textfile0.txt |
      | /folderC/textfile0.txt |
      | /folderD/textfile0.txt |
    Then the HTTP status code of responses on all endpoints should be "204"
    # When issue-23151 is fixed, uncomment these lines. They should pass reliably.
    # These files may or may not exist in the trashbin
#    Then as "Alice" the folder with original path "/folderA/textfile0.txt" should not exist in the trashbin
#    And as "Alice" the folder with original path "/folderB/textfile0.txt" should not exist in the trashbin
#    And as "Alice" the folder with original path "/folderC/textfile0.txt" should not exist in the trashbin
#    And as "Alice" the folder with original path "/folderD/textfile0.txt" should not exist in the trashbin
    And as "Alice" the folder with original path "/textfile0.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | new      |

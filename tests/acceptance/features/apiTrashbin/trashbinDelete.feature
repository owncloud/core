@api @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: files and folders can be deleted from the trashbin
  As a user
  I want to delete files and folders from the trashbin
  So that I can control my trashbin space and which files are kept in that space

  Background:
    Given the administrator has enabled DAV tech_preview

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

  Scenario Outline: Try to get the list of files for the different user as admin
    Given using <dav-path> DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    When user "user0" deletes file "./textfile0.txt" using the WebDAV API
    And user "user0" deletes file "./textfile1.txt" using the WebDAV API
    Then as "user1" file "/textfile0.txt" should exist for user "user0" in trash
    And as "user1" file "/textfile1.txt" should exist for user "user0" in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario: delete a single file from the trashbin
      Given user "user0" has been created with default attributes and skeleton files
      And user "user0" has deleted file "/textfile0.txt"
      And user "user0" has deleted file "/textfile1.txt"
      And user "user0" has deleted file "/PARENT/parent.txt"
      And user "user0" has deleted file "/PARENT/CHILD/child.txt"
      When user "user0" deletes the file with original path "textfile1.txt" from the trashbin using the trashbin API
      Then the HTTP status code should be "204"
      And as "user0" the file with original path "/textfile1.txt" should not exist in trash
      But as "user0" the file with original path "/textfile0.txt" should exist in trash
      And as "user0" the file with original path "/PARENT/parent.txt" should exist in trash
      And as "user0" the file with original path "/PARENT/CHILD/child.txt" should exist in trash

    Scenario: delete multiple files from the trashbin and make sure the correct ones are gone
      Given user "user0" has been created with default attributes and skeleton files
      And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/textfile0.txt"
      And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/child.txt"
      And user "user0" has deleted file "/textfile0.txt"
      And user "user0" has deleted file "/textfile1.txt"
      And user "user0" has deleted file "/PARENT/parent.txt"
      And user "user0" has deleted file "/PARENT/child.txt"
      And user "user0" has deleted file "/PARENT/textfile0.txt"
      And user "user0" has deleted file "/PARENT/CHILD/child.txt"
      When user "user0" deletes the file with original path "/PARENT/textfile0.txt" from the trashbin using the trashbin API
      And user "user0" deletes the file with original path "/PARENT/CHILD/child.txt" from the trashbin using the trashbin API
      Then as "user0" the file with original path "/PARENT/textfile0.txt" should not exist in trash
      And as "user0" the file with original path "/PARENT/CHILD/child.txt" should not exist in trash
      But as "user0" the file with original path "/textfile0.txt" should exist in trash
      And as "user0" the file with original path "/PARENT/child.txt" should exist in trash

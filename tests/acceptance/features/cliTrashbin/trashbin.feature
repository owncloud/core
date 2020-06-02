@cli @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: files and folders can be deleted from the trashbin
  As an admin
  I want to delete files and folders from the trashbin
  So that I can control user trashbin space and which files are kept in that space

  Scenario: delete files and folder of a user from the trashbin
    Given user "Alice" has been created with default attributes and skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted folder "/PARENT"
    When the administrator empties the trashbin of user "Alice" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Remove deleted files of   %username%' about user "Alice"
    Then as "Alice" the file with original path "/textfile0.txt" should not exist in the trashbin
    And as "Alice" the file with original path "/textfile1.txt" should not exist in the trashbin
    And as "Alice" the folder with original path "/PARENT" should not exist in the trashbin

  Scenario: delete files and folder of all user from the trashbin
    Given user "Alice" has been created with default attributes and skeleton files
    And user "Brian" has been created with default attributes and skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Brian" has deleted file "/textfile1.txt"
    And user "Brian" has deleted folder "/PARENT"
    When the administrator empties the trashbin of all users using the occ command
    Then the command should have been successful
    And the command output should contain the text "Remove all deleted files"
    Then as "Alice" the file with original path "/textfile0.txt" should not exist in the trashbin
    And as "Brian" the file with original path "/textfile1.txt" should not exist in the trashbin
    And as "Brian" the folder with original path "/PARENT" should not exist in the trashbin
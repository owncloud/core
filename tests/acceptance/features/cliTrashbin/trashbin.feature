@cli @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: files and folders can be deleted from the trashbin
  As an admin
  I want to delete files and folders from the trashbin
  So that I can control user trashbin space and which files are kept in that space

  Scenario: delete files and folder of a user from the trashbin
    Given user "user0" has been created
    And user "user0" has deleted file "/textfile0.txt"
    And user "user0" has deleted file "/textfile1.txt"
    And user "user0" has deleted folder "/PARENT"
    When the administrator empties the trashbin of user "user0" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Remove deleted files of   user0'
    Then as "user0" the file with original path "/textfile0.txt" should not exist in trash
    And as "user0" the file with original path "/textfile1.txt" should not exist in trash
    And as "user0" the folder with original path "/PARENT" should not exist in trash

  Scenario: delete files and folder of all user from the trashbin
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has deleted file "/textfile0.txt"
    And user "user1" has deleted file "/textfile1.txt"
    And user "user1" has deleted folder "/PARENT"
    When the administrator empties the trashbin of all users using the occ command
    Then the command should have been successful
    And the command output should contain the text "Remove all deleted files"
    Then as "user0" the file with original path "/textfile0.txt" should not exist in trash
    And as "user1" the file with original path "/textfile1.txt" should not exist in trash
    And as "user1" the folder with original path "/PARENT" should not exist in trash
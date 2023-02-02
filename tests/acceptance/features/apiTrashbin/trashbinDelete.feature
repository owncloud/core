@api @files_trashbin-app-required @issue-ocis-reva-52
Feature: files and folders can be deleted from the trashbin
  As a user
  I want to delete files and folders from the trashbin
  So that I can control my trashbin space and which files are kept in that space

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "to delete" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "to delete" to "/textfile1.txt"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file with content "to delete" to "/PARENT/parent.txt"
    And user "Alice" has uploaded file with content "to delete" to "/PARENT/CHILD/child.txt"

  @smokeTest
  Scenario Outline: Trashbin can be emptied
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "file with comma" to "sample,0.txt"
    And user "Alice" has uploaded file with content "file with comma" to "sample,1.txt"
    And user "Alice" has deleted file "<filename1>"
    And user "Alice" has deleted file "<filename2>"
    When user "Alice" empties the trashbin using the trashbin API
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "<filename1>" should not exist in the trashbin
    And as "Alice" the file with original path "<filename2>" should not exist in the trashbin
    Examples:
      | dav-path | filename1     | filename2     |
      | new      | textfile0.txt | textfile1.txt |
      | new      | sample,0.txt  | sample,1.txt  |

  @smokeTest
  Scenario Outline: delete a single file from the trashbin
    Given using <dav-path> DAV path
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted file "/PARENT/parent.txt"
    And user "Alice" has deleted file "/PARENT/CHILD/child.txt"
    When user "Alice" deletes the file with original path "textfile1.txt" from the trashbin using the trashbin API
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "/textfile1.txt" should not exist in the trashbin
    But as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/parent.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | new      |

  @smokeTest
  Scenario Outline: delete multiple files from the trashbin and make sure the correct ones are gone
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/textfile0.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/child.txt"
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted file "/PARENT/parent.txt"
    And user "Alice" has deleted file "/PARENT/child.txt"
    And user "Alice" has deleted file "/PARENT/textfile0.txt"
    And user "Alice" has deleted file "/PARENT/CHILD/child.txt"
    When user "Alice" deletes the file with original path "/PARENT/textfile0.txt" from the trashbin using the trashbin API
    And user "Alice" deletes the file with original path "/PARENT/CHILD/child.txt" from the trashbin using the trashbin API
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the file with original path "/PARENT/textfile0.txt" should not exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should not exist in the trashbin
    But as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/child.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: User tries to delete another user's trashbin
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted file "/PARENT/parent.txt"
    And user "Alice" has deleted file "/PARENT/CHILD/child.txt"
    When user "Brian" tries to delete the file with original path "textfile1.txt" from the trashbin of user "Alice" using the trashbin API
    Then the HTTP status code should be "<status-code>"
    And as "Alice" the file with original path "/textfile1.txt" should exist in the trashbin
    And as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/parent.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should exist in the trashbin
    Examples:
      | dav-path | status-code |
      | new      | 401         |


  Scenario Outline: User tries to delete trashbin file using invalid password
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted file "/PARENT/parent.txt"
    And user "Alice" has deleted file "/PARENT/CHILD/child.txt"
    When user "Brian" tries to delete the file with original path "textfile1.txt" from the trashbin of user "Alice" using the password "invalid" and the trashbin API
    Then the HTTP status code should be "401"
    And as "Alice" the file with original path "/textfile1.txt" should exist in the trashbin
    And as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/parent.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: User tries to delete trashbin file using no password
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted file "/PARENT/parent.txt"
    And user "Alice" has deleted file "/PARENT/CHILD/child.txt"
    When user "Brian" tries to delete the file with original path "textfile1.txt" from the trashbin of user "Alice" using the password "" and the trashbin API
    Then the HTTP status code should be "401"
    And as "Alice" the file with original path "/textfile1.txt" should exist in the trashbin
    And as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/parent.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: delete a folder that contains a file from the trashbin
    Given using <dav-path> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created folder "FOLDER/CHILD"
    And user "Alice" has uploaded file with content "to delete" to "/FOLDER/parent.txt"
    And user "Alice" has uploaded file with content "to delete" to "/FOLDER/CHILD/child.txt"
    And user "Alice" has deleted folder "/PARENT"
    And user "Alice" has deleted folder "/FOLDER"
    When user "Alice" deletes the folder with original path "/PARENT" from the trashbin using the trashbin API
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "/PARENT/parent.txt" should not exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should not exist in the trashbin
    And as "Alice" the folder with original path "/PARENT/CHILD/" should not exist in the trashbin
    But as "Alice" the file with original path "/FOLDER/parent.txt" should exist in the trashbin
    And as "Alice" the file with original path "/FOLDER/CHILD/child.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: delete a subfolder from a deleted folder from the trashbin
    Given using <dav-path> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created folder "FOLDER/CHILD"
    And user "Alice" has uploaded file with content "to delete" to "/FOLDER/parent.txt"
    And user "Alice" has uploaded file with content "to delete" to "/FOLDER/CHILD/child.txt"
    And user "Alice" has deleted folder "/PARENT"
    And user "Alice" has deleted folder "/FOLDER"
    When user "Alice" deletes the folder with original path "/PARENT/CHILD" from the trashbin using the trashbin API
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should not exist in the trashbin
    And as "Alice" the folder with original path "/PARENT/CHILD/" should not exist in the trashbin
    But as "Alice" the file with original path "/PARENT/parent.txt" should exist in the trashbin
    But as "Alice" the file with original path "/FOLDER/parent.txt" should exist in the trashbin
    And as "Alice" the file with original path "/FOLDER/CHILD/child.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: delete files with special characters from the trashbin
    Given using <dav-path> DAV path
    And user "Alice" has uploaded the following files with content "special character file"
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    And user "Alice" has deleted the following files
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    When user "Alice" deletes the following files with original path from the trashbin
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the files with following original paths should not exist in the trashbin
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: delete folders with special characters from the trashbin
    Given using <dav-path> DAV path
    And user "Alice" has created the following folders
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    And user "Alice" has deleted the following folders
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    When user "Alice" deletes the following files with original path from the trashbin
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the folders with following original paths should not exist in the trashbin
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: delete folders with dot in the name from the trashbin
    Given using <dav-path> DAV path
    And user "Alice" has created the following folders
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    And user "Alice" has deleted the following folders
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    When user "Alice" deletes the following files with original path from the trashbin
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the folders with following original paths should not exist in the trashbin
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    Examples:
      | dav-path |
      | new      |

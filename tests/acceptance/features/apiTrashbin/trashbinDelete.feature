@api @files_trashbin-app-required @issue-ocis-reva-52
Feature: files and folders can be deleted from the trashbin
  As a user
  I want to delete files and folders from the trashbin
  So that I can control my trashbin space and which files are kept in that space

  Background:
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "to delete" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "to delete" to "/textfile1.txt"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file with content "to delete" to "/PARENT/parent.txt"
    And user "Alice" has uploaded file with content "to delete" to "/PARENT/CHILD/child.txt"

  @smokeTest
  Scenario Outline: Trashbin can be emptied
    Given user "Alice" has uploaded file with content "file with comma" to "sample,0.txt"
    And user "Alice" has uploaded file with content "file with comma" to "sample,1.txt"
    And using <dav-path> DAV path
    And user "Alice" has deleted file "<filename1>"
    And user "Alice" has deleted file "<filename2>"
    And as "Alice" file "<filename1>" should exist in the trashbin
    And as "Alice" file "<filename2>" should exist in the trashbin
    When user "Alice" empties the trashbin using the trashbin API
    Then as "Alice" the file with original path "<filename1>" should not exist in the trashbin
    And as "Alice" the file with original path "<filename2>" should not exist in the trashbin
    Examples:
      | dav-path | filename1     | filename2     |
      | old      | textfile0.txt | textfile1.txt |
      | new      | textfile0.txt | textfile1.txt |
      | old      | sample,0.txt  | sample,1.txt  |
      | new      | sample,0.txt  | sample,1.txt  |

  @smokeTest
  Scenario: delete a single file from the trashbin
    Given user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted file "/PARENT/parent.txt"
    And user "Alice" has deleted file "/PARENT/CHILD/child.txt"
    When user "Alice" deletes the file with original path "textfile1.txt" from the trashbin using the trashbin API
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "/textfile1.txt" should not exist in the trashbin
    But as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/parent.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should exist in the trashbin

  @smokeTest
  Scenario: delete multiple files from the trashbin and make sure the correct ones are gone
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/textfile0.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/child.txt"
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted file "/PARENT/parent.txt"
    And user "Alice" has deleted file "/PARENT/child.txt"
    And user "Alice" has deleted file "/PARENT/textfile0.txt"
    And user "Alice" has deleted file "/PARENT/CHILD/child.txt"
    When user "Alice" deletes the file with original path "/PARENT/textfile0.txt" from the trashbin using the trashbin API
    And user "Alice" deletes the file with original path "/PARENT/CHILD/child.txt" from the trashbin using the trashbin API
    Then as "Alice" the file with original path "/PARENT/textfile0.txt" should not exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should not exist in the trashbin
    But as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/child.txt" should exist in the trashbin

  @skipOnOcV10.3
  Scenario: User tries to delete another user's trashbin
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted file "/PARENT/parent.txt"
    And user "Alice" has deleted file "/PARENT/CHILD/child.txt"
    When user "Brian" tries to delete the file with original path "textfile1.txt" from the trashbin of user "Alice" using the trashbin API
    Then the HTTP status code should be "401"
    And as "Alice" the file with original path "/textfile1.txt" should exist in the trashbin
    And as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/parent.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/CHILD/child.txt" should exist in the trashbin

  Scenario: User tries to delete trashbin file using invalid password
    Given user "Brian" has been created with default attributes and without skeleton files
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

  Scenario: User tries to delete trashbin file using no password
    Given user "Brian" has been created with default attributes and without skeleton files
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

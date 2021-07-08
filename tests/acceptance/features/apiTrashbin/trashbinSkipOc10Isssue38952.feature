@api @files_trashbin-app-required @notToImplementOnOCIS @skipOnOcV10.6 @skipOnOcV10.7
Feature: files and folders can be deleted completely skipping the trashbin
  As an admin
  I want to configure some files to be deleted without the trashbin
  So that I can control my trashbin space and which files are kept in that space

  These scenarios demonstrate the unwanted behavior described in issue-38952.
  To fix the issue, delete these scenarios, and enable the corresponding good
  scenarios in trashbinSkip.feature. Then make those scenarios pass.

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"

  @issue-38952
  Scenario Outline: Skip trashbin based on extensions when deleting the parent folder
    Given the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
      | php       |
      | go        |
    And user "Alice" has uploaded file with content "sample delete file 1" to "PARENT/sample.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/sample.dat"
    And user "Alice" has uploaded file with content "sample delete file 3" to "PARENT/sample.php"
    And user "Alice" has uploaded file with content "sample delete file 4" to "PARENT/sample.go"
    And user "Alice" has uploaded file with content "sample delete file 5" to "PARENT/sample.py"
    And using <dav-path> DAV path
    When user "Alice" deletes folder "PARENT" using the WebDAV API
    Then as "Alice" the file with original path "PARENT/sample.txt" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.py" should exist in the trashbin
    #But as "Alice" the file with original path "PARENT/sample.dat" should not exist in the trashbin
    #And as "Alice" the file with original path "PARENT/sample.php" should not exist in the trashbin
    #And as "Alice" the file with original path "PARENT/sample.go" should not exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.dat" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.php" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.go" should exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

  @issue-38952
  Scenario Outline: Skip file from trashbin based on size threshold when deleting the parent folder
    Given the administrator has set the trashbin skip size threshold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "PARENT/lorem.txt"
    And user "Alice" has uploaded file with content "sample delete file" to "PARENT/lorem.dat"
    When user "Alice" deletes folder "PARENT" using the WebDAV API
    Then as "Alice" the file with original path "PARENT/lorem.txt" should exist in the trashbin
    #But as "Alice" the file with original path "PARENT/lorem.dat" should not exist in the trashbin
    And as "Alice" the file with original path "PARENT/lorem.dat" should exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

@api @files_trashbin-app-required @notToImplementOnOCIS
Feature: files and folders can be deleted completely skipping the trashbin
  As an admin
  I want to configure some files to be deleted without the trashbin
  So that I can control my trashbin space and which files are kept in that space

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "lorem-folder"

  Scenario Outline: Skip trashbin based on extensions
    Given the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
      | php       |
      | go        |
    And user "Alice" has uploaded file with content "sample delete file 1" to "sample.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "sample.dat"
    And user "Alice" has uploaded file with content "sample delete file 3" to "sample.php"
    And user "Alice" has uploaded file with content "sample delete file 4" to "sample.go"
    And user "Alice" has uploaded file with content "sample delete file 5" to "sample.py"
    And using <dav-path> DAV path
    When user "Alice" deletes the following files
      | path       |
      | sample.txt |
      | sample.dat |
      | sample.php |
      | sample.go  |
      | sample.py  |
    Then as "Alice" file "sample.txt" should exist in the trashbin
    And as "Alice" file "sample.py" should exist in the trashbin
    But as "Alice" the file with original path "/sample.dat" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.php" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.go" should not exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Skip trashbin based on directory
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory     |
      | PARENT        |
      | simple-folder |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 1" to "sample.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/sample.dat"
    And user "Alice" has uploaded file with content "sample delete file 3" to "simple-folder/sample.php"
    And user "Alice" has uploaded file with content "sample delete file 4" to "simple-folder/sample.go"
    And user "Alice" has uploaded file with content "sample delete file 5" to "lorem-folder/sample.py"
    When user "Alice" deletes the following files
      | path                     |
      | sample.txt               |
      | PARENT/sample.dat        |
      | simple-folder/sample.php |
      | simple-folder/sample.go  |
      | lorem-folder/sample.py   |
    Then as "Alice" the file with original path "sample.txt" should exist in the trashbin
    And as "Alice" the file with original path "lorem-folder/sample.py" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.dat" should not exist in the trashbin
    But as "Alice" the file with original path "simple-folder/sample.php" should not exist in the trashbin
    And as "Alice" the file with original path "simple-folder/sample.go" should not exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Delete a folder skipped from trashbin
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory |
      | PARENT    |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/sample.dat"
    When user "Alice" deletes file "PARENT/sample.dat" using the WebDAV API
    Then as "Alice" the file with original path "PARENT" should not exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.dat" should not exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Delete a file with same name as folder skipped from trashbin
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory |
      | skipFile  |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 2" to "skipFile"
    When user "Alice" deletes file "skipFile" using the WebDAV API
    Then as "Alice" the file with original path "skipFile" should exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Delete a file from a folder skipped from trashbin but different case
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory |
      | parent    |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/lorem.txt"
    When user "Alice" deletes file "PARENT/lorem.txt" using the WebDAV API
    Then as "Alice" the file with original path "PARENT/lorem.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Skip file from trashbin base on size threshhold
    Given the administrator has set the trashbin skip size threshhold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "lorem.txt"
    And user "Alice" has uploaded file with content "sample delete file" to "lorem.dat"
    When user "Alice" deletes file "lorem.txt" using the WebDAV API
    And user "Alice" deletes file "lorem.dat" using the WebDAV API
    Then as "Alice" the file with original path "lorem.txt" should exist in the trashbin
    But as "Alice" the file with original path "lorem.dat" should not exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Delete files when multiple skip trashbin rules are set
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory |
      | PARENT    |
    And the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
    And the administrator has set the trashbin skip size threshhold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "sample.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/sample.dat"
    And user "Alice" has uploaded file with content "sample delete file 3" to "simple-folder/sample.php"
    And user "Alice" has uploaded file with content "sample" to "lorem-folder/sample.go"
    And user "Alice" has uploaded file with content "sample delete file 5" to "lorem-folder/sample.py"
    When user "Alice" deletes the following files
      | path                     |
      | sample.txt               |
      | PARENT/sample.dat        |
      | simple-folder/sample.php |
      | lorem-folder/sample.go   |
      | lorem-folder/sample.py   |
    Then as "Alice" the file with original path "sample.txt" should exist in the trashbin
    And as "Alice" the file with original path "lorem-folder/sample.go" should exist in the trashbin
    But as "Alice" the file with original path "lorem-folder/sample.py" should not exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.dat" should not exist in the trashbin
    And as "Alice" the file with original path "simple-folder/sample.php" should not exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |

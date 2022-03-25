@api @files_trashbin-app-required @notToImplementOnOCIS @skipOnOcV10.6 @skipOnOcV10.7
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
    And using <dav-path> DAV path
    And user "Alice" has uploaded the following files
      | path       | content              |
      | sample.txt | sample delete file 1 |
      | sample.dat | sample delete file 2 |
      | sample.php | sample delete file 3 |
      | sample.go  | sample delete file 4 |
      | sample.py  | sample delete file 5 |
    When user "Alice" deletes the following files
      | path       |
      | sample.txt |
      | sample.dat |
      | sample.php |
      | sample.go  |
      | sample.py  |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" file "sample.txt" should exist in the trashbin
    And as "Alice" file "sample.py" should exist in the trashbin
    But as "Alice" the files with following original paths should not exist in the trashbin
      | path       |
      | sample.dat |
      | sample.php |
      | sample.go  |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Skip trashbin based on extensions - file in a folder
    Given the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
      | php       |
      | go        |
    And using <dav-path> DAV path
    And user "Alice" has uploaded the following files
      | path               | content              |
      | /PARENT/sample.txt | sample delete file 1 |
      | /PARENT/sample.dat | sample delete file 2 |
      | /PARENT/sample.php | sample delete file 3 |
      | /PARENT/sample.go  | sample delete file 4 |
      | /PARENT/sample.py  | sample delete file 5 |
    When user "Alice" deletes the following files
      | path              |
      | PARENT/sample.txt |
      | PARENT/sample.dat |
      | PARENT/sample.php |
      | PARENT/sample.go  |
      | PARENT/sample.py  |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the folders with following original paths should exist in the trashbin
      | path               |
      | /PARENT/sample.txt |
      | /PARENT/sample.py  |
    But as "Alice" the files with following original paths should not exist in the trashbin
      | path               |
      | /PARENT/sample.dat |
      | /PARENT/sample.php |
      | /PARENT/sample.go  |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Skip trashbin based on extensions - match is case-insensitive
    Given the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
      | php       |
      | go        |
    And using <dav-path> DAV path
    And user "Alice" has uploaded the following files
      | path       | content              |
      | sample.txt | sample delete file 1 |
      | sample.dat | sample delete file 2 |
      | sample.php | sample delete file 3 |
      | sample.go  | sample delete file 4 |
      | sample.py  | sample delete file 5 |
      | sample.TXT | sample delete file 1 |
      | sample.DAT | sample delete file 2 |
      | sample.PHP | sample delete file 3 |
      | sample.GO  | sample delete file 4 |
      | sample.PY  | sample delete file 5 |
    When user "Alice" deletes the following files
      | path       |
      | sample.TXT |
      | sample.txt |
      | sample.DAT |
      | sample.dat |
      | sample.PHP |
      | sample.php |
      | sample.GO  |
      | sample.go  |
      | sample.PY  |
      | sample.py  |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the files with following original paths should exist in the trashbin
      | path       |
      | sample.txt |
      | sample.TXT |
      | sample.py  |
      | sample.PY  |
    But as "Alice" the files with following original paths should not exist in the trashbin
      | path       |
      | sample.dat |
      | sample.php |
      | sample.go  |
      | sample.DAT |
      | sample.PHP |
      | sample.GO  |
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Skip trashbin based on extensions when deleting the parent folder - skip-by-extension rules should not be applied
    Given the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
      | php       |
      | go        |
    And using <dav-path> DAV path
    And user "Alice" has uploaded the following files
      | path               | content              |
      | /PARENT/sample.txt | sample delete file 1 |
      | /PARENT/sample.dat | sample delete file 2 |
      | /PARENT/sample.php | sample delete file 3 |
      | /PARENT/sample.go  | sample delete file 4 |
      | /PARENT/sample.py  | sample delete file 5 |
    When user "Alice" deletes folder "PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" the folders with following original paths should exist in the trashbin
      | path               |
      | /PARENT/sample.txt |
      | /PARENT/sample.dat |
      | /PARENT/sample.php |
      | /PARENT/sample.go  |
      | /PARENT/sample.py  |
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
    And user "Alice" has uploaded the following files
      | path                      | content              |
      | /sample.txt               | sample delete file 1 |
      | /PARENT/sample.dat        | sample delete file 2 |
      | /simple-folder/sample.php | sample delete file 3 |
      | /simple-folder/sample.go  | sample delete file 4 |
      | /lorem-folder/sample.py   | sample delete file 5 |
    When user "Alice" deletes the following files
      | path                     |
      | sample.txt               |
      | PARENT/sample.dat        |
      | simple-folder/sample.php |
      | simple-folder/sample.go  |
      | lorem-folder/sample.py   |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the files with following original paths should exist in the trashbin
      | path       |
      | sample.txt |
      | lorem-folder/sample.py |
    But as "Alice" the files with following original paths should not exist in the trashbin
      | path                     |
      | PARENT/sample.dat        |
      | simple-folder/sample.php |
      | simple-folder/sample.go  |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Skip trashbin based on directory should match only the root folder name
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory     |
      | simple-folder |
    And using <dav-path> DAV path
    And user "Alice" has created folder "PARENT/simple-folder"
    And user "Alice" has uploaded the following files
      | path                          | content              |
      | /PARENT/p.txt                 | sample delete file 1 |
      | /PARENT/simple-folder/sub.txt | sample delete file 2 |
      | /simple-folder/s.txt          | sample delete file 3 |
    When user "Alice" deletes the following files
      | path          |
      | PARENT        |
      | simple-folder |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the folders with following original paths should exist in the trashbin
      | path                         |
      | PARENT/p.txt                 |
      | PARENT/simple-folder/sub.txt |
    But as "Alice" the file with original path "simple-folder/s.txt" should not exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Delete a file in a folder skipped from trashbin
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory |
      | PARENT    |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/sample.dat"
    When user "Alice" deletes file "PARENT/sample.dat" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" the folders with following original paths should not exist in the trashbin
      | path              |
      | PARENT            |
      | PARENT/sample.dat |
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
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "skipFile" should exist in the trashbin
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
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "PARENT/lorem.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Skip file from trashbin based on size threshold
    Given the administrator has set the trashbin skip size threshold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "lorem.txt"
    And user "Alice" has uploaded file with content "sample delete file" to "lorem.dat"
    When user "Alice" deletes the following files
      | path      |
      | lorem.txt |
      | lorem.dat |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the file with original path "lorem.txt" should exist in the trashbin
    But as "Alice" the file with original path "lorem.dat" should not exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Skip file from trashbin based on size threshold - file in a folder
    Given the administrator has set the trashbin skip size threshold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "PARENT/lorem.txt"
    And user "Alice" has uploaded file with content "sample delete file" to "PARENT/lorem.dat"
    When user "Alice" deletes the following files
      | path             |
      | PARENT/lorem.txt |
      | PARENT/lorem.dat |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the file with original path "PARENT/lorem.txt" should exist in the trashbin
    But as "Alice" the file with original path "PARENT/lorem.dat" should not exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Skip file from trashbin based on size threshold when deleting the parent folder - skip-by-size rules should not be applied
    Given the administrator has set the trashbin skip size threshold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "PARENT/lorem.txt"
    And user "Alice" has uploaded file with content "sample delete file" to "PARENT/lorem.dat"
    When user "Alice" deletes folder "PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" the files with following original paths should exist in the trashbin
      | path             |
      | PARENT/lorem.txt |
      | PARENT/lorem.dat |
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
    And the administrator has set the trashbin skip size threshold to "20"
    And using <dav-path> DAV path
    # files that match none of the skip trashbin rules
    And user "Alice" has uploaded file with content "sample" to "sample.txt"
    And user "Alice" has uploaded file with content "sample" to "lorem-folder/sample.go"
    # files that match just the "extension" skip trashbin rule
    And user "Alice" has uploaded file with content "sample delete 1" to "sample.dat"
    And user "Alice" has uploaded file with content "sample delete 3" to "lorem-folder/sample.dat"
    # files that match just the "directory" skip trashbin rule
    And user "Alice" has uploaded file with content "sample delete 2" to "PARENT/sample.txt"
    # files that match just the "size threshold" skip trashbin rule
    And user "Alice" has uploaded file with content "sample delete file long 2" to "simple-folder/sample.php"
    # files that match 2 skip trashbin rules
    And user "Alice" has uploaded file with content "sample delete file long 1" to "PARENT/sample.lis"
    # files that match all 3 skip trashbin rules
    And user "Alice" has uploaded file with content "sample delete file long 1" to "PARENT/sample.dat"
    When user "Alice" deletes the following files
      | path                     |
      | sample.txt               |
      | lorem-folder/sample.go   |
      | sample.dat               |
      | lorem-folder/sample.dat  |
      | PARENT/sample.txt        |
      | simple-folder/sample.php |
      | PARENT/sample.lis        |
      | PARENT/sample.dat        |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the files with following original paths should exist in the trashbin
      | path                   |
      | sample.txt             |
      | lorem-folder/sample.go |
    But as "Alice" the files with following original paths should not exist in the trashbin
      | path                     |
      | sample.dat               |
      | lorem-folder/sample.dat  |
      | PARENT/sample.txt        |
      | simple-folder/sample.php |
      | PARENT/sample.lis        |
      | PARENT/sample.dat        |
    Examples:
      | dav-path |
      | old      |
      | new      |

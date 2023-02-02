@api @files_trashbin-app-required
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
    And user "Alice" has uploaded file with content "sample delete file 1" to "sample.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "sample.dat"
    And user "Alice" has uploaded file with content "sample delete file 3" to "sample.php"
    And user "Alice" has uploaded file with content "sample delete file 4" to "sample.go"
    And user "Alice" has uploaded file with content "sample delete file 5" to "sample.py"
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
    But as "Alice" the file with original path "/sample.dat" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.php" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.go" should not exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: Skip trashbin based on extensions - file in a folder
    Given the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
      | php       |
      | go        |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 1" to "PARENT/sample.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/sample.dat"
    And user "Alice" has uploaded file with content "sample delete file 3" to "PARENT/sample.php"
    And user "Alice" has uploaded file with content "sample delete file 4" to "PARENT/sample.go"
    And user "Alice" has uploaded file with content "sample delete file 5" to "PARENT/sample.py"
    When user "Alice" deletes the following files
      | path              |
      | PARENT/sample.txt |
      | PARENT/sample.dat |
      | PARENT/sample.php |
      | PARENT/sample.go  |
      | PARENT/sample.py  |
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the file with original path "/PARENT/sample.txt" should exist in the trashbin
    And as "Alice" the file with original path "/PARENT/sample.py" should exist in the trashbin
    But as "Alice" the file with original path "/PARENT/sample.dat" should not exist in the trashbin
    And as "Alice" the file with original path "/PARENT/sample.php" should not exist in the trashbin
    And as "Alice" the file with original path "/PARENT/sample.go" should not exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: Skip trashbin based on extensions - match is case-insensitive
    Given the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
      | php       |
      | go        |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 1" to "sample.TXT"
    And user "Alice" has uploaded file with content "sample delete file 1" to "sample.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "sample.DAT"
    And user "Alice" has uploaded file with content "sample delete file 2" to "sample.dat"
    And user "Alice" has uploaded file with content "sample delete file 3" to "sample.PHP"
    And user "Alice" has uploaded file with content "sample delete file 3" to "sample.php"
    And user "Alice" has uploaded file with content "sample delete file 4" to "sample.GO"
    And user "Alice" has uploaded file with content "sample delete file 4" to "sample.go"
    And user "Alice" has uploaded file with content "sample delete file 5" to "sample.PY"
    And user "Alice" has uploaded file with content "sample delete file 5" to "sample.py"
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
    And as "Alice" the file with original path "/sample.TXT" should exist in the trashbin
    And as "Alice" the file with original path "/sample.txt" should exist in the trashbin
    And as "Alice" the file with original path "/sample.PY" should exist in the trashbin
    And as "Alice" the file with original path "/sample.py" should exist in the trashbin
    But as "Alice" the file with original path "/sample.DAT" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.dat" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.PHP" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.php" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.GO" should not exist in the trashbin
    And as "Alice" the file with original path "/sample.go" should not exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: Skip trashbin based on extensions when deleting the parent folder - skip-by-extension rules should not be applied
    Given the administrator has set the following file extensions to be skipped from the trashbin
      | extension |
      | dat       |
      | php       |
      | go        |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 1" to "PARENT/sample.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/sample.dat"
    And user "Alice" has uploaded file with content "sample delete file 3" to "PARENT/sample.php"
    And user "Alice" has uploaded file with content "sample delete file 4" to "PARENT/sample.go"
    And user "Alice" has uploaded file with content "sample delete file 5" to "PARENT/sample.py"
    When user "Alice" deletes folder "PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "PARENT/sample.txt" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.py" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.dat" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.php" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.go" should exist in the trashbin
    Examples:
      | dav-path |
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
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the file with original path "sample.txt" should exist in the trashbin
    And as "Alice" the file with original path "lorem-folder/sample.py" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.dat" should not exist in the trashbin
    But as "Alice" the file with original path "simple-folder/sample.php" should not exist in the trashbin
    And as "Alice" the file with original path "simple-folder/sample.go" should not exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: Skip trashbin based on directory should match only the root folder name
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory     |
      | simple-folder |
    And using <dav-path> DAV path
    And user "Alice" has created folder "PARENT/simple-folder"
    And user "Alice" has uploaded file with content "sample delete file 1" to "PARENT/p.txt"
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/simple-folder/sub.txt"
    And user "Alice" has uploaded file with content "sample delete file 3" to "simple-folder/s.txt"
    When user "Alice" deletes folder "PARENT" using the WebDAV API
    And user "Alice" deletes folder "simple-folder" using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the file with original path "PARENT/p.txt" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/simple-folder/sub.txt" should exist in the trashbin
    But as "Alice" the file with original path "simple-folder/s.txt" should not exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: Delete a file in a folder skipped from trashbin
    Given the administrator has set the following directories to be skipped from the trashbin
      | directory |
      | PARENT    |
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample delete file 2" to "PARENT/sample.dat"
    When user "Alice" deletes file "PARENT/sample.dat" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "/PARENT" should not exist in the trashbin
    And as "Alice" the file with original path "/PARENT/sample.dat" should not exist in the trashbin
    Examples:
      | dav-path |
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
      | new      |


  Scenario Outline: Skip file from trashbin based on size threshold
    Given the administrator has set the trashbin skip size threshold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "lorem.txt"
    And user "Alice" has uploaded file with content "sample delete file" to "lorem.dat"
    When user "Alice" deletes file "/lorem.txt" using the WebDAV API
    And user "Alice" deletes file "/lorem.dat" using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the file with original path "lorem.txt" should exist in the trashbin
    But as "Alice" the file with original path "lorem.dat" should not exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: Skip file from trashbin based on size threshold - file in a folder
    Given the administrator has set the trashbin skip size threshold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "PARENT/lorem.txt"
    And user "Alice" has uploaded file with content "sample delete file" to "PARENT/lorem.dat"
    When user "Alice" deletes file "PARENT/lorem.txt" using the WebDAV API
    And user "Alice" deletes file "PARENT/lorem.dat" using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Alice" the file with original path "PARENT/lorem.txt" should exist in the trashbin
    But as "Alice" the file with original path "PARENT/lorem.dat" should not exist in the trashbin
    Examples:
      | dav-path |
      | new      |


  Scenario Outline: Skip file from trashbin based on size threshold when deleting the parent folder - skip-by-size rules should not be applied
    Given the administrator has set the trashbin skip size threshold to "10"
    And using <dav-path> DAV path
    And user "Alice" has uploaded file with content "sample" to "PARENT/lorem.txt"
    And user "Alice" has uploaded file with content "sample delete file" to "PARENT/lorem.dat"
    When user "Alice" deletes folder "PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" the file with original path "PARENT/lorem.txt" should exist in the trashbin
    And as "Alice" the file with original path "PARENT/lorem.dat" should exist in the trashbin
    Examples:
      | dav-path |
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
    And as "Alice" the file with original path "sample.txt" should exist in the trashbin
    And as "Alice" the file with original path "lorem-folder/sample.go" should exist in the trashbin
    But as "Alice" the file with original path "sample.dat" should not exist in the trashbin
    And as "Alice" the file with original path "lorem-folder/sample.dat" should not exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.txt" should not exist in the trashbin
    And as "Alice" the file with original path "simple-folder/sample.php" should not exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.lis" should not exist in the trashbin
    And as "Alice" the file with original path "PARENT/sample.dat" should not exist in the trashbin
    Examples:
      | dav-path |
      | new      |

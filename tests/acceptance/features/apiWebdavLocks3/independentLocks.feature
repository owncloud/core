@api @issue-ocis-reva-172
Feature: independent locks
  Make sure all locks are independent and don't interact with other items that have the same name

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: locking a folder does not lock other items with the same name in other parts of the file system
    Given using <dav-path> DAV path
    And user "Alice" has created folder "locked"
    And user "Alice" has created folder "locked/PARENT"
    And user "Alice" has created folder "notlocked"
    And user "Alice" has created folder "notlocked/PARENT"
    And user "Alice" has created folder "alsonotlocked"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/alsonotlocked/PARENT"
    When user "Alice" locks folder "locked/PARENT" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And user "Alice" should be able to upload file "filesForUpload/lorem.txt" to "/notlocked/PARENT/file.txt"
    And user "Alice" should be able to upload file "filesForUpload/lorem.txt" to "/alsonotlocked/PARENT"
    But user "Alice" should not be able to upload file "filesForUpload/lorem.txt" to "/locked/PARENT/textfile0.txt"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: locking a folder on the root level does not lock other folders with the same name in other parts of the file system
    Given using <dav-path> DAV path
    And user "Alice" has created folder "notlocked"
    And user "Alice" has created folder "notlocked/PARENT"
    And user "Alice" has created folder "alsonotlocked"
    And user "Alice" has created folder "alsonotlocked/PARENT"
    When user "Alice" locks folder "PARENT" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "201"
    And user "Alice" should be able to upload file "filesForUpload/lorem.txt" to "/notlocked/PARENT/file.txt"
    And user "Alice" should be able to upload file "filesForUpload/lorem.txt" to "/alsonotlocked/PARENT/file.txt"
    But user "Alice" should not be able to upload file "filesForUpload/lorem.txt" to "/PARENT/textfile0.txt"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: locking a file does not lock other items with the same name in other parts of the file system
    Given using <dav-path> DAV path
    And user "Alice" has created folder "locked"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/locked/textfile0.txt"
    And user "Alice" has created folder "notlocked"
    And user "Alice" has created folder "notlocked/textfile0.txt"
    When user "Alice" locks file "locked/textfile0.txt" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And user "Alice" should be able to upload file "filesForUpload/lorem.txt" to "/notlocked/textfile0.txt/real-file.txt"
    And user "Alice" should be able to upload file "filesForUpload/lorem.txt" to "/textfile0.txt"
    But user "Alice" should not be able to upload file "filesForUpload/lorem.txt" to "/locked/textfile0.txt"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: locking a file/folder with git specific names does not lock other items with the same name in other parts of the file system
    Given using <dav-path> DAV path
    And user "Alice" has created folder "locked/"
    And user "Alice" has created folder "locked/<foldername>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/locked/<foldername>/<filename>"
    And user "Alice" has created folder "notlocked/"
    And user "Alice" has created folder "notlocked/<foldername>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "notlocked/<foldername>/<filename>"
    When user "Alice" locks file "locked/<to-lock>" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And user "Alice" should be able to upload file "filesForUpload/lorem.txt" to "/notlocked/<foldername>/file.txt"
    And user "Alice" should be able to upload file "filesForUpload/lorem.txt" to "/notlocked/<foldername>/<filename>"
    But user "Alice" should not be able to upload file "filesForUpload/lorem.txt" to "/locked/<foldername>/<filename>"
    Examples:
      | dav-path | lock-scope | foldername | filename | to-lock     |
      | old      | shared     | .git       | config   | .git        |
      | old      | shared     | .git       | config   | .git/config |
      | old      | exclusive  | .git       | config   | .git        |
      | old      | exclusive  | .git       | config   | .git/config |
      | new      | shared     | .git       | config   | .git        |
      | new      | shared     | .git       | config   | .git/config |
      | new      | exclusive  | .git       | config   | .git        |
      | new      | exclusive  | .git       | config   | .git/config |

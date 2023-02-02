@api @issue-ocis-reva-14
Feature: move (rename) file
  As a user
  I want to be able to move and rename files asynchronously
  So that I can manage my file system

  Background:
    Given using new DAV path
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And the administrator has enabled async operations


  Scenario Outline: Moving a file
    Given user "Alice" has created folder "FOLDER"
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/FOLDER/<destination-file-name>" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the content of file "/FOLDER/<destination-file-name>" for user "Alice" should be "ownCloud test text file 0"
    And user "Alice" should not see the following elements
      | /textfile0.txt |
    Examples:
      | destination-file-name |
      | नेपाली.txt            |
      | strängé file.txt      |
      | C++ file.cpp          |
      | file #2.txt           |
      | file ?2.txt           |
      | sample,1.txt          |


  Scenario: Moving and overwriting a file
    Given user "Alice" has uploaded file with content "Welcome to move" to "/fileToMove.txt"
    When user "Alice" moves file "/fileToMove.txt" asynchronously to "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the content of file "/textfile0.txt" for user "Alice" should be "Welcome to move"
    And user "Alice" should not see the following elements
      | /fileToMove.txt |


  Scenario: Moving (renaming) a file to be only different case
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the content of file "/TextFile0.txt" for user "Alice" should be "ownCloud test text file 0"
    And user "Alice" should not see the following elements
      | /textfile0.txt |


  Scenario: Moving (renaming) a file to a file with only different case to an existing file
    Given user "Alice" has uploaded file with content "ownCloud test text file 1" to "textfile1.txt"
    When user "Alice" moves file "/textfile1.txt" asynchronously to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the content of file "/textfile0.txt" for user "Alice" should be "ownCloud test text file 0"
    And the content of file "/TextFile0.txt" for user "Alice" should be "ownCloud test text file 1"
    And user "Alice" should not see the following elements
      | /textfile1.txt |


  Scenario: Moving (renaming) a file to a file in a folder with only different case to an existing file
    Given user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file with content "ownCloud test text file parent" to "PARENT/parent.txt"
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/PARENT/Parent.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "ownCloud test text file parent"
    And the content of file "/PARENT/Parent.txt" for user "Alice" should be "ownCloud test text file 0"
    And user "Alice" should not see the following elements
      | /textfile0.txt |

  @files_sharing-app-required
  Scenario: Moving a file to a folder with no permissions
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status    | /^error$/ |
      | errorCode | /^403$/   |
    And user "Alice" downloads file "/testshare/textfile0.txt" using the WebDAV API
    And the HTTP status code should be "404"
    And user "Alice" should see the following elements
      | /textfile0.txt |

  @files_sharing-app-required
  Scenario: Moving a file to overwrite a file in a folder with no permissions
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has uploaded file with content "Welcome to overwrite" to "/fileToCopy.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    And user "Brian" has copied file "/fileToCopy.txt" to "/testshare/overwritethis.txt"
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/testshare/overwritethis.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status    | /^error$/ |
      | errorCode | /^403$/   |
    And the content of file "/testshare/overwritethis.txt" for user "Alice" should be "Welcome to overwrite"
    And user "Alice" should see the following elements
      | /textfile0.txt |


  Scenario: move file into a not-existing folder
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/not-existing/not-existing-file.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status       | /^error$/                             |
      | errorCode    | /^409$/                               |
      | errorMessage | /^The destination node is not found$/ |
    And user "Alice" should see the following elements
      | /textfile0.txt |


  Scenario: rename a file into an invalid filename
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/a\\a" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /textfile0.txt |


  Scenario: Renaming a file to a path with extension .part should not be possible
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/textfile0.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /textfile0.txt |
    But user "Alice" should not see the following elements
      | /textfile0.part |


  Scenario: Checking file id after a move
    Given user "Alice" has stored id of file "/textfile0.txt"
    And user "Alice" has created folder "FOLDER"
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/FOLDER/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And user "Alice" file "/FOLDER/textfile0.txt" should have the previously stored id
    And user "Alice" should not see the following elements
      | /textfile0.txt |


  Scenario: disabled async operations leads to original behavior
    Given the administrator has disabled async operations
    And user "Alice" has created folder "FOLDER"
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/FOLDER/fileToMove.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should not be set
      | header                |
      | OC-JobStatus-Location |
    And the content of file "/FOLDER/fileToMove.txt" for user "Alice" should be "ownCloud test text file 0"


  Scenario Outline: enabling async operations does no difference to normal MOVE - Moving a file
    Given the administrator has enabled async operations
    And user "Alice" has created folder "FOLDER"
    And using <dav_version> DAV path
    When user "Alice" moves file "/textfile0.txt" to "/FOLDER/fileToMove.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/fileToMove.txt" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: enabling async operations does no difference to normal MOVE - Moving and overwriting a file
    Given the administrator has enabled async operations
    And user "Alice" has uploaded file with content "Welcome to ownCloud" to "/fileToMove.txt"
    And using <dav_version> DAV path
    When user "Alice" moves file "/fileToMove.txt" to "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile0.txt" for user "Alice" should be "Welcome to ownCloud"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: enabling async operations does no difference to normal MOVE - Moving a file to a folder with no permissions
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    When user "Alice" moves file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should not be able to download file "/testshare/textfile0.txt"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: enabling async operations does no difference to normal MOVE - move file into a not-existing folder
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    When user "Alice" moves file "/textfile0.txt" to "/not-existing/fileToMove.txt" using the WebDAV API
    Then the HTTP status code should be "409"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: enabling async operations does no difference to normal MOVE - rename a file into an invalid filename
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    When user "Alice" moves file "/textfile0.txt" to "/a\\a" using the WebDAV API
    Then the HTTP status code should be "400"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: enabling async operations does no difference to normal MOVE - rename a file into a banned filename
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    When user "Alice" moves file "/textfile0.txt" to "/.htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    Examples:
      | dav_version |
      | old         |
      | new         |

  #this does not work if firewall app is enabled
  #and it also does not work with the php-dev server
  @skipOnFirewall
  Scenario: Moving and overwriting a file with lazyops
    #need to slowdown the request for longer than the timeout
    #when doing LazyOps the server does not close the connection
    #so we timeout the request and check the job-status
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToMove.txt"
    And the HTTP-Request-timeout is set to 5 seconds
    And the MOVE DAV requests are slowed down by 10 seconds
    When user "Alice" moves file "/fileToMove.txt" asynchronously to "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^started$/ |

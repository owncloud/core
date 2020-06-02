@api @TestAlsoOnExternalUserBackend @skipOnOcis @issue-ocis-reva-14
Feature: move (rename) file
  As a user
  I want to be able to move and rename files asynchronously
  So that I can manage my file system

  Background:
    Given using new DAV path
    And user "Alice" has been created with default attributes and skeleton files
    And the administrator has enabled async operations

  Scenario Outline: Moving a file
    When user "Alice" moves file "/welcome.txt" asynchronously to "/FOLDER/<destination-file-name>" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the downloaded content when downloading file "/FOLDER/<destination-file-name>" for user "Alice" with range "bytes=0-6" should be "Welcome"
    And user "Alice" should not see the following elements
      | /welcome.txt |
    Examples:
      | destination-file-name |
      | नेपाली.txt            |
      | strängé file.txt      |
      | C++ file.cpp          |
      | file #2.txt           |
      | file ?2.txt           |

  Scenario: Moving and overwriting a file
    When user "Alice" moves file "/welcome.txt" asynchronously to "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the downloaded content when downloading file "/textfile0.txt" for user "Alice" with range "bytes=0-6" should be "Welcome"
    And user "Alice" should not see the following elements
      | /welcome.txt |

  Scenario: Moving (renaming) a file to be only different case
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the content of file "/TextFile0.txt" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    And user "Alice" should not see the following elements
      | /textfile0.txt |

  Scenario: Moving (renaming) a file to a file with only different case to an existing file
    When user "Alice" moves file "/textfile1.txt" asynchronously to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the content of file "/textfile0.txt" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    And the content of file "/TextFile0.txt" for user "Alice" should be "ownCloud test text file 1" plus end-of-line
    And user "Alice" should not see the following elements
      | /textfile1.txt |

  Scenario: Moving (renaming) a file to a file in a folder with only different case to an existing file
    When user "Alice" moves file "/textfile1.txt" asynchronously to "/PARENT/Parent.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^finished$/         |
      | fileId | /^[0-9a-z]{20,}$/    |
      | ETag   | /^"[0-9a-f]{1,32}"$/ |
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "ownCloud test text file parent" plus end-of-line
    And the content of file "/PARENT/Parent.txt" for user "Alice" should be "ownCloud test text file 1" plus end-of-line
    And user "Alice" should not see the following elements
      | /textfile1.txt |

  @files_sharing-app-required
  Scenario: Moving a file to a folder with no permissions
    Given user "Brian" has been created with default attributes and skeleton files
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
    Then the HTTP status code should be "404"
    And user "Alice" should see the following elements
      | /textfile0.txt |

  @files_sharing-app-required
  Scenario: Moving a file to overwrite a file in a folder with no permissions
    Given user "Brian" has been created with default attributes and skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    And user "Brian" has copied file "/welcome.txt" to "/testshare/overwritethis.txt"
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/testshare/overwritethis.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status    | /^error$/ |
      | errorCode | /^403$/   |
    And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "Alice" with range "bytes=0-6" should be "Welcome"
    And user "Alice" should see the following elements
      | /textfile0.txt |

  Scenario: move file into a not-existing folder
    When user "Alice" moves file "/welcome.txt" asynchronously to "/not-existing/welcome.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status       | /^error$/                             |
      | errorCode    | /^409$/                               |
      | errorMessage | /^The destination node is not found$/ |
    And user "Alice" should see the following elements
      | /welcome.txt |

  Scenario: rename a file into an invalid filename
    When user "Alice" moves file "/welcome.txt" asynchronously to "/a\\a" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /welcome.txt |

  Scenario: Renaming a file to a path with extension .part should not be possible
    When user "Alice" moves file "/welcome.txt" asynchronously to "/welcome.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "Alice" should see the following elements
      | /welcome.txt |
    But user "Alice" should not see the following elements
      | /welcome.part |

  Scenario: Checking file id after a move
    Given user "Alice" has stored id of file "/textfile0.txt"
    When user "Alice" moves file "/textfile0.txt" asynchronously to "/FOLDER/textfile0.txt" using the WebDAV API
    Then user "Alice" file "/FOLDER/textfile0.txt" should have the previously stored id
    And user "Alice" should not see the following elements
      | /textfile0.txt |

  Scenario: disabled async operations leads to original behavior
    Given the administrator has disabled async operations
    When user "Alice" moves file "/welcome.txt" asynchronously to "/FOLDER/welcome.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should not be set
      | header                |
      | OC-JobStatus-Location |
    And the downloaded content when downloading file "/FOLDER/welcome.txt" for user "Alice" with range "bytes=0-6" should be "Welcome"

  Scenario Outline: enabling async operations does no difference to normal MOVE - Moving a file
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    When user "Alice" moves file "/welcome.txt" to "/FOLDER/welcome.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the downloaded content when downloading file "/FOLDER/welcome.txt" for user "Alice" with range "bytes=0-6" should be "Welcome"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: enabling async operations does no difference to normal MOVE - Moving and overwriting a file
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    When user "Alice" moves file "/welcome.txt" to "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the downloaded content when downloading file "/textfile0.txt" for user "Alice" with range "bytes=0-6" should be "Welcome"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: enabling async operations does no difference to normal MOVE - Moving a file to a folder with no permissions
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    When user "Alice" moves file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    When user "Alice" downloads file "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: enabling async operations does no difference to normal MOVE - move file into a not-existing folder
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    When user "Alice" moves file "/welcome.txt" to "/not-existing/welcome.txt" using the WebDAV API
    Then the HTTP status code should be "409"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: enabling async operations does no difference to normal MOVE - rename a file into an invalid filename
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    When user "Alice" moves file "/welcome.txt" to "/a\\a" using the WebDAV API
    Then the HTTP status code should be "400"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: enabling async operations does no difference to normal MOVE - rename a file into a banned filename
    Given the administrator has enabled async operations
    And using <dav_version> DAV path
    When user "Alice" moves file "/welcome.txt" to "/.htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    Examples:
      | dav_version |
      | old         |
      | new         |

  #this does not work if firewall app is enabled
  #and it also does not work with the php-dev server
  @skipOnFirewall
  Scenario: Moving and overwriting a file
    #need to slowdown the request for longer than the timeout
    #when doing LazyOps the server does not close the connection
    #so we timout the request and chech the job-status
    Given the HTTP-Request-timeout is set to 5 seconds
    And the MOVE dav requests are slowed down by 10 seconds
    When user "Alice" moves file "/welcome.txt" asynchronously to "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions for user "Alice"
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/%username%\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "Alice" should match these regular expressions
      | status | /^started$/ |

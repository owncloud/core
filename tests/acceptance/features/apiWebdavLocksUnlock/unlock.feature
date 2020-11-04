@api @issue-ocis-reva-172
Feature: UNLOCK locked items

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: unlock a single lock set by the user itself
    Given using <dav-path> DAV path
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "Alice" unlocks the last created lock of folder "PARENT" using the WebDAV API
    Then 0 locks should be reported for folder "PARENT" of user "Alice" by the WebDAV API
    And 0 locks should be reported for folder "PARENT/CHILD" of user "Alice" by the WebDAV API
    And 0 locks should be reported for file "PARENT/parent.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: unlock one of multiple locks set by the user itself
    Given using <dav-path> DAV path
    And user "Alice" has locked file "textfile0.txt" setting following properties
      | lockscope | shared |
    And user "Alice" has locked file "textfile0.txt" setting following properties
      | lockscope | shared |
    When user "Alice" unlocks the last created lock of file "textfile0.txt" using the WebDAV API
    Then 1 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: unlocking a file that was locked by the user locking the folder above is not possible
    Given using <dav-path> DAV path
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When user "Alice" unlocks file "PARENT/CHILD/child.txt" with the last created lock of folder "PARENT/CHILD" using the WebDAV API
    Then 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "Alice" by the WebDAV API
    And 2 locks should be reported for folder "PARENT/CHILD" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @skipOnOcV10 @issue-34302 @files_sharing-app-required @skipOnOcV10.3
  Scenario Outline: as public unlocking a file in a share that was locked by the file owner is not possible. To unlock use the owners locktoken
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked file "PARENT/parent.txt" setting following properties
      | lockscope | <lock-scope> |
    When the public unlocks file "/parent.txt" with the last created lock of file "PARENT/parent.txt" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "403"
    And 1 locks should be reported for file "PARENT/parent.txt" of user "Alice" by the WebDAV API
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

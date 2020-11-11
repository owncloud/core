@api @files_sharing-app-required @issue-ocis-reva-172 @issue-ocis-reva-11
Feature: lock should propagate correctly if a share is reshared

  Background:
    Given the administrator has enabled DAV tech_preview
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |

  Scenario Outline: upload to a share that was locked by owner
    Given using <dav-path> DAV path
    And user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    And user "Brian" has shared folder "Shares/PARENT" with user "Carol"
    And user "Carol" has accepted share "/PARENT" offered by user "Brian"
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "Carol" uploads file "filesForUpload/textfile.txt" to "/Shares/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: upload overwriting to a share that was locked by owner
    Given using <dav-path> DAV path
    And user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    And user "Brian" has shared folder "Shares/PARENT" with user "Carol"
    And user "Carol" has accepted share "/PARENT" offered by user "Brian"
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "Carol" uploads file "filesForUpload/textfile.txt" to "/Shares/PARENT/parent.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/PARENT/parent.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/PARENT/parent.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "ownCloud test text file parent" plus end-of-line
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @skipOnOcV10 @issue-36064
  Scenario Outline: public uploads to a reshared share that was locked by original owner
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    And user "Brian" has shared folder "Shares/PARENT" with user "Carol"
    And user "Carol" has accepted share "/PARENT" offered by user "Brian"
    And user "Carol" has created a public link share of folder "Shares/PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "test.txt" with content "test" using the new public WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/test.txt" should not exist
    When the public uploads file "test.txt" with content "test" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/test.txt" should exist
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: upload to a share that was locked by owner but renamed before
    Given using <dav-path> DAV path
    And user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    And user "Brian" has shared folder "Shares/PARENT" with user "Carol"
    And user "Carol" has accepted share "/PARENT" offered by user "Brian"
    When user "Brian" moves folder "/Shares/PARENT" to "/PARENT-renamed" using the WebDAV API
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "Carol" uploads file "filesForUpload/textfile.txt" to "/Shares/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/PARENT-renamed/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: upload to a share that was locked by the resharing user
    Given using <dav-path> DAV path
    And user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    And user "Brian" has shared folder "Shares/PARENT" with user "Carol"
    And user "Carol" has accepted share "/PARENT" offered by user "Brian"
    And user "Brian" has locked folder "Shares/PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "Carol" uploads file "filesForUpload/textfile.txt" to "/Shares/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

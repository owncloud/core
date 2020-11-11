@api @issue-ocis-reva-172
Feature: there can be only one exclusive lock on a resource

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  Scenario Outline: a second lock cannot be set on a folder when its exclusively locked
    Given using <dav-path> DAV path
    And user "Alice" has locked file "textfile0.txt" setting following properties
      | lockscope | exclusive |
    When user "Alice" locks file "textfile0.txt" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: if a parent resource is exclusively locked a child resource cannot be locked again
    Given using <dav-path> DAV path
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | exclusive |
    When user "Alice" locks folder "PARENT/CHILD" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: if a parent resource is exclusively locked with depth 0 a child resource can be locked again
    Given using <dav-path> DAV path
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | exclusive |
      | depth     | 0         |
    When user "Alice" locks folder "PARENT/CHILD" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @skipOnOcV10 @issue-34358
  Scenario Outline: if a child resource is exclusively locked a parent resource cannot be locked again
    Given using <dav-path> DAV path
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | exclusive |
    When user "Alice" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: if a child resource is exclusively locked a parent resource can be locked with depth 0
    Given using <dav-path> DAV path
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | exclusive |
    When user "Alice" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
      | depth     | 0            |
    Then the HTTP status code should be "200"
    And 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @files_sharing-app-required
  Scenario Outline: a share receiver cannot lock a resource exclusively locked by itself
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has locked file "textfile0 (2).txt" setting following properties
      | lockscope | exclusive |
    When user "Brian" locks file "textfile0 (2).txt" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    And 1 locks should be reported for file "textfile0 (2).txt" of user "Brian" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @files_sharing-app-required
  Scenario Outline: a share receiver cannot lock a resource exclusively locked by the owner
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has locked file "textfile0.txt" setting following properties
      | lockscope | exclusive |
    When user "Brian" locks file "textfile0 (2).txt" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    And 1 locks should be reported for file "textfile0 (2).txt" of user "Brian" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @files_sharing-app-required
  Scenario Outline: a share owner cannot lock a resource exclusively locked by a share receiver
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has locked file "textfile0 (2).txt" setting following properties
      | lockscope | exclusive |
    When user "Alice" locks file "textfile0.txt" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    And 1 locks should be reported for file "textfile0 (2).txt" of user "Brian" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

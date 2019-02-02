@api
Feature: there can be only one exclusive lock on a resource

  Background:
    Given user "user0" has been created with default attributes

  Scenario Outline: a second lock cannot be set on a folder when its exclusively locked
    Given using <dav-path> DAV path
    And user "user0" has locked file "textfile0.txt" setting following properties
      | lockscope | exclusive |
    When user "user0" locks file "textfile0.txt" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "textfile0.txt" of user "user0" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: if a parent resource is exclusively locked a child resource cannot be locked again
    Given using <dav-path> DAV path
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | exclusive |
    When user "user0" locks folder "PARENT/CHILD" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "user0" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: if a parent resource is exclusively locked with depth 0 a child resource can be locked again
    Given using <dav-path> DAV path
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | exclusive |
      | depth     | 0         |
    When user "user0" locks folder "PARENT/CHILD" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "user0" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @issue-34358
  Scenario Outline: if a child resource is exclusively locked a parent resource cannot be locked again
    Given using <dav-path> DAV path
    And user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | exclusive |
    When user "user0" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And 2 locks should be reported for file "PARENT/CHILD/child.txt" of user "user0" by the WebDAV API
    #Then the HTTP status code should be "423"
    #And 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "user0" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: if a child resource is exclusively locked a parent resource can be locked with depth 0
    Given using <dav-path> DAV path
    And user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | exclusive |
    When user "user0" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
      | depth     | 0            |
    Then the HTTP status code should be "200"
    And 1 locks should be reported for file "PARENT/CHILD/child.txt" of user "user0" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: a share receiver cannot lock a resource exclusively locked by itself
    Given using <dav-path> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user1" has locked file "textfile0 (2).txt" setting following properties
      | lockscope | exclusive |
    When user "user1" locks file "textfile0 (2).txt" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "textfile0.txt" of user "user0" by the WebDAV API
    And 1 locks should be reported for file "textfile0 (2).txt" of user "user1" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: a share receiver cannot lock a resource exclusively locked by the owner
    Given using <dav-path> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user0" has locked file "textfile0.txt" setting following properties
      | lockscope | exclusive |
    When user "user1" locks file "textfile0 (2).txt" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "textfile0.txt" of user "user0" by the WebDAV API
    And 1 locks should be reported for file "textfile0 (2).txt" of user "user1" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: a share owner cannot lock a resource exclusively locked by a share receiver
    Given using <dav-path> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user1" has locked file "textfile0 (2).txt" setting following properties
      | lockscope | exclusive |
    When user "user0" locks file "textfile0.txt" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "423"
    And 1 locks should be reported for file "textfile0.txt" of user "user0" by the WebDAV API
    And 1 locks should be reported for file "textfile0 (2).txt" of user "user1" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |
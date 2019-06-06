@api @skipOnOcV10.0
Feature: lock should propagate correctly if a share is reshared

  Background:
    Given these users have been created with default attributes and skeleton files:
    | username |
    | user0    |
    | user1    |
    | user2    |

  Scenario Outline: upload to a share that was locked by owner
    Given using <dav-path> DAV path
    And user "user0" has shared folder "PARENT" with user "user1"
    And user "user1" has shared folder "PARENT (2)" with user "user2"
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "user2" uploads file "filesForUpload/textfile.txt" to "/PARENT (2)/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "user1" uploads file "filesForUpload/textfile.txt" to "/PARENT (2)/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/PARENT/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: upload overwriting to a share that was locked by owner
    Given using <dav-path> DAV path
    And user "user0" has shared folder "PARENT" with user "user1"
    And user "user1" has shared folder "PARENT (2)" with user "user2"
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "user2" uploads file "filesForUpload/textfile.txt" to "/PARENT (2)/parent.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "user1" uploads file "filesForUpload/textfile.txt" to "/PARENT (2)/parent.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/PARENT/parent.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "user0" should be "ownCloud test text file parent" plus end-of-line
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: public uploads to a reshared share that was locked by original owner
    Given using <dav-path> DAV path
    And user "user0" has shared folder "PARENT" with user "user1"
    And user "user1" has shared folder "PARENT (2)" with user "user2"
    And user "user2" has created a public link share of folder "PARENT (2)" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "test.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/PARENT/test.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: upload to a share that was locked by owner but renamed before
    Given using <dav-path> DAV path
    And user "user0" has shared folder "PARENT" with user "user1"
    And user "user1" has shared folder "PARENT (2)" with user "user2"
    When user "user1" moves folder "/PARENT (2)" to "/PARENT-renamed" using the WebDAV API
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "user2" uploads file "filesForUpload/textfile.txt" to "/PARENT (2)/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "user1" uploads file "filesForUpload/textfile.txt" to "/PARENT-renamed/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/PARENT/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: upload to a share that was locked by the resharing user
    Given using <dav-path> DAV path
    And user "user0" has shared folder "PARENT" with user "user1"
    And user "user1" has shared folder "PARENT (2)" with user "user2"
    And user "user1" has locked folder "PARENT (2)" setting following properties
      | lockscope | <lock-scope> |
    When user "user2" uploads file "filesForUpload/textfile.txt" to "/PARENT (2)/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "user1" uploads file "filesForUpload/textfile.txt" to "/PARENT (2)/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/PARENT/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/PARENT/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


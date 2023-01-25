@api @issue-ocis-reva-172
Feature: independent locks
  Make sure all locks are independent and don't interact with other items that have the same name

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files


  Scenario Outline: locking a received share does not lock other shares that had the same name on the sharer side (shares from different users)
    Given using <dav-path> DAV path
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "toShare"
    And user "Brian" has created folder "toShare"
    And user "Alice" has shared folder "toShare" with user "Carol"
    And user "Brian" has shared folder "toShare" with user "Carol"
    When user "Carol" locks folder "/toShare" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And user "Carol" should be able to upload file "filesForUpload/lorem.txt" to "/toShare (2)/file.txt"
    But user "Carol" should not be able to upload file "filesForUpload/lorem.txt" to "/toShare/file.txt"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: locking a received share does not lock other shares that had the same name on the sharer side (shares from the same user)
    Given using <dav-path> DAV path
    And user "Alice" has created folder "locked/"
    And user "Alice" has created folder "locked/toShare"
    And user "Alice" has created folder "notlocked/"
    And user "Alice" has created folder "notlocked/toShare"
    And user "Alice" has shared folder "locked/toShare" with user "Brian"
    And user "Alice" has shared folder "notlocked/toShare" with user "Brian"
    When user "Brian" locks folder "/toShare" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And user "Brian" should be able to upload file "filesForUpload/lorem.txt" to "/toShare (2)/file.txt"
    But user "Brian" should not be able to upload file "filesForUpload/lorem.txt" to "/toShare/file.txt"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: locking a file in a received share does not lock other items with the same name in other received shares (shares from different users)
    Given using <dav-path> DAV path
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FromAlice"
    And user "Brian" has created folder "FromBrian"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/FromAlice/textfile0.txt"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "/FromBrian/textfile0.txt"
    And user "Alice" has shared folder "FromAlice" with user "Carol"
    And user "Brian" has shared folder "FromBrian" with user "Carol"
    When user "Carol" locks file "/FromBrian/textfile0.txt" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And user "Carol" should be able to upload file "filesForUpload/lorem.txt" to "/FromAlice/textfile0.txt"
    But user "Carol" should not be able to upload file "filesForUpload/lorem.txt" to "/FromBrian/textfile0.txt"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: locking a file in a received share does not lock other items with the same name in other received shares (shares from same user)
    Given using <dav-path> DAV path
    And user "Alice" has created folder "locked/"
    And user "Alice" has created folder "notlocked/"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "locked/textfile0.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "notlocked/textfile0.txt"
    And user "Alice" has shared folder "locked" with user "Brian"
    And user "Alice" has shared folder "notlocked" with user "Brian"
    When user "Brian" locks file "/locked/textfile0.txt" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And user "Brian" should be able to upload file "filesForUpload/lorem.txt" to "/notlocked/textfile0.txt"
    But user "Brian" should not be able to upload file "filesForUpload/lorem.txt" to "/locked/textfile0.txt"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

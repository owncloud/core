@api @issue-ocis-reva-172
Feature: there can be only one exclusive lock on a resource

  @issue-34358
  Scenario Outline: if a child resource is exclusively locked a parent resource cannot be locked again
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/CHILD/child.txt"
    And using <dav-path> DAV path
    And user "Alice" has locked folder "PARENT/CHILD" setting the following properties
      | lockscope | exclusive |
    When user "Alice" locks folder "PARENT" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And 2 locks should be reported for file "PARENT/CHILD/child.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

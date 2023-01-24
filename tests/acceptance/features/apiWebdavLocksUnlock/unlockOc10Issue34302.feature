@api @issue-ocis-reva-172
Feature: UNLOCK locked items

  @issue-34302 @files_sharing-app-required
  Scenario Outline: as public unlocking a file in a share that was locked by the file owner is not possible. To unlock use the owners locktoken
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked file "PARENT/parent.txt" setting the following properties
      | lockscope | <lock-scope> |
    When the public unlocks file "/parent.txt" with the last created lock of file "PARENT/parent.txt" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "405"
    #Then the HTTP status code should be "403"
    And 1 locks should be reported for file "PARENT/parent.txt" of user "Alice" by the WebDAV API
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

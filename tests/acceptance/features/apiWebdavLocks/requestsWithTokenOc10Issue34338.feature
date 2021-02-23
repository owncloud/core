@api @notToImplementOnOCIS @issue-ocis-reva-172
Feature: actions on a locked item are possible if the token is sent with the request

  @issue-34338 @files_sharing-app-required
  Scenario Outline: share receiver cannot rename a file in a folder locked by the owner even when sending the locktoken
    Given user "Alice" has been created with default attributes and small skeleton files
    And using <dav-path> DAV path
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When user "Brian" moves file "PARENT (2)/parent.txt" to "PARENT (2)/renamed-file.txt" sending the locktoken of file "PARENT" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/PARENT/parent.txt" should not exist
    But as "Alice" file "/PARENT/renamed-file.txt" should exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

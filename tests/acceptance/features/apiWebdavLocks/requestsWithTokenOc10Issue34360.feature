@api @notToImplementOnOCIS @issue-ocis-reva-172
Feature: actions on a locked item are possible if the token is sent with the request

  @issue-34360 @files_sharing-app-required
  Scenario Outline: two users having both a shared lock can use the resource
    Given user "Alice" has been created with default attributes and small skeleton files
    And using <dav-path> DAV path
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has locked file "textfile0.txt" setting the following properties
      | lockscope | shared |
    And user "Brian" has locked file "textfile0 (2).txt" setting the following properties
      | lockscope | shared |
    When user "Alice" uploads file with content "from user 0" to "textfile0.txt" sending the locktoken of file "textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "textfile0.txt" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    And the content of file "textfile0 (2).txt" for user "Brian" should be "ownCloud test text file 0" plus end-of-line
    When user "Brian" uploads file with content "from user 1" to "textfile0 (2).txt" sending the locktoken of file "textfile0 (2).txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "textfile0.txt" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    And the content of file "textfile0 (2).txt" for user "Brian" should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | dav-path |
      | old      |
      | new      |

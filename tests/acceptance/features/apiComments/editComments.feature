@api @comments-app-required @issue-ocis-reva-38
Feature: Comments

  Background:
    Given using new DAV path
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |

  @smokeTest
  Scenario Outline: Edit my own comments on a file belonging to myself
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has commented with content "File owner comment" on file "/textfile0.txt"
    When user "Alice" edits the last created comment with content "<comment>" using the WebDAV API
    Then the HTTP status code should be "207"
    And user "Alice" should have the following comments on file "/textfile0.txt"
      | user  | comment   |
      | Alice | <comment> |
    Examples:
      | comment           |
      | My edited comment |
      | 😀 🤖             |
      | नेपालि            |

  @files_sharing-app-required
  Scenario: Edit my own comments on a file shared by someone with me
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    And user "Brian" has commented with content "Sharee comment" on file "/textfile0.txt"
    When user "Brian" edits the last created comment with content "My edited comment" using the WebDAV API
    Then the HTTP status code should be "207"
    And user "Brian" should have the following comments on file "/textfile0.txt"
      | user  | comment           |
      | Brian | My edited comment |

  @files_sharing-app-required
  Scenario: Editing comments of other users should not be possible
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    And user "Brian" has commented with content "Sharee comment" on file "/textfile0.txt"
    And user "Alice" should have the following comments on file "/textfile0.txt"
      | user  | comment        |
      | Brian | Sharee comment |
    When user "Alice" edits the last created comment with content "Edit the comment of another user" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should have the following comments on file "/textfile0.txt"
      | user  | comment        |
      | Brian | Sharee comment |

  Scenario: Edit my own comments on a folder belonging to myself
    Given user "Alice" has created folder "FOLDER"
    And user "Alice" has commented with content "Folder owner comment" on folder "/FOLDER"
    When user "Alice" edits the last created comment with content "My edited comment" using the WebDAV API
    Then the HTTP status code should be "207"
    And user "Alice" should have the following comments on folder "/FOLDER"
      | user  | comment           |
      | Alice | My edited comment |

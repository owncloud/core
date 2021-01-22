@api @notToImplementOnOCIS @files_sharing-app-required @issue-ocis-reva-172 @issue-ocis-reva-11
Feature: lock should propagate correctly if a share is reshared

  @issue-36064
  Scenario Outline: public uploads to a reshared share that was locked by original owner
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And the administrator has enabled DAV tech_preview
    And user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Brian" has shared folder "PARENT (2)" with user "Carol"
    And user "Carol" has created a public link share of folder "PARENT (2)" with change permission
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When the public uploads file "test.txt" with content "test" using the old public WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/test.txt" should not exist
    #When the public uploads file "test.txt" with content "test" using the new public WebDAV API
    #Then the HTTP status code should be "423"
    #And as "Alice" file "/PARENT/test.txt" should not exist
    When the public uploads file "test.txt" with content "test" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/test.txt" should exist
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

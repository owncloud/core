@api @TestAlsoOnExternalUserBackend @smokeTest @public_link_share-feature-required
Feature: persistent-locking in case of a public link

  Background:
    Given user "user0" has been created with default attributes

  Scenario Outline: Uploading a file into a locked public folder
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "FOLDER" with change permission
    When the user "user0" locks folder "FOLDER" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then publicly uploading a file should not work
    And the HTTP status code should be "423"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |
      
  Scenario Outline: Uploading a file into a locked subfolder of a public folder
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "PARENT" with change permission
    And the user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "test.txt" with content "test" using the public WebDAV API
    And the public uploads file "CHILD/test.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/PARENT/CHILD/test.txt" should not exist
    But the content of file "/PARENT/test.txt" for user "user0" should be "test"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: Overwrite a file inside a locked public folder
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "PARENT" with change permission
    And the user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "user0" should be "ownCloud test text file parent" plus end-of-line
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: Overwrite a file inside a locked subfolder of a public folder
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "PARENT" with change permission
    And the user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "changed text" using the public WebDAV API
    And the public uploads file "CHILD/child.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "user0" should be "changed text"
    But the content of file "/PARENT/CHILD/child.txt" for user "user0" should be "ownCloud test text file child" plus end-of-line
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

@api @TestAlsoOnExternalUserBackend @smokeTest @public_link_share-feature-required @skipOnOcV10.0 @files_sharing-app-required @skipOnOcis @issue-ocis-reva-172
Feature: persistent-locking in case of a public link

  Background:
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has been created with default attributes and skeleton files

  @smokeTest @issue-36064
  Scenario Outline: Uploading a file into a locked public folder
    Given using <dav-path> DAV path
    And user "Alice" has created a public link share of folder "FOLDER" with change permission
    When user "Alice" locks folder "FOLDER" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then uploading a file should not work using the old public WebDAV API
    And the HTTP status code should be "423"
    And uploading a file should work using the new public WebDAV API
    #And uploading a file should not work using the new public WebDAV API
    #And the HTTP status code should be "423"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @issue-36064
  Scenario Outline: Uploading a file into a locked subfolder of a public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "test.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    And the public uploads file "CHILD/test.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/CHILD/test.txt" should not exist
    But the content of file "/PARENT/test.txt" for user "Alice" should be "test"
    Examples:
      | public-webdav-api-version | lock-scope |
      | old                       | shared     |
      | old                       | exclusive  |
      #| new                       | shared     |
      #| new                       | exclusive  |

  @issue-36064
  #after fixing the issue delete this Scenario and use the one above
  Scenario Outline: Uploading a file into a locked subfolder of a public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "test.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    And the public uploads file "CHILD/test.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/CHILD/test.txt" should exist
    But the content of file "/PARENT/test.txt" for user "Alice" should be "test"
    Examples:
      | public-webdav-api-version | lock-scope |
      | new                       | shared     |
      | new                       | exclusive  |

  @smokeTest @issue-36064
  Scenario Outline: Overwrite a file inside a locked public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "ownCloud test text file parent" plus end-of-line
    Examples:
      | public-webdav-api-version | lock-scope |
      | old                       | shared     |
      | old                       | exclusive  |
      #| new                       | shared     |
      #| new                       | exclusive  |

  @smokeTest @issue-36064
  #after fixing the issue delete this Scenario and use the one above
  Scenario Outline: Overwrite a file inside a locked public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "test"
    Examples:
      | public-webdav-api-version | lock-scope |
      | new                       | shared     |
      | new                       | exclusive  |

  @issue-36064
  Scenario Outline: Overwrite a file inside a locked subfolder of a public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "changed text" using the <public-webdav-api-version> public WebDAV API
    And the public uploads file "CHILD/child.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "changed text"
    But the content of file "/PARENT/CHILD/child.txt" for user "Alice" should be "ownCloud test text file child" plus end-of-line
    Examples:
      | public-webdav-api-version | lock-scope |
      | old                       | shared     |
      | old                       | exclusive  |
      #| new                       | shared     |
      #| new                       | exclusive  |

  @issue-36064
  #after fixing the issue delete this Scenario and use the one above
  Scenario Outline: Overwrite a file inside a locked subfolder of a public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "changed text" using the <public-webdav-api-version> public WebDAV API
    And the public uploads file "CHILD/child.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "changed text"
    But the content of file "/PARENT/CHILD/child.txt" for user "Alice" should be "test"
    Examples:
      | public-webdav-api-version | lock-scope |
      | new                       | shared     |
      | new                       | exclusive  |

  @smokeTest @skipOnOcV10.3
  Scenario Outline: Public locking is not supported
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    When the public locks "/CHILD" in the last public shared folder using the <public-webdav-api-version> public WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "405"
    And the value of the item "//s:message" in the response about user "user0" should be "Locking not allowed from public endpoint"
    Examples:
      | public-webdav-api-version | lock-scope |
      | old                       | shared     |
      | old                       | exclusive  |
      | new                       | shared     |
      | new                       | exclusive  |

@api @smokeTest @public_link_share-feature-required @files_sharing-app-required @issue-ocis-reva-172 @notToImplementOnOCIS
Feature: persistent-locking in case of a public link

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/CHILD/child.txt"

  @smokeTest
  Scenario Outline: Uploading a file into a locked public folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a public link share of folder "FOLDER" with change permission
    And user "Alice" has locked folder "FOLDER" setting the following properties
      | lockscope | <lock-scope> |
    When the public uploads file "/test.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/FOLDER/test.txt" should not exist
    Examples:
      | dav-path | lock-scope | public-webdav-api-version |
      | old      | shared     | old                       |
      | old      | exclusive  | old                       |
      | new      | shared     | old                       |
      | new      | exclusive  | old                       |

    @skipOnOcV10.6 @skipOnOcV10.7
    Examples:
      | dav-path | lock-scope | public-webdav-api-version |
      | old      | shared     | new                       |
      | old      | exclusive  | new                       |
      | new      | shared     | new                       |
      | new      | exclusive  | new                       |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario Outline: Uploading a file into a locked subfolder of a public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting the following properties
      | lockscope | <lock-scope> |
    And the public has uploaded file "test.txt" with content "test"
    When the public uploads file "CHILD/test.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/CHILD/test.txt" should not exist
    But the content of file "/PARENT/test.txt" for user "Alice" should be "test"
    Examples:
      | public-webdav-api-version | lock-scope |
      | new                       | shared     |
      | new                       | exclusive  |

  @smokeTest @skipOnOcV10.6 @skipOnOcV10.7
  Scenario Outline: Overwrite a file inside a locked public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be:
      """
      This is a testfile.

      Cheers.
      """
    Examples:
      | public-webdav-api-version | lock-scope |
      | new                       | shared     |
      | new                       | exclusive  |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario Outline: Overwrite a file inside a locked subfolder of a public folder
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting the following properties
      | lockscope | <lock-scope> |
    And the public has uploaded file "parent.txt" with content "changed text"
    When the public uploads file "CHILD/child.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "changed text"
    But the content of file "/PARENT/CHILD/child.txt" for user "Alice" should be:
      """
      This is a testfile.

      Cheers.
      """
    Examples:
      | public-webdav-api-version | lock-scope |
      | new                       | shared     |
      | new                       | exclusive  |

  @smokeTest @skipOnOcV10.3
  Scenario Outline: Public locking is not supported
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    When the public locks "/CHILD" in the last public link shared folder using the <public-webdav-api-version> public WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "405"
    And the value of the item "//s:message" in the response should be "Locking not allowed from public endpoint"
    Examples:
      | public-webdav-api-version | lock-scope |
      | old                       | shared     |
      | old                       | exclusive  |

    Examples:
      | public-webdav-api-version | lock-scope |
      | new                       | shared     |
      | new                       | exclusive  |

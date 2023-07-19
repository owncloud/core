@api @smokeTest @public_link_share-feature-required @files_sharing-app-required
Feature: persistent-locking in case of a public link


  Scenario Outline: Public locking is not supported
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/CHILD/child.txt"
    And user "Alice" has created a public link share of folder "PARENT" with change permission
    When the public locks "/CHILD" in the last public link shared folder using the <public-webdav-api-version> public WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "403"
    Examples:
      | public-webdav-api-version | lock-scope |
      | new                       | shared     |
      | new                       | exclusive  |

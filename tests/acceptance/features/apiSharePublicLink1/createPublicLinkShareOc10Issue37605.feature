@api @files_sharing-app-required @public_link_share-feature-required

Feature: create a public link share

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "testFolder"
    And user "Alice" has created a public link share with settings
      | path        | /testFolder               |
      | permissions | read,update,create,delete |

  @issue-37605
  Scenario: Get the mtime of a file inside a folder shared by public link using new webDAV version
    When the public uploads file "file.txt" to the last public link shared folder with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "testFolder/file.txt" should exist
    And as "Alice" the mtime of the file "testFolder/file.txt" should not be "Thu, 08 Aug 2019 04:18:13 GMT"
#    And as "Alice" the mtime of the file "testFolder/file.txt" should be "Thu, 08 Aug 2019 04:18:13 GMT"
    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should not be "Thu, 08 Aug 2019 04:18:13 GMT"
#    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should be "Thu, 08 Aug 2019 04:18:13 GMT"

  @issue-37605
  Scenario: overwriting a file changes its mtime (new public webDAV API)
    Given user "Alice" has uploaded file with content "uploaded content for file name ending with a dot" to "testFolder/file.txt"
    When the public uploads file "file.txt" to the last public link shared folder with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the new public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "/testFolder/file.txt" should exist
    And as "Alice" the mtime of the file "testFolder/file.txt" should not be "Thu, 08 Aug 2019 04:18:13 GMT"
#    And as "Alice" the mtime of the file "testFolder/file.txt" should be "Thu, 08 Aug 2019 04:18:13 GMT"
    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should not be "Thu, 08 Aug 2019 04:18:13 GMT"
#    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should be "Thu, 08 Aug 2019 04:18:13 GMT"
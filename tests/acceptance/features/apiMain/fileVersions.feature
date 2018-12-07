@api @files_versions-app-required

Feature: dav-versions

  Background:
    Given using OCS API version "2"
    And using new DAV path
    And user "user0" has been created with default attributes
    And file "/davtest.txt" has been deleted for user "user0"

  Scenario: Upload file and no version is available
    When user "user0" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "user0" should contain "0" elements

  Scenario: Upload file and no version is available using various chunking methods
    When user "user0" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" with all mechanisms using the WebDAV API
    Then the version folder of file "/davtest.txt-olddav-regular" for user "user0" should contain "0" elements
    Then the version folder of file "/davtest.txt-newdav-regular" for user "user0" should contain "0" elements
    Then the version folder of file "/davtest.txt-olddav-oldchunking" for user "user0" should contain "0" elements
    Then the version folder of file "/davtest.txt-newdav-newchunking" for user "user0" should contain "0" elements

  Scenario: Upload file and no version is available using async upload
    Given the administrator has enabled async operations
    When user "user0" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 3 chunks with new chunking and using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "user0" should contain "0" elements

  @smokeTest
  Scenario: Upload a file twice and versions are available
    When user "user0" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    And user "user0" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "user0" should contain "1" element
    And the content length of file "/davtest.txt" with version index "1" for user "user0" in versions folder should be "8"

  Scenario: Upload a file twice and versions are available using various chunking methods
    When user "user0" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" with all mechanisms using the WebDAV API
    And user "user0" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" with all mechanisms using the WebDAV API
    Then the version folder of file "/davtest.txt-olddav-regular" for user "user0" should contain "1" element
    Then the version folder of file "/davtest.txt-newdav-regular" for user "user0" should contain "1" element
    Then the version folder of file "/davtest.txt-olddav-oldchunking" for user "user0" should contain "1" element
    Then the version folder of file "/davtest.txt-newdav-newchunking" for user "user0" should contain "1" element

  Scenario: Upload a file twice and versions are available using async upload
    Given the administrator has enabled async operations
    When user "user0" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 2 chunks with new chunking and using the WebDAV API
    And user "user0" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 3 chunks with new chunking and using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "user0" should contain "1" element

  @smokeTest
  Scenario: Remove a file
    Given user "user0" has uploaded file "filesForUpload/davtest.txt" to "/davtest.txt"
    And user "user0" has uploaded file "filesForUpload/davtest.txt" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "user0" should contain "1" element
    And user "user0" has deleted file "/davtest.txt"
    When user "user0" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "user0" should contain "0" elements

  @smokeTest
  Scenario: Restore a file and check, if the content is now in the current file
    Given user "user0" has uploaded file with content "123" to "/davtest.txt"
    And user "user0" has uploaded file with content "12345" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "user0" should contain "1" element
    When user "user0" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the content of file "/davtest.txt" for user "user0" should be "123"

  @smokeTest @skipOnStorage:ceph @files_primary_s3-issue-161
  Scenario Outline: Uploading a chunked file does create the correct version that can be restored
    Given using <dav-path> DAV path
    When user "user0" uploads file "filesForUpload/davtest.txt" to "/textfile0.txt" in 2 chunks using the WebDAV API
    And user "user0" uploads file "filesForUpload/lorem.txt" to "/textfile0.txt" in 3 chunks using the WebDAV API
    Then the version folder of file "/textfile0.txt" for user "user0" should contain "2" elements
    When user "user0" restores version index "1" of file "/textfile0.txt" using the WebDAV API
    Then the content of file "/textfile0.txt" for user "user0" should be "Dav-Test"
    Examples:
      | dav-path |
      | new      |
      | old      |

  @skipOnStorage:ceph @files_primary_s3-issue-161
  Scenario: Uploading a file asynchronously does create the correct version that can be restored
    Given the administrator has enabled async operations
    When user "user0" uploads file "filesForUpload/davtest.txt" asynchronously to "textfile0.txt" in 2 chunks using the WebDAV API
    And user "user0" uploads file "filesForUpload/lorem.txt" asynchronously to "textfile0.txt" in 2 chunks using the WebDAV API
    Then the version folder of file "/textfile0.txt" for user "user0" should contain "2" elements
    When user "user0" restores version index "1" of file "/textfile0.txt" using the WebDAV API
    Then the content of file "/textfile0.txt" for user "user0" should be "Dav-Test"

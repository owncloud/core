@api @files_versions-app-required @TestAlsoOnExternalUserBackend

Feature: dav-versions

  Background:
    Given using OCS API version "2"
    And using new DAV path
    And user "user0" has been created with default attributes and skeleton files
    And file "/davtest.txt" has been deleted for user "user0"

  Scenario: Upload file and no version is available
    When user "user0" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "user0" should contain "0" elements

  Scenario: Upload file and no version is available using various chunking methods
    When user "user0" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms using the WebDAV API
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
    When user "user0" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms using the WebDAV API
    And user "user0" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms using the WebDAV API
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

  @skipOnStorage:ceph @files_primary_s3-issue-156
  Scenario: Restore a file and check, if the content and correct checksum is now in the current file
    Given user "user0" has uploaded file with content "AAAAABBBBBCCCCC" and checksum "MD5:45a72715acdd5019c5be30bdbb75233e" to "/davtest.txt"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/davtest.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    And the version folder of file "/davtest.txt" for user "user0" should contain "1" element
    When user "user0" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the content of file "/davtest.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And as user "user0" the webdav checksum of "/davtest.txt" via propfind should match "SHA1:acfa6b1565f9710d4d497c6035d5c069bd35a8e8 MD5:45a72715acdd5019c5be30bdbb75233e ADLER32:1ecd03df"

  Scenario: User cannot access meta folder of a file which is owned by somebody else
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has uploaded file with content "123" to "/davtest.txt"
    And we save it into "FILEID"
    When user "user1" sends HTTP method "PROPFIND" to URL "/remote.php/dav/meta/<<FILEID>>"
    Then the HTTP status code should be "404"

  Scenario: User can access meta folder of a file which is owned by somebody else but shared with that user
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has uploaded file with content "123" to "/davtest.txt"
    And user "user0" has uploaded file with content "456789" to "/davtest.txt"
    And we save it into "FILEID"
    When user "user0" creates a share using the sharing API with settings
      | path        | /davtest.txt |
      | shareType   | 0            |
      | shareWith   | user1        |
      | permissions | 8            |
    Then the version folder of fileId "<<FILEID>>" for user "user1" should contain "1" element

  Scenario: sharer of a file can see the old version information when the sharee changes the content of the file
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has uploaded file with content "user0 content" to "sharefile.txt"
    And user "user0" has shared file "sharefile.txt" with user "user1"
    When user "user1" has uploaded file with content "user1 content" to "/sharefile.txt"
    Then the HTTP status code should be "204"
    And the version folder of file "/sharefile.txt" for user "user0" should contain "1" element

  Scenario: sharer of a file can restore the original content of a shared file after the file has been modified by the sharee
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has uploaded file with content "user0 content" to "sharefile.txt"
    And user "user0" has shared file "sharefile.txt" with user "user1"
    And user "user1" has uploaded file with content "user1 content" to "/sharefile.txt"
    When user "user0" restores version index "1" of file "/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharefile.txt" for user "user0" should be "user0 content"
    And the content of file "/sharefile.txt" for user "user1" should be "user0 content"

  Scenario: sharer can restore a file inside a shared folder modified by sharee
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has shared folder "/sharingfolder" with user "user1"
    And user "user0" has uploaded file with content "user0 content" to "/sharingfolder/sharefile.txt"
    And user "user1" has uploaded file with content "user1 content" to "/sharingfolder/sharefile.txt"
    When user "user0" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "user0 content"
    And the content of file "/sharingfolder/sharefile.txt" for user "user1" should be "user0 content"

  Scenario: sharee can restore a file inside a shared folder modified by sharee
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has shared folder "/sharingfolder" with user "user1"
    And user "user0" has uploaded file with content "user0 content" to "/sharingfolder/sharefile.txt"
    And user "user1" has uploaded file with content "user1 content" to "/sharingfolder/sharefile.txt"
    When user "user1" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "user0 content"
    And the content of file "/sharingfolder/sharefile.txt" for user "user1" should be "user0 content"

  Scenario: sharer can restore a file inside a shared folder created by sharee and modified by sharer
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has shared folder "/sharingfolder" with user "user1"
    And user "user1" has uploaded file with content "user1 content" to "/sharingfolder/sharefile.txt"
    And user "user0" has uploaded file with content "user0 content" to "/sharingfolder/sharefile.txt"
    When user "user0" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "user1 content"
    And the content of file "/sharingfolder/sharefile.txt" for user "user1" should be "user1 content"

  Scenario: sharee can restore a file inside a shared folder created by sharee and modified by sharer
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has shared folder "/sharingfolder" with user "user1"
    And user "user1" has uploaded file with content "user1 content" to "/sharingfolder/sharefile.txt"
    And user "user0" has uploaded file with content "user0 content" to "/sharingfolder/sharefile.txt"
    When user "user1" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "user1 content"
    And the content of file "/sharingfolder/sharefile.txt" for user "user1" should be "user1 content"

  Scenario: sharer can restore a file inside a shared folder created by sharee and modified by sharee
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has shared folder "/sharingfolder" with user "user1"
    And user "user1" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "user1" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    When user "user0" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "old content"
    And the content of file "/sharingfolder/sharefile.txt" for user "user1" should be "old content"

  Scenario: sharee can restore a file inside a shared folder created by sharer and modified by sharer
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has shared folder "/sharingfolder" with user "user1"
    And user "user0" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "user0" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    When user "user1" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "old content"
    And the content of file "/sharingfolder/sharefile.txt" for user "user1" should be "old content"

  Scenario: sharee can restore a file inside a shared folder created by sharer and modified by sharer, when the folder has been moved by the sharee
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has shared folder "/sharingfolder" with user "user1"
    And user "user0" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "user0" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    And user "user1" has created folder "/received"
    And user "user1" has moved folder "/sharingfolder" to "/received/sharingfolder"
    When user "user1" restores version index "1" of file "/received/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "old content"
    And the content of file "/received/sharingfolder/sharefile.txt" for user "user1" should be "old content"

  Scenario: sharee can restore a shared file created and modified by sharer, when the file has been moved by the sharee (file is at the top level of the sharer)
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has uploaded file with content "old content" to "/sharefile.txt"
    And user "user0" has uploaded file with content "new content" to "/sharefile.txt"
    And user "user0" has shared file "/sharefile.txt" with user "user1"
    And user "user1" has created folder "/received"
    And user "user1" has moved file "/sharefile.txt" to "/received/sharefile.txt"
    When user "user1" restores version index "1" of file "/received/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/sharefile.txt" for user "user0" should be "old content"
    And the content of file "/received/sharefile.txt" for user "user1" should be "old content"

  Scenario: sharee can restore a shared file created and modified by sharer, when the file has been moved by the sharee (file is inside a folder of the sharer)
    Given user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "user0" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    And user "user0" has shared file "/sharingfolder/sharefile.txt" with user "user1"
    And user "user1" has created folder "/received"
    And user "user1" has moved file "/sharefile.txt" to "/received/sharefile.txt"
    When user "user1" restores version index "1" of file "/received/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "old content"
    And the content of file "/received/sharefile.txt" for user "user1" should be "old content"

  Scenario: sharer can restore a file inside a group shared folder modified by sharee
    Given user "user1" has been created with default attributes and skeleton files
    And user "user2" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user0" has created folder "/sharingfolder"
    And user "user0" has shared folder "/sharingfolder" with group "grp1"
    And user "user0" has uploaded file with content "user0 content" to "/sharingfolder/sharefile.txt"
    And user "user1" has uploaded file with content "user1 content" to "/sharingfolder/sharefile.txt"
    And user "user2" has uploaded file with content "user2 content" to "/sharingfolder/sharefile.txt"
    When user "user0" restores version index "2" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "user0" should be "user0 content"
    And the content of file "/sharingfolder/sharefile.txt" for user "user1" should be "user0 content"
    And the content of file "/sharingfolder/sharefile.txt" for user "user2" should be "user0 content"

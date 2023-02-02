@api @files_versions-app-required @issue-ocis-reva-275

Feature: dav-versions

  Background:
    Given using OCS API version "2"
    And using new DAV path
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario: Upload file and no version is available
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "0" elements

  @issue-ocis-reva-17 @issue-ocis-reva-56
  Scenario: Upload file and no version is available using various chunking methods (except new chunking)
    When user "Alice" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms except new chunking using the WebDAV API
    Then the HTTP status code should be "200"
    And the version folder of file "/davtest.txt-olddav-regular" for user "Alice" should contain "0" elements
    And the version folder of file "/davtest.txt-newdav-regular" for user "Alice" should contain "0" elements
    And the version folder of file "/davtest.txt-olddav-oldchunking" for user "Alice" should contain "0" elements

  @issue-ocis-reva-17 @issue-ocis-reva-56 @newChunking @issue-ocis-1321
  Scenario: Upload file and no version is available using new chunking
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" in 2 chunks with new chunking and using the WebDAV API
    Then the HTTP status code should be "201"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "0" elements

  @issue-ocis-reva-56 @newChunking @issue-ocis-1321
  Scenario: Upload file and no version is available using async upload
    Given the administrator has enabled async operations
    When user "Alice" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 3 chunks with new chunking and using the WebDAV API
    Then the HTTP status code should be "202"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "0" elements

  @smokeTest
  Scenario: Upload a file twice and versions are available
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    And user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the HTTP status code of responses on each endpoint should be "201, 204" respectively
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    And the content length of file "/davtest.txt" with version index "1" for user "Alice" in versions folder should be "8"

  @issue-ocis-reva-17 @issue-ocis-reva-56
  Scenario: Upload a file twice and versions are available using various chunking methods (except new chunking)
    When user "Alice" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms except new chunking using the WebDAV API
    And user "Alice" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms except new chunking using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the version folder of file "/davtest.txt-olddav-regular" for user "Alice" should contain "1" element
    And the version folder of file "/davtest.txt-newdav-regular" for user "Alice" should contain "1" element
    And the version folder of file "/davtest.txt-olddav-oldchunking" for user "Alice" should contain "1" element

  @issue-ocis-reva-17 @issue-ocis-reva-56 @newChunking @issue-ocis-1321
  Scenario: Upload a file twice and versions are available using new chunking
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" in 2 chunks with new chunking and using the WebDAV API
    And user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" in 2 chunks with new chunking and using the WebDAV API
    Then the HTTP status code of responses on each endpoint should be "201, 204" respectively
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element

  @issue-ocis-reva-17 @issue-ocis-reva-56 @newChunking @issue-ocis-1321
  Scenario: Upload a file twice and versions are available using async upload
    Given the administrator has enabled async operations
    When user "Alice" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 2 chunks with new chunking and using the WebDAV API
    And user "Alice" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 3 chunks with new chunking and using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "202"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element

  @smokeTest
  Scenario: Remove a file
    Given user "Alice" has uploaded file "filesForUpload/davtest.txt" to "/davtest.txt"
    And user "Alice" has uploaded file "filesForUpload/davtest.txt" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    And user "Alice" has deleted file "/davtest.txt"
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "0" elements

  @smokeTest
  Scenario: Restore a file and check, if the content is now in the current file
    Given user "Alice" has uploaded file with content "Test Content." to "/davtest.txt"
    And user "Alice" has uploaded file with content "Content Test Updated." to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/davtest.txt" for user "Alice" should be "Test Content."

  @smokeTest @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-278
  Scenario: Restore a file back to bigger content and check, if the content is now in the current file
    Given user "Alice" has uploaded file with content "Back To The Future." to "/davtest.txt"
    And user "Alice" has uploaded file with content "Update Content." to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/davtest.txt" for user "Alice" should be "Back To The Future."

  @smokeTest @skipOnStorage:ceph @files_primary_s3-issue-161 @issue-ocis-reva-17 @issue-ocis-reva-56
  Scenario Outline: Uploading a chunked file does create the correct version that can be restored
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/textfile0.txt" in 2 chunks using the WebDAV API
    And user "Alice" uploads file "filesForUpload/lorem.txt" to "/textfile0.txt" in 3 chunks using the WebDAV API
#    HTTP status code is different for old (201) and new (204) WebDav API when uploading in chunks
    Then the HTTP status code of responses on all endpoints should be "<status-code>"
    And the version folder of file "/textfile0.txt" for user "Alice" should contain "2" elements
    When user "Alice" restores version index "1" of file "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile0.txt" for user "Alice" should be "Dav-Test"
    Examples:
      | dav-path | status-code |
      | old      | 201         |
    @newChunking @issue-ocis-1321
    Examples:
      | dav-path | status-code |
      | new      | 204         |

  @skipOnStorage:ceph @files_primary_s3-issue-161 @newChunking @issue-ocis-1321 @issue-ocis-reva-17 @issue-ocis-reva-56 @skipOnStorage:scality
  Scenario: Uploading a file asynchronously does create the correct version that can be restored
    Given the administrator has enabled async operations
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    When user "Alice" uploads file "filesForUpload/davtest.txt" asynchronously to "textfile0.txt" in 2 chunks using the WebDAV API
    And user "Alice" uploads file "filesForUpload/lorem.txt" asynchronously to "textfile0.txt" in 2 chunks using the WebDAV API
    And user "Alice" restores version index "1" of file "/textfile0.txt" using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "202"
    And the version folder of file "/textfile0.txt" for user "Alice" should contain "2" elements
    And the content of file "/textfile0.txt" for user "Alice" should be "Dav-Test"

  @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-156
  Scenario: Restore a file and check, if the content and correct checksum is now in the current file
    Given user "Alice" has uploaded file with content "AAAAABBBBBCCCCC" and checksum "MD5:45a72715acdd5019c5be30bdbb75233e" to "/davtest.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/davtest.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/davtest.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    And as user "Alice" the webdav checksum of "/davtest.txt" via propfind should match "SHA1:acfa6b1565f9710d4d497c6035d5c069bd35a8e8 MD5:45a72715acdd5019c5be30bdbb75233e ADLER32:1ecd03df"


  Scenario: User cannot access meta folder of a file which is owned by somebody else
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "123" to "/davtest.txt"
    And we save it into "FILEID"
    When user "Brian" sends HTTP method "PROPFIND" to URL "/remote.php/dav/meta/<<FILEID>>"
    Then the HTTP status code should be "400" or "404"

  @files_sharing-app-required
  Scenario: User can access meta folder of a file which is owned by somebody else but shared with that user
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "123" to "/davtest.txt"
    And user "Alice" has uploaded file with content "456789" to "/davtest.txt"
    And we save it into "FILEID"
    When user "Alice" creates a share using the sharing API with settings
      | path        | /davtest.txt |
      | shareType   | user         |
      | shareWith   | Brian        |
      | permissions | read         |
    Then the HTTP status code should be "200"
    And the version folder of fileId "<<FILEID>>" for user "Brian" should contain "1" element

  @files_sharing-app-required
  Scenario: sharer of a file can see the old version information when the sharee changes the content of the file
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "First content" to "sharefile.txt"
    And user "Alice" has shared file "sharefile.txt" with user "Brian"
    When user "Brian" has uploaded file with content "Second content" to "/sharefile.txt"
    Then the HTTP status code should be "204"
    And the version folder of file "/sharefile.txt" for user "Alice" should contain "1" element

  @files_sharing-app-required
  Scenario: sharer of a file can restore the original content of a shared file after the file has been modified by the sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "First content" to "sharefile.txt"
    And user "Alice" has shared file "sharefile.txt" with user "Brian"
    And user "Brian" has uploaded file with content "Second content" to "/sharefile.txt"
    When user "Alice" restores version index "1" of file "/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharer can restore a file inside a shared folder modified by sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Alice" has uploaded file with content "First content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "Second content" to "/sharingfolder/sharefile.txt"
    When user "Alice" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/sharingfolder/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharee can restore a file inside a shared folder modified by sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Alice" has uploaded file with content "First content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "Second content" to "/sharingfolder/sharefile.txt"
    When user "Brian" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/sharingfolder/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharer can restore a file inside a shared folder created by sharee and modified by sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has uploaded file with content "First content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "Second content" to "/sharingfolder/sharefile.txt"
    When user "Alice" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/sharingfolder/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharee can restore a file inside a shared folder created by sharee and modified by sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has uploaded file with content "First content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "Second content" to "/sharingfolder/sharefile.txt"
    When user "Brian" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/sharingfolder/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharer can restore a file inside a shared folder created by sharee and modified by sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    When user "Alice" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/sharingfolder/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  Scenario: sharee can restore a file inside a shared folder created by sharer and modified by sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    When user "Brian" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/sharingfolder/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  Scenario: sharee can restore a file inside a shared folder created by sharer and modified by sharer, when the folder has been moved by the sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved folder "/sharingfolder" to "/received/sharingfolder"
    When user "Brian" restores version index "1" of file "/received/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/received/sharingfolder/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  Scenario: sharee can restore a shared file created and modified by sharer, when the file has been moved by the sharee (file is at the top level of the sharer)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "old content" to "/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharefile.txt"
    And user "Alice" has shared file "/sharefile.txt" with user "Brian"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved file "/sharefile.txt" to "/received/sharefile.txt"
    When user "Brian" restores version index "1" of file "/received/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/received/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  Scenario: sharee can restore a shared file created and modified by sharer, when the file has been moved by the sharee (file is inside a folder of the sharer)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has shared file "/sharingfolder/sharefile.txt" with user "Brian"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved file "/sharefile.txt" to "/received/sharefile.txt"
    When user "Brian" restores version index "1" of file "/received/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/received/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required @issue-ocis-1289 @issue-ocis-1321
  Scenario: sharer can restore a file inside a group shared folder modified by sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with group "grp1"
    And user "Alice" has uploaded file with content "First content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "Second content" to "/sharingfolder/sharefile.txt"
    And user "Carol" has uploaded file with content "Third content" to "/sharingfolder/sharefile.txt"
    When user "Alice" restores version index "2" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/sharingfolder/sharefile.txt" for user "Brian" should be "First content"
    And the content of file "/sharingfolder/sharefile.txt" for user "Carol" should be "First content"

  @files_sharing-app-required @issue-ocis-1238
  Scenario Outline: Moving a file (with versions) into a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "<mover>" has uploaded file with content "test data 1" to "/testfile.txt"
    And user "<mover>" has uploaded file with content "test data 2" to "/testfile.txt"
    And user "<mover>" has uploaded file with content "test data 3" to "/testfile.txt"
    When user "<mover>" moves file "/testfile.txt" to "/testshare/testfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testshare/testfile.txt" for user "Alice" should be "test data 3"
    And the content of file "/testshare/testfile.txt" for user "Brian" should be "test data 3"
    And as "<mover>" file "/testfile.txt" should not exist
    And the version folder of file "/testshare/testfile.txt" for user "Alice" should contain "2" elements
    And the version folder of file "/testshare/testfile.txt" for user "Brian" should contain "2" elements
    Examples:
      | dav_version | mover |
      | old         | Alice |
      | new         | Alice |
      | old         | Brian |
      | new         | Brian |

  @files_sharing-app-required @issue-ocis-1238
  Scenario Outline: Moving a file (with versions) out of a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has uploaded file with content "test data 1" to "/testshare/testfile.txt"
    And user "Brian" has uploaded file with content "test data 2" to "/testshare/testfile.txt"
    And user "Brian" has uploaded file with content "test data 3" to "/testshare/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    When user "<mover>" moves file "/testshare/testfile.txt" to "/testfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testfile.txt" for user "<mover>" should be "test data 3"
    And as "Alice" file "/testshare/testfile.txt" should not exist
    And as "Brian" file "/testshare/testfile.txt" should not exist
    And the version folder of file "/testfile.txt" for user "<mover>" should contain "2" elements
    Examples:
      | dav_version | mover |
      | old         | Alice |
      | new         | Alice |
      | old         | Brian |
      | new         | Brian |

  @files_sharing-app-required @issue-ocis-1238
  Scenario: Receiver tries to get file versions of unshared file from the sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    And user "Alice" has uploaded file with content "textfile1" to "textfile1.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Brian" tries to get versions of file "textfile1.txt" from "Alice"
    Then the HTTP status code should be "404"
    And the value of the item "//s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"

  @skipOnStorage:ceph @files_primary_s3-issue-161 @files_sharing-app-required
  Scenario: Receiver tries get file versions of shared file from the sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 3" to "textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Brian" tries to get versions of file "textfile0.txt" from "Alice"
    Then the HTTP status code should be "207"
    And the number of versions should be "3"


  Scenario: User cannot access meta folder of a file which does not exist
    Given user "Brian" has been created with default attributes and without skeleton files
    When user "Brian" sends HTTP method "PROPFIND" to URL "/remote.php/dav/meta/MTI4NGQyMzgtYWE5Mi00MmNlLWJkYzQtMGIwMDAwMDA5MTU2OjhjY2QyNzUxLTkwYTQtNDBmMi1iOWYzLTYxZWRmODQ0MjFmNA=="
    Then the HTTP status code should be "400" or "404"


  Scenario Outline: User cannot access meta folder of a file with invalid fileid
    Given user "Brian" has been created with default attributes and without skeleton files
    When user "Brian" sends HTTP method "PROPFIND" to URL "/remote.php/dav/meta/<file-id>/v"
    Then the HTTP status code should be "400" or "404"
    Examples:
      | file-id                                                                                              | decoded-value                                                             | comment            |
      | MTI4NGQyMzgtYWE5Mi00MmNlLWJkYzQtMGIwMDAwMDA5MTU3PThjY2QyNzUxLTkwYTQtNDBmMi1iOWYzLTYxZWRmODQ0MjFmNA== | 1284d238-aa92-42ce-bdc4-0b0000009157=8ccd2751-90a4-40f2-b9f3-61edf84421f4 | with = sign        |
      | MTI4NGQyMzgtYWE5Mi00MmNlLWJkYzQtMGIwMDAwMDA5MTU3OGNjZDI3NTEtOTBhNC00MGYyLWI5ZjMtNjFlZGY4NDQyMWY0     | 1284d238-aa92-42ce-bdc4-0b00000091578ccd2751-90a4-40f2-b9f3-61edf84421f4  | no = sign          |
      | c29tZS1yYW5kb20tZmlsZUlkPWFub3RoZXItcmFuZG9tLWZpbGVJZA==                                             | some-random-fileId=another-random-fileId                                  | some random string |
      | MTI4NGQyMzgtYWE5Mi00MmNlLWJkxzQtMGIwMDAwMDA5MTU2OjhjY2QyNzUxLTkwYTQtNDBmMi1iOWYzLTYxZWRmODQ0MjFmNA== | 1284d238-aa92-42ce-bd�4-0b0000009156:8ccd2751-90a4-40f2-b9f3-61edf84421f4 | with : and  � sign |


  Scenario: the version history is preserved when a file is renamed
    Given user "Alice" has uploaded file with content "old content" to "/textfile.txt"
    And user "Alice" has uploaded file with content "new content" to "/textfile.txt"
    And user "Alice" has moved file "/textfile.txt" to "/renamedfile.txt"
    When user "Alice" restores version index "1" of file "/renamedfile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/renamedfile.txt" for user "Alice" should be "old content"

  @issue-ocis-1238
  Scenario: User can access version number after moving a file
    Given user "Alice" has created folder "testFolder"
    And user "Alice" has uploaded file with content "uploaded content" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 3" to "textfile0.txt"
    When user "Alice" moves file "textfile0.txt" to "/testFolder/textfile0.txt" using the WebDAV API
    And user "Alice" gets the number of versions of file "/testFolder/textfile0.txt"
    Then the HTTP status code should be "207"
    And the number of versions should be "3"


  Scenario: Original file has version number 0
    Given user "Alice" has uploaded file with content "uploaded content" to "textfile0.txt"
    When user "Alice" gets the number of versions of file "textfile0.txt"
    Then the HTTP status code should be "207"
    And the number of versions should be "0"

  @issue-ocis-1234
  Scenario: the number of etag elements in response changes according to version of the file
    Given user "Alice" has uploaded file with content "uploaded content" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    When user "Alice" gets the number of versions of file "textfile0.txt"
    Then the HTTP status code should be "207"
    And the number of etag elements in the response should be "2"
    And the number of versions should be "2"


  Scenario: download old versions of a file
    Given user "Alice" has uploaded file with content "uploaded content" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    When user "Alice" downloads the version of file "textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "version 1"
    When user "Alice" downloads the version of file "textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content"

  @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-463
  Scenario: download an old version of a restored file
    Given user "Alice" has uploaded file with content "uploaded content" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    And user "Alice" has restored version index "1" of file "textfile0.txt"
    When user "Alice" downloads the version of file "textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "version 2"
    When user "Alice" downloads the version of file "textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content"


  Scenario: User can retrieve meta information of a root folder
    When user "Alice" retrieves the meta information of file "/" using the meta API
    Then the HTTP status code should be "207"
    And the single response should contain a property "oc:meta-path-for-user" with value "/"


  Scenario: User can retrieve meta information of a file
    Given user "Alice" has uploaded file with content "123" to "/davtest.txt"
    When user "Alice" retrieves the meta information of file "/davtest.txt" using the meta API
    Then the HTTP status code should be "207"
    And the single response should contain a property "oc:meta-path-for-user" with value "/davtest.txt"


  Scenario: User can retrieve meta information of a file inside folder
    Given user "Alice" has created folder "testFolder"
    And user "Alice" has uploaded file with content "123" to "/testFolder/davtest.txt"
    When user "Alice" retrieves the meta information of file "/testFolder/davtest.txt" using the meta API
    Then the HTTP status code should be "207"
    And the single response should contain a property "oc:meta-path-for-user" with value "/testFolder/davtest.txt"


  Scenario: User cannot retrieve meta information of a file which is owned by somebody else
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "123" to "/davtest.txt "
    And we save it into "FILEID"
    When user "Brian" retrieves the meta information of fileId "<<FILEID>>" using the meta API
    Then the HTTP status code should be "404"


  Scenario Outline: User cannot retrieve meta information of a file that does not exist
    When user "Alice" retrieves the meta information of fileId "<file-id>" using the meta API
    Then the HTTP status code should be "400" or "404"
    Examples:
      | file-id                                                                                              | decoded-value                                                             | comment            |
      | MTI4NGQyMzgtYWE5Mi00MmNlLWJkYzQtMGIwMDAwMDA5MTU3PThjY2QyNzUxLTkwYTQtNDBmMi1iOWYzLTYxZWRmODQ0MjFmNA== | 1284d238-aa92-42ce-bdc4-0b0000009157=8ccd2751-90a4-40f2-b9f3-61edf84421f4 | with = sign        |
      | MTI4NGQyMzgtYWE5Mi00MmNlLWJkYzQtMGIwMDAwMDA5MTU3OGNjZDI3NTEtOTBhNC00MGYyLWI5ZjMtNjFlZGY4NDQyMWY0     | 1284d238-aa92-42ce-bdc4-0b00000091578ccd2751-90a4-40f2-b9f3-61edf84421f4  | no = sign          |
      | c29tZS1yYW5kb20tZmlsZUlkPWFub3RoZXItcmFuZG9tLWZpbGVJZA==                                             | some-random-fileId=another-random-fileId                                  | some random string |
      | MTI4NGQyMzgtYWE5Mi00MmNlLWJkxzQtMGIwMDAwMDA5MTU2OjhjY2QyNzUxLTkwYTQtNDBmMi1iOWYzLTYxZWRmODQ0MjFmNA== | 1284d238-aa92-42ce-bd�4-0b0000009156:8ccd2751-90a4-40f2-b9f3-61edf84421f4 | with : and  � sign |


  Scenario: File versions sets back after getting deleted and restored from trashbin
    Given user "Alice" has uploaded file with content "Old Test Content." to "/davtest.txt"
    And user "Alice" has uploaded file with content "New Test Content." to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    And user "Alice" has deleted file "/davtest.txt"
    And as "Alice" file "/davtest.txt" should exist in the trashbin
    When user "Alice" restores the file with original path "/davtest.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" file "/davtest.txt" should exist
    And the content of file "/davtest.txt" for user "Alice" should be "New Test Content."
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/davtest.txt" for user "Alice" should be "Old Test Content."

  @issue-ocis-5010 @skip_on_objectstore
  Scenario: Upload the same file twice with the same mtime and a version is available
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    Then the HTTP status code should be "204"
    And the version folder of file "/file.txt" for user "Alice" should contain "1" element

  @issue-ocis-5010 @skip_on_objectstore
  Scenario: Upload the same file more than twice with the same mtime and only one version is available
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    Then the HTTP status code should be "204"
    And the version folder of file "/file.txt" for user "Alice" should contain "1" element

  @issue-ocis-5010 @skip_on_objectstore
  Scenario: Upload the same file twice with the same mtime and no version after restoring
    Given user "Alice" has uploaded file "filesForUpload/textfile.txt" to "file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    When user "Alice" restores version index "1" of file "/file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the version folder of file "/file.txt" for user "Alice" should contain "0" element


  Scenario: Receiver tries get file versions of shared file before receiving it
    Given user "Brian" has been created with default attributes and without skeleton files
    And auto-accept shares has been disabled
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    And we save it into "FILEID"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Brian" tries to get versions of file "textfile0.txt" from "Alice"
    Then the HTTP status code should be "404"
    And the value of the item "//s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: sharer tries get file versions of shared file when the sharee changes the content of the file
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "First content" to "sharefile.txt"
    And user "Alice" has shared file "sharefile.txt" with user "Brian"
    When user "Brian" has uploaded file with content "Second content" to "/sharefile.txt"
    Then the HTTP status code should be "204"
    And the version folder of file "/sharefile.txt" for user "Brian" should contain "1" element
    And the version folder of file "/sharefile.txt" for user "Alice" should contain "1" element


  Scenario: download old versions of a shared file as share receiver
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "uploaded content" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Brian" downloads the version of file "/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "version 1"
    When user "Brian" downloads the version of file "/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content"
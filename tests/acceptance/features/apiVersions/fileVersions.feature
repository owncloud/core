@api @files_versions-app-required @skipOnOcis-EOS-Storage @issue-ocis-reva-275

Feature: dav-versions

  Background:
    Given using OCS API version "2"
    And using new DAV path
    And user "Alice" has been created with default attributes and without skeleton files

  Scenario: Upload file and no version is available
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "Alice" should contain "0" elements

  @skipOnOcis @issue-ocis-reva-17 @issue-ocis-reva-56
  Scenario: Upload file and no version is available using various chunking methods
    When user "Alice" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms using the WebDAV API
    Then the version folder of file "/davtest.txt-olddav-regular" for user "Alice" should contain "0" elements
    Then the version folder of file "/davtest.txt-newdav-regular" for user "Alice" should contain "0" elements
    Then the version folder of file "/davtest.txt-olddav-oldchunking" for user "Alice" should contain "0" elements
    Then the version folder of file "/davtest.txt-newdav-newchunking" for user "Alice" should contain "0" elements

  @skipOnOcis @issue-ocis-reva-56
  Scenario: Upload file and no version is available using async upload
    Given the administrator has enabled async operations
    When user "Alice" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 3 chunks with new chunking and using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "Alice" should contain "0" elements

  @smokeTest
  Scenario: Upload a file twice and versions are available
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    And user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    And the content length of file "/davtest.txt" with version index "1" for user "Alice" in versions folder should be "8"

  @skipOnOcis @issue-ocis-reva-17 @issue-ocis-reva-56
  Scenario: Upload a file twice and versions are available using various chunking methods
    When user "Alice" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms using the WebDAV API
    And user "Alice" uploads file "filesForUpload/davtest.txt" to filenames based on "/davtest.txt" with all mechanisms using the WebDAV API
    Then the version folder of file "/davtest.txt-olddav-regular" for user "Alice" should contain "1" element
    Then the version folder of file "/davtest.txt-newdav-regular" for user "Alice" should contain "1" element
    Then the version folder of file "/davtest.txt-olddav-oldchunking" for user "Alice" should contain "1" element
    Then the version folder of file "/davtest.txt-newdav-newchunking" for user "Alice" should contain "1" element

  @skipOnOcis @issue-ocis-reva-17 @issue-ocis-reva-56
  Scenario: Upload a file twice and versions are available using async upload
    Given the administrator has enabled async operations
    When user "Alice" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 2 chunks with new chunking and using the WebDAV API
    And user "Alice" uploads file "filesForUpload/davtest.txt" asynchronously to "/davtest.txt" in 3 chunks with new chunking and using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "Alice" should contain "1" element

  @smokeTest
  Scenario: Remove a file
    Given user "Alice" has uploaded file "filesForUpload/davtest.txt" to "/davtest.txt"
    And user "Alice" has uploaded file "filesForUpload/davtest.txt" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    And user "Alice" has deleted file "/davtest.txt"
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/davtest.txt" using the WebDAV API
    Then the version folder of file "/davtest.txt" for user "Alice" should contain "0" elements

  @smokeTest
  Scenario: Restore a file and check, if the content is now in the current file
    Given user "Alice" has uploaded file with content "Test Content." to "/davtest.txt"
    And user "Alice" has uploaded file with content "Content Test Updated." to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the content of file "/davtest.txt" for user "Alice" should be "Test Content."

  @smokeTest @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-278
  Scenario: Restore a file back to bigger content and check, if the content is now in the current file
    Given user "Alice" has uploaded file with content "Back To The Future." to "/davtest.txt"
    And user "Alice" has uploaded file with content "Update Content." to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the content of file "/davtest.txt" for user "Alice" should be "Back To The Future."

  @smokeTest @skipOnStorage:ceph @files_primary_s3-issue-161
  @skipOnOcis @issue-ocis-reva-17 @issue-ocis-reva-56
  Scenario Outline: Uploading a chunked file does create the correct version that can be restored
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    When user "Alice" uploads file "filesForUpload/davtest.txt" to "/textfile0.txt" in 2 chunks using the WebDAV API
    And user "Alice" uploads file "filesForUpload/lorem.txt" to "/textfile0.txt" in 3 chunks using the WebDAV API
    Then the version folder of file "/textfile0.txt" for user "Alice" should contain "2" elements
    When user "Alice" restores version index "1" of file "/textfile0.txt" using the WebDAV API
    Then the content of file "/textfile0.txt" for user "Alice" should be "Dav-Test"
    Examples:
      | dav-path |
      | new      |
      | old      |

  @skipOnStorage:ceph @files_primary_s3-issue-161
  @skipOnOcis @issue-ocis-reva-17 @issue-ocis-reva-56
  Scenario: Uploading a file asynchronously does create the correct version that can be restored
    Given the administrator has enabled async operations
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    When user "Alice" uploads file "filesForUpload/davtest.txt" asynchronously to "textfile0.txt" in 2 chunks using the WebDAV API
    And user "Alice" uploads file "filesForUpload/lorem.txt" asynchronously to "textfile0.txt" in 2 chunks using the WebDAV API
    Then the version folder of file "/textfile0.txt" for user "Alice" should contain "2" elements
    When user "Alice" restores version index "1" of file "/textfile0.txt" using the WebDAV API
    Then the content of file "/textfile0.txt" for user "Alice" should be "Dav-Test"

  @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-156
  @skipOnOcis @issue-ocis-reva-196 @skipOnOracle
  Scenario: Restore a file and check, if the content and correct checksum is now in the current file
    Given user "Alice" has uploaded file with content "AAAAABBBBBCCCCC" and checksum "MD5:45a72715acdd5019c5be30bdbb75233e" to "/davtest.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/davtest.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the content of file "/davtest.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    And as user "Alice" the webdav checksum of "/davtest.txt" via propfind should match "SHA1:acfa6b1565f9710d4d497c6035d5c069bd35a8e8 MD5:45a72715acdd5019c5be30bdbb75233e ADLER32:1ecd03df"

  @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-156
  @skipOnOcis @issue-ocis-reva-196 @skip @issue-37026
  Scenario: Restore a file and check, if the content and correct checksum is now in the current file
    Given user "Alice" has uploaded file with content "AAAAABBBBBCCCCC" and checksum "MD5:45a72715acdd5019c5be30bdbb75233e" to "/davtest.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/davtest.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the content of file "/davtest.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    And as user "Alice" the webdav checksum of "/davtest.txt" via propfind should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

  Scenario: User cannot access meta folder of a file which is owned by somebody else
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "123" to "/davtest.txt"
    And we save it into "FILEID"
    When user "Brian" sends HTTP method "PROPFIND" to URL "/remote.php/dav/meta/<<FILEID>>"
    Then the HTTP status code should be "404"

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
    Then the version folder of fileId "<<FILEID>>" for user "Brian" should contain "1" element

  @files_sharing-app-required
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario: sharer of a file can see the old version information when the sharee changes the content of the file
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "First content" to "sharefile.txt"
    And user "Alice" has shared file "sharefile.txt" with user "Brian"
    When user "Brian" has uploaded file with content "Second content" to "/sharefile.txt"
    Then the HTTP status code should be "204"
    And the version folder of file "/sharefile.txt" for user "Alice" should contain "1" element

  @files_sharing-app-required
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
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
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario: sharee can restore a file inside a shared folder created by sharer and modified by sharer, when the folder has been moved by the sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved folder "/sharingfolder" to "/received/sharingfolder"
    When user "Brian" restores version index "1" of file "/received/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/received/sharingfolder/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario: sharee can restore a shared file created and modified by sharer, when the file has been moved by the sharee (file is at the top level of the sharer)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "old content" to "/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharefile.txt"
    And user "Alice" has shared file "/sharefile.txt" with user "Brian"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved file "/sharefile.txt" to "/received/sharefile.txt"
    When user "Brian" restores version index "1" of file "/received/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/received/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243
  Scenario: sharee can restore a shared file created and modified by sharer, when the file has been moved by the sharee (file is inside a folder of the sharer)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has shared file "/sharingfolder/sharefile.txt" with user "Brian"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved file "/sharefile.txt" to "/received/sharefile.txt"
    When user "Brian" restores version index "1" of file "/received/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/received/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-34
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

  @files_sharing-app-required
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243 @issue-ocis-reva-386
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

  @files_sharing-app-required
  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-243 @issue-ocis-reva-386
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

  @skipOnOcV10.3.0 @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-382
  Scenario: Receiver tries to get file versions of unshared file from the sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    And user "Alice" has uploaded file with content "textfile1" to "textfile1.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Brian" tries to get versions of file "textfile1.txt" from "Alice"
    Then the HTTP status code should be "404"
    Then the value of the item "//s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"

  @skipOnStorage:ceph @files_primary_s3-issue-161 @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-376
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

@api @files_versions-app-required @issue-ocis-reva-275

Feature: dav-versions

  Background:
    Given using OCS API version "2"
    And using new DAV path
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files

  @files_sharing-app-required
  Scenario: User can access meta folder of a file which is owned by somebody else but shared with that user
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "123" to "/davtest.txt"
    And user "Alice" has uploaded file with content "456789" to "/davtest.txt"
    And we save it into "FILEID"
    And user "Alice" has created a share with settings
      | path        | /davtest.txt |
      | shareType   | user         |
      | shareWith   | Brian        |
      | permissions | read         |
    When user "Brian" accepts share "/davtest.txt" offered by user "Alice" using the sharing API
    Then the HTTP status code should be "200"
    And the version folder of fileId "<<FILEID>>" for user "Brian" should contain "1" element

  @files_sharing-app-required
  Scenario: sharer of a file can see the old version information when the sharee changes the content of the file
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "First content" to "sharefile.txt"
    And user "Alice" has shared file "sharefile.txt" with user "Brian"
    And user "Brian" has accepted share "/sharefile.txt" offered by user "Alice"
    When user "Brian" uploads file with content "Second content" to "/Shares/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the version folder of file "/Shares/sharefile.txt" for user "Brian" should contain "1" element
    And the version folder of file "/sharefile.txt" for user "Alice" should contain "1" element

  @files_sharing-app-required
  Scenario: sharer of a file can restore the original content of a shared file after the file has been modified by the sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "First content" to "sharefile.txt"
    And user "Alice" has shared file "sharefile.txt" with user "Brian"
    And user "Brian" has accepted share "/sharefile.txt" offered by user "Alice"
    And user "Brian" has uploaded file with content "Second content" to "/Shares/sharefile.txt"
    When user "Alice" restores version index "1" of file "/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/Shares/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharer can restore a file inside a shared folder modified by sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Alice" has uploaded file with content "First content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "Second content" to "/Shares/sharingfolder/sharefile.txt"
    When user "Alice" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/Shares/sharingfolder/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharee can restore a file inside a shared folder modified by sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Alice" has uploaded file with content "First content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "Second content" to "/Shares/sharingfolder/sharefile.txt"
    When user "Brian" restores version index "1" of file "/Shares/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/Shares/sharingfolder/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharer can restore a file inside a shared folder created by sharee and modified by sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Brian" has uploaded file with content "First content" to "/Shares/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "Second content" to "/sharingfolder/sharefile.txt"
    When user "Alice" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/Shares/sharingfolder/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharee can restore a file inside a shared folder created by sharee and modified by sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Brian" has uploaded file with content "First content" to "/Shares/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "Second content" to "/sharingfolder/sharefile.txt"
    When user "Brian" restores version index "1" of file "/Shares/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/Shares/sharingfolder/sharefile.txt" for user "Brian" should be "First content"

  @files_sharing-app-required
  Scenario: sharer can restore a file inside a shared folder created by sharee and modified by sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Brian" has uploaded file with content "old content" to "/Shares/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "new content" to "/Shares/sharingfolder/sharefile.txt"
    When user "Alice" restores version index "1" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/Shares/sharingfolder/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  Scenario: sharee can restore a file inside a shared folder created by sharer and modified by sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    When user "Brian" restores version index "1" of file "/Shares/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/Shares/sharingfolder/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required
  Scenario: sharee can restore a file inside a shared folder created by sharer and modified by sharer, when the folder has been moved by the sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with user "Brian"
    And user "Brian" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved folder "/Shares/sharingfolder" to "/received/sharingfolder"
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
    And user "Brian" has accepted share "/sharefile.txt" offered by user "Alice"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved file "/Shares/sharefile.txt" to "/received/sharefile.txt"
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
    And user "Brian" has accepted share "/sharefile.txt" offered by user "Alice"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved file "/Shares/sharefile.txt" to "/received/sharefile.txt"
    When user "Brian" restores version index "1" of file "/received/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/received/sharefile.txt" for user "Brian" should be "old content"

  @files_sharing-app-required @issue-ocis-reva-34
  Scenario: sharer can restore a file inside a group shared folder modified by sharee
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has shared folder "/sharingfolder" with group "grp1"
    And user "Brian" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Carol" has accepted share "/sharingfolder" offered by user "Alice"
    And user "Alice" has uploaded file with content "First content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "Second content" to "/Shares/sharingfolder/sharefile.txt"
    And user "Carol" has uploaded file with content "Third content" to "/Shares/sharingfolder/sharefile.txt"
    When user "Alice" restores version index "2" of file "/sharingfolder/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "First content"
    And the content of file "/Shares/sharingfolder/sharefile.txt" for user "Brian" should be "First content"
    And the content of file "/Shares/sharingfolder/sharefile.txt" for user "Carol" should be "First content"

  @files_sharing-app-required @issue-ocis-reva-386
  Scenario Outline: Moving a file (with versions) into a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    And user "<mover>" has uploaded file with content "test data 1" to "/testfile.txt"
    And user "<mover>" has uploaded file with content "test data 2" to "/testfile.txt"
    And user "<mover>" has uploaded file with content "test data 3" to "/testfile.txt"
    When user "<mover>" moves file "/testfile.txt" to "<dst-folder>/testfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/Shares/testshare/testfile.txt" for user "Alice" should be "test data 3"
    And the content of file "/testshare/testfile.txt" for user "Brian" should be "test data 3"
    And as "<mover>" file "/testfile.txt" should not exist
    And the version folder of file "/Shares/testshare/testfile.txt" for user "Alice" should contain "2" elements
    And the version folder of file "/testshare/testfile.txt" for user "Brian" should contain "2" elements
    Examples:
      | dav_version | mover | dst-folder        |
      | old         | Alice | /Shares/testshare |
      | new         | Alice | /Shares/testshare |
      | old         | Brian | /testshare        |
      | new         | Brian | /testshare        |

  @files_sharing-app-required @issue-ocis-reva-386
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
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "<mover>" moves file "<src-folder>/testfile.txt" to "/testfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testfile.txt" for user "<mover>" should be "test data 3"
    And as "Alice" file "/Shares/testshare/testfile.txt" should not exist
    And as "Brian" file "/testshare/testfile.txt" should not exist
    And the version folder of file "/testfile.txt" for user "<mover>" should contain "2" elements

    Examples:
      | dav_version | mover | src-folder        |
      | old         | Alice | /Shares/testshare |
      | new         | Alice | /Shares/testshare |
      | old         | Brian | /testshare |
      | new         | Brian | /testshare |

  @files_sharing-app-required
  Scenario: Receiver tries to get file versions of unshared file from the sharer
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "textfile0" to "textfile0.txt"
    And user "Alice" has uploaded file with content "textfile1" to "textfile1.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
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
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" tries to get versions of file "textfile0.txt" from "Alice"
    Then the HTTP status code should be "207"
    And the number of versions should be "3"


  Scenario: Receiver tries get file versions of shared file before receiving it
    Given user "Brian" has been created with default attributes and without skeleton files
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
    And user "Brian" has accepted share "/sharefile.txt" offered by user "Alice"
    When user "Brian" has uploaded file with content "Second content" to "/Shares/sharefile.txt"
    Then the HTTP status code should be "204"
    And the version folder of file "/Shares/sharefile.txt" for user "Brian" should contain "1" element
    And the version folder of file "/sharefile.txt" for user "Alice" should contain "1" element


  Scenario: download old versions of a shared file as share receiver
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "uploaded content" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" downloads the version of file "/Shares/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "version 1"
    When user "Brian" downloads the version of file "/Shares/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                                                |
      | Content-Disposition | attachment; filename*=UTF-8''textfile0.txt; filename="textfile0.txt" |
    And the downloaded content should be "uploaded content"
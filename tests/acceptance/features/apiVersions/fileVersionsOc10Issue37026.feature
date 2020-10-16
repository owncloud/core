@api @files_versions-app-required @issue-ocis-reva-275 @notToImplementOnOCIS

Feature: dav-versions

  @skipOnStorage:ceph @skipOnStorage:scality @files_primary_s3-issue-156
  @issue-ocis-reva-196 @skip @issue-37026
  Scenario: Restore a file and check, if the content and correct checksum is now in the current file
    Given using OCS API version "2"
    And using new DAV path
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "AAAAABBBBBCCCCC" and checksum "MD5:45a72715acdd5019c5be30bdbb75233e" to "/davtest.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/davtest.txt" with checksum "MD5:d70b40f177b14b470d1756a3c12b963a"
    And the version folder of file "/davtest.txt" for user "Alice" should contain "1" element
    When user "Alice" restores version index "1" of file "/davtest.txt" using the WebDAV API
    Then the content of file "/davtest.txt" for user "Alice" should be "AAAAABBBBBCCCCC"
    And as user "Alice" the webdav checksum of "/davtest.txt" via propfind should match "SHA1:3ee962b839762adb0ad8ba6023a4690be478de6f MD5:d70b40f177b14b470d1756a3c12b963a ADLER32:8ae90960"

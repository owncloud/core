@api @files_versions-app-required @notToImplementOnOCIS

Feature: dav-versions

  Background:
    Given using OCS API version "2"
    And using new DAV path
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files


  @files_sharing-app-required @issue-38027
  Scenario: sharee can restore a shared file created and modified by sharer, when the file has been moved by the sharee (file is inside a folder of the sharer)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "new content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has shared file "/sharingfolder/sharefile.txt" with user "Brian"
    And user "Brian" has accepted share "/sharingfolder/sharefile.txt" offered by user "Alice"
    And user "Brian" has created folder "/received"
    And user "Brian" has moved file "/Shares/sharefile.txt" to "/received/sharefile.txt"
    When user "Brian" restores version index "1" of file "/received/sharefile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/sharingfolder/sharefile.txt" for user "Alice" should be "old content"
    And the content of file "/received/sharefile.txt" for user "Brian" should be "old content"

@api @files_sharing-app-required @issue-ocis-1289 @issue-ocis-1328 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario Outline: moving a file into a share as recipient
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    And user "Brian" has uploaded file with content "some data" to "/textfile0.txt"
    When user "Brian" moves file "textfile0.txt" to "/Shares/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/Shares/shared/shared_file.txt" should exist
    And as "Alice" file "/shared/shared_file.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  @smokeTest @files_trashbin-app-required @notToImplementOnOCIS
  Scenario Outline: moving a file out of a share as recipient creates a backup for the owner
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/shared"
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared file "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    And user "Brian" has moved folder "/Shares/shared" to "/shared_renamed"
    When user "Brian" moves file "/shared_renamed/shared_file.txt" to "/taken_out.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/taken_out.txt" should exist
    And as "Alice" file "/shared/shared_file.txt" should not exist
    And as "Alice" file "/shared_file.txt" should exist in the trashbin
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_trashbin-app-required @notToImplementOnOCIS
  Scenario Outline: moving a folder out of a share as recipient creates a backup for the owner
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/shared"
    And user "Alice" has created folder "/shared/sub"
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/sub/shared_file.txt"
    And user "Alice" has shared file "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    And user "Brian" has moved folder "/Shares/shared" to "/shared_renamed"
    When user "Brian" moves folder "/shared_renamed/sub" to "/taken_out" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "/taken_out" should exist
    And as "Alice" folder "/shared/sub" should not exist
    And as "Alice" folder "/sub" should exist in the trashbin
    And as "Alice" file "/sub/shared_file.txt" should exist in the trashbin
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Move files between shares by same user
    Given using <dav_version> DAV path
    And user "Alice" has created folder "share1"
    And user "Alice" has created folder "share2"
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has moved file "textfile0.txt" to "share1/textfile0.txt"
    And user "Alice" has shared folder "/share1" with user "Brian"
    And user "Alice" has shared folder "/share2" with user "Brian"
    And user "Brian" has accepted share "/share1" offered by user "Alice"
    And user "Brian" has accepted share "/share2" offered by user "Alice"
    When user "Brian" moves file "/Shares/share1/textfile0.txt" to "/Shares/share2/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/Shares/share1/textfile0.txt" should not exist
    But as "Brian" file "/Shares/share2/textfile0.txt" should exist
    And as "Alice" file "share1/textfile0.txt" should not exist
    But as "Alice" file "share2/textfile0.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Move files between shares by same user added by sharee
    Given using <dav_version> DAV path
    And user "Alice" has created folder "share1"
    And user "Alice" has created folder "share2"
    And user "Brian" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has shared folder "/share1" with user "Brian"
    And user "Alice" has shared folder "/share2" with user "Brian"
    And user "Brian" has accepted share "/share1" offered by user "Alice"
    And user "Brian" has accepted share "/share2" offered by user "Alice"
    When user "Brian" moves file "textfile0.txt" to "/Shares/share1/shared_file.txt" using the WebDAV API
    And user "Brian" moves file "/Shares/share1/shared_file.txt" to "/Shares/share2/shared_file.txt" using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Brian" file "/Shares/share1/shared_file.txt" should not exist
    And as "Alice" file "share1/shared_file.txt" should not exist
    But as "Brian" file "/Shares/share2/shared_file.txt" should exist
    And as "Alice" file "share2/shared_file.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Move files between shares by different users
    Given using <dav_version> DAV path
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has created folder "/PARENT"
    And user "Brian" has created folder "/PARENT"
    And user "Alice" has moved file "textfile0.txt" to "PARENT/shared_file.txt"
    And user "Alice" has shared folder "/PARENT" with user "Carol"
    And user "Brian" has shared folder "/PARENT" with user "Carol"
    And user "Carol" has accepted share "/PARENT" offered by user "Alice"
    And user "Carol" has accepted share "/PARENT" offered by user "Brian"
    When user "Carol" moves file "/Shares/PARENT/shared_file.txt" to "/Shares/PARENT (2)/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Carol" file "/Shares/PARENT (2)/shared_file.txt" should exist
    And as "Brian" file "PARENT/shared_file.txt" should exist
    But as "Alice" file "PARENT/shared_file.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: overwrite a received file share
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "this is the old content" to "/textfile1.txt"
    And user "Alice" has shared file "/textfile1.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile1.txt" offered by user "Alice"
    When user "Brian" uploads file with content "this is a new content" to "/Shares/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" file "Shares/textfile1.txt" should exist
    And the content of file "Shares/textfile1.txt" for user "Brian" should be "this is a new content"
    And the content of file "textfile1.txt" for user "Alice" should be "this is a new content"
    Examples:
      | dav_version |
      | old         |
      | new         |


@api @files_sharing-app-required
Feature: sharing

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"

  @smokeTest
  Scenario Outline: moving a file into a share as recipient
    Given using <dav-path-version> DAV path
    And user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    When user "Brian" moves file "/textfile0.txt" to "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/shared/shared_file.txt" should exist
    And as "Alice" file "/shared/shared_file.txt" should exist
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  @smokeTest @files_trashbin-app-required
  Scenario Outline: moving a file out of a share as recipient creates a backup for the owner
    Given using <dav-path-version> DAV path
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared file "/shared" with user "Brian"
    And user "Brian" has moved folder "/shared" to "/shared_renamed"
    When user "Brian" moves file "/shared_renamed/shared_file.txt" to "/taken_out.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/taken_out.txt" should exist
    And as "Alice" file "/shared/shared_file.txt" should not exist
    And as "Alice" file "/shared_file.txt" should exist in the trashbin
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  @files_trashbin-app-required
  Scenario Outline: moving a folder out of a share as recipient creates a backup for the owner
    Given using <dav-path-version> DAV path
    And user "Alice" has created folder "/shared"
    And user "Alice" has created folder "/shared/sub"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/sub/shared_file.txt"
    And user "Alice" has shared file "/shared" with user "Brian"
    And user "Brian" has moved folder "/shared" to "/shared_renamed"
    When user "Brian" moves folder "/shared_renamed/sub" to "/taken_out" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "/taken_out" should exist
    And as "Alice" folder "/shared/sub" should not exist
    And as "Alice" folder "/sub" should exist in the trashbin
    And as "Alice" file "/sub/shared_file.txt" should exist in the trashbin
    Examples:
      | dav-path-version |
      | old              |
      | new              |


  Scenario: Move files between shares by same user
    Given user "Alice" has created folder "share1"
    And user "Alice" has created folder "share2"
    And user "Alice" has moved file "textfile0.txt" to "share1/shared_file.txt"
    And user "Alice" has shared folder "/share1" with user "Brian"
    And user "Alice" has shared folder "/share2" with user "Brian"
    When user "Brian" moves file "share1/shared_file.txt" to "share2/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "share1/shared_file.txt" should not exist
    But as "Brian" file "share2/shared_file.txt" should exist
    And as "Alice" file "share1/shared_file.txt" should not exist
    But as "Alice" file "share2/shared_file.txt" should exist


  Scenario: Move files between shares by same user added by sharee
    Given user "Alice" has created folder "share1"
    And user "Alice" has created folder "share2"
    And user "Alice" has shared folder "/share1" with user "Brian"
    And user "Alice" has shared folder "/share2" with user "Brian"
    And user "Alice" has moved file "/textfile0.txt" to "share1/shared_file.txt"
    When user "Brian" moves file "share1/shared_file.txt" to "share2/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "share2/shared_file.txt" should exist
    And as "Alice" file "share2/shared_file.txt" should exist


  Scenario: Move files between shares by different users
    Given user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Brian" has created folder "/PARENT"
    And user "Carol" has created folder "/PARENT"
    And user "Alice" has moved file "textfile0.txt" to "PARENT/shared_file.txt"
    And user "Alice" has shared folder "/PARENT" with user "Carol"
    And user "Brian" has shared folder "/PARENT" with user "Carol"
    When user "Carol" moves file "PARENT (2)/shared_file.txt" to "PARENT (3)/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Carol" file "PARENT (3)/shared_file.txt" should exist
    And as "Brian" file "PARENT/shared_file.txt" should exist
    But as "Alice" file "PARENT/shared_file.txt" should not exist


  Scenario: overwrite a received file share
    Given user "Alice" has uploaded file with content "this is the old content" to "/textfile1.txt"
    And user "Alice" has shared file "/textfile1.txt" with user "Brian"
    When user "Brian" uploads file with content "this is a new content" to "/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" file "/textfile1.txt" should exist
    And the content of file "/textfile1.txt" for user "Brian" should be "this is a new content"
    And the content of file "/textfile1.txt" for user "Alice" should be "this is a new content"

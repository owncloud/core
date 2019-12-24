@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: sharing

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |

  @smokeTest
  Scenario Outline: moving a file into a share as recipient
    Given using <dav-path-version> DAV path
    And user "user0" has created folder "/shared"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user1" moves file "/textfile0.txt" to "/shared/shared_file.txt" using the WebDAV API
    Then as "user1" file "/shared/shared_file.txt" should exist
    And as "user0" file "/shared/shared_file.txt" should exist
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  @smokeTest @files_trashbin-app-required
  Scenario Outline: moving a file out of a share as recipient creates a backup for the owner
    Given using <dav-path-version> DAV path
    And user "user0" has created folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared file "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/shared_renamed"
    When user "user1" moves file "/shared_renamed/shared_file.txt" to "/taken_out.txt" using the WebDAV API
    Then as "user1" file "/taken_out.txt" should exist
    And as "user0" file "/shared/shared_file.txt" should not exist
    And as "user0" file "/shared_file.txt" should exist in trash
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  @files_trashbin-app-required
  Scenario Outline: moving a folder out of a share as recipient creates a backup for the owner
    Given using <dav-path-version> DAV path
    And user "user0" has created folder "/shared"
    And user "user0" has created folder "/shared/sub"
    And user "user0" has moved file "/textfile0.txt" to "/shared/sub/shared_file.txt"
    And user "user0" has shared file "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/shared_renamed"
    When user "user1" moves folder "/shared_renamed/sub" to "/taken_out" using the WebDAV API
    Then as "user1" file "/taken_out" should exist
    And as "user0" folder "/shared/sub" should not exist
    And as "user0" folder "/sub" should exist in trash
    And as "user0" file "/sub/shared_file.txt" should exist in trash
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  Scenario: Move files between shares by same user
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created folder "share1"
    And user "user0" has created folder "share2"
    And user "user0" has moved file "welcome.txt" to "share1/welcome.txt"
    And user "user0" has shared folder "/share1" with user "user1"
    And user "user0" has shared folder "/share2" with user "user1"
    When user "user1" moves file "share1/welcome.txt" to "share2/welcome.txt" using the WebDAV API
    Then as "user1" file "share1/welcome.txt" should not exist
    But as "user1" file "share2/welcome.txt" should exist
    And as "user0" file "share1/welcome.txt" should not exist
    But as "user0" file "share2/welcome.txt" should exist

  Scenario: Move files between shares by same user added by sharee
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created folder "share1"
    And user "user0" has created folder "share2"
    And user "user0" has shared folder "/share1" with user "user1"
    And user "user0" has shared folder "/share2" with user "user1"
    When user "user1" moves file "welcome.txt" to "share1/welcome.txt" using the WebDAV API
    Then as "user1" file "share1/welcome.txt" should exist
    And as "user0" file "share1/welcome.txt" should exist
    When user "user1" moves file "share1/welcome.txt" to "share2/welcome.txt" using the WebDAV API
    Then as "user1" file "share2/welcome.txt" should exist
    And as "user0" file "share2/welcome.txt" should exist

  Scenario: Move files between shares by different users
    Given the administrator has enabled DAV tech_preview
    And user "user3" has been created with default attributes and skeleton files
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has shared folder "/PARENT" with user "user3"
    And user "user1" has shared folder "/PARENT" with user "user3"
    When user "user3" moves file "PARENT (2)/welcome.txt" to "PARENT (3)/welcome.txt" using the WebDAV API
    Then as "user3" file "PARENT (3)/welcome.txt" should exist
    And as "user1" file "PARENT/welcome.txt" should exist
    But as "user0" file "PARENT/welcome.txt" should not exist

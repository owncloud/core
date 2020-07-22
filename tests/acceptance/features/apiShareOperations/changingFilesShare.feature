@api @files_sharing-app-required @skipOnOcis @issue-ocis-reva-14 @issue-ocis-reva-243
Feature: sharing

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario Outline: moving a file into a share as recipient
    Given using <dav-path-version> DAV path
    And user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    When user "Brian" moves file "/textfile0.txt" to "/shared/shared_file.txt" using the WebDAV API
    Then as "Brian" file "/shared/shared_file.txt" should exist
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
    Then as "Brian" file "/taken_out.txt" should exist
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
    Then as "Brian" folder "/taken_out" should exist
    And as "Alice" folder "/shared/sub" should not exist
    And as "Alice" folder "/sub" should exist in the trashbin
    And as "Alice" file "/sub/shared_file.txt" should exist in the trashbin
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  Scenario: Move files between shares by same user
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has created folder "share1"
    And user "Alice" has created folder "share2"
    And user "Alice" has moved file "welcome.txt" to "share1/welcome.txt"
    And user "Alice" has shared folder "/share1" with user "Brian"
    And user "Alice" has shared folder "/share2" with user "Brian"
    When user "Brian" moves file "share1/welcome.txt" to "share2/welcome.txt" using the WebDAV API
    Then as "Brian" file "share1/welcome.txt" should not exist
    But as "Brian" file "share2/welcome.txt" should exist
    And as "Alice" file "share1/welcome.txt" should not exist
    But as "Alice" file "share2/welcome.txt" should exist

  Scenario: Move files between shares by same user added by sharee
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has created folder "share1"
    And user "Alice" has created folder "share2"
    And user "Alice" has shared folder "/share1" with user "Brian"
    And user "Alice" has shared folder "/share2" with user "Brian"
    When user "Brian" moves file "welcome.txt" to "share1/welcome.txt" using the WebDAV API
    Then as "Brian" file "share1/welcome.txt" should exist
    And as "Alice" file "share1/welcome.txt" should exist
    When user "Brian" moves file "share1/welcome.txt" to "share2/welcome.txt" using the WebDAV API
    Then as "Brian" file "share2/welcome.txt" should exist
    And as "Alice" file "share2/welcome.txt" should exist

  Scenario: Move files between shares by different users
    Given the administrator has enabled DAV tech_preview
    And user "Carol" has been created with default attributes and skeleton files
    And user "Alice" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "Alice" has shared folder "/PARENT" with user "Carol"
    And user "Brian" has shared folder "/PARENT" with user "Carol"
    When user "Carol" moves file "PARENT (2)/welcome.txt" to "PARENT (3)/welcome.txt" using the WebDAV API
    Then as "Carol" file "PARENT (3)/welcome.txt" should exist
    And as "Brian" file "PARENT/welcome.txt" should exist
    But as "Alice" file "PARENT/welcome.txt" should not exist

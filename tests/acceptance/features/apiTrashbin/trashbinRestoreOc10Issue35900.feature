@api @files_trashbin-app-required @issue-ocis-reva-52 @notToImplementOnOCIS
Feature: Restore deleted files/folders
  As a user
  I would like to restore files/folders
  So that I can recover accidentally deleted files/folders in ownCloud

  Background:
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "file to delete" to "/textfile0.txt"

  @issue-35900 @files_sharing-app-required
  Scenario Outline: restoring a file to a read-only folder
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "shareFolderParent"
    And user "Brian" has shared folder "shareFolderParent" with user "Alice" with permissions "read"
    And as "Alice" folder "/shareFolderParent" should exist
    And user "Alice" has deleted file "/textfile0.txt"
    When user "Alice" restores the file with original path "/textfile0.txt" to "/shareFolderParent/textfile0.txt" using the trashbin API
    Then the HTTP status code should be "201"
    #Then the HTTP status code should be "403"
    And as "Alice" the file with original path "/textfile0.txt" should not exist in the trashbin
    #And as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" file "/shareFolderParent/textfile0.txt" should exist
    #And as "Alice" file "/shareFolderParent/textfile0.txt" should not exist
    And as "Brian" file "/shareFolderParent/textfile0.txt" should exist
    #And as "Brian" file "/shareFolderParent/textfile0.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  @issue-35900 @files_sharing-app-required
  Scenario Outline: restoring a file to a read-only sub-folder
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "shareFolderParent"
    And user "Brian" has created folder "shareFolderParent/shareFolderChild"
    And user "Brian" has shared folder "shareFolderParent" with user "Alice" with permissions "read"
    And as "Alice" folder "/shareFolderParent/shareFolderChild" should exist
    And user "Alice" has deleted file "/textfile0.txt"
    When user "Alice" restores the file with original path "/textfile0.txt" to "/shareFolderParent/shareFolderChild/textfile0.txt" using the trashbin API
    Then the HTTP status code should be "201"
    #Then the HTTP status code should be "403"
    And as "Alice" the file with original path "/textfile0.txt" should not exist in the trashbin
    #And as "Alice" the file with original path "/textfile0.txt" should exist in the trashbin
    And as "Alice" file "/shareFolderParent/shareFolderChild/textfile0.txt" should exist
    #And as "Alice" file "/shareFolderParent/shareFolderChild/textfile0.txt" should not exist
    And as "Brian" file "/shareFolderParent/shareFolderChild/textfile0.txt" should exist
    #And as "Brian" file "/shareFolderParent/shareFolderChild/textfile0.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

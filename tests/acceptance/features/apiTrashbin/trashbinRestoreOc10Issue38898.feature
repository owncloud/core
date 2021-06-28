@api @files_trashbin-app-required @notToImplementOnOCIS
Feature: Restore deleted files/folders
  As a user
  I would like to restore files/folders
  So that I can recover accidentally deleted files/folders in ownCloud

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "file to delete" to "/textfile0.txt"

  # this is a bug demo scenario for https://github.com/owncloud/core/issues/38898
  # Once the issue is fixed unskip the test apiTrashbin/trashbinRestore.feature:506
  Scenario Outline: A deleted file inside a nested folder cannot be restored without the destination
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/parent_folder"
    And user "Alice" has created folder "/parent_folder/sub"
    And user "Alice" has uploaded file with content "parent text" to "/parent_folder/sub/parent.txt"
    And user "Alice" has deleted folder "parent_folder"
    When user "Alice" restores the folder with original path "/parent_folder/sub/parent.txt" without specifying the destination using the trashbin API
    Then the HTTP status code should be "403"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "<dav_error_message>"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\Forbidden"
    And as "Alice" the file with original path "/parent_folder/sub/parent.txt" should exist in the trashbin
    And user "Alice" should not see the following elements
      | /parent_folder/               |
      | /parent_folder/sub/           |
      | /parent_folder/sub/parent.txt |
    Examples:
      | dav-path | dav_error_message                                                     |
      | old      | Requested uri () is out of base uri (/%base_path%/remote.php/webdav/) |
      | new      | Requested uri () is out of base uri (/%base_path%/remote.php/dav/)    |

  # this is a bug demo scenario for https://github.com/owncloud/core/issues/38898
  # Once the issue is fixed unskip the test apiTrashbin/trashbinRestore.feature:525
  Scenario Outline: A deleted file cannot be restored without the destination
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "parent text" to "/parent.txt"
    And user "Alice" has deleted file "parent.txt"
    When user "Alice" restores the folder with original path "parent.txt" without specifying the destination using the trashbin API
    Then the HTTP status code should be "403"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "<dav_error_message>"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\Forbidden"
    And as "Alice" the file with original path "parent.txt" should exist in the trashbin
    And user "Alice" should not see the following elements
      | /parent.txt               |
    Examples:
      | dav-path | dav_error_message                                                     |
      | old      | Requested uri () is out of base uri (/%base_path%/remote.php/webdav/) |
      | new      | Requested uri () is out of base uri (/%base_path%/remote.php/dav/)    |

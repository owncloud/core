@api @local_storage @files_external-app-required
Feature: local-storage

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @skipOnEncryptionType:user-keys @encryption-issue-181
  Scenario Outline: receiver renames a received file share from local storage
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/local_storage/filetoshare.txt"
    And user "Alice" has shared file "/local_storage/filetoshare.txt" with user "Brian"
    And user "Brian" has accepted share "<pending_share_path>" offered by user "Alice"
    When user "Brian" moves file "/Shares/filetoshare.txt" to "/Shares/newFile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/Shares/newFile.txt" should exist
    But as "Brian" file "/Shares/filetoshare.txt" should not exist
    And as "Alice" file "/local_storage/filetoshare.txt" should exist
    But as "Alice" file "/local_storage/newFile.txt" should not exist
    Examples:
      | ocs_api_version | pending_share_path |
      | 1               | /filetoshare.txt   |
      | 2               | /filetoshare.txt   |


  Scenario Outline: receiver renames a received folder share from local storage
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/local_storage/foo"
    And user "Alice" has shared folder "/local_storage/foo" with user "Brian"
    And user "Brian" has accepted share "<pending_share_path>" offered by user "Alice"
    When user "Brian" moves folder "/Shares/foo" to "/Shares/newFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "/Shares/newFolder" should exist
    But as "Brian" folder "/Shares/foo" should not exist
    And as "Alice" folder "/local_storage/foo" should exist
    But as "Alice" folder "/local_storage/newFolder" should not exist
    Examples:
      | ocs_api_version | pending_share_path |
      | 1               | /foo               |
      | 2               | /foo               |

  @skipOnEncryptionType:user-keys @encryption-issue-181
  Scenario Outline: sub-folders,file inside a renamed received folder shared from local storage are accessible
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/local_storage/foo"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/local_storage/foo/filetoshare.txt"
    And user "Alice" has created folder "/local_storage/foo/folder1"
    And user "Alice" has created folder "/local_storage/foo/folder2"
    And user "Alice" has created folder "/local_storage/foo/folder2/subfolder"
    And user "Alice" has shared folder "/local_storage/foo" with user "Brian"
    And user "Brian" has accepted share "<pending_share_path>" offered by user "Alice"
    When user "Brian" moves folder "/Shares/foo" to "/Shares/newFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "/Shares/newFolder" should exist
    And as "Brian" file "/Shares/newFolder/filetoshare.txt" should exist
    And as "Brian" folder "/Shares/newFolder/folder1" should exist
    And as "Brian" folder "/Shares/newFolder/folder2" should exist
    And as "Brian" folder "/Shares/newFolder/folder2/subfolder" should exist
    But as "Brian" folder "/Shares/foo" should not exist
    And as "Alice" folder "/local_storage/foo" should exist
    But as "Alice" folder "/local_storage/newFolder" should not exist
    Examples:
      | ocs_api_version | pending_share_path |
      | 1               | /foo               |
      | 2               | /foo               |

  @skipOnEncryptionType:user-keys @encryption-issue-181
  Scenario Outline: receiver renames a received file share from local storage in group sharing
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/local_storage/filetoshare.txt"
    And user "Alice" has shared file "/local_storage/filetoshare.txt" with group "grp1"
    And user "Brian" has accepted share "<pending_share_path>" offered by user "Alice"
    When user "Brian" moves file "/Shares/filetoshare.txt" to "/Shares/newFile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/Shares/newFile.txt" should exist
    But as "Brian" file "/Shares/filetoshare.txt" should not exist
    And as "Alice" file "/local_storage/filetoshare.txt" should exist
    But as "Alice" file "/local_storage/newFile.txt" should not exist
    Examples:
      | ocs_api_version | pending_share_path |
      | 1               | /filetoshare.txt   |
      | 2               | /filetoshare.txt   |      
 
@api @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: Restore deleted files/folders
  As a user
  I would like to restore files/folders
  So that I can recover accidentally deleted files/folders in ownCloud

  Background:
    Given using OCS API version "1"
    And as user "%admin%"

  Scenario Outline: deleting a file in a received folder when restored it comes back to the original path
    Given using <dav-path> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has moved file "/shared" to "/renamed_shared"
    And user "user1" has deleted file "/renamed_shared/shared_file.txt"
    And user "user1" has logged in to a web-style session
    When user "user1" restores the file with original path "/renamed_shared/shared_file.txt" using the trashbin API
    Then as "user1" the file with original path "/renamed_shared/shared_file.txt" should not exist in trash
    And user "user1" should see the following elements
      | /renamed_shared/                |
      | /renamed_shared/shared_file.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |

  @smokeTest
  Scenario Outline: A deleted file can be restored
    Given using <dav-path> DAV path
    And user "user0" has been created
    And user "user0" has deleted file "/textfile0.txt"
    And as "user0" the file "/textfile0.txt" should exist in trash
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/textfile0.txt" using the trashbin API
    Then as "user0" the folder with original path "/textfile0.txt" should not exist in trash
    And user "user0" should see the following elements
      | /FOLDER/           |
      | /PARENT/           |
      | /PARENT/parent.txt |
      | /textfile0.txt     |
      | /textfile1.txt     |
      | /textfile2.txt     |
      | /textfile3.txt     |
      | /textfile4.txt     |
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: A file deleted from a folder can be restored to the original folder
    Given using <dav-path> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "user0" has deleted file "/new-folder/new-file.txt"
    And user "user0" has logged in to a web-style session
    When user "user0" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
    And as "user0" the file "/new-folder/new-file.txt" should exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: A file deleted from a folder is restored to root if the original folder does not exist
    Given using <dav-path> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "user0" has deleted file "/new-folder/new-file.txt"
    And user "user0" has deleted folder "/new-folder"
    And user "user0" has logged in to a web-style session
    When user "user0" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
    And as "user0" the file "/new-file.txt" should exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: A file deleted from a folder is restored to the original folder if the original folder was deleted and restored
    Given using <dav-path> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "user0" has deleted file "/new-folder/new-file.txt"
    And user "user0" has deleted folder "/new-folder"
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/new-folder" using the trashbin API
    And user "user0" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
    And as "user0" the file "/new-folder/new-file.txt" should exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: A file deleted from a folder is restored to the original folder if the original folder was deleted and recreated
    Given using <dav-path> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "user0" has deleted file "/new-folder/new-file.txt"
    And user "user0" has deleted folder "/new-folder"
    And user "user0" has logged in to a web-style session
    When user "user0" creates a folder "/new-folder" using the WebDAV API
    And user "user0" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
    And as "user0" the file "/new-folder/new-file.txt" should exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  @local_storage
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore
  Scenario Outline: Deleting a file into external storage moves it to the trashbin and can be restored
    Given using <dav-path> DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "user0" has been created
    And user "user0" has created a folder "/local_storage/tmp"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    And user "user0" has deleted file "/local_storage/tmp/textfile0.txt"
    And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in trash
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the trashbin API
    Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in trash
    And user "user0" should see the following elements
      | /local_storage/                  |
      | /local_storage/tmp/              |
      | /local_storage/tmp/textfile0.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |

  @local_storage
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore
  Scenario: Deleting an updated file into external storage moves it to the trashbin and can be restored
    Given using old DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "user0" has been created
    And user "user0" has created a folder "/local_storage/tmp"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    And user "user0" has uploaded chunk file "1" of "1" with "AA" to "/local_storage/tmp/textfile0.txt"
    And user "user0" has deleted file "/local_storage/tmp/textfile0.txt"
    And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in trash
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the trashbin API
    Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in trash
    And the downloaded content when downloading file "/local_storage/tmp/textfile0.txt" for user "user0" with range "bytes=0-1" should be "AA"

  @local_storage
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore
  Scenario: Deleting an updated file into external storage moves it to the trashbin and can be restored
    Given using new DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "user0" has been created
    And user "user0" has created a folder "/local_storage/tmp"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    And user "user0" has uploaded the following chunks to "/local_storage/tmp/textfile0.txt" with new chunking
      | 1 | AA |
    And user "user0" has deleted file "/local_storage/tmp/textfile0.txt"
    And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in trash
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the trashbin API
    Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in trash
    And the downloaded content when downloading file "/local_storage/tmp/textfile0.txt" for user "user0" with range "bytes=0-1" should be "AA"
    
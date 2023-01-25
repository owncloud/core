@cli
Feature: transfer-ownership

  @smokeTest @skipOnEncryptionType:user-keys
  Scenario: transferring ownership of a file
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has uploaded file with content "some data" to "/somefile.txt"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the downloaded content when downloading file "/somefile.txt" for user "Brian" from the last received transfer folder should be "some data"

  @skipOnEncryptionType:user-keys
  Scenario: transferring ownership of a file after updating the file
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has uploaded file "filesForUpload/file_to_overwrite.txt" to "/PARENT/textfile0.txt"
    And user "Alice" has uploaded the following "3" chunks to "/PARENT/textfile0.txt" with old chunking
      | number | content |
      | 1      | AA      |
      | 2      | BB      |
      | 3      | CC      |
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the downloaded content when downloading file "/PARENT/textfile0.txt" for user "Brian" from the last received transfer folder should be "AABBCC"

  @skipOnEncryptionType:user-keys
  Scenario: transferring ownership of a folder
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the downloaded content when downloading file "/test/somefile.txt" for user "Brian" from the last received transfer folder should be "some data"

  @skipOnEncryptionType:user-keys @files_sharing-app-required @skipOnFilesClassifier @issue-files-classifier-292
  Scenario: transferring ownership of file shares
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Alice" has uploaded file with content "some data" to "/somefile.txt"
    And user "Alice" has shared file "/somefile.txt" with user "Carol" with permissions "share,update,read"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the content of file "/somefile.txt" for user "Carol" should be "some data"

  @skipOnEncryptionType:user-keys @files_sharing-app-required @skipOnFilesClassifier @issue-files-classifier-292
  Scenario: transferring ownership when a folder is shared with third user
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    And user "Alice" has shared folder "/test" with user "Carol" with permissions "all"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the content of file "/test/somefile.txt" for user "Carol" should be "some data"

  @skipOnEncryptionType:user-keys @files_sharing-app-required
  Scenario: transferring ownership when a folder is shared with transfer recipient
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    And user "Alice" has shared folder "/test" with user "Brian" with permissions "all"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/test" should not exist
    And the downloaded content when downloading file "/test/somefile.txt" for user "Brian" from the last received transfer folder should be "some data"

  @skipOnEncryptionType:user-keys @files_sharing-app-required @skipOnFilesClassifier @issue-files-classifier-292
  Scenario: transferring ownership when a folder is doubly shared with third user
    Given group "group1" has been created
    And user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Carol" has been added to group "group1"
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    And user "Alice" has shared folder "/test" with group "group1" with permissions "all"
    And user "Alice" has shared folder "/test" with user "Carol" with permissions "all"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the content of file "/test/somefile.txt" for user "Carol" should be "some data"

  @skipOnEncryptionType:user-keys @files_sharing-app-required
  Scenario: transferring ownership does not transfer received shares
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Carol" has created folder "/test"
    And user "Carol" has shared folder "/test" with user "Alice" with permissions "all"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/test" should not exist in the last received transfer folder

  @skipOnEncryptionType:user-keys @files_sharing-app-required
  Scenario: transferring ownership does not transfer reshares
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "David" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/testByAlice"
    And user "Alice" has shared folder "/testByAlice" with user "Brian" with permissions "all"
    And user "Brian" has shared folder "/testByAlice" with user "Carol" with permissions "all"
    And user "Brian" has created folder "/testByBrian"
    And user "Brian" has shared folder "/testByBrian" with user "Carol" with permissions "all"
    When the administrator transfers ownership from "Brian" to "David" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/testByAlice" should exist
    But as "Brian" folder "/testByBrian" should not exist
    And as "David" folder "/testByBrian" should exist in the last received transfer folder
    But as "David" folder "/testByAlice" should not exist in the last received transfer folder
    And as "Carol" folder "/testByAlice" should exist
    And as "Carol" folder "/testByBrian" should exist

  @local_storage @files_external-app-required @skipOnEncryptionType:user-keys
  Scenario: transferring ownership does not transfer external storage
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/local_storage" should not exist in the last received transfer folder

  @skipOnEncryptionType:user-keys @files_sharing-app-required
  Scenario: transferring ownership does not fail with shared trashed files
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/sub"
    And user "Alice" has created folder "/sub/test"
    And user "Alice" has shared folder "/sub/test" with user "Carol" with permissions "all"
    And user "Alice" has deleted folder "/sub"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful


  Scenario: transferring ownership fails with invalid source user
    Given user "Alice" has been created with default attributes and small skeleton files
    When the administrator transfers ownership from "invalid_user" to "Alice" using the occ command
    Then the command output should contain the text "Unknown source user"
    And the command should have failed with exit code 1


  Scenario: transferring ownership fails with invalid destination user
    Given user "Alice" has been created with default attributes and small skeleton files
    When the administrator transfers ownership from "Alice" to "invalid_user" using the occ command
    Then the command output should contain the text "Unknown destination user"
    And the command should have failed with exit code 1

  @smokeTest @skipOnEncryptionType:user-keys
  Scenario: transferring ownership of only a single folder containing a file
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    When the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the downloaded content when downloading file "/test/somefile.txt" for user "Brian" from the last received transfer folder should be "some data"


  Scenario: transferring ownership of only a single folder containing an empty folder
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has created folder "/test/subfolder"
    When the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/test" should exist in the last received transfer folder
    And as "Brian" folder "/test/subfolder" should exist in the last received transfer folder


  Scenario: transferring ownership of an account containing only an empty folder
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has deleted everything from folder "/"
    And user "Alice" has created folder "/test"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/test" should exist in the last received transfer folder

  @skipOnEncryptionType:user-keys @files_sharing-app-required @skipOnFilesClassifier @issue-files-classifier-292
  Scenario: transferring ownership of file shares for file inside a folder
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    And user "Alice" has shared file "/test/somefile.txt" with user "Carol" with permissions "share,update,read"
    When the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the content of file "/somefile.txt" for user "Carol" should be "some data"

  @skipOnEncryptionType:user-keys @public_link_share-feature-required @files_sharing-app-required @skipOnFilesClassifier @issue-files-classifier-292
  Scenario Outline: transferring ownership of folder shares which has public link
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "Random data" to "/test/somefile.txt"
    And user "Alice" has created a public link share with settings
      | path | /test/somefile.txt |
    When the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the public should be able to download the last publicly shared file using the <webdav_api_version> public WebDAV API without a password and the content should be "Random data"

    @issue-ocis-2079
    Examples:
      | webdav_api_version |
      | old                |
      | new                |

  @skipOnEncryptionType:user-keys @files_sharing-app-required @skipOnFilesClassifier @issue-files-classifier-292
  Scenario: transferring ownership of folder shared with third user
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    And user "Alice" has shared folder "/test" with user "Carol" with permissions "all"
    When the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the content of file "/test/somefile.txt" for user "Carol" should be "some data"

  @skipOnEncryptionType:user-keys @files_sharing-app-required
  Scenario: transferring ownership of folder shared with transfer recipient
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    And user "Alice" has shared folder "/test" with user "Brian" with permissions "all"
    When the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/test" should not exist
    And the downloaded content when downloading file "/test/somefile.txt" for user "Brian" from the last received transfer folder should be "some data"

  @skipOnEncryptionType:user-keys @files_sharing-app-required @skipOnFilesClassifier @issue-files-classifier-292
  Scenario: transferring ownership of folder doubly shared with third user
    Given group "group1" has been created
    And user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Carol" has been added to group "group1"
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file with content "some data" to "/test/somefile.txt"
    And user "Alice" has shared folder "/test" with group "group1" with permissions "all"
    And user "Alice" has shared folder "/test" with user "Carol" with permissions "all"
    When the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And the content of file "/test/somefile.txt" for user "Carol" should be "some data"

  @files_sharing-app-required
  Scenario: transferring ownership of a folder does not transfer received shares
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Carol" has created folder "/test"
    And user "Alice" has created folder "/sub"
    And user "Carol" has shared folder "/test" with user "Alice" with permissions "all"
    And user "Alice" has moved folder "/test" to "/sub/test"
    When the administrator transfers ownership of path "sub" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/sub/test" should not exist in the last received transfer folder

  @skipOnEncryptionType:user-keys @public_link_share-feature-required @files_sharing-app-required @skipOnFilesClassifier @issue-files-classifier-292
  Scenario: transferring ownership of folder shared with transfer recipient and public link created of received share works
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has created folder "/test/foo"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/test/somefile.txt"
    And user "Alice" creates a public link share using the sharing API with settings
      | path | /test/somefile.txt |
    And user "Alice" has shared file "/test" with user "Brian" with permissions "all"
    And user "Brian" creates a public link share using the sharing API with settings
      | path | /test |
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Alice" folder "/test" should not exist

  @local_storage @files_external-app-required
  Scenario: transferring ownership of a folder does not transfer external storage
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/sub"
    When the administrator transfers ownership of path "sub" from "Alice" to "Brian" using the occ command
    Then the command should have been successful
    And as "Brian" folder "/local_storage" should not exist in the last received transfer folder


  Scenario: transferring ownership of a folder fails with invalid source user
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/sub"
    When the administrator transfers ownership of path "sub" from "invalid_user" to "Alice" using the occ command
    Then the command output should contain the text "Unknown source user"
    And the command should have failed with exit code 1


  Scenario: transferring ownership of a folder fails with invalid destination user
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/sub"
    When the administrator transfers ownership of path "sub" from "Alice" to "invalid_user" using the occ command
    Then the command output should contain the text "Unknown destination user"
    And the command should have failed with exit code 1


  Scenario: transferring ownership fails with invalid path
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    When the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    Then the command output should contain the text "Unknown path provided"
    And the command should have failed with exit code 1


  Scenario: transferring ownership fails with empty files
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has deleted everything from folder "/"
    When the administrator transfers ownership from "Alice" to "Brian" using the occ command
    Then the command output should contain the text "No files/folders to transfer"
    And the command should have failed with exit code 1

  @skipOnEncryptionType:user-keys
  Scenario: troubleshoot transfer ownerships for all with share and reshare
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "David" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/testByAlice"
    And user "Alice" has shared folder "/testByAlice" with user "Brian" with permissions "all"
    And user "Brian" has shared folder "/testByAlice" with user "Carol" with permissions "all"
    And user "Brian" has created folder "/testByBrian"
    And user "Brian" has shared folder "/testByBrian" with user "Carol" with permissions "all"
    And the administrator transfers ownership from "Brian" to "David" using the occ command
    When the administrator troubleshoots transfer of ownerships for "all" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Searching for reshares that have invalid uid_initiator"
    And the command output should contain the text "Found 0 invalid initiator reshares"
    And the command output should contain the text "Searching for shares that have invalid uid_owner"
    And the command output should contain the text "Found 0 invalid share owners"

  @skipOnEncryptionType:user-keys
  Scenario: troubleshoot transfer ownerships for invalid-initiator with reshare
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "David" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/testByAlice"
    And user "Alice" has shared folder "/testByAlice" with user "Brian" with permissions "all"
    And user "Brian" has shared folder "/testByAlice" with user "Carol" with permissions "all"
    And the administrator transfers ownership from "Brian" to "David" using the occ command
    When the administrator troubleshoots transfer of ownerships for "invalid-initiator" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Searching for reshares that have invalid uid_initiator"
    And the command output should contain the text "Found 0 invalid initiator reshares"

  @skipOnEncryptionType:user-keys
  Scenario: troubleshoot transfer ownerships for invalid-owner with share
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/test/somefile.txt"
    And user "Alice" has shared folder "/test" with user "Carol" with permissions "all"
    And the administrator transfers ownership of path "test" from "Alice" to "Brian" using the occ command
    When the administrator troubleshoots transfer of ownerships for "invalid-owner" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Searching for shares that have invalid uid_owner"
    And the command output should contain the text "Found 0 invalid share owners"

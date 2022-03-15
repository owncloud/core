@cli @local_storage @files_external-app-required @skipOnLDAP
Feature: create local storage from the command line
  As an admin
  I want to create local storage from the command line
  So that local folders on my server can be made visible to users of ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  Scenario: create local storage that is available to all users
    When the administrator creates the local storage mount "local_storage2" using the occ command
    And the administrator uploads file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt" using the WebDAV API
    And the administrator uploads file with content "this is a file to delete in local storage" to "/local_storage2/file-to-delete.txt" using the WebDAV API
    And the administrator uploads file with content "this is a file to rename in local storage" to "/local_storage2/file-to-rename.txt" using the WebDAV API
    Then the command should have been successful
    And as "Alice" folder "/local_storage2" should exist
    And as "Brian" folder "/local_storage2" should exist
    And user "Alice" should be able to delete file "/local_storage2/file-to-delete.txt"
    And user "Alice" should be able to rename file "/local_storage2/file-to-rename.txt" to "/local_storage2/another-name.txt"
    And user "Alice" should be able to upload file "filesForUpload/textfile.txt" to "/local_storage2/textfile.txt"
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Brian" should be "this is a file in local storage"
    And the content of file "/local_storage2/another-name.txt" for user "Brian" should be "this is a file to rename in local storage"
    And as "Brian" file "/local_storage2/textfile.txt" should exist
    And as "Brian" file "/local_storage2/file-to-delete.txt" should not exist

  Scenario: user cannot rename a local storage
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When user "Alice" moves folder "local_storage2" to "another_name" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And as "Alice" folder "/another_name" should not exist

  Scenario: user cannot delete a local storage
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When user "Alice" deletes folder "local_storage2" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"

  Scenario: user cannot create a folder that matches a local storage
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When user "Alice" creates folder "local_storage2" using the WebDAV API
    Then the HTTP status code should be "405"
    And as "Alice" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"

  Scenario: user cannot upload a file that matches a local storage folder name
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When user "Alice" uploads file with content "this is a file called local_storage2" to "/local_storage2" using the WebDAV API
    Then the HTTP status code should be "409"
    And as "Alice" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"

  @issue-36713 @skipOnOcV10
  Scenario: create local storage that already exists
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When the administrator creates the local storage mount "local_storage2" using the occ command
    Then the command should have failed with exit code 1
    And as "Alice" folder "/local_storage2" should exist
    And as "Brian" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Brian" should be "this is a file in local storage"

  @issue-36719 @skipOnOcV10
  Scenario: create local storage that matches an existing folder of a user
    Given user "Alice" has created folder "reference"
    And user "Alice" has uploaded file with content "this is a reference file" to "/reference/reference-file.txt"
    And user "Alice" has created folder "other"
    And user "Alice" has uploaded file with content "this is another file" to "/other/other-file.txt"
    When the administrator creates the local storage mount "reference" using the occ command
    And the administrator uploads file with content "this is a file in local storage" to "/reference/file-in-local-storage.txt" using the WebDAV API
    Then the command should have been successful
    And as "Alice" folder "/reference" should exist
    And as "Brian" folder "/reference" should exist
    And the content of file "/reference/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And the content of file "/reference/file-in-local-storage.txt" for user "Brian" should be "this is a file in local storage"
    And the content of file "/other/other-file.txt" for user "Alice" should be "this is another file"
    And as "Alice" folder "/reference (2)" should exist
    And as "Alice" file "/reference (2)/reference-file.txt" should exist
    And the content of file "/reference (2)/reference-file.txt" for user "Alice" should be "this is a reference file"

  @issue-36719 @skipOnOcV10
  Scenario: create local storage that matches an existing shared folder of a user
    Given user "Alice" has created folder "reference"
    And user "Alice" has uploaded file with content "this is a reference file" to "/reference/reference-file.txt"
    And user "Alice" has shared folder "reference" with user "Brian"
    And user "Alice" has created folder "other"
    And user "Alice" has uploaded file with content "this is another file" to "/other/other-file.txt"
    And user "Alice" has shared folder "other" with user "Brian"
    When the administrator creates the local storage mount "reference" using the occ command
    And the administrator uploads file with content "this is a file in local storage" to "/reference/file-in-local-storage.txt" using the WebDAV API
    Then the command should have been successful
    And as "Alice" folder "/reference" should exist
    And as "Brian" folder "/reference" should exist
    And the content of file "/reference/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And the content of file "/reference/file-in-local-storage.txt" for user "Brian" should be "this is a file in local storage"
    And the content of file "/other/other-file.txt" for user "Alice" should be "this is another file"
    And the content of file "/other/other-file.txt" for user "Brian" should be "this is another file"
    And as "Alice" folder "/reference (2)" should exist
    And as "Alice" file "/reference (2)/reference-file.txt" should exist
    And the content of file "/reference (2)/reference-file.txt" for user "Alice" should be "this is a reference file"
    And as "Brian" folder "/reference (2)" should exist
    And as "Brian" file "/reference (2)/reference-file.txt" should exist
    And the content of file "/reference (2)/reference-file.txt" for user "Brian" should be "this is a reference file"

  @issue-36719 @skipOnOcV10
  Scenario: create local storage that matches an existing shared folder, and the sharee has renamed the received folder
    Given user "Alice" has created folder "reference"
    And user "Alice" has uploaded file with content "this is a reference file" to "/reference/reference-file.txt"
    And user "Alice" has shared folder "reference" with user "Brian"
    And user "Alice" has created folder "other"
    And user "Alice" has uploaded file with content "this is another file" to "/other/other-file.txt"
    And user "Alice" has shared folder "other" with user "Brian"
    And user "Brian" has moved folder "reference" to "reference1"
    When the administrator creates the local storage mount "reference" using the occ command
    And the administrator uploads file with content "this is a file in local storage" to "/reference/file-in-local-storage.txt" using the WebDAV API
    Then the command should have been successful
    And as "Alice" folder "/reference" should exist
    And as "Brian" folder "/reference" should exist
    And the content of file "/reference/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And the content of file "/reference/file-in-local-storage.txt" for user "Brian" should be "this is a file in local storage"
    And the content of file "/other/other-file.txt" for user "Alice" should be "this is another file"
    And the content of file "/other/other-file.txt" for user "Brian" should be "this is another file"
    And as "Alice" folder "/reference (2)" should exist
    And as "Alice" file "/reference (2)/reference-file.txt" should exist
    And the content of file "/reference (2)/reference-file.txt" for user "Alice" should be "this is a reference file"
    And as "Brian" folder "/reference1" should exist
    And as "Brian" file "/reference1/reference-file.txt" should exist
    And the content of file "/reference1/reference-file.txt" for user "Brian" should be "this is a reference file"

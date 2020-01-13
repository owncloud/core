@cli @skipOnLDAP @local_storage
Feature: create local storage from the command line
  As an admin
  I want to create local storage from the command line
  So that local folders on my server can be made visible to users of ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |

  Scenario: create local storage that is available to all users
    When the administrator creates the local storage mount "local_storage2" using the occ command
    And the administrator uploads file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt" using the WebDAV API
    And the administrator uploads file with content "this is a file to delete in local storage" to "/local_storage2/file-to-delete.txt" using the WebDAV API
    And the administrator uploads file with content "this is a file to rename in local storage" to "/local_storage2/file-to-rename.txt" using the WebDAV API
    Then the command should have been successful
    And as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist
    And user "user0" should be able to delete file "/local_storage2/file-to-delete.txt"
    And user "user0" should be able to rename file "/local_storage2/file-to-rename.txt" to "/local_storage2/another-name.txt"
    And user "user0" should be able to upload file "filesForUpload/textfile.txt" to "/local_storage2/textfile.txt"
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user1" should be "this is a file in local storage"
    And the content of file "/local_storage2/another-name.txt" for user "user1" should be "this is a file to rename in local storage"
    And as "user1" file "/local_storage2/textfile.txt" should exist
    And as "user1" file "/local_storage2/file-to-delete.txt" should not exist

  Scenario: user cannot rename a local storage
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When user "user0" moves folder "local_storage2" to "another_name" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"
    And as "user0" folder "/another_name" should not exist

  Scenario: user cannot delete a local storage
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When user "user0" deletes folder "local_storage2" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"

  Scenario: user cannot create a folder that matches a local storage
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When user "user0" creates folder "local_storage2" using the WebDAV API
    Then the HTTP status code should be "405"
    And as "user0" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"

  Scenario: user cannot upload a file that matches a local storage folder name
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When user "user0" uploads file with content "this is a file called local_storage2" to "/local_storage2" using the WebDAV API
    Then the HTTP status code should be "409"
    And as "user0" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"

  @issue-36713
  Scenario: create local storage that already exists
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When the administrator creates the local storage mount "local_storage2" using the occ command
    #Then the command should have failed with exit code 1
    Then the command should have been successful
    And as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user1" should be "this is a file in local storage"

  @issue-36719
  Scenario: create local storage that matches an existing folder of a user
    Given user "user0" has created folder "reference"
    And user "user0" has uploaded file with content "this is a reference file" to "/reference/reference-file.txt"
    And user "user0" has created folder "other"
    And user "user0" has uploaded file with content "this is another file of user0" to "/other/other-file.txt"
    When the administrator creates the local storage mount "reference" using the occ command
    And the administrator uploads file with content "this is a file in local storage" to "/reference/file-in-local-storage.txt" using the WebDAV API
    Then the command should have been successful
    And as "user0" folder "/reference" should exist
    And as "user1" folder "/reference" should exist
    And the content of file "/reference/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"
    And the content of file "/reference/file-in-local-storage.txt" for user "user1" should be "this is a file in local storage"
    And the content of file "/other/other-file.txt" for user "user0" should be "this is another file of user0"
    # Some other behaviour is to be defined here. See discussion in the issue.
    # How can user0 get access to their own previous folder with file?
    But as "user0" file "/reference/reference-file.txt" should not exist

  @issue-36719
  Scenario: create local storage that matches an existing shared folder of a user
    Given user "user0" has created folder "reference"
    And user "user0" has uploaded file with content "this is a reference file" to "/reference/reference-file.txt"
    And user "user0" has shared folder "reference" with user "user1"
    And user "user0" has created folder "other"
    And user "user0" has uploaded file with content "this is another file of user0" to "/other/other-file.txt"
    And user "user0" has shared folder "other" with user "user1"
    When the administrator creates the local storage mount "reference" using the occ command
    And the administrator uploads file with content "this is a file in local storage" to "/reference/file-in-local-storage.txt" using the WebDAV API
    Then the command should have been successful
    And as "user0" folder "/reference" should exist
    And as "user1" folder "/reference" should exist
    And the content of file "/reference/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"
    And the content of file "/reference/file-in-local-storage.txt" for user "user1" should be "this is a file in local storage"
    And the content of file "/other/other-file.txt" for user "user0" should be "this is another file of user0"
    And the content of file "/other/other-file.txt" for user "user1" should be "this is another file of user0"
    # Some other behaviour is to be defined here. See discussion in the issue.
    # How can user0 and user1 get access to their previous shared folder with file?
    But as "user0" file "/reference/reference-file.txt" should not exist
    And as "user1" file "/reference/reference-file.txt" should not exist

  @issue-36719
  Scenario: create local storage that matches an existing shared folder, and the sharee has renamed the received folder
    Given user "user0" has created folder "reference"
    And user "user0" has uploaded file with content "this is a reference file" to "/reference/reference-file.txt"
    And user "user0" has shared folder "reference" with user "user1"
    And user "user0" has created folder "other"
    And user "user0" has uploaded file with content "this is another file of user0" to "/other/other-file.txt"
    And user "user0" has shared folder "other" with user "user1"
    And user "user1" has moved folder "reference" to "reference1"
    When the administrator creates the local storage mount "reference" using the occ command
    And the administrator uploads file with content "this is a file in local storage" to "/reference/file-in-local-storage.txt" using the WebDAV API
    Then the command should have been successful
    And as "user0" folder "/reference" should exist
    And as "user1" folder "/reference" should exist
    And the content of file "/reference/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"
    And the content of file "/reference/file-in-local-storage.txt" for user "user1" should be "this is a file in local storage"
    And the content of file "/other/other-file.txt" for user "user0" should be "this is another file of user0"
    And the content of file "/other/other-file.txt" for user "user1" should be "this is another file of user0"
    # user1 receives "/reference" from user0 and has renamed it to "/reference1"
    # it would be helpful if they could still see "/reference1" as well as the local storage called "/reference"
    And as "user1" file "/reference1/reference-file.txt" should not exist
    #And as "user1" file "/reference1/reference-file.txt" should exist
    #And the content of file "/reference1/reference-file.txt" for user "user1" should be "this is a reference file"

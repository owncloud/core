@cli @local_storage @files_external-app-required @skipOnLDAP @issue-36719
Feature: create local storage from the command line
  As an admin
  I want to create local storage from the command line
  So that local folders on my server can be made visible to users of ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


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
    # Some other behaviour is to be defined here. See discussion in the issue.
    # How can Alice get access to their own previous folder with file?
    But as "Alice" file "/reference/reference-file.txt" should not exist


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
    # Some other behaviour is to be defined here. See discussion in the issue.
    # How can Alice and Brian get access to their previous shared folder with file?
    But as "Alice" file "/reference/reference-file.txt" should not exist
    And as "Brian" file "/reference/reference-file.txt" should not exist


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
    # Brian receives "/reference" from Alice and has renamed it to "/reference1"
    # it would be helpful if they could still see "/reference1" as well as the local storage called "/reference"
    And as "Brian" file "/reference1/reference-file.txt" should not exist
    #And as "Brian" file "/reference1/reference-file.txt" should exist
    #And the content of file "/reference1/reference-file.txt" for user "Brian" should be "this is a reference file"

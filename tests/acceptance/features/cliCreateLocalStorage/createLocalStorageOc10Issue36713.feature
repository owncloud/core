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

  @issue-36713
  Scenario: create local storage that already exists
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    When the administrator creates the local storage mount "local_storage2" using the occ command
    #Then the command should have failed with exit code 1
    Then the command should have been successful
    And as "Alice" folder "/local_storage2" should exist
    And as "Brian" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "Brian" should be "this is a file in local storage"

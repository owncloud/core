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
    Then the command should have been successful
    And as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user0" should be "this is a file in local storage"
    And the content of file "/local_storage2/file-in-local-storage.txt" for user "user1" should be "this is a file in local storage"

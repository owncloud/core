@cli @skipOnLDAP @local_storage
Feature: create local storage from the command line
  As an admin
  I want to create local storage available to a specific user(s) from the command line
  So that local folders on my server can be made visible to specific users of ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |

  Scenario: create local storages that are available to specific users
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "local_storage3"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has uploaded file with content "this is a file in local storage3" to "/local_storage3/file-in-local-storage3.txt"
    And the administrator has uploaded file with content "this is a file to delete in local storage2" to "/local_storage2/file-to-delete2.txt"
    And the administrator has uploaded file with content "this is a file to delete in local storage3" to "/local_storage3/file-to-delete3.txt"
    And the administrator has uploaded file with content "this is a file to rename in local storage2" to "/local_storage2/file-to-rename2.txt"
    And the administrator has uploaded file with content "this is a file to rename in local storage3" to "/local_storage3/file-to-rename3.txt"
    When the administrator adds user "user0" as the applicable user for local storage mount "local_storage2" using the occ command
    And the administrator adds user "user1" as the applicable user for local storage mount "local_storage3" using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And user "user0" should be able to delete file "/local_storage2/file-to-delete2.txt"
    And user "user0" should be able to rename file "/local_storage2/file-to-rename2.txt" to "/local_storage2/another-name2.txt"
    And user "user0" should be able to upload file "filesForUpload/textfile.txt" to "/local_storage2/textfile2.txt"
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user0" should be "this is a file in local storage2"
    But as "user0" folder "/local_storage3" should not exist
    And as "user1" folder "/local_storage3" should exist
    And user "user1" should be able to delete file "/local_storage3/file-to-delete3.txt"
    And user "user1" should be able to rename file "/local_storage3/file-to-rename3.txt" to "/local_storage3/another-name3.txt"
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "/local_storage3/textfile3.txt"
    And the content of file "/local_storage3/file-in-local-storage3.txt" for user "user1" should be "this is a file in local storage3"
    But as "user1" folder "/local_storage2" should not exist

  Scenario: create local storage that is available for more than one user
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user2    |
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has uploaded file with content "this is a file to delete in local storage2" to "/local_storage2/file-to-delete2.txt"
    And the administrator has uploaded file with content "this is a file to rename in local storage2" to "/local_storage2/file-to-rename2.txt"
    When the administrator adds user "user0" as the applicable user for local storage mount "local_storage2" using the occ command
    And the administrator adds user "user1" as the applicable user for local storage mount "local_storage2" using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And user "user0" should be able to delete file "/local_storage2/file-to-delete2.txt"
    And user "user0" should be able to rename file "/local_storage2/file-to-rename2.txt" to "/local_storage2/another-name2.txt"
    And user "user0" should be able to upload file "filesForUpload/textfile.txt" to "/local_storage2/textfile2.txt"
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user0" should be "this is a file in local storage2"
    And as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user1" should be "this is a file in local storage2"
    And the content of file "/local_storage2/another-name2.txt" for user "user1" should be "this is a file to rename in local storage2"
    And as "user1" file "/local_storage2/textfile2.txt" should exist
    But as "user1" file "/local_storage2/file-to-delete2.txt" should not exist
    And as "user2" folder "/local_storage2" should not exist

  Scenario: removing the only user from applicable users of local storage leaves the storage available to everyone
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added user "user0" as the applicable user for local storage mount "local_storage2"
    When the administrator removes user "user0" from the applicable user for local storage mount "local_storage2" using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user0" should be "this is a file in local storage2"
    Then as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user1" should be "this is a file in local storage2"

  Scenario: user should not get access if the user is removed from the applicable user and the user was not the only applicable user
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added user "user0" as the applicable user for local storage mount "local_storage2"
    And the administrator has added user "user1" as the applicable user for local storage mount "local_storage2"
    When the administrator removes user "user0" from the applicable user for local storage mount "local_storage2" using the occ command
    Then as "user0" folder "/local_storage2" should not exist
    But as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user1" should be "this is a file in local storage2"

  Scenario: another user can create a folder matching a local storage name that is for another specific user
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added user "user1" as the applicable user for local storage mount "local_storage2"
    When user "user0" creates folder "local_storage2" using the WebDAV API
    And user "user0" uploads file with content "this is a file of user0" to "/local_storage2/file-in-local-storage2.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user0" should be "this is a file of user0"
    And as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user1" should be "this is a file in local storage2"

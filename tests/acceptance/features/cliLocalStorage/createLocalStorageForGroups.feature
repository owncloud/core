@cli @skipOnLDAP @local_storage
Feature: create local storage from the command line
  As an admin
  I want to create local storage available to a specific group(s) from the command line
  So that local folders on my server can be made visible to specific groups in ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |

  Scenario: create local storage that is available to a specific group
    Given group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has uploaded file with content "this is a file to delete in local storage2" to "/local_storage2/file-to-delete2.txt"
    And the administrator has uploaded file with content "this is a file to rename in local storage2" to "/local_storage2/file-to-rename2.txt"
    When the administrator adds group "grp1" as the applicable group for local storage mount "local_storage2" using the occ command
    Then as "user1" folder "/local_storage2" should exist
    And user "user1" should be able to delete file "/local_storage2/file-to-delete2.txt"
    And user "user1" should be able to rename file "/local_storage2/file-to-rename2.txt" to "/local_storage2/another-name2.txt"
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "/local_storage2/textfile2.txt"
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user1" should be "this is a file in local storage2"
    But as "user0" folder "/local_storage2" should not exist

  Scenario: removing the only group from applicable group of local storage leaves the storage available to everyone
    Given group "newgroup" has been created
    And user "user1" has been added to group "newgroup"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added group "newgroup" as the applicable group for local storage mount "local_storage2"
    When the administrator removes group "newgroup" from the applicable group for local storage mount "local_storage2" using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user0" should be "this is a file in local storage2"
    Then as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user1" should be "this is a file in local storage2"

  Scenario: user should not get access if the group of the user is removed from the applicable group and that group was not the only applicable group
    And these users have been created with default attributes and skeleton files:
      | username |
      | user2    |
    And group "grp1" has been created
    And group "grp2" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp2"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    And the administrator has added group "grp2" as the applicable group for local storage mount "local_storage2"
    When the administrator removes group "grp1" from the applicable group for local storage mount "local_storage2" using the occ command
    Then as "user2" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user2" should be "this is a file in local storage2"
    And as "user0" folder "/local_storage2" should not exist
    And as "user1" folder "/local_storage2" should not exist

  Scenario: another user can create a folder matching a local storage name that is for a specific group
    Given group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    When user "user0" creates folder "local_storage2" using the WebDAV API
    And user "user0" uploads file with content "this is a file of user0" to "/local_storage2/file-in-local-storage2.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user0" should be "this is a file of user0"
    And as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user1" should be "this is a file in local storage2"

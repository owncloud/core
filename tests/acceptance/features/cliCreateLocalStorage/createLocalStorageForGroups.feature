@cli @local_storage @files_external-app-required @skipOnLDAP
Feature: create local storage from the command line
  As an admin
  I want to create local storage available to a specific group(s) from the command line
  So that local folders on my server can be made visible to specific groups in ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario: create local storage that is available to a specific group
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has uploaded file with content "this is a file to delete in local storage2" to "/local_storage2/file-to-delete2.txt"
    And the administrator has uploaded file with content "this is a file to rename in local storage2" to "/local_storage2/file-to-rename2.txt"
    When the administrator adds group "grp1" as the applicable group for local storage mount "local_storage2" using the occ command
    Then as "Brian" folder "/local_storage2" should exist
    And user "Brian" should be able to delete file "/local_storage2/file-to-delete2.txt"
    And user "Brian" should be able to rename file "/local_storage2/file-to-rename2.txt" to "/local_storage2/another-name2.txt"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "/local_storage2/textfile2.txt"
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "Brian" should be "this is a file in local storage2"
    But as "Alice" folder "/local_storage2" should not exist


  Scenario: removing the only group from applicable group of local storage leaves the storage available to everyone
    Given group "brand-new-group" has been created
    And user "Brian" has been added to group "brand-new-group"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added group "brand-new-group" as the applicable group for local storage mount "local_storage2"
    When the administrator removes group "brand-new-group" from the applicable group for local storage mount "local_storage2" using the occ command
    Then as "Alice" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "Alice" should be "this is a file in local storage2"
    And as "Brian" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "Brian" should be "this is a file in local storage2"


  Scenario: user should not get access if the group of the user is removed from the applicable group and that group was not the only applicable group
    And these users have been created with default attributes and small skeleton files:
      | username |
      | Carol    |
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp2"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    And the administrator has added group "grp2" as the applicable group for local storage mount "local_storage2"
    When the administrator removes group "grp1" from the applicable group for local storage mount "local_storage2" using the occ command
    Then as "Carol" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "Carol" should be "this is a file in local storage2"
    And as "Alice" folder "/local_storage2" should not exist
    And as "Brian" folder "/local_storage2" should not exist


  Scenario: another user can create a folder matching a local storage name that is for a specific group
    Given group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    When user "Alice" creates folder "local_storage2" using the WebDAV API
    And user "Alice" uploads file with content "this is an ordinary file" to "/local_storage2/file-in-local-storage2.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "Alice" should be "this is an ordinary file"
    And as "Brian" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "Brian" should be "this is a file in local storage2"


  Scenario: users should get access if all the users and groups are removed from the applicable groups
    And these users have been created with default attributes and small skeleton files:
      | username |
      | Carol    |
      | David    |
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp2"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    And the administrator has added group "grp2" as the applicable group for local storage mount "local_storage2"
    And the administrator has added user "David" as the applicable user for local storage mount "local_storage2"
    When the administrator removes all from the applicable users and groups for local storage mount "local_storage2" using the occ command
    Then as "Alice" folder "/local_storage2" should exist
    And as "Brian" folder "/local_storage2" should exist
    And as "Carol" folder "/local_storage2" should exist
    And as "David" folder "/local_storage2" should exist

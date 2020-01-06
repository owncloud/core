@cli @skipOnLDAP @local_storage
Feature: create local storage from the command line
  As an admin
  I want to create local storage available to a specific user(s) group(s) from the command line
  So that local folders on my server can be made visible to specific groups in ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |

  Scenario: create local storage for a specific group and user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user2    |
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    When the administrator adds group "grp1" as the applicable group for local storage mount "local_storage2" using the occ command
    And the administrator adds user "user2" as the applicable user for local storage mount "local_storage2" using the occ command
    Then as "user1" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user1" should be "this is a file in local storage2"
    And as "user2" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "user2" should be "this is a file in local storage2"
    But as "user0" folder "/local_storage2" should not exist

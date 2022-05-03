@cli @local_storage @files_external-app-required @skipOnLDAP
Feature: create local storage from the command line
  As an admin
  I want to create local storage available to a specific user(s) group(s) from the command line
  So that local folders on my server can be made visible to specific groups in ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  Scenario: create local storage for a specific group and user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Carol    |
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage2.txt"
    When the administrator adds group "grp1" as the applicable group for local storage mount "local_storage2" using the occ command
    And the administrator adds user "Carol" as the applicable user for local storage mount "local_storage2" using the occ command
    Then as "Brian" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "Brian" should be "this is a file in local storage2"
    And as "Carol" folder "/local_storage2" should exist
    And the content of file "/local_storage2/file-in-local-storage2.txt" for user "Carol" should be "this is a file in local storage2"
    But as "Alice" folder "/local_storage2" should not exist

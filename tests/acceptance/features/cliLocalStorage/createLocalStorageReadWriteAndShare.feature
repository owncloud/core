@cli @skipOnLDAP @local_storage
Feature: create local storage and enable sharing from the command line
  As an admin
  I want to create read-write local storage and enable sharing from the command line
  So that local folders on my server can be made visible and read-write to users of ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |
    And the administrator has created the local storage mount "local_storage1"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage1/file-in-local-storage.txt"
    And the administrator has added user "user0" as the applicable user for the last local storage mount
    And the administrator has set the external storage "local_storage1" to sharing

  Scenario: applicable user is able to share with all permissions the top-level of read-write storage
    When user "user0" shares folder "local_storage1" with user "user1" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And as "user1" folder "local_storage1" should exist

  Scenario: applicable user is able to share the file inside the top-level of read-write storage
    When user "user0" shares file "/local_storage1/file-in-local-storage.txt" with user "user1" with permissions "read" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And as "user1" file "file-in-local-storage.txt" should exist
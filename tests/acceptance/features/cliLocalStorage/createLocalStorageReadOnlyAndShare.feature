@cli @local_storage @files_external-app-required @skipOnLDAP
Feature: create local storage and enable read-only and sharing from the command line
  As an admin
  I want to create read-only local storage and enable sharing from the command line
  So that local folders on my server can be made visible but read-only to users of ownCloud

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And the administrator has created the local storage mount "local_storage1"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage1/file-in-local-storage.txt"
    And the administrator has added user "Alice" as the applicable user for the last local storage mount
    And the administrator has set the external storage "local_storage1" to read-only
    And the administrator has set the external storage "local_storage1" to sharing

  Scenario: applicable user is not able to share with all permissions the top-level of read-only storage
    When user "Alice" shares folder "local_storage1" with user "Brian" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "404"
    And the OCS status message should be "Cannot set the requested share permissions for local_storage1"

  Scenario: applicable user is able to share with read permissions the top-level of read-only storage
    When user "Alice" shares folder "local_storage1" with user "Brian" with permissions "read" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And as "Brian" folder "local_storage1" should exist

  Scenario: applicable user is able to share with read permissions the file inside the top-level of read-only storage
    When user "Alice" shares file "/local_storage1/file-in-local-storage.txt" with user "Brian" with permissions "read" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And as "Brian" file "file-in-local-storage.txt" should exist

  Scenario: applicable user is able to share with default permissions the file inside the top-level of read-only storage
    When user "Alice" shares file "/local_storage1/file-in-local-storage.txt" with user "Brian" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And as "Brian" file "file-in-local-storage.txt" should exist
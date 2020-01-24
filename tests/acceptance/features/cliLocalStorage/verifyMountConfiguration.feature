@cli @skipOnLDAP @local_storage
Feature: verify mount configuration using occ command
  As an admin
  I want to verify mount configuration for created local storage
  So that I can assure the status of created local storage

  Scenario: verify mount configuration for created local storage
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "new_local_storage"
    And the administrator has uploaded file with content "file in local storage" to "/local_storage2/file-in-local-storage.txt"
    And the administrator has uploaded file with content "new file" to "/new_local_storage/new-file"
    When the administrator verifies the mount configuration for local storage "local_storage2" using the occ command
    Then the following mount configuration information should be listed:
      | status | code | message |
      |   ok   | 0    |         |
    When the administrator verifies the mount configuration for local storage "new_local_storage" using the occ command
    Then the following mount configuration information should be listed:
      | status | code | message |
      |   ok   | 0    |         |
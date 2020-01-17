@cli @skipOnLDAP @local_storage
Feature: delete local storage from the command line
  As an admin
  I want to delete local storage
  So that I can remove undesired local storage

  Scenario: delete local storage
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "new_local_storage"
    And the administrator has uploaded file with content "file in local storage" to "/local_storage2/file-in-local-storage.txt"
    And the administrator has uploaded file with content "new file" to "/new_local_storage/new-file"
    When the administrator deletes local storage "local_storage2" using the occ command
    Then the following local storage should not exist
      | localStorage   |
      | local_storage2 |
    But the following local storage should exist
      | localStorage      |
      | local_storage     |
      | new_local_storage |
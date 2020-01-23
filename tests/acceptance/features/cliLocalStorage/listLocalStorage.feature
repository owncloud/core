@cli @skipOnLDAP @local_storage
Feature: list created local storage from the command line
  As an admin
  I want to list all created local storage from the command line
  So that I can view available local storage

  Background:
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "new_local_storage"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    And the administrator has uploaded file with content "new file" to "/new_local_storage/new-file"

  Scenario: List the created local storage
    When the administrator lists the local storage using the occ command
    Then the following local storage should exist
      | localStorage      |
      | local_storage2    |
      | new_local_storage |

  Scenario: Test the other columns of listed local storage
    When the administrator lists the local storage using the occ command
    Then the following local storage should be listed:
      | MountPoint         | Storage | AuthenticationType | Configuration | Options | ApplicableUsers | ApplicableGroups |
      | /local_storage2    | Local   | None               | datadir:      |         | All             |                  |
      | /new_local_storage | Local   | None               | datadir:      |         | All             |                  |
      | /local_storage     | Local   | None               | datadir:      |         | All             |                  |
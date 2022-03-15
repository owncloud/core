@cli @local_storage @files_external-app-required @skipOnLDAP
Feature: export created local storage mounts from the command line
  As an admin
  I want to export all created local storage mounts from the command line
  So that I can view available local storage mounts

  Background:
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "new_local_storage"
    And the administrator has uploaded file with content "this is a file in local storage" to "/local_storage2/file-in-local-storage.txt"
    And the administrator has uploaded file with content "new file" to "/new_local_storage/new-file"

  Scenario: export the created mounts
    When the administrator exports the local storage mounts using the occ command
    Then the following local storage should be listed:
      | MountPoint         | Storage                 | AuthenticationType | Configuration | Options              | ApplicableUsers | ApplicableGroups |
      | /local_storage2    | \OC\Files\Storage\Local | null::null         | datadir:      |                      |                 |                  |
      | /new_local_storage | \OC\Files\Storage\Local | null::null         | datadir:      |                      |                 |                  |
      | /local_storage     | \OC\Files\Storage\Local | null::null         | datadir:      | enable_sharing: true |                 |                  |

  Scenario: export the created mounts when the system language is "de"
    Given the administrator has set the system language to "de"
    When the administrator exports the local storage mounts using the occ command
    Then the following local storage should be listed:
      | MountPoint         | Storage                 | AuthenticationType | Configuration | Options              | ApplicableUsers | ApplicableGroups |
      | /local_storage2    | \OC\Files\Storage\Local | null::null         | datadir:      |                      |                 |                  |
      | /new_local_storage | \OC\Files\Storage\Local | null::null         | datadir:      |                      |                 |                  |
      | /local_storage     | \OC\Files\Storage\Local | null::null         | datadir:      | enable_sharing: true |                 |                  |

  Scenario: export the created mounts with various user and group settings
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has added user "Alice" as the applicable user for local storage mount "local_storage2"
    And the administrator has added user "Brian" as the applicable user for local storage mount "new_local_storage"
    And the administrator has added user "Carol" as the applicable user for local storage mount "new_local_storage"
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    And the administrator has added group "grp2" as the applicable group for local storage mount "new_local_storage"
    And the administrator has added group "grp3" as the applicable group for local storage mount "new_local_storage"
    When the administrator exports the local storage mounts using the occ command
    Then the following local storage should be listed:
      | MountPoint         | Storage                 | AuthenticationType | Configuration | Options              | ApplicableUsers | ApplicableGroups |
      | /local_storage2    | \OC\Files\Storage\Local | null::null         | datadir:      |                      | Alice           | grp1             |
      | /new_local_storage | \OC\Files\Storage\Local | null::null         | datadir:      |                      | Brian, Carol    | grp2, grp3       |
      | /local_storage     | \OC\Files\Storage\Local | null::null         | datadir:      | enable_sharing: true |                 |                  |

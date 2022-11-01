@cli @local_storage @files_external-app-required @skipOnLDAP
Feature: list created local storage from the command line
  As an admin
  I want to list all created local storage from the command line
  So that I can view available local storage

  Background:
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "local_storage3"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage.txt"
    And the administrator has uploaded file with content "this is a file in local storage3" to "/local_storage3/new-file"


  Scenario: List the created local storage
    When the administrator lists the local storage using the occ command
    Then the following local storage should be listed:
      | MountPoint      | Storage | AuthenticationType | Configuration | Options              | ApplicableUsers | ApplicableGroups |
      | /local_storage  | Local   | None               | datadir:      | enable_sharing: true | All             |                  |
      | /local_storage2 | Local   | None               | datadir:      |                      | All             |                  |
      | /local_storage3 | Local   | None               | datadir:      |                      | All             |                  |


  Scenario: List local storage with applicable users
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And the administrator has added user "Alice" as the applicable user for local storage mount "local_storage2"
    And the administrator has added user "Brian" as the applicable user for local storage mount "local_storage3"
    And the administrator has added user "Carol" as the applicable user for local storage mount "local_storage3"
    When the administrator lists the local storage using the occ command
    Then the following local storage should be listed:
      | MountPoint      | Storage | AuthenticationType | Configuration | Options              | ApplicableUsers | ApplicableGroups |
      | /local_storage  | Local   | None               | datadir:      | enable_sharing: true | All             |                  |
      | /local_storage2 | Local   | None               | datadir:      |                      | Alice           |                  |
      | /local_storage3 | Local   | None               | datadir:      |                      | Brian, Carol    |                  |


  Scenario: List local storage with applicable groups
    Given group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    And the administrator has added group "grp2" as the applicable group for local storage mount "local_storage3"
    And the administrator has added group "grp3" as the applicable group for local storage mount "local_storage3"
    When the administrator lists the local storage using the occ command
    Then the following local storage should be listed:
      | MountPoint      | Storage | AuthenticationType | Configuration | Options              | ApplicableUsers | ApplicableGroups |
      | /local_storage  | Local   | None               | datadir:      | enable_sharing: true | All             |                  |
      | /local_storage2 | Local   | None               | datadir:      |                      |                 | grp1             |
      | /local_storage3 | Local   | None               | datadir:      |                      |                 | grp2, grp3       |


  Scenario: List local storage with applicable users and groups
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has added user "Alice" as the applicable user for local storage mount "local_storage2"
    And the administrator has added user "Brian" as the applicable user for local storage mount "local_storage3"
    And the administrator has added user "Carol" as the applicable user for local storage mount "local_storage3"
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    And the administrator has added group "grp2" as the applicable group for local storage mount "local_storage3"
    And the administrator has added group "grp3" as the applicable group for local storage mount "local_storage3"
    When the administrator lists the local storage using the occ command
    Then the following local storage should be listed:
      | MountPoint      | Storage | AuthenticationType | Configuration | Options              | ApplicableUsers | ApplicableGroups |
      | /local_storage  | Local   | None               | datadir:      | enable_sharing: true | All             |                  |
      | /local_storage2 | Local   | None               | datadir:      |                      | Alice           | grp1             |
      | /local_storage3 | Local   | None               | datadir:      |                      | Brian, Carol    | grp2, grp3       |


  Scenario: Short list of local storage with applicable users and groups
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has added user "Alice" as the applicable user for local storage mount "local_storage2"
    And the administrator has added user "Brian" as the applicable user for local storage mount "local_storage3"
    And the administrator has added user "Carol" as the applicable user for local storage mount "local_storage3"
    And the administrator has added group "grp1" as the applicable group for local storage mount "local_storage2"
    And the administrator has added group "grp2" as the applicable group for local storage mount "local_storage3"
    And the administrator has added group "grp3" as the applicable group for local storage mount "local_storage3"
    When the administrator lists the local storage with --short using the occ command
    Then the following local storage should be listed:
      | MountPoint      | Auth | ApplicableUsers | ApplicableGroups | Type  |
      | /local_storage  | User | All             |                  | Admin |
      | /local_storage2 | User | Alice           | grp1             | Admin |
      | /local_storage3 | User | Brian, Carol    | grp2, grp3       | Admin |


  Scenario: List local storage with non-default options (one storage set to read-only)
    Given the administrator has set the external storage "local_storage2" to read-only
    When the administrator lists the local storage using the occ command
    Then the following local storage should be listed:
      | MountPoint      | Storage | AuthenticationType | Configuration | Options              | ApplicableUsers | ApplicableGroups |
      | /local_storage  | Local   | None               | datadir:      | enable_sharing: true | All             |                  |
      | /local_storage2 | Local   | None               | datadir:      | read_only: 1         | All             |                  |
      | /local_storage3 | Local   | None               | datadir:      |                      | All             |                  |


  Scenario: List local storage with --mount-options
    When the administrator lists the local storage with --mount-options using the occ command
    Then the following local storage should be listed:
      | MountPoint      | Storage | AuthenticationType | Configuration | Options                                                                                                                            | ApplicableUsers | ApplicableGroups |
      | /local_storage  | Local   | None               | datadir:      | encrypt: true, previews: true, filesystem_check_changes: 1, read_only: false, enable_sharing: true, encoding_compatibility: false  | All             |                  |
      | /local_storage2 | Local   | None               | datadir:      | encrypt: true, previews: true, filesystem_check_changes: 1, read_only: false, enable_sharing: false, encoding_compatibility: false | All             |                  |
      | /local_storage3 | Local   | None               | datadir:      | encrypt: true, previews: true, filesystem_check_changes: 1, read_only: false, enable_sharing: false, encoding_compatibility: false | All             |                  |


  Scenario: List local storage with --mount-options and non-default options (one storage set to read-only)
    Given the administrator has set the external storage "local_storage2" to read-only
    When the administrator lists the local storage with --mount-options using the occ command
    Then the following local storage should be listed:
      | MountPoint      | Storage | AuthenticationType | Configuration | Options                                                                                                                            | ApplicableUsers | ApplicableGroups |
      | /local_storage  | Local   | None               | datadir:      | encrypt: true, previews: true, filesystem_check_changes: 1, read_only: false, enable_sharing: true, encoding_compatibility: false  | All             |                  |
      | /local_storage2 | Local   | None               | datadir:      | encrypt: true, previews: true, filesystem_check_changes: 1, read_only: 1, enable_sharing: false, encoding_compatibility: false     | All             |                  |
      | /local_storage3 | Local   | None               | datadir:      | encrypt: true, previews: true, filesystem_check_changes: 1, read_only: false, enable_sharing: false, encoding_compatibility: false | All             |                  |

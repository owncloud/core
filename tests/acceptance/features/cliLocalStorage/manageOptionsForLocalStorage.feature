@cli @skipOnLDAP @local_storage
Feature: manage options for a mount using occ command
  As an admin
  I want to add options for a local storage mount
  So that I can manage options for the mount

  Background:
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "local_storage3"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage.txt"
    And the administrator has uploaded file with content "this is a file in local storage3" to "/local_storage3/new-file"

  Scenario: add options for a local storage mount
    When the administrator adds an option with key "enable_sharing" and value "true" for the local storage mount "local_storage2"
    And the administrator adds an option with key "read-only" and value "1" for the local storage mount "local_storage2"
    And the administrator adds an option with key "enable_sharing" and value "false" for the local storage mount "local_storage3"
    And the administrator adds an option with key "read-only" and value "1" for the local storage mount "local_storage3"
    And the administrator lists the local storage using the occ command
    Then the following should be included in the options of local storage "/local_storage2":
       | options              |
       | enable_sharing: true |
       | read-only: 1         |
    And the following should be included in the options of local storage "/local_storage3":
       | options               |
       | read-only: 1          |
    But the following should not be included in the options of local storage "/local_storage3":
      | options               |
      | enable_sharing: false |
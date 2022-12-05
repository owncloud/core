@cli @local_storage @files_external-app-required @skipOnLDAP
Feature: manage backend configuration for a mount using occ command
  As an admin
  I want to configure a local storage mount
  So that I can manage backend configuration for the mount

  Background:
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "local_storage3"
    And the administrator has uploaded file with content "this is a file in local storage2" to "/local_storage2/file-in-local-storage.txt"
    And the administrator has uploaded file with content "this is a file in local storage3" to "/local_storage3/new-file"


  Scenario: manage backend configuration for a local storage mount
    When the administrator configures the key "client_id" with value "owncloudUser" for the local storage mount "local_storage2"
    And the administrator configures the key "client_secret" with value "userSecretKey" for the local storage mount "local_storage2"
    And the administrator configures the key "token" with value "userToken" for the local storage mount "local_storage2"
    And the administrator configures the key "client_id" with value "nextOCUser" for the local storage mount "local_storage3"
    And the administrator configures the key "client_secret" with value "nextUserSecret" for the local storage mount "local_storage3"
    And the administrator lists the local storage using the occ command
    Then the following should be included in the configuration of local storage "/local_storage2":
      | configuration                  |
      | client_id: "owncloudUser"      |
      | client_secret: "userSecretKey" |
      | token: "***"                   |
    And the following should be included in the configuration of local storage "/local_storage3":
      | configuration                   |
      | client_id: "nextOCUser"         |
      | client_secret: "nextUserSecret" |


  Scenario: manage backend configuration for a local storage mount and list the local storages with --show-password
    When the administrator configures the key "client_id" with value "owncloudUser" for the local storage mount "local_storage2"
    And the administrator configures the key "client_secret" with value "userSecretKey" for the local storage mount "local_storage2"
    And the administrator configures the key "token" with value "userToken" for the local storage mount "local_storage2"
    And the administrator configures the key "client_id" with value "nextOCUser" for the local storage mount "local_storage3"
    And the administrator configures the key "client_secret" with value "nextUserSecret" for the local storage mount "local_storage3"
    And the administrator lists the local storage with --show-password using the occ command
    Then the following should be included in the configuration of local storage "/local_storage2":
      | configuration                  |
      | client_id: "owncloudUser"      |
      | client_secret: "userSecretKey" |
      | token: "userToken"             |
    And the following should be included in the configuration of local storage "/local_storage3":
      | configuration                   |
      | client_id: "nextOCUser"         |
      | client_secret: "nextUserSecret" |


  Scenario: manage backend configuration for a local storage mount and test the output providing with key only
    Given the administrator has configured the key "client_id" with value "owncloudUser" for the local storage mount "local_storage2"
    And the administrator has configured the key "client_secret" with value "userSecretKey" for the local storage mount "local_storage2"
    When the administrator lists configurations with the existing key "client_id" for the local storage mount "local_storage2"
    Then the configuration output should be "owncloudUser"
    When the administrator lists configurations with the existing key "client_secret" for the local storage mount "local_storage2"
    Then the configuration output should be "userSecretKey"

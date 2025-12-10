@cli @local_storage @files_external-app-required @skipOnLDAP
Feature: show available backends using occ command
  As an admin
  I want to list backends
  So that I can manage available backends for created local storage

  Background:
    Given the administrator has created the local storage mount "local_storage2"
    And the administrator has uploaded file with content "file in local storage" to "/local_storage2/file-in-local-storage.txt"


  Scenario: list available backends for created local storage
    When the administrator lists the available backends using the occ command
    Then the following backend types should be listed:
      | backend-type   |
      | authentication |
      | storage        |


  Scenario: list available backends of type authentication for created local storage
    When the administrator lists the available backends of type "authentication" using the occ command
    Then the following authentication backends should be listed:
      | backends                     |
      | password::sessioncredentials |
      | null::null                   |
      | builtin::builtin             |
      | password::password           |
      | oauth1::oauth1               |
      | oauth2::oauth2               |
      | publickey::rsa               |
      | openstack::openstack         |
      | openstack::rackspace         |


  Scenario: list available backends of type storage for created local storage
    When the administrator lists the available backends of type "storage" using the occ command
    Then the following storage backends should be listed:
      | backends                   |
      | dav                        |
      | owncloud                   |
      | sftp                       |
      | googledrive                |
      | \OC\Files\Storage\SFTP_Key |
      | smb                        |
      | \OC\Files\Storage\SMB_OC   |
      | local                      |


  Scenario Outline: list specific backend of type storage for created local storage
    When the administrator lists the "<backend>" backend of type "storage" using the occ command
    Then the following storage backend keys should be listed:
      | backend-keys                      |
      | name                              |
      | identifier                        |
      | configuration                     |
      | storage_class                     |
      | supported_authentication_backends |
      | authentication_configuration      |
    Examples:
      | backend                    |
      | dav                        |
      | owncloud                   |
      | sftp                       |
      | googledrive                |
      | \OC\Files\Storage\SFTP_Key |
      | smb                        |
      | \OC\Files\Storage\SMB_OC   |
      | local                      |


  Scenario Outline: list specific backend of type authentication for created local storage
    When the administrator lists the "<backend>" backend of type "authentication" using the occ command
    Then the following authentication backend keys should be listed:
      | backend-keys  |
      | name          |
      | identifier    |
      | configuration |
    Examples:
      | backend                      |
      | password::sessioncredentials |
      | null::null                   |
      | builtin::builtin             |
      | password::password           |
      | oauth1::oauth1               |
      | oauth2::oauth2               |
      | publickey::rsa               |
      | openstack::openstack         |
      | openstack::rackspace         |

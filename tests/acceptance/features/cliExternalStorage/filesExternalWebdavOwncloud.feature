@cli @external_storage
Feature: using files external service with storage as webdav_owncloud

As a user
I want to be able to use webdav_owncloud as external storage
So that I can extend my storage service

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "TestMnt"
    And using server "LOCAL"

  Scenario: creating a webdav_owncloud external storage
    When the administrator creates an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%             |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And the administrator verifies the mount configuration for local storage "TestMountPoint" using the occ command
    Then the following mount configuration information should be listed:
      | status | code | message |
      | ok     | 0    |         |
    And as "admin" folder "TestMountPoint" should exist

  @skipOnEncryption @issue-encryption-181
  Scenario: using webdav_owncloud as external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%             |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    When user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
    And using server "REMOTE"
    Then as "Alice" file "/TestMnt/test.txt" should exist
    And the content of file "/TestMnt/test.txt" for user "Alice" should be "Hello from Local!"

  Scenario: deleting a webdav_owncloud external storage
    Given using server "REMOTE"
    And user "Alice" has created folder "TestMnt1"
    And using server "LOCAL"
    And the administrator creates an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt1           |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint1    |
      | authentication_backend | password::password |
    When the administrator deletes external storage with mount point "TestMountPoint1"
    Then the command should have been successful
    When the administrator lists all local storage mount points using the occ command
    Then mount point "/TestMountPoint1" should not be listed as an external storage

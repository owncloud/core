@cli @external_storage
Feature: using files external service with storage as webdav_owncloud

As a user
I want to be able to use webdav_owncloud as external storage
So that I can extend my storage service

  Background:
    Given using server "REMOTE"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user1" has created folder "TestMnt"
    And using server "LOCAL"

  Scenario: creating a webdav_owncloud external storage
    When administrator creates an external mount point with following configuration using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | user1              |
      | password               | %alt1%             |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And the administrator verifies the mount configuration for local storage "TestMountPoint" using the occ command
    Then the following mount configuration information should be listed:
      | status | code | message |
      | ok     | 0    |         |
    And as "admin" folder "TestMountPoint" should exist

  Scenario: using webdav_owncloud as external storage
    Given administrator has created an external mount point with following configuration using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | user1              |
      | password               | %alt1%             |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    When user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
    And using server "REMOTE"
    Then as "user1" file "/TestMnt/test.txt" should exist
    And the content of file "/TestMnt/test.txt" for user "user1" should be "Hello from Local!"

  Scenario Outline: deleting a webdav_owncloud external storage
    Given using server "REMOTE"
    And user "user1" has created folder "<root>"
    And using server "LOCAL"
    And administrator creates an external mount point with following configuration using the occ command
      | host                   | %remote_server%    |
      | root                   | <root>             |
      | secure                 | false              |
      | user                   | user1              |
      | password               | %alt1%             |
      | storage_backend        | owncloud           |
      | mount_point            | <mount_point>      |
      | authentication_backend | password::password |
    When administrator deletes external storage with mount point "<mount_point>"
    Then the command should have been successful
    And mount point "/<mount_point>" should not be listed as created external storages
    Examples:
      | root     | mount_point     |
      | TestMnt1 | TestMountPoint1 |
      | TestMnt2 | TestMountPoint2 |

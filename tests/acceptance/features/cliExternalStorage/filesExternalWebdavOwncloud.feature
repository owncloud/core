@cli @external_storage @skipOnLDAP @files_external-app-required
Feature: using files external service with storage as webdav_owncloud

  As a user
  I want to be able to use webdav_owncloud as external storage
  So that I can extend my storage service

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "TestMnt"
    And using server "LOCAL"

  @issue-38165 @skipOnDbOracle
  Scenario: creating a webdav_owncloud external storage
    When the administrator creates an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And the administrator verifies the mount configuration for local storage "TestMountPoint" using the occ command
    Then the following mount configuration information should be listed:
      | status | code | message |
      | ok     | 0    |         |
    And as "admin" folder "TestMountPoint" should exist

  @skipOnEncryption @issue-encryption-181 @skipOnDbOracle @issue-38165
  Scenario: using webdav_owncloud as external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
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


    Scenario: adding an user to a webdav_owncloud external storage
      Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
        | host                   | %remote_server%    |
        | root                   | TestMnt            |
        | secure                 | false              |
        | user                   | %username%         |
        | password               | %password%         |
        | storage_backend        | owncloud           |
        | mount_point            | TestMountPoint     |
        | authentication_backend | password::password |
      And user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
      And user "Brian" has been created with default attributes and without skeleton files
      When the administrator adds user "Brian" as the applicable user for local storage mount "TestMountPoint" using the occ command
      Then the command should have been successful
      And the following users should be listed as applicable for local storage mount "TestMountPoint"
        | users  | Brian |
      And as "Brian" file "TestMountPoint/test.txt" should exist


    Scenario: removing an user from a webdav_owncloud external storage
      Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
        | host                   | %remote_server%    |
        | root                   | TestMnt            |
        | secure                 | false              |
        | user                   | %username%         |
        | password               | %password%         |
        | storage_backend        | owncloud           |
        | mount_point            | TestMountPoint     |
        | authentication_backend | password::password |
      And user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
      And user "Brian" has been created with default attributes and without skeleton files
      And the administrator has added user "Brian" as the applicable user for local storage mount "TestMountPoint"
      And the administrator has added user "admin" as the applicable user for local storage mount "TestMountPoint"
      When the administrator removes user "Brian" from the applicable user for local storage mount "TestMountPoint" using the occ command
      Then the command should have been successful
      And the following users should be listed as applicable for local storage mount "TestMountPoint"
        | users  | admin |
      And as "Brian" file "TestMountPoint/test.txt" should not exist


  Scenario: adding a group to a webdav_owncloud external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When the administrator adds group "grp1" as the applicable group for local storage mount "TestMountPoint" using the occ command
    Then the command should have been successful
    And the following groups should be listed as applicable for local storage mount "TestMountPoint"
      | groups  | grp1 |
    And as "Brian" file "TestMountPoint/test.txt" should exist


  Scenario: removing a group from a webdav_owncloud external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And the administrator has added group "grp1" as the applicable group for local storage mount "TestMountPoint"
    And the administrator has added user "admin" as the applicable user for local storage mount "TestMountPoint"
    When the administrator removes group "grp1" from the applicable group for local storage mount "TestMountPoint" using the occ command
    Then the command should have been successful
    And the applicable groups list should be empty for local storage mount "TestMountPoint"
    And as "Brian" file "TestMountPoint/test.txt" should not exist


  Scenario: removing all users and groups from a webdav_owncloud external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And the administrator has added group "grp1" as the applicable group for local storage mount "TestMountPoint"
    And the administrator has added user "admin" as the applicable user for local storage mount "TestMountPoint"
    And the administrator has added user "Brian" as the applicable user for local storage mount "TestMountPoint"
    When the administrator removes all from the applicable users and groups for local storage mount "TestMountPoint" using the occ command
    Then the command should have been successful
    And the applicable users list should be empty for local storage mount "TestMountPoint"
    And the applicable groups list should be empty for local storage mount "TestMountPoint"


  Scenario: exporting config from existing webdav_owncloud external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And the administrator has added group "grp1" as the applicable group for local storage mount "TestMountPoint"
    And the administrator has added user "admin" as the applicable user for local storage mount "TestMountPoint"
    And the administrator has added user "Brian" as the applicable user for local storage mount "TestMountPoint"
    When the administrator exports the local storage mounts using the occ command
    Then the command should have been successful
    And the command should output configuration for local storage mount "TestMountPoint"

  @local_storage @files_external-app-required
  Scenario: importing config to create a webdav_owncloud external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And the administrator has exported the external storage mounts using the occ command
    And the administrator has created a file "mountConfig.json" in temporary storage with the last exported content using the testing API
    And the administrator has deleted local storage "local_storage" using the occ command
    And the administrator has deleted external storage with mount point "TestMountPoint"
    When the administrator imports the local storage mount from file "mountConfig.json" using the occ command
    Then the command should have been successful


  Scenario: setting read-only option for webdav_owncloud external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And the administrator has added user "Brian" as the applicable user for local storage mount "TestMountPoint"
    When the administrator sets the external storage "TestMountPoint" to read-only using the occ command
    Then the command should have been successful
    And user "Brian" should not be able to delete file "TestMountPoint/test.txt"
    And using server "REMOTE"
    And user "Alice" should be able to delete file "TestMnt/test.txt"


  Scenario: disabling and enabling share option for webdav_owncloud external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "admin" has uploaded file with content "Hello from Local!" to "TestMountPoint/test.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And the administrator has added user "Brian" as the applicable user for local storage mount "TestMountPoint"
    When the administrator disables sharing for the external storage "TestMountPoint" using the occ command
    Then the command should have been successful
    And user "Brian" should not be able to share file "TestMountPoint/test.txt" with user "Carol" using the sharing API
    When the administrator enables sharing for the external storage "TestMountPoint" using the occ command
    Then user "Brian" should be able to share file "TestMountPoint/test.txt" with user "Carol" using the sharing API
    And as "Carol" file "test.txt" should exist


  Scenario: user moves their own folder to the external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "testFolder"
    When user "Brian" moves folder "testFolder" to "TestMountPoint/testFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "TestMountPoint/testFolder" should exist
    And using server "REMOTE"
    And as "Alice" folder "TestMnt/testFolder" should exist


  Scenario: user moves their own file to the external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "Test content for moving file." to "test.txt"
    When user "Brian" moves file "/test.txt" to "TestMountPoint/test.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "TestMountPoint/test.txt" should exist
    And using server "REMOTE"
    And as "Alice" file "TestMnt/test.txt" should exist
    And the content of file "TestMnt/test.txt" for user "Alice" should be "Test content for moving file."


  Scenario: user moves a folder out of external storage to their own storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And using server "REMOTE"
    And user "Alice" has created folder "TestMnt/testFolder"
    And using server "LOCAL"
    When user "Brian" moves folder "TestMountPoint/testFolder" to "/testFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "testFolder" should exist


  Scenario: user moves a file out of external storage to their own storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And using server "REMOTE"
    And user "Alice" has uploaded file with content "Test content for moving file." to "TestMnt/test.txt"
    And using server "LOCAL"
    When user "Brian" moves file "TestMountPoint/test.txt" to "/test.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/test.txt" should exist
    And the content of file "/test.txt" for user "Brian" should be "Test content for moving file."

  @issue-39550
  Scenario: user tries to move a folder that they have shared to someone, to external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "testFolder"
    And user "Brian" has shared folder "/testFolder" with user "Carol"
    When user "Brian" moves folder "testFolder" to "TestMountPoint/testFolder" using the WebDAV API
    # Remove the following lines after the issue has been fixed
    Then the HTTP status code should be "500"
    And the HTTP response message should be "You are not allowed to share /Brian/files/TestMountPoint/testFolder"
    # Uncomment the following lines after the issue has been fixed
    # Then the HTTP status code should be "403"
    # And the HTTP response message should be "It is not allowed to move one mount point into another one"
    # Folder should not be moved but here the folder is moved to mount storage
    But as "Brian" folder "TestMountPoint/testFolder" should exist

  @issue-39550
  Scenario: user tries to move a file that they have shared to someone, to external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "Test content for moving file." to "test.txt"
    And user "Brian" has shared file "test.txt" with user "Carol"
    When user "Brian" moves file "/test.txt" to "TestMountPoint/test.txt" using the WebDAV API
    # Remove the following lines after the issue has been fixed
    Then the HTTP status code should be "500"
    And the HTTP response message should be "You are not allowed to share /Brian/files/TestMountPoint/test.txt"
    # Uncomment the following lines after the issue has been fixed
    # Then the HTTP status code should be "403"
    # And the HTTP response message should be "It is not allowed to move one mount point into another one"
    # File should not be moved but here the file is moved to mount storage
    But as "Brian" file "TestMountPoint/test.txt" should exist


  Scenario: share receiver tries to move a folder that they have received from someone, to external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "testFolder"
    And user "Brian" has shared folder "/testFolder" with user "Carol"
    When user "Carol" moves folder "/testFolder" to "TestMountPoint/testFolder" using the WebDAV API
    Then the HTTP status code should be "403"
    And the HTTP response message should be "It is not allowed to move one mount point into another one"


  Scenario: share receiver tries to move a file that they have received from someone, to external storage
    Given the administrator has created an external mount point with the following configuration about user "Alice" using the occ command
      | host                   | %remote_server%    |
      | root                   | TestMnt            |
      | secure                 | false              |
      | user                   | %username%         |
      | password               | %password%         |
      | storage_backend        | owncloud           |
      | mount_point            | TestMountPoint     |
      | authentication_backend | password::password |
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "Test content for moving file." to "test.txt"
    And user "Brian" has shared file "test.txt" with user "Carol"
    When user "Carol" moves file "/test.txt" to "TestMountPoint/test.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And the HTTP response message should be "It is not allowed to move one mount point into another one"

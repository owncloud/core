@cli @local_storage
Feature: Files Operations command

  Scenario: Adding a file to local storage and running scan should add files.
    Given using new DAV path
    And user "user0" has been created with default attributes
    And the administrator has set the external storage to be never scanned automatically
    # issue-33670: Need to re-scan. Config change doesn't come into effect until once scanned
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage/hello1.txt |
    When the administrator scans the filesystem for all users using the occ command
    And the administrator creates file "hello2.txt" with content "<? php :(" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should contain these entries:
      | /local_storage/hello1.txt |
    But the propfind result of "user0" should not contain these entries:
      | /local_storage/hello2.txt |

  Scenario: Adding a file to local storage and running scan for a specific path should add files for only that path.
    Given using new DAV path
    And user "user0" has been created with default attributes
    And the administrator has set the external storage to be never scanned automatically
    And user "user0" has created folder "/local_storage/folder1"
    And user "user0" has created folder "/local_storage/folder2"
    # issue-33670: Need to re-scan. Config change doesn't come into effect until once scanned
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "folder1/hello1.txt" with content "<? php :)" in local storage using the testing API
    And the administrator creates file "folder2/hello2.txt" with content "<? php :(" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "user0" requests "/remote.php/dav/files/user0/local_storage/folder2" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage/folder2/hello2.txt |
    When the administrator scans the filesystem in path "/user0/files/local_storage/folder1" using the occ command
    And user "user0" requests "/remote.php/dav/files/user0/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "user0" requests "/remote.php/dav/files/user0/local_storage/folder2" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage/folder2/hello2.txt |

  Scenario: Adding a folder to local storage, sharing with groups and running scan for specific group should add files for users of that group
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    And group "newgroup" has been created
    And user "user0" has been added to group "newgroup"
    And user "user1" has been added to group "newgroup"
    And user "user0" has created folder "/local_storage/folder1"
    And the administrator has set the external storage to be never scanned automatically
    And user "user0" has shared folder "/local_storage/folder1" with group "newgroup"
    And the administrator has scanned the filesystem for all users
    And the administrator has scanned the filesystem for group "newgroup"
    When the administrator creates file "folder1/hello1.txt" with content "<? php :)" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "user1" requests "/remote.php/dav/files/user1/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage/folder1/hello1.txt |
    When the administrator scans the filesystem for group "newgroup" using the occ command
    And user "user0" requests "/remote.php/dav/files/user0/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "user1" requests "/remote.php/dav/files/user1/folder1" with "PROPFIND" using basic auth
    Then the propfind result of "user1" should contain these entries:
      | /folder1/hello1.txt |

  Scenario: administrator should be able to create a local mount for a specific user
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    When the administrator creates the local storage mount "local_storage2" using the occ command
    And the administrator adds user "user0" as the applicable user for the last local storage mount using the occ command
    And the administrator creates the local storage mount "local_storage3" using the occ command
    And the administrator adds user "user1" as the applicable user for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And as "user0" folder "/local_storage3" should not exist
    And as "user1" folder "/local_storage3" should exist
    And as "user1" folder "/local_storage2" should not exist

  Scenario: administrator should be able to add more than one user as the applicable user for a local mount
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added user "user0" as the applicable user for the last local storage mount
    When the administrator adds user "user1" as the applicable user for the last local storage mount using the occ command
    And as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist
    And as "user2" folder "/local_storage2" should not exist

  Scenario: user should get access if the user is removed from the applicable user and the user was the only applicable user
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added user "user0" as the applicable user for the last local storage mount
    When the administrator removes user "user0" from the applicable user for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist

  Scenario: user should not get access if the user is removed from the applicable user and the user was not the only applicable user
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added user "user0" as the applicable user for the last local storage mount
    And the administrator has added user "user1" as the applicable user for the last local storage mount
    When the administrator removes user "user0" from the applicable user for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should not exist
    And as "user1" folder "/local_storage2" should exist

  Scenario: administrator should be able to create a local mount for a specific group
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    And group "newgroup" has been created
    And user "user0" has been added to group "newgroup"
    And the administrator has created the local storage mount "local_storage2"
    When the administrator adds group "newgroup" as the applicable group for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should not exist

  Scenario: administrator should be able to create a local mount for more than one group
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And group "newgroup" has been created
    And group "newgroup2" has been created
    And user "user0" has been added to group "newgroup"
    And user "user1" has been added to group "newgroup2"
    And the administrator has created the local storage mount "local_storage2"
    When the administrator adds group "newgroup" as the applicable group for the last local storage mount using the occ command
    And the administrator adds group "newgroup2" as the applicable group for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist
    And as "user2" folder "/local_storage2" should not exist

  Scenario: administrator should be able to create a local mount for a specific group and user
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    And group "newgroup" has been created
    And user "user0" has been added to group "newgroup"
    And the administrator has created the local storage mount "local_storage2"
    When the administrator adds group "newgroup" as the applicable group for the last local storage mount using the occ command
    And the administrator adds user "user1" as the applicable user for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist

  Scenario: removing group from applicable group of a local mount
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    And group "newgroup" has been created
    And user "user0" has been added to group "newgroup"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added group "newgroup" as the applicable group for the last local storage mount
    When the administrator removes group "newgroup" from the applicable group for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist

  Scenario: user should get access if the group of the user is removed from the applicable group and that group was the only applicable group
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    And group "newgroup" has been created
    And user "user0" has been added to group "newgroup"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added group "newgroup" as the applicable group for the last local storage mount
    When the administrator removes group "newgroup" from the applicable group for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And as "user1" folder "/local_storage2" should exist

  Scenario: user should not get access if the group of the user is removed from the applicable group and that group was not the only applicable group
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And group "newgroup" has been created
    And group "newgroup2" has been created
    And user "user0" has been added to group "newgroup"
    And user "user1" has been added to group "newgroup2"
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added group "newgroup" as the applicable group for the last local storage mount
    And the administrator has added group "newgroup2" as the applicable group for the last local storage mount
    When the administrator removes group "newgroup" from the applicable group for the last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should not exist
    And as "user1" folder "/local_storage2" should exist
    And as "user2" folder "/local_storage2" should not exist

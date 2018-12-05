@cli @local_storage
Feature: Files Operations command

  Scenario: Adding a file to local storage and running scan should add files.
    Given using new DAV path
    And user "user0" has been created with default attributes
    And the administrator has set the external storage "local_storage" to be never scanned automatically
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
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    And user "user0" has created folder "/local_storage/folder1"
    And user "user0" has created folder "/local_storage/folder2"
    And the administrator has set the external storage "local_storage" to be never scanned automatically
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
    And the administrator has set the external storage "local_storage" to be never scanned automatically
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
    And the administrator sets user "user0" as the applicable for last local storage mount using the occ command
    And the administrator creates the local storage mount "local_storage3" using the occ command
    And the administrator sets user "user1" as the applicable for last local storage mount using the occ command
    Then as "user0" folder "/local_storage2" should exist
    And as "user0" folder "/local_storage3" should not exist
    And as "user1" folder "/local_storage3" should exist
    And as "user1" folder "/local_storage2" should not exist

  Scenario: Deleting a file from local storage and running scan for a specific path should remove the file.
    Given using new DAV path
    And user "user0" has been created with default attributes
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/local_storage/hello1.txt"
    When user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should contain these entries:
      | /local_storage/hello1.txt |
    When the administrator deletes file "hello1.txt" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should contain these entries:
      | /local_storage/hello1.txt |
    When the administrator scans the filesystem for all users using the occ command
    And user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage/hello1.txt |

  Scenario: Adding a file on local storage and running file scan for a specific user should add file for only that user
    Given using new DAV path
    And these users have been created with default attributes:
      | username |
      | user0    |
      | user1    |
    When the administrator creates the local storage mount "local_storage1" using the occ command
    And the administrator sets user "user0" as the applicable for last local storage mount using the occ command
    And the administrator creates the local storage mount "local_storage2" using the occ command
    And the administrator sets user "user1" as the applicable for last local storage mount using the occ command
    And the administrator has set the external storage "local_storage1" to be never scanned automatically
    And the administrator has set the external storage "local_storage2" to be never scanned automatically
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage1" using the testing API
    And the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage2" using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage1/hello1.txt |
    When user "user1" requests "/remote.php/dav/files/user1/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result of "user1" should not contain these entries:
      | /local_storage2/hello1.txt |
    When the administrator scans the filesystem for user "user0" using the occ command
    And user "user0" requests "/remote.php/dav/files/user0/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result of "user0" should contain these entries:
      | /local_storage1/hello1.txt |
    When user "user1" requests "/remote.php/dav/files/user1/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result of "user1" should not contain these entries:
      | /local_storage2/hello1.txt |
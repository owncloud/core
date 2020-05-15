@cli @local_storage @TestAlsoOnExternalUserBackend
Feature: Scanning files on local storage
  As an admin
  I want to be able to control the scanning of local storage for changes
  So that I can manage the balance between performance and "up-to-date-ness" of local storage

  Scenario: Adding a file to local storage and running scan should add files.
    Given user "Alice" has been created with default attributes and skeleton files
    And using new DAV path
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    # issue-33670: Need to re-scan. Config change doesn't come into effect until once scanned
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of user "user0" should not contain these entries:
      | /local_storage/hello1.txt |
    When the administrator scans the filesystem for all users using the occ command
    And the administrator creates file "hello2.txt" with content "<? php :(" in local storage using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should contain these entries:
      | /local_storage/hello1.txt |
    But the propfind result of user "Alice" should not contain these entries:
      | /local_storage/hello2.txt |

  Scenario: Adding a file to local storage and running scan for a specific path should add files for only that path.
    Given user "Alice" has been created with default attributes and skeleton files
    And using new DAV path
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    And user "Alice" has created folder "/local_storage/folder1"
    And user "Alice" has created folder "/local_storage/folder2"
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    # issue-33670: Need to re-scan. Config change doesn't come into effect until once scanned
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "folder1/hello1.txt" with content "<? php :)" in local storage using the testing API
    And the administrator creates file "folder2/hello2.txt" with content "<? php :(" in local storage using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "Alice" requests "/remote.php/dav/files/%username%/local_storage/folder2" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage/folder2/hello2.txt |
    When the administrator scans the filesystem in path "/%username%/files/local_storage/folder1" of user "Alice" using the occ command
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of user "user0" should contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "Alice" requests "/remote.php/dav/files/%username%/local_storage/folder2" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage/folder2/hello2.txt |

  @files_sharing-app-required @skipOnLDAP
  Scenario Outline: Adding a folder to local storage, sharing with groups and running scan for specific group should add files for users of that group
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And using new DAV path
    And group "<groupname>" has been created
    And user "Alice" has been added to group "<groupname>"
    And user "Brian" has been added to group "<groupname>"
    And user "Alice" has created folder "/local_storage/folder1"
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    And user "Alice" has shared folder "/local_storage/folder1" with group "<groupname>"
    And the administrator has scanned the filesystem for all users
    And the administrator has scanned the filesystem for group "<groupname>"
    When the administrator creates file "folder1/hello1.txt" with content "<? php :)" in local storage using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "Brian" requests "/remote.php/dav/files/%username%/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of user "Brian" should not contain these entries:
      | /local_storage/folder1/hello1.txt |
    When the administrator scans the filesystem for group "<groupname>" using the occ command
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "Brian" requests "/remote.php/dav/files/%username%/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result of user "Brian" should contain these entries:
      | /local_storage/folder1/hello1.txt |
    Examples:
      | groupname            |
      | grp0                 |
      | commas,in,group,name |

  Scenario: Adding a folder to local storage, sharing with groups and running scan for a list of groups should add files for users in the groups
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
      | David    |
    And using new DAV path
    And group "grp0" has been created
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Alice" has been added to group "grp0"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp2"
    And user "David" has been added to group "grp2"
    And the administrator has created the local storage mount "local_storage1"
    And the administrator has added user "Alice" as the applicable user for the last local storage mount
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added user "Brian" as the applicable user for the last local storage mount
    And the administrator has created the local storage mount "local_storage3"
    And the administrator has added group "grp2" as the applicable group for the last local storage mount
    And user "Alice" has created folder "/local_storage1/folder1"
    And user "Brian" has created folder "/local_storage2/folder2"
    And user "Carol" has created folder "/local_storage3/folder3"
    And the administrator has set the external storage "local_storage1" to be never scanned automatically
    And the administrator has set the external storage "local_storage2" to be never scanned automatically
    And the administrator has set the external storage "local_storage3" to be never scanned automatically
    And the administrator has scanned the filesystem for all users
    And the administrator has scanned the filesystem for groups list "grp0,grp1,grp2"
    When the administrator creates file "folder1/hello1.txt" with content "<? php :)" in local storage "local_storage1" using the testing API
    And the administrator creates file "folder2/hello2.txt" with content "<? php :)" in local storage "local_storage2" using the testing API
    And the administrator creates file "folder3/hello3.txt" with content "<? php :)" in local storage "local_storage3" using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage1/folder1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage1/folder1/hello1.txt |
    When user "Brian" requests "/remote.php/dav/files/%username%/local_storage2/folder2" with "PROPFIND" using basic auth
    Then the propfind result of user "Brian" should not contain these entries:
      | /local_storage2/folder2/hello2.txt |
    When user "Carol" requests "/remote.php/dav/files/%username%/local_storage3/folder3" with "PROPFIND" using basic auth
    Then the propfind result of user "Carol" should not contain these entries:
      | /local_storage3/folder3/hello3.txt |
    When user "David" requests "/remote.php/dav/files/%username%/local_storage3/folder3" with "PROPFIND" using basic auth
    Then the propfind result of user "David" should not contain these entries:
      | /local_storage3/folder3/hello3.txt |
    When the administrator scans the filesystem for groups list "grp2,grp3" using the occ command
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage1/folder1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage1/folder1/hello1.txt |
    When user "Brian" requests "/remote.php/dav/files/%username%/local_storage2/folder2" with "PROPFIND" using basic auth
    Then the propfind result of user "Brian" should contain these entries:
      | /local_storage2/folder2/hello2.txt |
    When user "Carol" requests "/remote.php/dav/files/%username%/local_storage3/folder3" with "PROPFIND" using basic auth
    Then the propfind result of user "Carol" should contain these entries:
      | /local_storage3/folder3/hello3.txt |
    When user "David" requests "/remote.php/dav/files/%username%/local_storage3/folder3" with "PROPFIND" using basic auth
    Then the propfind result of user "David" should contain these entries:
      | /local_storage3/folder3/hello3.txt |

  Scenario: Deleting a file from local storage and running scan for a specific path should remove the file.
    Given user "Alice" has been created with default attributes and skeleton files
    And using new DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/local_storage/hello1.txt"
    When user "Alice" requests "/remote.php/dav/files/%username%/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should contain these entries:
      | /local_storage/hello1.txt |
    When the administrator deletes file "hello1.txt" in local storage using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should contain these entries:
      | /local_storage/hello1.txt |
    When the administrator scans the filesystem for all users using the occ command
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage/hello1.txt |

  Scenario: Adding a file on local storage and running file scan for a specific user should add file for only that user
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And using new DAV path
    And the administrator has created the local storage mount "local_storage1"
    And the administrator has added user "Alice" as the applicable user for the last local storage mount
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added user "Brian" as the applicable user for the last local storage mount
    And the administrator has set the external storage "local_storage1" to be never scanned automatically
    And the administrator has set the external storage "local_storage2" to be never scanned automatically
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage1" using the testing API
    And the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage2" using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage1/hello1.txt |
    When user "Brian" requests "/remote.php/dav/files/%username%/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result of user "Brian" should not contain these entries:
      | /local_storage2/hello1.txt |
    When the administrator scans the filesystem for user "Alice" using the occ command
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should contain these entries:
      | /local_storage1/hello1.txt |
    When user "Brian" requests "/remote.php/dav/files/%username%/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result of user "Brian" should not contain these entries:
      | /local_storage2/hello1.txt |

  Scenario: Adding a file on local storage and running file scan for a specific group should add file for only the users of that group
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And using new DAV path
    And group "grp0" has been created
    And group "grp1" has been created
    And user "Alice" has been added to group "grp0"
    And user "Brian" has been added to group "grp0"
    And user "Carol" has been added to group "grp1"
    And the administrator has created the local storage mount "local_storage1"
    And the administrator has added group "grp0" as the applicable group for the last local storage mount
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added group "grp1" as the applicable group for the last local storage mount
    And the administrator has set the external storage "local_storage1" to be never scanned automatically
    And the administrator has set the external storage "local_storage2" to be never scanned automatically
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage1" using the testing API
    And the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage2" using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage1/hello1.txt |
    When user "Brian" requests "/remote.php/dav/files/%username%/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result of user "Brian" should not contain these entries:
      | /local_storage1/hello1.txt |
    When user "Carol" requests "/remote.php/dav/files/%username%/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result of user "Carol" should not contain these entries:
      | /local_storage2/hello1.txt |
    When the administrator scans the filesystem for group "grp1" using the occ command
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should contain these entries:
      | /local_storage1/hello1.txt |
    When user "Brian" requests "/remote.php/dav/files/%username%/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result of user "Brian" should contain these entries:
      | /local_storage1/hello1.txt |
    When user "Carol" requests "/remote.php/dav/files/%username%/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result of user "Carol" should not contain these entries:
      | /local_storage2/hello1.txt |

@cli @local_storage @TestAlsoOnExternalUserBackend
Feature: Scanning files on local storage
  As an admin
  I want to be able to control the scanning of local storage for changes
  So that I can manage the balance between performance and "up-to-date-ness" of local storage

  Scenario: Adding a file to local storage and running scan should add files.
    Given user "user0" has been created with default attributes and skeleton files
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    # issue-33670: Need to re-scan. Config change doesn't come into effect until once scanned
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When the administrator scans the filesystem for all users using the occ command
    And the administrator creates file "hello2.txt" with content "<? php :(" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    But the propfind result should not contain these entries:
      | /hello2.txt |

  Scenario: Adding a file to local storage and running scan for a specific path should add files for only that path.
    Given user "user0" has been created with default attributes and skeleton files
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    And user "user0" has created folder "/local_storage/folder1"
    And user "user0" has created folder "/local_storage/folder2"
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    # issue-33670: Need to re-scan. Config change doesn't come into effect until once scanned
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "folder1/hello1.txt" with content "<? php :)" in local storage using the testing API
    And the administrator creates file "folder2/hello2.txt" with content "<? php :(" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When user "user0" requests "/remote.php/dav/files/user0/local_storage/folder2" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello2.txt |
    When the administrator scans the filesystem in path "/user0/files/local_storage/folder1" using the occ command
    And user "user0" requests "/remote.php/dav/files/user0/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    When user "user0" requests "/remote.php/dav/files/user0/local_storage/folder2" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello2.txt |

  @files_sharing-app-required
  Scenario Outline: Adding a folder to local storage, sharing with groups and running scan for specific group should add files for users of that group
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "<groupname>" has been created
    And user "user1" has been added to group "<groupname>"
    And user "user2" has been added to group "<groupname>"
    And user "user1" has created folder "/local_storage/folder1"
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    And user "user1" has shared folder "/local_storage/folder1" with group "<groupname>"
    And the administrator has scanned the filesystem for all users
    And the administrator has scanned the filesystem for group "<groupname>"
    When the administrator creates file "folder1/hello1.txt" with content "<? php :)" in local storage using the testing API
    And user "user1" requests "/remote.php/dav/files/user1/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When user "user2" requests "/remote.php/dav/files/user2/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When the administrator scans the filesystem for group "<groupname>" using the occ command
    And user "user1" requests "/remote.php/dav/files/user1/local_storage/folder1" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    When user "user2" requests "/remote.php/dav/files/user2/folder1" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    Examples:
      | groupname            |
      | grp1                 |
      | commas,in,group,name |

  Scenario: Adding a folder to local storage, sharing with groups and running scan for a list of groups should add files for users in the groups
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
      | user4    |
    And group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp2"
    And user "user3" has been added to group "grp3"
    And user "user4" has been added to group "grp3"
    And the administrator has created the local storage mount "local_storage1"
    And the administrator has added user "user1" as the applicable user for the last local storage mount
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added user "user2" as the applicable user for the last local storage mount
    And the administrator has created the local storage mount "local_storage3"
    And the administrator has added group "grp3" as the applicable group for the last local storage mount
    And user "user1" has created folder "/local_storage1/folder1"
    And user "user2" has created folder "/local_storage2/folder2"
    And user "user3" has created folder "/local_storage3/folder3"
    And the administrator has set the external storage "local_storage1" to be never scanned automatically
    And the administrator has set the external storage "local_storage2" to be never scanned automatically
    And the administrator has set the external storage "local_storage3" to be never scanned automatically
    And the administrator has scanned the filesystem for all users
    And the administrator has scanned the filesystem for groups list "grp1,grp2,grp3"
    When the administrator creates file "folder1/hello1.txt" with content "<? php :)" in local storage "local_storage1" using the testing API
    And the administrator creates file "folder2/hello2.txt" with content "<? php :)" in local storage "local_storage2" using the testing API
    And the administrator creates file "folder3/hello3.txt" with content "<? php :)" in local storage "local_storage3" using the testing API
    And user "user1" requests "/remote.php/dav/files/user1/local_storage1/folder1" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When user "user2" requests "/remote.php/dav/files/user2/local_storage2/folder2" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello2.txt |
    When user "user3" requests "/remote.php/dav/files/user3/local_storage3/folder3" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello3.txt |
    When user "user4" requests "/remote.php/dav/files/user4/local_storage3/folder3" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello3.txt |
    When the administrator scans the filesystem for groups list "grp2,grp3" using the occ command
    And user "user1" requests "/remote.php/dav/files/user1/local_storage1/folder1" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When user "user2" requests "/remote.php/dav/files/user2/local_storage2/folder2" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello2.txt |
    When user "user3" requests "/remote.php/dav/files/user3/local_storage3/folder3" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello3.txt |
    When user "user4" requests "/remote.php/dav/files/user4/local_storage3/folder3" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello3.txt |

  Scenario: Deleting a file from local storage and running scan for a specific path should remove the file.
    Given user "user0" has been created with default attributes and skeleton files
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/local_storage/hello1.txt"
    When user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    When the administrator deletes file "hello1.txt" in local storage using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    When the administrator scans the filesystem for all users using the occ command
    And user "user0" requests "/remote.php/dav/files/user0/local_storage" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |

  Scenario: Adding a file on local storage and running file scan for a specific user should add file for only that user
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And the administrator has created the local storage mount "local_storage1"
    And the administrator has added user "user0" as the applicable user for the last local storage mount
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added user "user1" as the applicable user for the last local storage mount
    And the administrator has set the external storage "local_storage1" to be never scanned automatically
    And the administrator has set the external storage "local_storage2" to be never scanned automatically
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage1" using the testing API
    And the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage2" using the testing API
    And user "user0" requests "/remote.php/dav/files/user0/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When user "user1" requests "/remote.php/dav/files/user1/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When the administrator scans the filesystem for user "user0" using the occ command
    And user "user0" requests "/remote.php/dav/files/user0/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    When user "user1" requests "/remote.php/dav/files/user1/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |

  Scenario: Adding a file on local storage and running file scan for a specific group should add file for only the users of that group
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And group "grp1" has been created
    And group "grp2" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user3" has been added to group "grp2"
    And the administrator has created the local storage mount "local_storage1"
    And the administrator has added group "grp1" as the applicable group for the last local storage mount
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has added group "grp2" as the applicable group for the last local storage mount
    And the administrator has set the external storage "local_storage1" to be never scanned automatically
    And the administrator has set the external storage "local_storage2" to be never scanned automatically
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage1" using the testing API
    And the administrator creates file "hello1.txt" with content "<? php :)" in local storage "local_storage2" using the testing API
    And user "user1" requests "/remote.php/dav/files/user1/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When user "user2" requests "/remote.php/dav/files/user2/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When user "user3" requests "/remote.php/dav/files/user3/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |
    When the administrator scans the filesystem for group "grp1" using the occ command
    And user "user1" requests "/remote.php/dav/files/user1/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    When user "user2" requests "/remote.php/dav/files/user2/local_storage1" with "PROPFIND" using basic auth
    Then the propfind result should contain these entries:
      | /hello1.txt |
    When user "user3" requests "/remote.php/dav/files/user3/local_storage2" with "PROPFIND" using basic auth
    Then the propfind result should not contain these entries:
      | /hello1.txt |


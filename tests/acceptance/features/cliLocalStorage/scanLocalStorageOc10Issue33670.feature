@cli @local_storage @files_external-app-required @issue-33670
Feature: Scanning files on local storage
  As an admin
  I want to be able to control the scanning of local storage for changes
  So that I can manage the balance between performance and "up-to-date-ness" of local storage


  Scenario: Adding a file to local storage and running scan should add files.
    Given user "Alice" has been created with default attributes and small skeleton files
    And using new DAV path
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    # Need to re-scan. Config change doesn't come into effect until once scanned
    And the administrator has scanned the filesystem for all users
    When the administrator creates file "hello1.txt" with content "<? php :)" in local storage using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage/hello1.txt |
    When the administrator scans the filesystem for all users using the occ command
    And the administrator creates file "hello2.txt" with content "<? php :(" in local storage using the testing API
    And user "Alice" requests "/remote.php/dav/files/%username%/local_storage" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should contain these entries:
      | /local_storage/hello1.txt |
    But the propfind result of user "Alice" should not contain these entries:
      | /local_storage/hello2.txt |


  Scenario: Adding a file to local storage and running scan for a specific path should add files for only that path.
    Given user "Alice" has been created with default attributes and small skeleton files
    And using new DAV path
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    And user "Alice" has created folder "/local_storage/folder1"
    And user "Alice" has created folder "/local_storage/folder2"
    And the administrator has set the external storage "local_storage" to be never scanned automatically
    # Need to re-scan. Config change doesn't come into effect until once scanned
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
    Then the propfind result of user "Alice" should contain these entries:
      | /local_storage/folder1/hello1.txt |
    When user "Alice" requests "/remote.php/dav/files/%username%/local_storage/folder2" with "PROPFIND" using basic auth
    Then the propfind result of user "Alice" should not contain these entries:
      | /local_storage/folder2/hello2.txt |

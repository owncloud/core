@cli @local_storage
Feature: Files Operations command

  Scenario: Adding a file to local storage and running scan should show new files.
    Given using new DAV path
    Given user "user0" has been created with default attributes
    And the administrator has set the external storage to be never scanned automatically
    # HACK: Need to re-scan. Config change doesn't come into effect until once scanned
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
    Then the propfind result of "user0" should not contain these entries:
      | /local_storage/hello2.txt |
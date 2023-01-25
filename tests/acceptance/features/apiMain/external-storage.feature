@api @local_storage @files_external-app-required
Feature: external-storage

  Background:
    Given using OCS API version "1"
    And using old DAV path

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: Share by public link a file inside a local external storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has created folder "/local_storage/foo"
    And user "Alice" has moved file "/textfile0.txt" to "/local_storage/foo/textfile0.txt"
    And user "Alice" has shared folder "/local_storage/foo" with user "Brian"
    When user "Brian" creates a public link share using the sharing API with settings
      | path | foo |
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" should include
      | id       | A_NUMBER             |
      | url      | AN_URL               |
      | token    | A_TOKEN              |
      | mimetype | httpd/unix-directory |


  Scenario: Move a file into storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has created folder "/local_storage/foo1"
    When user "Alice" moves file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/local_storage/foo1/textfile0.txt" should exist
    And as "Alice" file "/local_storage/foo1/textfile0.txt" should exist


  Scenario: Move a file out of storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has created folder "/local_storage/foo2"
    And user "Alice" has moved file "/textfile0.txt" to "/local_storage/foo2/textfile0.txt"
    When user "Brian" moves file "/local_storage/foo2/textfile0.txt" to "/local.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/local_storage/foo2/textfile0.txt" should not exist
    And as "Alice" file "/local_storage/foo2/textfile0.txt" should not exist
    And as "Brian" file "/local.txt" should exist

  @skipOnEncryptionType:user-keys
  Scenario: Copy a file into storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
    And user "Alice" has created folder "/local_storage/foo1"
    When user "Alice" copies file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/local_storage/foo1/textfile0.txt" should exist
    And as "Alice" file "/textfile0.txt" should exist


  Scenario: Copy a file out of storage
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
    And user "Alice" has created folder "/local_storage/foo1"
    And user "Alice" has uploaded file with content "ownCloud test text file inside localstorage" to "/local_storage/foo1/fileInsideLocalStorage.txt"
    When user "Alice" copies file "/local_storage/foo1/fileInsideLocalStorage.txt" to "/fileInsideLocalStorage.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/fileInsideLocalStorage.txt" should exist
    And as "Alice" file "/local_storage/foo1/fileInsideLocalStorage.txt" should exist


  Scenario: Download a file that exists in filecache but not storage fails with 404
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/local_storage/foo3"
    And user "Alice" has moved file "/textfile0.txt" to "/local_storage/foo3/textfile0.txt"
    And file "foo3/textfile0.txt" has been deleted from local storage on the server
    When user "Alice" downloads file "local_storage/foo3/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    # See issue-37723 for discussion. In this case the server still reports the file exists
    # in the folder. The file cache will be cleared after the local storage is scanned.
    And as "Alice" file "local_storage/foo3/textfile0.txt" should exist


  Scenario: Upload a file to external storage while quota is set on home storage
    Given user "Alice" has been created with default attributes and small skeleton files
    And the quota of user "Alice" has been set to "1 B"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to filenames based on "/local_storage/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"
    And as "Alice" the files uploaded to "/local_storage/testquota.txt" with all mechanisms should exist


  Scenario Outline: query OCS endpoint for information about the mount
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has been created with default attributes and small skeleton files
    When user "Alice" sends HTTP method "GET" to OCS API endpoint "<endpoint>"
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    And the fields of the last response to user "Alice" should include
      | id          | A_NUMBER      |
      | name        | local_storage |
      | type        | dir           |
      | backend     | Local         |
      | scope       | system        |
      | permissions | read          |
      | class       | local         |
    Examples:
      | ocs_api_version | endpoint                           | ocs-code | http-code |
      | 1               | /apps/files_external/api/v1/mounts | 100      | 200       |
      | 2               | /apps/files_external/api/v1/mounts | 200      | 200       |

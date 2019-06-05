@api @local_storage
Feature: external-storage

  Background:
    Given using OCS API version "1"
    And using old DAV path

  @public_link_share-feature-required
  Scenario: Share by public link a file inside a local external storage
    Given user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/local_storage/foo"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/foo/textfile0.txt"
    And user "user0" has shared folder "/local_storage/foo" with user "user1"
    When user "user1" creates a public link share using the sharing API with settings
      | path | foo |
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | id       | A_NUMBER             |
      | url      | AN_URL               |
      | token    | A_TOKEN              |
      | mimetype | httpd/unix-directory |

  Scenario: Move a file into storage
    Given user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/local_storage/foo1"
    When user "user0" moves file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the WebDAV API
    Then as "user1" file "/local_storage/foo1/textfile0.txt" should exist
    And as "user0" file "/local_storage/foo1/textfile0.txt" should exist

  Scenario: Move a file out of storage
    Given user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/local_storage/foo2"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/foo2/textfile0.txt"
    When user "user1" moves file "/local_storage/foo2/textfile0.txt" to "/local.txt" using the WebDAV API
    Then as "user1" file "/local_storage/foo2/textfile0.txt" should not exist
    And as "user0" file "/local_storage/foo2/textfile0.txt" should not exist
    And as "user1" file "/local.txt" should exist

  Scenario: Download a file that exists in filecache but not storage fails with 404
    Given user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/local_storage/foo3"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/foo3/textfile0.txt"
    And file "foo3/textfile0.txt" has been deleted from local storage on the server
    When user "user0" downloads file "local_storage/foo3/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    And as "user0" file "local_storage/foo3/textfile0.txt" should not exist

  Scenario: Upload a file to external storage while quota is set on home storage
    Given user "user0" has been created with default attributes and skeleton files
    And the quota of user "user0" has been set to "1 B"
    When user "user0" uploads file "filesForUpload/textfile.txt" to filenames based on "/local_storage/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"
    And as "user0" the files uploaded to "/local_storage/testquota.txt" with all mechanisms should exist

  Scenario Outline: query OCS endpoint for information about the mount
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has been created with default attributes and skeleton files
    When user "user0" sends HTTP method "GET" to OCS API endpoint "<endpoint>"
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    And the fields of the last response should include
      | id          | A_NUMBER      |
      | name        | local_storage |
      | type        | dir           |
      | backend     | Local         |
      | scope       | system        |
      | permissions | 1             |
      | class       | local         |
    Examples:
      | ocs_api_version | endpoint                           | ocs-code | http-code |
      | 1               | /apps/files_external/api/v1/mounts | 100      | 200       |
      | 2               | /apps/files_external/api/v1/mounts | 200      | 200       |

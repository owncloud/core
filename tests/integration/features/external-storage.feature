Feature: external-storage
  Background:
    Given using API version "1"
    And using old DAV path

  # TODO: change to @no_default_encryption once all this works with master key
  @local_storage
  @no_encryption
  Scenario: Share by link a file inside a local external storage
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/local_storage/foo"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/foo/textfile0.txt"
    And user "user0" has shared folder "/local_storage/foo" with user "user1"
    When user "user1" creates a share using the API with settings
      | path | foo |
      | shareType | 3 |
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id | A_NUMBER |
      | url | AN_URL |
      | token | A_TOKEN |
      | mimetype | httpd/unix-directory |

  @local_storage
  @no_encryption
  Scenario: Move a file into storage
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/local_storage/foo1"
    When user "user0" moves file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt" using the API
    Then as "user1" the file "/local_storage/foo1/textfile0.txt" should exist
    And as "user0" the file "/local_storage/foo1/textfile0.txt" should exist

  @local_storage
  @no_encryption
  Scenario: Move a file out of storage
    Given user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/local_storage/foo2"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/foo2/textfile0.txt"
    When user "user1" moves file "/local_storage/foo2/textfile0.txt" to "/local.txt" using the API
    Then as "user1" the file "/local_storage/foo2/textfile0.txt" should not exist
    And as "user0" the file "/local_storage/foo2/textfile0.txt" should not exist
    And as "user1" the file "/local.txt" should exist

  Scenario: Download a file that exists in filecache but not storage fails with 404
    Given user "user0" has been created
    And user "user0" has created a folder "/local_storage/foo3"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/foo3/textfile0.txt"
    And file "foo3/textfile0.txt" has been deleted in local storage
    When user "user0" downloads the file "local_storage/foo3/textfile0.txt" using the API
    Then the HTTP status code should be "404"
    And as "user0" the file "local_storage/foo3/textfile0.txt" should not exist

  @local_storage
  Scenario: Upload a file to external storage while quota is set on home storage
    Given user "user0" has been created
    And the quota of user "user0" has been set to "1 B"
    When user "user0" uploads file "data/textfile.txt" to "/local_storage/testquota.txt" with all mechanisms using the API
    Then the HTTP status code of all upload responses should be "201"
    And as "user0" the files uploaded to "/local_storage/testquota.txt" with all mechanisms should exist

Feature: external-storage
  Background:
    Given using api version "1"
    And using old dav path

  # TODO: change to @no_default_encryption once all this works with master key
  @local_storage
  @no_encryption
  Scenario: Share by link a file inside a local external storage
    Given user "user0" exists
    And user "user1" exists
    And as an "user0"
    And user "user0" created a folder "/local_storage/foo"
    And user "user0" moved file "/textfile0.txt" to "/local_storage/foo/textfile0.txt"
    And folder "/local_storage/foo" of user "user0" is shared with user "user1"
    And as an "user1"
    When creating a share with
      | path | foo |
      | shareType | 3 |
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And share fields of last share match with
      | id | A_NUMBER |
      | url | AN_URL |
      | token | A_TOKEN |
      | mimetype | httpd/unix-directory |

  @local_storage
  @no_encryption
  Scenario: Move a file into storage works
    Given user "user0" exists
    And user "user1" exists
    And as an "user0"
    And user "user0" created a folder "/local_storage/foo1"
    When user "user0" moved file "/textfile0.txt" to "/local_storage/foo1/textfile0.txt"
    Then as "user1" the file "/local_storage/foo1/textfile0.txt" exists
    And as "user0" the file "/local_storage/foo1/textfile0.txt" exists

  @local_storage
  @no_encryption
  Scenario: Move a file out of the storage works
    Given user "user0" exists
    And user "user1" exists
    And as an "user0"
    And user "user0" created a folder "/local_storage/foo2"
    And user "user0" moved file "/textfile0.txt" to "/local_storage/foo2/textfile0.txt"
    When user "user1" moved file "/local_storage/foo2/textfile0.txt" to "/local.txt"
    Then as "user1" the file "/local_storage/foo2/textfile0.txt" does not exist
    And as "user0" the file "/local_storage/foo2/textfile0.txt" does not exist
    And as "user1" the file "/local.txt" exists

  Scenario: Download a file that exists in filecache but not storage fails with 404
    Given user "user0" exists
    And as an "user0"
    And user "user0" created a folder "/local_storage/foo3"
    And user "user0" moved file "/textfile0.txt" to "/local_storage/foo3/textfile0.txt"
    And file "foo3/textfile0.txt" is deleted in local storage
    When downloading file "local_storage/foo3/textfile0.txt"
    Then the HTTP status code should be "404"
    And as "user0" the file "local_storage/foo3/textfile0.txt" does not exist

  @local_storage
  Scenario: Upload a file to external storage while quota is set on home storage
    Given user "user0" exists
    And as an "admin"
    And user "user0" has a quota of "1 B"
    And as an "user0"
    When user "user0" uploads file "data/textfile.txt" to "/local_storage/testquota.txt" with all mechanisms
    Then the HTTP status code of all upload responses should be "201"
    And as "user0" the file "local_storage/textquota.txt" exists

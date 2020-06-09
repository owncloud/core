@api @skipOnOcis
Feature: delete a public link share

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @issue-product-60
  Scenario Outline: Deleting a public link of a file
    Given using OCS API version "<ocs_api_version>"
    Given user "Alice" has uploaded file with content "This is a test file" to "test-file.txt"
    And user "Alice" has created a public link share with settings
      | path | test-file.txt |
      | name | sharedlink    |
    When user "Alice" deletes public link share named "sharedlink" in file "test-file.txt" using the sharing API
    Then the HTTP status code should be "200"
    Then the OCS status code should be "<ocs_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-product-60
  Scenario Outline: Deleting a public link after renaming a file
    Given using OCS API version "<ocs_api_version>"
    Given user "Alice" has uploaded file with content "This is a test file" to "test-file.txt"
    And user "Alice" has created a public link share with settings
      | path | test-file.txt |
      | name | sharedlink    |
    When user "Alice" moves file "/test-file.txt" to "/renamed-test-file.txt" using the WebDAV API
    And user "Alice" deletes public link share named "sharedlink" in file "renamed-test-file.txt" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

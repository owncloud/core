@api @issue-ocis-reva-15
Feature: users cannot upload a file to or into an excluded directory using old chunking
  As an administrator
  I want to be able to exclude directories (folders) from being processed. Any attempt to upload a file to one of those names should be refused.
  So that I can have directories on my cloud server storage that are not available for syncing.

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "Alice" has been created with default attributes and without skeleton files

  @skipOnOcV10 @issue-36645
  Scenario: Upload a file to an excluded directory name using old chunking
    Given the administrator has updated system config key "excluded_directories" with value '[".github"]' and type "json"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/.github" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file ".github" should not exist

  @skipOnOcV10 @issue-36645
  Scenario: Upload a file to an excluded directory name inside a parent directory using old chunking
    Given user "Alice" has created folder "FOLDER"
    And the administrator has updated system config key "excluded_directories" with value '[".github"]' and type "json"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/FOLDER/.github" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" folder "/FOLDER" should exist
    But as "Alice" file "/FOLDER/.github" should not exist

  @skipOnOcV10 @skipOnOcV10.3 @issue-36645
  Scenario Outline: upload a file to a filename that matches excluded_directories_regex using old chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "<filename>" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "<http-status>"
    And as "Alice" file "<filename>" should not exist
    Examples:
      | filename                        | http-status |
      | thisendswith.bad                | 503         |
      | .github                         | 403         |
      | this-containsvirusinthename.txt | 403         |

  @skipOnOcV10.3
  Scenario: upload a file to a filename that does not match excluded_directories_regex using old chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "not-contains-virus-in-the-name.txt" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "not-contains-virus-in-the-name.txt" should exist

@api @issue-ocis-reva-14
Feature: users cannot move (rename) a file to or into an excluded directory
  As an administrator
  I want to be able to exclude directories (folders) from being processed. Any attempt to rename an existing file or folder to one of those names should be refused.
  So that I can have directories on my cloud server storage that are not available for syncing.

  Background:
    Given using new DAV path
    And user "Alice" has been created with default attributes and skeleton files
    And the administrator has enabled async operations

  Scenario: rename a file to an excluded directory name
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "Alice" moves file "/welcome.txt" asynchronously to "/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should see the following elements
      | /welcome.txt |

  Scenario: rename a file to an excluded directory name inside a parent directory
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "Alice" moves file "/welcome.txt" asynchronously to "/FOLDER/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should see the following elements
      | /welcome.txt |

  @skipOnOcV10.3
  Scenario: rename a file to a filename that matches (or not) excluded_directories_regex
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "Alice" moves file "/welcome.txt" asynchronously to these filenames using the webDAV API then the results should be as listed
      | filename                                   | http-code | exists |
      | endswith.bad                               | 403       | no     |
      | thisendswith.bad                           | 403       | no     |
      | .git                                       | 403       | no     |
      | .github                                    | 403       | no     |
      | containsvirusinthename                     | 403       | no     |
      | this-containsvirusinthename.txt            | 403       | no     |
      | /FOLDER/endswith.bad                       | 403       | no     |
      | /FOLDER/thisendswith.bad                   | 403       | no     |
      | /FOLDER/.git                               | 403       | no     |
      | /FOLDER/.github                            | 403       | no     |
      | /FOLDER/containsvirusinthename             | 403       | no     |
      | /FOLDER/this-containsvirusinthename.txt    | 403       | no     |
      | endswith.badandotherstuff                  | 202       | yes    |
      | thisendswith.badandotherstuff              | 202       | yes    |
      | name.git                                   | 202       | yes    |
      | name.github                                | 202       | yes    |
      | not-contains-virus-in-the-name.txt         | 202       | yes    |
      | /FOLDER/endswith.badandotherstuff          | 202       | yes    |
      | /FOLDER/thisendswith.badandotherstuff      | 202       | yes    |
      | /FOLDER/name.git                           | 202       | yes    |
      | /FOLDER/name.github                        | 202       | yes    |
      | /FOLDER/not-contains-virus-in-the-name.txt | 202       | yes    |

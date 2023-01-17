@api @issue-ocis-reva-14
Feature: users cannot move (rename) a folder to or into an excluded directory
  As an administrator
  I want to be able to exclude directories (folders) from being processed. Any attempt to rename an existing folder to one of those names should be refused.
  So that I can have directories on my cloud server storage that are not available for syncing.

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: Rename a folder to an excluded directory name
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    And the administrator has updated system config key "excluded_directories" with value '[".github"]' and type "json"
    When user "Alice" moves folder "/testshare" to "/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Rename a folder to an excluded directory name inside a parent directory
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    And user "Alice" has created folder "/FOLDER"
    And the administrator has updated system config key "excluded_directories" with value '[".github"]' and type "json"
    When user "Alice" moves folder "/testshare" to "/FOLDER/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: rename a folder to a folder name that matches (or not) excluded_directories_regex
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    And user "Alice" has created folder "/FOLDER"
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    And the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "Alice" moves folder "/testshare" to these foldernames using the webDAV API then the results should be as listed
      | foldername                                 | http-code | exists |
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
      | endswith.badandotherstuff                  | 201       | yes    |
      | thisendswith.badandotherstuff              | 201       | yes    |
      | name.git                                   | 201       | yes    |
      | name.github                                | 201       | yes    |
      | not-contains-virus-in-the-name.txt         | 201       | yes    |
      | /FOLDER/endswith.badandotherstuff          | 201       | yes    |
      | /FOLDER/thisendswith.badandotherstuff      | 201       | yes    |
      | /FOLDER/name.git                           | 201       | yes    |
      | /FOLDER/name.github                        | 201       | yes    |
      | /FOLDER/not-contains-virus-in-the-name.txt | 201       | yes    |
    Examples:
      | dav_version |
      | old         |
      | new         |

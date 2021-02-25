@api @issue-ocis-reva-14
Feature: users cannot move (rename) a file to a blacklisted name
  As an administrator
  I want to be able to prevent users from moving (renaming) files to specified file names
  So that I can prevent unwanted file names existing in the cloud storage

  Background:
    Given using new DAV path
    And user "Alice" has been created with default attributes and small skeleton files
    And the administrator has enabled async operations

  Scenario: rename a file to a filename that is banned by default
    When user "Alice" moves file "/welcome.txt" asynchronously to "/.htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should see the following elements
      | /welcome.txt |

  Scenario: rename a file to a banned filename
    When the administrator updates system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json" using the occ command
    And user "Alice" moves file "/welcome.txt" asynchronously to "/blacklisted-file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should see the following elements
      | /welcome.txt |

  @skipOnOcV10.3
  Scenario: rename a file to a filename that matches (or not) blacklisted_files_regex
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "Alice" moves file "/welcome.txt" asynchronously to these filenames using the webDAV API then the results should be as listed
      | filename                               | http-code | exists |
      | .ext                                   | 403       | no     |
      | filename.ext                           | 403       | no     |
      | bannedfilename.txt                     | 403       | no     |
      | containsbannedstring                   | 403       | no     |
      | this-ContainsBannedString.txt          | 403       | no     |
      | /FOLDER/.ext                           | 403       | no     |
      | /FOLDER/filename.ext                   | 403       | no     |
      | /FOLDER/bannedfilename.txt             | 403       | no     |
      | /FOLDER/containsbannedstring           | 403       | no     |
      | /FOLDER/this-ContainsBannedString.txt  | 403       | no     |
      | .extension                             | 202       | yes    |
      | filename.txt                           | 202       | yes    |
      | bannedfilename                         | 202       | yes    |
      | bannedfilenamewithoutdot               | 202       | yes    |
      | not-contains-banned-string.txt         | 202       | yes    |
      | /FOLDER/.extension                     | 202       | yes    |
      | /FOLDER/filename.txt                   | 202       | yes    |
      | /FOLDER/bannedfilename                 | 202       | yes    |
      | /FOLDER/bannedfilenamewithoutdot       | 202       | yes    |
      | /FOLDER/not-contains-banned-string.txt | 202       | yes    |

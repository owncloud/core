@api @issue-ocis-reva-56 @notToImplementOnOCIS @newChunking @issue-ocis-1321
Feature: users cannot upload a file to a blacklisted name using new chunking
  As an administrator
  I want to be able to prevent users from uploading files to specified file names
  So that I can prevent unwanted file names existing in the cloud storage

  Background:
    Given using new DAV path
    And user "Alice" has been created with default attributes and without skeleton files
    And the owncloud log level has been set to debug
    And the owncloud log has been cleared
    And the administrator has enabled async operations

  Scenario: Upload to a filename that is banned by default using new chunking and async MOVE
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" asynchronously to "/.htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/.htaccess" should not exist

  Scenario: Upload to a banned filename using new chunking and async MOVE
    Given the administrator has updated system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json"
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" asynchronously to "/blacklisted-file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/blacklisted-file.txt" should not exist

  @skipOnOcV10.3
  Scenario Outline: upload a file to a filename that matches blacklisted_files_regex using new chunking and async MOVE
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" asynchronously to "<filename>" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "<filename>" should not exist
    Examples:
      | filename                      |
      | filename.ext                  |
      | bannedfilename.txt            |
      | this-ContainsBannedString.txt |

  @skipOnOcV10.3
  Scenario: upload a file to a filename that does not match blacklisted_files_regex using new chunking and async MOVE
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "Alice" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "Alice" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "Alice" moves new chunk file with id "chunking-42" asynchronously to "not-contains-banned-string.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And as "Alice" file "not-contains-banned-string.txt" should exist
